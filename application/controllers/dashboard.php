<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
        
        public function __construct(){
		parent::__construct();
                $this->load->model("m_answer");
        
	}
    
        /*
         * Desc: redirect to survey! it is not allowed
         */
        public function index(){
            haslogin();
            
            #variabel
            $content['error'] = '';
            //hitung jumlah participant
            $participants = $this->m_answer->_getparticipant();
            $this->showme($participants);
            
            
            #validasi            
                 //1. get information [Survey Title, DATE and CREATOR]
                 $fields = "survey_id,admin_id,admin_fullname,survey_title,survey_added,is_delete";
                 $table = array();
                 $table[0] = new stdClass();
		 $table[0]->table = 'admin';
		 $table[1] = new stdClass();
		 $table[1]->table = 'survey';
		 $table[1]->joinOn = 'admin_id = survey_adminid';
		 $table[1]->joinType = '';
                 
                 /*$where = "admin.admin_id = survey.survey_adminid AND ".
                          "survey.survey_id = ".intval($id)." AND ".
                           "survey_status = '1' AND is_delete = '0'";
                  * 
                  */
                 $where = "admin.admin_id = survey.survey_adminid AND ".                          
                           "survey_status = '1' AND is_delete = '0'";
                 
                 $survey = $this->query_model->getDataJoin($fields,$table,$where);
                                  
                 //is survey exist
                 if(count($survey) == 0){
                     $this->session->set_flashdata('error','Survey not found.');
                     //redirect("survey","refresh");
                     die();
                 }
            
            
            #query question     
            $fields = "question_id,question_type,question_title,question_option,question_mandatory";
            $where = "question_surveyid=".intval($survey[0]->survey_id)." AND question_status='1'";
            $questions = $this->query_model->getData($fields,"question",$where);
            
            $this->showme($questions);
            /*
            
            $content["survey"] = $survey;
            $content["questions"] = $questions;
            $content["participants"] = $participants;
            $template['content'] = $this->load->view("dashboard/index",$content,TRUE);		
            $this->load->view('template', $template);
            */
            $data = array();
            $option = array();
            $result = array();
            /*
            foreach($questions as $key => $value){
                $option = explode('<br />',nl2br($value->question_option));
                foreach($option as $key2=>$value2){
                    $result = array()
                }
                $data[$key] = array("id"=>$value->question_id,
                                    "type"=>$value->question_type,
                                    "title"=>$value->question_title                                    
                                    );
                
            }*/
            
            #$this->showme($data);
            $like = $this->m_answer->_getresult("good");
            $this->showme($like);
        }
        
        
        
        private function showme($somevariable){
            echo "<pre>";
            print_r($somevariable);
            echo "</pre>";
        }
        
        
}