<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Answer extends CI_Model {

	function __construct() {
		parent::__construct();
	}
        
        function _getparticipant(){
            $sql = "SELECT DISTINCT(kaskus_id) AS kaskus FROM answer WHERE ".
                   "is_publish = '1' and is_delete = '0'";
            $Q = $this->db->query($sql);
            $data = array();
            
            if($Q->num_rows() > 0){
                foreach($Q->result_array() as $row){
                    $data[] = $row["kaskus"];
                }
            }
            $Q->free_result();
            
            return $data;
        }
        
        function _getresult($result){
            /*$this->db->select("kaskus_id");
            $this->db->like($result,"match");
            $Q = $this->db->get("answer");
             * *
             */
            $sql = "SELECT kaskus_id FROM answer WHERE  answer_value LIKE '%".$result."%';";
            echo $sql;
            $Q = $this->db->query($sql);
            echo "<pre>";
            print_r($Q);
            echo "</pre>";
            $data = array();
            
            
            if($Q->num_rows > 0){
                foreach($Q->result_array() as $row){
                    $data[] = $row["kaskus_id"];
                }
                
            }
            
            
            $Q->free_result();
            
            return $data;
            
        }
        
        function _getall(){
            $Q = $this->db->get_where("address",array("is_delete"=>"0"));
            $data = $Q->result_array();
            $Q->free_result();
            
            return $data;
        }
        
        function _get($id){
            $Q = $this->db->get_where("address",array("id"=>$id));
            
            $data = $Q->result_array();
            $Q->free_result();
            
            return $data;
        }

       /* End Articles Model */
}