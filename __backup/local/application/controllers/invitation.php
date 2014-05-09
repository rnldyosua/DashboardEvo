<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invitation extends CI_Controller {
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
			
			$getDataTotal = $this->query_model->getData('count(*) as total','invitation',"invitation_surveyid='$survey_id'");
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
			
			$getData = $this->query_model->getData('invitation_sender,invitation_type,invitation_email,invitation_status,invitation_added','invitation',"invitation_surveyid='$survey_id'",$limit,$offset,'invitation_added DESC');
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
			
			$template['content'] = $this->load->view('invitation/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Invitation';
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
			
			$this->form_validation->set_rules('invitation_email', 'Email', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$cekInvitation = $this->query_model->getData('count(*) as total','invitation',"invitation_email='".$this->input->post('invitation_email')."' AND invitation_surveyid='.$survey_id.'");
				if($cekInvitation[0]->total > 0) {
					$content['error'] = 'This email already invited.';
				} else {
					$invitation_code = substr(md5(uniqid(mt_rand(), true)), 0, 5);
					$data = array(
						'invitation_surveyid' => $survey_id,
						'invitation_sender' => $session_admin->email,
						'invitation_type' => 'admin',
						'invitation_email' => $this->input->post('invitation_email'),
						'invitation_code' => $invitation_code,
						'invitation_status' => '1'
					);
					$invitation_id = $this->query_model->insertData('invitation',$data);
					$surveyData = $this->query_model->getData('survey_title,survey_code','survey',"survey_id='".$survey_id."'");
					
					$data = array(
						'activity_adminid' => $session_admin->id,
						'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> add new invitation in Survey <a href="[detailSurveyURL/'.$survey_id.']">'.$surveyData[0]->survey_title.'</a>',
						'activity_type' => 'invitation'
					);
					$this->query_model->insertData('activity',$data);
					
					$this->load->library('email');
					$config_email['protocol'] = 'mail';
					$config_email['wordwrap'] = FALSE;
					$config_email['mailtype'] = 'html';
					$config_email['charset'] = 'utf-8';
					$this->email->initialize($config_email);
					$this->email->from('no-reply@merahciptamedia.co.id', 'PT. Merah Cipta Media');
					$this->email->to($this->input->post('invitation_email')); 
					$this->email->subject('Invitation Survey');
					$message['survey'] = $surveyData;
					$message['invitation_email'] = $this->input->post('invitation_email');
					$message['invitation_code'] = $invitation_code;
					$message = $this->load->view('email/invitation_message', $message, true);
					$this->email->message($message);	
					$this->email->send();
					
					$this->session->set_flashdata('success','ADD Invitation Success.');
					redirect('invitation/survey/'.$survey_id);	
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$template['content'] = $this->load->view('invitation/add_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Add Invitation';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
}