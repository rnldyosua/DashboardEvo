<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {
	public function survey($survey_id='',$page=1)
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			
			$session_admin = $this->session->userdata('session_admin');
			
			$content['success'] = '';
			$content['error'] = '';
			if($this->session->flashdata('success')) {
				$content['success'] = $this->session->flashdata('success');
			}
			if($this->session->flashdata('error')) {
				$content['error'] = '<li>'.$this->session->flashdata('error').'</li>';
			}
			
			$limit = 10;
			$offset = ($page-1)*$limit;
			
			$getDataTotal = $this->query_model->getData('count(*) as total','question',"question_status='1' AND question_surveyid='$survey_id'");
			$config['base_url'] = site_url('question/survey/'.$survey_id);
			$config['total_rows'] = $getDataTotal[0]->total;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['num_links'] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination" style="display:table; margin:auto;">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li><a href="#"><b>';
			$config['cur_tag_close'] = '</b></a></li>';
			
			$this->pagination->initialize($config);
			$content['pagination'] = $this->pagination->create_links();
			
			$getData = $this->query_model->getData('question_id,question_type,question_title,question_option,question_mandatory','question',"question_status='1' AND question_surveyid='$survey_id'",$limit,$offset,'question_id');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$table = array();
			$table[0] = new stdClass();
			$table[0]->table = 'admin';
			$table[1] = new stdClass();
			$table[1]->table = 'survey';
			$table[1]->joinOn = 'admin_id = survey_adminid';
			$table[1]->joinType = '';
			$table[2] = new stdClass();
			$table[2]->table = 'brand';
			$table[2]->joinOn = 'survey_brandid = brand_id';
			$table[2]->joinType = '';
			$table[3] = new stdClass();
			$table[3]->table = 'company';
			$table[3]->joinOn = 'company_id = brand_companyid';
			$table[3]->joinType = '';
			$survey = $this->query_model->getDataJoin('admin_id,admin_fullname,brand_id,brand_name,company_id,company_name,survey_id,survey_title,survey_code,survey_added',$table,"survey_id='$survey_id'");
			$content['survey'] = $survey;
			
			$template['content'] = $this->load->view('question/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Question';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function add($survey_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			
			$getData = $this->query_model->getData('survey_adminid','survey',"survey_id='".$survey_id."'");
			
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->id!=$getData[0]->survey_adminid) {
				$this->session->set_flashdata('error','Access denied.');
				redirect('survey/all');
			}
			
			$session_admin = $this->session->userdata('session_admin');
			$content['error'] = '';
			
			$this->form_validation->set_rules('question_title', 'Title', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$data = array(
					'question_surveyid' => $survey_id,
					'question_type' => $this->input->post('question_type'),
					'question_title' => $this->input->post('question_title'),
					'question_option' => $this->input->post('question_option'),
					'question_mandatory' => $this->input->post('question_mandatory'),
					'question_status' => '1'
				);
				$question_id = $this->query_model->insertData('question',$data);
				$surveyData = $this->query_model->getData('survey_title','survey',"survey_id='".$survey_id."'");
				
				$data = array(
					'activity_adminid' => $session_admin->id,
					'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> add new question in Survey <a href="[detailSurveyURL/'.$survey_id.']">'.$surveyData[0]->survey_title.'</a>',
					'activity_type' => 'question'
				);
				$this->query_model->insertData('activity',$data);
				
				$this->session->set_flashdata('success','ADD Question Success.');
				redirect('question/survey/'.$survey_id);
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$template['content'] = $this->load->view('question/add_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Add Question';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function edit($survey_id='',$question_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			if($question_id=='') {
				$this->session->set_flashdata('error','Question not found.');
				redirect('question/survey/'.$survey_id);
			}
			$getData = $this->query_model->getData('survey_adminid','survey',"survey_id='".$survey_id."'");
			
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->id!=$getData[0]->survey_adminid) {
				$this->session->set_flashdata('error','Access denied.');
				redirect('survey/all');
			}
			$content['error'] = '';
			
			$getData = $this->query_model->getData('question_id,question_title,question_type,question_option,question_mandatory','question',"question_id='".$question_id."'");
			
			$this->form_validation->set_rules('question_title', 'Title', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$data = array(
					'question_type' => $this->input->post('question_type'),
					'question_title' => $this->input->post('question_title'),
					'question_option' => $this->input->post('question_option'),
					'question_mandatory' => $this->input->post('question_mandatory')
				);
				$this->query_model->updateData('question',$data,"question_id='".$question_id."'");
				
				$surveyData = $this->query_model->getData('survey_title','survey',"survey_id='".$survey_id."'");
				
				$data = array(
					'activity_adminid' => $session_admin->id,
					'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> edit question in Survey <a href="[detailSurveyURL/'.$survey_id.']">'.$surveyData[0]->survey_title.'</a>',
					'activity_type' => 'question'
				);
				$this->query_model->insertData('activity',$data);
				
				$this->session->set_flashdata('success','Edit Question Success.');
				redirect('question/survey/'.$survey_id);
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
				$getData[0]->question_type = $this->input->post('question_type');
				$getData[0]->question_title = $this->input->post('question_title');
				$getData[0]->question_option = $this->input->post('question_option');
				$getData[0]->question_mandatory = $this->input->post('question_mandatory');
			}
			
			$content['data'] = $getData;
			$template['content'] = $this->load->view('question/edit_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Edit Question';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function delete($survey_id='',$question_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			if($question_id=='') {
				$this->session->set_flashdata('error','Question not found.');
				redirect('question/survey/'.$survey_id);
			}
			$getData = $this->query_model->getData('survey_adminid,survey_title','survey',"survey_id='".$survey_id."'");
			
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->id!=$getData[0]->survey_adminid) {
				$this->session->set_flashdata('error','Access denied.');
				redirect('question/survey/'.$survey_id);
			}
			
			$getDataQuestion = $this->query_model->getData('question_title','question',"question_id='".$question_id."'");
			
			$data = array(
				'activity_adminid' => $session_admin->id,
				'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> delete question <a href="[detailQuestionURL]/'.$question_id.'">'.$getDataQuestion[0]->question_title.'</a> in survey <a href="[detailSurveyURL]/'.$survey_id.'">'.$getData[0]->survey_title.'</a>',
				'activity_type' => 'question'
			);
			$this->query_model->insertData('activity',$data);
			
			$data = array(
				'question_status' => '0'
			);
			$this->query_model->updateData('question',$data,"question_id='".$question_id."'");
			
			$this->session->set_flashdata('success','Delete Question Success.');
			redirect('question/survey/'.$survey_id);	
		} else {
			redirect('home');	
		}
	}
}