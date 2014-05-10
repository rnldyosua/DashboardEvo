<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {
        
	
    /*
     * Desc: landing page survey
     * 
     */
    function index(){        
        #cek login
        haslogin();
        
        #query list of survey
          
        $fields = "survey_id,survey_adminid,survey_title,survey_status,".
                 "survey_added,admin_fullname,(SELECT COUNT(*) FROM question ".
                 "WHERE question_status=\"1\" AND question_surveyid=survey_id) ".
                 "AS question";
        
        $table = array();
			$table[0] = new stdClass();
			$table[0]->table = 'survey';
			$table[1] = new stdClass();
			$table[1]->table = 'admin';
			$table[1]->joinOn = "survey.survey_adminid = admin.admin_id AND ".
                                            "survey.is_delete = '0'";
			$table[1]->joinType = "";
			
        
        $getData = $this->query_model->getDataJoin($fields,$table,"","","",'survey_added DESC');
        $content["data"] = $getData;
        $content["error"] = $content["success"] = "";
        
        
        $template['content'] = $this->load->view('survey/index', $content, TRUE);			
        $this->load->view('template', $template);
    }
        
    
    
        
        /*
         * Desc: add new survey title
         * 
         */
        public function add(){
            //cek login
            haslogin();
                        
            #variabel
            $data = array();
            $template = array();
            $content['error'] = '';
            $session_admin = $this->session->userdata('session_admin');
            
            #validation
            $this->form_validation->set_rules('survey_title', 'Title', 'required');
            $this->form_validation->set_error_delimiters('<li>', '</li>');
                        
            #params post
            
            $_survey_title = $this->input->post("survey_title");                
            if($this->form_validation->run() == TRUE) {
                 $data = array("survey_adminid"=>$session_admin->id,
                               "survey_title"=>$this->input->post("survey_title"),
                               "survey_status"=>$this->input->post("is_publish"));
                 $survey_id = $this->query_model->insertData('survey',$data);
                 $this->session->set_flashdata('success','ADD Survey Success.');
                 redirect("survey");
                 die();
                
            }
            
            if(validation_errors() != '') {
				$content['error'] = validation_errors();
            }
                
            $template["content"] = $this->load->view("survey/add",$content,TRUE);
            $this->load->view("template",$template);
        }
        
        
	
        
        /*
         * Desc: edit survey title dan publish
         * Params: survey id
         * return: void
         * 
         */
        function edit($id){
            haslogin();
            
            $fields = "survey_title,survey_status";
            $getData = $this->query_model->getData($fields,"survey","survey_id=".intval($id));
            
            #variabel
            $data = array();
            $template = array();
            $content['error'] = '';
            $session_admin = $this->session->userdata('session_admin');
            
            #validation
            $this->form_validation->set_rules('survey_title', 'Title', 'required');
            $this->form_validation->set_error_delimiters('<li>', '</li>');
                        
            #params post            
            $_survey_title = $this->input->post("survey_title");                
            $_id = $this->input->post("id");
            
            if($this->form_validation->run() == TRUE) {
                 $data = array("survey_adminid"=>$session_admin->id,
                               "survey_title"=>$this->input->post("survey_title"),
                               "survey_status"=>$this->input->post("is_publish"));
                 $survey_id = $this->query_model->updateData('survey',$data,"survey_id=".intval($_id));
                 $this->session->set_flashdata('success','EDIT Survey Success.');
                 redirect("survey");
                 die();
                
            }
            
            if(validation_errors() != '') {
				$content['error'] = validation_errors();
            }
            $content["id"] = $id;
            $content["getData"] = $getData;
            $template["content"] = $this->load->view("survey/edit",$content,TRUE);
            $this->load->view("template",$template);
            
        }
        
        /*
         * Desc: remove survey, will also remove all the question
         * params: id survey
         * return: void
         */
        function remove($id){
            
            haslogin();
            
            $data = array("is_delete"=>"1");
            $this->query_model->updateData("survey",$data,"survey_id = ".intval($id));
            $this->session->set_flashdata('success','Survey has been removed!');
            redirect("survey","refresh");
            die();
            
        }
        
         /*
         * Desc: toggle publish
         * params: id survey
         * return: void
         */
        function setpublish($id,$status){
            
            haslogin();            
            $new_status = $status == "1"? "0" : "1";
            
            $data = array("survey_status"=>$new_status);
            $this->query_model->updateData("survey",$data,"survey_id = ".intval($id));
            $this->session->set_flashdata('success','Publish status has been updated!');
            redirect("survey","refresh");
            die();
            
        }
        
        
		
	public function preview($survey_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}	
			$survey = $this->query_model->getData('survey_title','survey',"survey_id='".$survey_id."' AND survey_status='1'");
			if(count($survey)==0) {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			$question = $this->query_model->getData('question_id,question_type,question_title,question_option,question_mandatory','question',"question_surveyid='".$survey_id."' AND question_status='1'");
			$template['error'] = '';
			$template['survey'] = $survey;
			$template['question'] = $question;
			$template['title'] = 'Survey - PT. Merah Cipta Media';
			$this->load->view('survey/invitationPage_view', $template);
		} else {
			redirect('home');	
		}
	}
}