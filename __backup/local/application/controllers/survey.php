<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {
	public function all($page=1)
	{
		if($this->session->userdata('session_admin')) {
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
			
			$getDataTotal = $this->query_model->getDataJoin('count(*) as total',$table,"survey_status='1'");
			$config['base_url'] = site_url('survey/all');
			$config['total_rows'] = $getDataTotal[0]->total;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
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
			
			$getData = $this->query_model->getDataJoin('admin_id,admin_fullname,brand_id,brand_name,company_id,company_name,survey_id,survey_title,survey_code,survey_added,(SELECT COUNT(*) FROM question WHERE question_status="1" AND question_surveyid=survey_id) as question,(SELECT COUNT(*) FROM invitation WHERE invitation_surveyid=survey_id) as invitation',$table,"survey_status='1'",$limit,$offset,'survey_added DESC');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$template['content'] = $this->load->view('survey/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Survey';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function brand($brand_id='',$page=1)
	{
		if($this->session->userdata('session_admin')) {
			if($brand_id=='') {
				$this->session->set_flashdata('error','Brand not found.');
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
			
			$getDataTotal = $this->query_model->getDataJoin('count(*) as total',$table,"survey_status='1' AND survey_brandid='$brand_id'");
			$config['base_url'] = site_url('survey/brand/'.$brand_id);
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
			
			$getData = $this->query_model->getDataJoin('admin_id,admin_fullname,brand_id,brand_name,company_id,company_name,survey_id,survey_title,survey_code,survey_added,(SELECT COUNT(*) FROM question WHERE question_status="1" AND question_surveyid=survey_id) as question,(SELECT COUNT(*) FROM invitation WHERE invitation_surveyid=survey_id) as invitation',$table,"survey_status='1' AND survey_brandid='$brand_id'",$limit,$offset,'survey_added DESC');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$brand = $this->query_model->getData('brand_id,brand_name','brand',"brand_status='1' AND brand_id='$brand_id'");
			$content['brand'] = $brand;
			
			$template['content'] = $this->load->view('survey/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Survey';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function admin($admin_id='',$page=1)
	{
		if($this->session->userdata('session_admin')) {
			if($admin_id=='') {
				$this->session->set_flashdata('error','Admin not found.');
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
			
			$getDataTotal = $this->query_model->getDataJoin('count(*) as total',$table,"survey_status='1' AND survey_adminid='$admin_id'");
			$config['base_url'] = site_url('survey/admin/'.$admin_id);
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
			
			$getData = $this->query_model->getDataJoin('admin_id,admin_fullname,brand_id,brand_name,company_id,company_name,survey_id,survey_title,survey_code,survey_added,(SELECT COUNT(*) FROM question WHERE question_status="1" AND question_surveyid=survey_id) as question,(SELECT COUNT(*) FROM invitation WHERE invitation_surveyid=survey_id) as invitation',$table,"survey_status='1' AND survey_adminid='$admin_id'",$limit,$offset,'survey_added DESC');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$admin = $this->query_model->getData('admin_id,admin_fullname','admin',"admin_id='$admin_id'");
			$content['admin'] = $admin;
			
			$template['content'] = $this->load->view('survey/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Survey';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function add($brand_id='')
	{
		if($this->session->userdata('session_admin')) {
			$session_admin = $this->session->userdata('session_admin');
			$content['error'] = '';
			
			$this->form_validation->set_rules('survey_title', 'Title', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$data = array(
					'survey_adminid' => $session_admin->id,
					'survey_brandid' => $this->input->post('brand_id'),
					'survey_title' => $this->input->post('survey_title'),
					'survey_status' => '1',
					'survey_code' => substr(md5(uniqid(mt_rand(), true)), 0, 5)
				);
				$survey_id = $this->query_model->insertData('survey',$data);
				
				$brandData = $this->query_model->getData('brand_name','brand',"brand_id='".$this->input->post('brand_id')."'");
				
				$data = array(
					'activity_adminid' => $session_admin->id,
					'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> add new survey <a href="[detailSurveyURL/'.$survey_id.']">'.$this->input->post('survey_title').'</a> in brand <a href="[detailBrandURL/'.$this->input->post('brand_id').']">'.$brandData[0]->brand_name.'</a>',
					'activity_type' => 'survey'
				);
				$this->query_model->insertData('activity',$data);
				
				$this->session->set_flashdata('success','ADD Survey Success.');
				if($brand_id=='') {
					redirect('survey/all');
				} else {
					redirect('survey/brand/'.$brand_id);	
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$table = array();
			$table[0] = new stdClass();
			$table[0]->table = 'brand';
			$table[1] = new stdClass();
			$table[1]->table = 'company';
			$table[1]->joinOn = 'company_id = brand_companyid';
			$table[1]->joinType = '';
			$getBrand = $this->query_model->getDataJoin('company_name,brand_id,brand_name',$table,"brand_status='1'",'','','brand_name');
			$content['brand'] = $getBrand;
			$template['content'] = $this->load->view('survey/add_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Add Survey';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function edit($survey_id='',$brand_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Survey not found.');
				redirect('survey/all');
			}
			
			$table = array();
			$table[0] = new stdClass();
			$table[0]->table = 'brand';
			$table[1] = new stdClass();
			$table[1]->table = 'survey';
			$table[1]->joinOn = 'brand_id = survey_brandid';
			$table[1]->joinType = '';
			$getData = $this->query_model->getDataJoin('survey_adminid,survey_brandid,survey_title,brand_name',$table,"survey_id='".$survey_id."'");
			
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->id!=$getData[0]->survey_adminid) {
				$this->session->set_flashdata('error','Access denied.');
				redirect('survey/all');
			}
			$content['error'] = '';
			
			$this->form_validation->set_rules('survey_title', 'Title', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$data = array(
					'survey_brandid' => $this->input->post('brand_id'),
					'survey_title' => $this->input->post('survey_title')
				);
				$this->query_model->updateData('survey',$data,"survey_id='".$survey_id."'");
				
				$brandData = $this->query_model->getData('brand_name','brand',"brand_id='".$this->input->post('brand_id')."'");
				
				$data = array(
					'activity_adminid' => $session_admin->id,
					'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> edit survey <a href="[detailSurveyURL]/'.$survey_id.'">'.$getData[0]->survey_title.'</a> in brand <a href="[detailBrandURL]/'.$this->input->post('brand_id').'">'.$brandData[0]->brand_name.'</a>',
					'activity_type' => 'survey'
				);
				$this->query_model->insertData('activity',$data);
				
				$this->session->set_flashdata('success','Edit Survey Success.');
				if($brand_id=='') {
					redirect('survey/all');
				} else {
					redirect('survey/brand/'.$brand_id);	
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
				$getData[0]->survey_brandid = $this->input->post('brand_id');
				$getData[0]->survey_title = $this->input->post('survey_title');
			}
			
			$getBrand = $this->query_model->getData('brand_id,brand_name','brand',"brand_status='1'",'','','brand_name');
			$content['brand'] = $getBrand;
			$content['data'] = $getData;
			$template['content'] = $this->load->view('survey/edit_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Edit Survey';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function delete($survey_id='',$brand_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($survey_id=='') {
				$this->session->set_flashdata('error','Brand not found.');
				redirect('survey/all');
			}
			
			$getData = $this->query_model->getData('survey_adminid,survey_brandid,survey_title','survey',"survey_id='".$survey_id."'");
			
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->id!=$getData[0]->survey_adminid) {
				$this->session->set_flashdata('error','Access denied.');
				redirect('survey/all');
			}
			
			$data = array(
				'survey_status' => '0'
			);
			$this->query_model->updateData('survey',$data,"survey_id='".$survey_id."'");
			
			$data = array(
				'activity_adminid' => $session_admin->id,
				'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> delete survey <a href="[detailSurveyURL]/'.$survey_id.'">'.$getData[0]->survey_title.'</a> in company <a href="[detailCompanyURL/'.$this->input->post('company_id').']">'.$companyData[0]->company_name.'</a>',
				'activity_type' => 'brand'
			);
			$this->query_model->insertData('activity',$data);
					
			$this->session->set_flashdata('success','Delete Survey Success.');
			if($company_id=='') {
				redirect('survey/all');
			} else {
				redirect('survey/brand/'.$brand_id);	
			}
		} else {
			redirect('home');	
		}
	}
	public function invitation($survey_code='')
	{
		$template['error'] = '';
		if($survey_code=='') {
			redirect('survey/invitationError');
		} else {
			$getDataSurvey = $this->query_model->getData('count(*) as total','survey',"survey_code='".$survey_code."' AND survey_status='1'");
			if($getDataSurvey[0]->total==0) {
				redirect('survey/invitationError');
			} else {
				if($this->session->userdata('session_invitation')) {
					$session_invitation = $this->session->userdata('session_invitation');
					if($session_invitation->survey_code != $survey_code) {
						$this->session->unset_userdata('session_invitation');
						redirect('survey/invitation/'.$survey_code);
					} else {
						redirect('survey/invitationPage/'.$survey_code);
					}
				} else {
					$this->form_validation->set_rules('invitation_email', 'Email Address', 'required|valid_email');
					$this->form_validation->set_rules('invitation_code', 'Invitation Code', 'required');
					$this->form_validation->set_error_delimiters('<li>', '</li>');
					if($this->form_validation->run() == TRUE) {
						$getDataInvitation = $this->query_model->getData('invitation_id,invitation_status','invitation',"invitation_email='".$this->input->post('invitation_email')."' AND invitation_code='".$this->input->post('invitation_code')."'");
						if(count($getDataInvitation)==0) {
							$template['error'] = '<li>Invitation information is not valid.</li>';
						} else {
							if($getDataInvitation[0]->invitation_status=='0') {
								$template['error'] = '<li>This invitation is expired.</li>';
							} else {
								$session_invitation->survey_code = $survey_code;
								$session_invitation->invitation_id = $getDataInvitation[0]->invitation_id;
								$session_invitation->invitation_email = $invitation_email;
								$this->session->set_userdata('session_invitation',$session_invitation);
								redirect('survey/invitationPage/'.$survey_code);
							}
						}
					}
					if(validation_errors() != '') {
						$template['error'] = validation_errors();
					}	
				}
			}
		}
		$template['title'] = 'Survey - PT. Merah Cipta Media';
		$this->load->view('survey/invitationLogin_view', $template);
	}
	public function invitationPage($survey_code='')
	{
		$template['error'] = '';
		if($survey_code=='') {
			redirect('survey/invitationError');
		} else {
			$getDataSurvey = $this->query_model->getData('survey_id,survey_title','survey',"survey_code='".$survey_code."' AND survey_status='1'");
			if(count($getDataSurvey)==0) {
				redirect('survey/invitationError');
			} else {
				if($this->session->userdata('session_invitation')) {
					$session_invitation = $this->session->userdata('session_invitation');
					if($session_invitation->survey_code != $survey_code) {
						$this->session->unset_userdata('session_invitation');
						redirect('survey/invitation/'.$survey_code);
					} else {
						$template['survey'] = $getDataSurvey;
						
						$question = $this->query_model->getData('question_id,question_type,question_title,question_option,question_mandatory','question',"question_surveyid='".$getDataSurvey[0]->survey_id."' AND question_status='1'");
						$template['question'] = $question;
						
						$count_mandatory = 0;
						foreach($question as $key => $value) {
							if($value->question_mandatory=='1') {
								$this->form_validation->set_rules($value->question_id, $value->question_title, 'required');
								$count_mandatory = $count_mandatory+1;
							}
						}
						if($count_mandatory>0) {
							$this->form_validation->set_error_delimiters('<li>', '</li>');
							if($this->form_validation->run() == TRUE) { 
								foreach($question as $key => $value) {
									$data = array(
										'answer_questionid' => $value->question_id,
										'answer_invintationid' => $session_invitation->invitation_id,
										'answer_value' => $this->input->post($value->question_id)
									);
									$this->query_model->insertData('answer',$data);
								}
								$data = array(
									'invitation_ip' => $this->input->ip_address(),
									'invitation_useragent' => $this->input->user_agent(),
									'invitation_status' => '0'
								);
								$this->query_model->updateData('invitation',$data,"invitation_id='".$session_invitation->invitation_id."'");
								
								$this->session->unset_userdata('session_invitation');
								$this->session->set_flashdata('invitationComplete','Complete');
								redirect('survey/invitationComplete');
							}
							if(validation_errors() != '') {
								$template['error'] = validation_errors();
							}
						} else {
							if(count($_POST)>0) {
								foreach($question as $key => $value) {
									$data = array(
										'answer_questionid' => $value->question_id,
										'answer_invintationid' => $session_invitation->invitation_id,
										'answer_value' => $this->input->post($value->question_id)
									);
									$this->query_model->insertData('answer',$data);
								}
								$data = array(
									'invitation_ip' => $this->input->ip_address(),
									'invitation_useragent' => $this->input->user_agent(),
									'invitation_status' => '0'
								);
								$this->query_model->updateData('invitation',$data,"invitation_id='".$session_invitation->invitation_id."'");
								
								$this->session->unset_flashdata('session_invitation');
								$this->session->set_flashdata('invitationComplete','Complete');
								redirect('survey/invitationComplete');
							}
						}
					}
				} else {
					redirect('survey/invitation/'.$survey_code);
				}
			}
		}
		$template['title'] = 'Survey - PT. Merah Cipta Media';
		$this->load->view('survey/invitationPage_view', $template);
	}
	public function invitationError()
	{
		$template['title'] = 'Survey - PT. Merah Cipta Media';
		$this->load->view('survey/invitationError_view', $template);
	}
	public function invitationComplete()
	{
		if($this->session->flashdata('invitationComplete')) {
			$template['title'] = 'Survey - PT. Merah Cipta Media';
			$this->load->view('survey/invitationComplete_view', $template);
		} else {
			redirect('survey/invitationError');
		}
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