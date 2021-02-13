<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }

    public function sendMessage($mensaje) {
        $this->db->insert('chat', $mensaje);
    }
    // Not used but can be useful in the future
    public function getChatUsers($user_session_id) {
        $query = $this->db->query(
            "SELECT DISTINCT from_user, tsu.nombre, tsu.apellido_paterno, `connect`, 'varon.png' AS imagen_perfil
            FROM chat
                INNER JOIN ts_usuario tsu
                    ON tsu.Id = chat.from_user
            WHERE to_user=$user_session_id"
        );

		return $query->result();
    }

    public function getCurrentUser($id) {
        $query = $this->db->query(
            "SELECT $id AS current_user_id, CONCAT_WS(' ', dp.nombres, dp.apellido_paterno) AS nombre, imagen, 
                (select `connect` from ts_usuario where dp.Id=ts_usuario.Id ) AS estado
            FROM ts_datos_personales dp
            WHERE Id=$id"
        );

        return $query->row();
    }

    public function getConversationWith($current_user, $target_user) {
        $query = $this->db->query(
            "   SELECT * 
                FROM chat
                WHERE from_user = $current_user AND to_user=$target_user
            UNION
                SELECT *
                FROM chat
                WHERE to_user = $current_user AND from_user=$target_user
            ORDER BY time_send"
        );

        return $query->result();
    }

    public function getUnreadMessages($from_user, $to_user) {
        $query = $this->db->query(
            "SELECT COUNT(*) AS unread_messages
            FROM chat
            WHERE from_user = $from_user 
                AND to_user = $to_user
                AND was_viewed = 0
            GROUP BY from_user
            "            
        );

        if ($query->row() != null) {
            return (int) $query->row()->unread_messages;
        } else {
            return 0;
        }
    }


    public function getRRHHChatLink($user_session_id) {
        $query = $this->db->query(
            "SELECT tsu.Id, tsu.nombre, tsu.apellido_paterno, 
                `connect`, 
                (SELECT tsp.imagen
                FROM ts_datos_personales AS tsp
                WHERE tsp.Id = tsu.Id) AS imagen_perfil,

                CASE 
                    WHEN (SELECT count(*)
                        FROM chat
                        WHERE from_user = 35 
                            AND to_user = $user_session_id  
                            AND was_viewed = 0
                        GROUP BY from_user) IS NOT NULL 
                    THEN (SELECT count(*)
                        FROM chat
                        WHERE from_user = 35 
                            AND to_user = $user_session_id  
                            AND was_viewed = 0
                        GROUP BY from_user)
                    ELSE 0
                END AS unread_messages
            FROM ts_usuario tsu
            WHERE Id = 35"
        );

        return $query->result();
    }

    public function getEveryChatUser($filter_condition) {

        if($filter_condition == "null") {
            $filter_condition = "";
        } else {
            $filter_condition = "AND tsu.nombre LIKE '%$filter_condition%' ";
        }

        $query = $this->db->query(
            "SELECT tsu.Id, tsu.nombre, tsu.apellido_paterno, 
                `connect`, 'varon.png' AS imagen_perfil,
                (SELECT imagen
                FROM ts_datos_personales tsd
                WHERE tsd.Id = tsu.Id) AS imagen_perfil,
                CASE 
                    WHEN (SELECT count(*)
                        FROM chat
                        WHERE from_user = tsu.Id 
                            AND to_user = 35
                            AND was_viewed = 0
                        GROUP BY from_user) IS NOT NULL 
                    THEN (SELECT count(*)
                        FROM chat
                        WHERE from_user = tsu.Id 
                            AND to_user = 35
                            AND was_viewed = 0
                        GROUP BY from_user)
                    ELSE 0
                END AS unread_messages,

                (SELECT MAX(time_send)
                FROM chat
                WHERE from_user = tsu.Id
                    AND to_user = 35
                GROUP BY from_user) AS last_conversation
            FROM ts_usuario tsu
            WHERE tsu.status = 1
            $filter_condition
            ORDER BY unread_messages DESC, last_conversation DESC, tsu.nombre ASC
            "
        );

        return $query->result();
    }

    public function viewMessage($target_user, $current_user) {
        
        $data = array(
            "was_viewed" => 1
        );
        $this->db->where("from_user", $target_user);
        $this->db->where("to_user", $current_user);
        $this->db->update("chat", $data);
    }

    public function checkIfNewMessage($from_user, $to_user) {
        $query = $this->db->query(
            "SELECT COUNT(*) AS lenght
            FROM chat
            WHERE from_user = $from_user
                AND to_user = $to_user
            GROUP BY from_user
            "
        );
        
        $result = $query->row();

        // To avoid null values
        if ($result == null) {
            return 0;
        } else {
            return $result->lenght;
        }
    }

    public function getTotalNumberUnreadMsg($user_id) {
        $query = $this->db->query(
            "SELECT COUNT(*) as total_unread_msg
            FROM chat
            WHERE was_viewed = 0
                AND to_user = $user_id
            "
        );

        return $query->row()->total_unread_msg;
    }



}