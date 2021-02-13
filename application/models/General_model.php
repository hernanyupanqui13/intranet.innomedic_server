<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class General_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->galleryTbl   = 'ts_comunicados'; 
		$this->imgTbl = 'ts_gallery_images'; 
	}




	 public function Cargar_comentarioas($id = ''){ 
        $this->db->select("*, (SELECT file_name FROM ".$this->imgTbl." WHERE comunicados_id = ".$this->galleryTbl.".id ORDER BY id DESC LIMIT 1) as default_image,
        	(select CONCAT(nombre,' ', apellido_paterno,' ', apellido_materno)  from ts_usuario where Id=id_usuario) as nombres_completosxx,
        	(select Id  from ts_usuario where Id=id_usuario) as idx
        	

        	"); 
        $this->db->from($this->galleryTbl); 
        if($id){ 
            $this->db->where('id', $id); 
            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->row_array():array(); 
             
            if(!empty($result)){ 
                $this->db->select('*'); 
                $this->db->from($this->imgTbl); 
                $this->db->where('comunicados_id', $result['id']); 
                $this->db->order_by('Id', 'desc'); 
                $query  = $this->db->get(); 
                $result2 = ($query->num_rows() > 0)?$query->result_array():array(); 
                $result['images'] = $result2;  
            }  
        }else{ 
            $this->db->order_by('Id', 'desc'); 
            $this->db->where('mostrar', "1"); 

            $query  = $this->db->get(); 
            $result = ($query->num_rows() > 0)?$query->result_array():array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 



    public function insert($data = array()){
        $this->tableName = 'ts_comunicados';
        $this->primaryKey = 'Id';
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

	/*public function insert($data = array()) { 

		
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert gallery data 
            $insert = $this->db->insert($this->galleryTbl, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } */


      
      
    /* 

    https://www.codexworld.com/multiple-image-upload-view-edit-delete-in-codeigniter/
     * Insert image data into the database 
     * @param $data data to be insert based on the passed parameters 
     */ 
    public function insertImage($data = array()) { 

    	
        if(!empty($data)){ 
             
            // Insert gallery data 
            $insert = $this->db->insert_batch($this->imgTbl, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

    //funente de datos personales

    public function mne_gusta($id)
    {
        $this->db->set('megusta', 'megusta+1', FALSE);
        $this->db->where("Id",$id);
        $this->db->update("ts_comunicados");
    }
    public function tristesa($id)
    {
        $this->db->set('triste', 'triste+1', FALSE);
        $this->db->where("Id",$id);
        $this->db->update("ts_comunicados");
    }
     public function ignorados($id)
    {
        $this->db->set('ignorados', 'ignorados+1', FALSE);
        $this->db->where("Id",$id);
        $this->db->update("ts_comunicados");
    }

    //lista de solicitud por usuario


    /*  script fecha y monto  */
    public function years(){
        $this->db->select("YEAR(fecha) as year");
        $this->db->from("ta_ventas");
        $this->db->group_by("year");
        $this->db->order_by("year","desc");
        $resultados = $this->db->get();
        return $resultados->result();
    }
    
    public function montos($year){
        $this->db->select("MONTH(fecha) as mes, count(Id) as monto");
        $this->db->from("ta_ventas");
        $this->db->where("fecha >=",$year."-01-01");
        $this->db->where("fecha <=",$year."-12-31");
        $this->db->group_by("mes");
        $this->db->order_by("mes");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function eliminarPost($id_post) {
        $this->db->set('mostrar', '0');
        $this->db->where("Id",$id_post);
        $this->db->update("ts_comunicados");
    }

  




} ?>