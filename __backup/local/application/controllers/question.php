<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {
    
        /*
         * Desc: redirect to survey! it is not allowed
         */
        public function index(){
            haslogin();
            redirect("survey","refresh");
        }
        
        /*
         * Desc: display all the question based on survey id
         */
	public function survey($id){
                //check login
                haslogin();
                
                #variabel
                $session_admin = $this->session->userdata('session_admin');
                $content['success'] = '';
                $content['error'] = '';
                
                #query
                 //1. get information [Survey Title, DATE and CREATOR]
                 $fields = "admin_id,admin_fullname,survey_title,survey_added,is_delete";
                 $table = array();
                 $table[0] = new stdClass();
		 $table[0]->table = 'admin';
		 $table[1] = new stdClass();
		 $table[1]->table = 'survey';
		 $table[1]->joinOn = 'admin_id = survey_adminid';
		 $table[1]->joinType = '';
                 
                 $where = "admin.admin_id = survey.survey_adminid AND ".
                          "survey.survey_id = ".intval($id);
                 
                 $survey = $this->query_model->getDataJoin($fields,$table,$where);
                 
                 
                 //is survey exist
                 if(count($survey) == 0){
                     $this->session->set_flashdata('error','Survey not found.');
                     redirect("survey","refresh");
                     die();
                 }
                 
                 #validation
                 //cek if survey is in delete status
                 if($survey[0]->is_delete == "1"){
                     $this->session->set_flashdata('error','Access denied.');
                     redirect("survey","refresh");
                     die();
                 }                 
                  
                 //2. get question
                 $fields = "question_id,question_surveyid,order_number,".
                           "question_type,question_title,question_option,".
                           "question_mandatory,question_status,question_added,".
                           "show_to_web";
                 $where = "question_surveyid = ".intval($id);
                 $sort = "order_number";
                 $limit = $offset = 0;
                 
                 $questions = $this->query_model->getData($fields,"question",$where,$limit,$offset,$sort);
                 
                 #view
                 $content["survey"] = $survey;
                 $content["questions"] = $questions;
                 $content["id"] = $id;
                 
                 $template['content'] = $this->load->view('question/index', $content, TRUE);		
		 $this->load->view('template', $template);
                
	}
        
        
        
        /*
         * Desc: add question 
         * params: survey id
         * return: void
         */
	public function add($survey_id=''){
            
            //check login
            haslogin();
            
            #variabel
            $content['error'] = '';
            
            #validasi
             //check exist survey id
            $getData = $this->query_model->getData('survey_adminid','survey',"survey_id='".$survey_id."'");
            if($survey_id == "" || count($getData) == 0){
                $this->session->set_flashdata('error','Survey not found.');
                redirect("survey","refresh");
                die();
            }
                   
             //is the right admin
             $session_admin = $this->session->userdata('session_admin');
             if($session_admin->id!=$getData[0]->survey_adminid) {
		$this->session->set_flashdata('error','Access denied.');
		redirect("survey","refresh");
                die();
            }
            
            #validation form
             //setting
             $this->form_validation->set_rules('question_title', 'Question', 'required');
	     $this->form_validation->set_error_delimiters('<li>', '</li>');
             if($this->form_validation->run() == TRUE) {
		$data = array(
                            'question_surveyid' => $this->input->post('id'),
			    'question_type' => $this->input->post('question_type'),
                            'question_title' => $this->input->post('question_title'),
                            'question_option' => $this->input->post('question_option'),
                            'question_mandatory' => $this->input->post('question_mandatory'),
                            'with_notes'=> $this->input->post('with_notes'),
                            'question_status' => $this->input->post('is_publish')
                             );
			$question_id = $this->query_model->insertData('question',$data);
			$surveyData = $this->query_model->getData('survey_title','survey',"survey_id='".$survey_id."'");
				
				$this->session->set_flashdata('success','ADD Question Success.');
				redirect("question/survey/".$survey_id,"refresh");
                                die();
		}
		if(validation_errors() != '') {
			$content['error'] = validation_errors();
		}
                $content["id"] = $survey_id;
                $template['content'] = $this->load->view('question/add', $content, TRUE);			
		$this->load->view('template', $template);           
	}
        
        
        
	public function edit($survey_id='',$question_id='')
	{
            //check login
            haslogin();
            
            #variabel
            $content['error'] = '';
            
            #validasi
            //is the right admin
            $getData = $this->query_model->getData('survey_adminid','survey',"survey_id='".$survey_id."'");
             $session_admin = $this->session->userdata('session_admin');
             if($session_admin->id!=$getData[0]->survey_adminid) {
		$this->session->set_flashdata('error','Access denied.');
		redirect("survey","refresh");
                die();
            }
                        
             //check exist survey id             
             if($survey_id == "" || count($getData) == 0){
                $this->session->set_flashdata('error','Survey not found.');
                redirect("survey","refresh");
                die();
             }
            
             //check exist question id
             $fields = "question_title,question_type,question_option,".
                        "question_mandatory,with_notes,question_status";
             $getDataQuest = $this->query_model->getData($fields,"question","question_id = ".intval($question_id));
             if($question_id == "" || count($getDataQuest) == 0){
                $this->session->set_flashdata('error','Qustion not found.');
                redirect("question/survey/".$survey_id,"refresh");
                die();
             }
             
             #validation form
             $idq = $this->input->post("idq");
            $this->form_validation->set_rules('question_title', 'Question', 'required');
            $this->form_validation->set_error_delimiters('<li>', '</li>');
            if($this->form_validation->run() == TRUE) {
		$data = array(                           
			    'question_type' => $this->input->post('question_type'),
                            'question_title' => $this->input->post('question_title'),
                            'question_option' => $this->input->post('question_option'),
                            'question_mandatory' => $this->input->post('question_mandatory'),
                            'with_notes'=> $this->input->post('with_notes'),
                            'question_status' => $this->input->post('is_publish')
                             );
		$this->query_model->updateData('question',$data,"question_id=".intval($idq));
								
		$this->session->set_flashdata('success','Edit Question Success.');
		redirect('question/survey/'.$survey_id);
                die();
            }
            if(validation_errors() != '') {
		$content['error'] = validation_errors();
		$getData[0]->question_type = $this->input->post('question_type');
		$getData[0]->question_title = $this->input->post('question_title');
		$getData[0]->question_option = $this->input->post('question_option');
		$getData[0]->question_mandatory = $this->input->post('question_mandatory');
	     }    
             
             $content['data'] = $getDataQuest;
             $content["ids"] = $survey_id;
             $content["idq"] = $question_id;
	     $template['content'] = $this->load->view('question/edit', $content, TRUE);	
             $this->load->view('template', $template);
                            
	}
	
        /*
         * Desc: remove question
         * params: id question
         * return: void
         */
        function remove($ids,$idq){
            
            haslogin();
            
            $data = array("is_delete"=>"1");
            $this->query_model->updateData("question",$data,"question_id = ".intval($idq));
            $this->session->set_flashdata('success','Question has been removed!');
           // redirect("question/survey/".$ids,"refresh");
            die();
            
        }
        
         /*
         * Desc: toggle publish
         * params: id survey,id question,status
         * return: void
         */
        function setpublish($ids,$idq,$status){
            
            haslogin();            
            $new_status = $status == "1"? "0" : "1";                        
            
            $data = array("question_status"=>$new_status);
            $this->query_model->updateData("question",$data,"question_id = ".intval($idq));
            $this->session->set_flashdata('success','Publish status has been updated!');
            redirect("question/survey/".$ids,"refresh");
            die();
            
        }
        
         /*
         * Desc: toggle publish
         * params: id survey,id question,status
         * return: void
         */
        function setmandatory($ids,$idq,$status){
            
            haslogin();            
            $new_status = $status == "1"? "0" : "1";                        
            
            $data = array("question_mandatory"=>$new_status);
            $this->query_model->updateData("question",$data,"question_id = ".intval($idq));
            $this->session->set_flashdata('success','Mandatory status has been updated!');
            redirect("question/survey/".$ids,"refresh");
            die();
            
        }
        
        /*
         * Desc: toggle show to the web
         * params: id survey,id question,status
         * return: void
         */
        function showtoweb($ids,$idq,$status){
            
            haslogin();            
            $new_status = $status == "1"? "0" : "1";                        
            
            $data1 = array("show_to_web"=>"0");
            $data2 = array("show_to_web"=>$new_status);
            $this->query_model->updateData("question",$data1,"question_surveyid = ".intval($ids));
            $this->query_model->updateData("question",$data2,"question_id = ".intval($idq));
            $this->session->set_flashdata('success','Show to Web has been updated!');
            redirect("question/survey/".$ids,"refresh");
            die();
            
        }
        
        
        private function showme($somevariable){
            echo "<pre>";
            print_r($somevariable);
            echo "</pre>";
        }
        
        
}