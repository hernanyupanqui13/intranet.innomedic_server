<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
        $this->load->helper(array('url','funciones'));
        $this->load->model("Chat_model");

        
	} 
    public function index()
    {
        $current_user_id = $this->session->userdata('session_id');
        if($current_user_id == '') {
            redirect(base_url());
        }

        $data = array(
            'title' =>array("estas viendo el chat","Chat","","<a>Area de Sistemas</a>"),
        );

        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('chat/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function sendMessage() {
        $mensaje = $this->input->post("mensaje");
        $from_user = $this->input->post("from_user");
        $to_user = $this->input->post("to_user");


        $data = array("message"=>$mensaje, "from_user"=>$from_user, "to_user"=>$to_user);

        $this->Chat_model->sendMessage($data);

        echo json_encode($data);

    }

    public function getChatUsers() {

        $user_session_id = $this->session->userdata("session_id");

        $chat_users_list = $this->Chat_model->getChatUsers($user_session_id);

        echo json_encode($chat_users_list);
    }

    public function getCurrentUser() {
        $user_session_id = $this->session->userdata("session_id");

        echo json_encode($this->Chat_model->getCurrentUser($user_session_id));

    }
    

    public function getConversationWith() {
        $current_user = $_POST["current_user"];
        $target_user = $_POST["target_user"];

        echo json_encode($this->Chat_model->getConversationWith($current_user, $target_user));
    }

    public function getRRHHChatLink() {
        $user_session_id = $this->session->userdata("session_id");
        echo json_encode($this->Chat_model->getRRHHChatLink($user_session_id));
    }

    public function getEveryChatUser($filter_condition) {
        echo json_encode($this->Chat_model->getEveryChatUser($filter_condition));
    }

    public function getChatUserList($filter_condition="null") {
        
        $user_session_id = $this->session->userdata("session_id");

        if($user_session_id == 35) {
            $this->getEveryChatUser($filter_condition);
        } else {
            $this->getRRHHChatLink();
        }

    }

    public function viewMessage() {
        $current_user = $this->session->userdata("session_id");
        $from_user = $this->input->post("from_user");


        $this->Chat_model->viewMessage($from_user, $current_user);
    }

    public function checkIfNewMessage() {
        $to_user = $this->session->userdata("session_id");
        $n_msg_on_client = $this->input->post("n_msg_client");
        $from_user = $this->input->post("from_user");

        
        $n_msg_on_server = $this->Chat_model->checkIfNewMessage($from_user, $to_user);

        if($n_msg_on_client == $n_msg_on_server) {
            echo "false";   // No new messages 
        } else {
            echo "true"; // There is new messages
        }
    }

    public function getUnreadMessages() {
        $from_user = $this->input->post("from_user");
        $to_user = $this->session->userdata("session_id");


        echo json_encode($this->Chat_model->getUnreadMessages($from_user, $to_user));
        
    }


    // This returns all the unread messages to display it in the menu 
    public function getTotalNumberUnreadMsg() {
        $to_user = $this->session->userdata("session_id");

        echo strval($this->Chat_model->getTotalNumberUnreadMsg($to_user));
    }
    
}
