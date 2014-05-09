<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends CI_Controller {
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
			$table[0]->table = 'company';
			$table[1] = new stdClass();
			$table[1]->table = 'brand';
			$table[1]->joinOn = 'company_id = brand_companyid';
			$table[1]->joinType = '';
			
			$getDataTotal = $this->query_model->getDataJoin('count(*) as total',$table,"brand_status='1'");
			$config['base_url'] = site_url('brand/all');
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
			
			$getData = $this->query_model->getDataJoin('company_id,company_name,brand_id,brand_name,(SELECT COUNT(*) FROM survey WHERE survey_brandid=brand_id AND survey_status="1") as survey',$table,"brand_status='1'",$limit,$offset,'brand_name');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$template['content'] = $this->load->view('brand/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Brand';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function company($company_id='',$page=1)
	{
		if($this->session->userdata('session_admin')) {
			if($company_id=='') {
				$this->session->set_flashdata('error','Company not found.');
				redirect('company/all');
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
			$table[0]->table = 'company';
			$table[1] = new stdClass();
			$table[1]->table = 'brand';
			$table[1]->joinOn = 'company_id = brand_companyid';
			$table[1]->joinType = '';
			
			$getDataTotal = $this->query_model->getDataJoin('count(*) as total',$table,"brand_status='1' AND company_id='$company_id'");
			$config['base_url'] = site_url('brand/company/'.$company_id);
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
			
			$getData = $this->query_model->getDataJoin('company_id,company_name,brand_id,brand_name,(SELECT COUNT(*) FROM survey WHERE survey_brandid=brand_id AND survey_status="1") as survey',$table,"brand_status='1' AND company_id='$company_id'",$limit,$offset,'brand_name');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$company = $this->query_model->getData('company_id,company_name','company',"company_status='1' AND company_id='$company_id'");
			$content['company'] = $company;
			
			$template['content'] = $this->load->view('brand/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Brand';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function add($company_id='')
	{
		if($this->session->userdata('session_admin')) {
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('brand/all');
			}
			$content['error'] = '';
			
			$this->form_validation->set_rules('brand_name', 'Name', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$checkData = $this->query_model->getData('brand_status','brand',"brand_name='".$this->input->post('brand_name')."'");
				if(count($checkData)>0) {
					if($checkData[0]->brand_status=='1') {
						$content['error'] = '<li>Brand already found.</li>';	
					} else {
						$content['error'] = '<li>Brand already found but not active, please check administrator for activated.</li>';	
					}
				} else {
					$data = array(
						'brand_companyid' => $this->input->post('company_id'),
						'brand_name' => $this->input->post('brand_name'),
						'brand_status' => '1'
					);
					$brand_id = $this->query_model->insertData('brand',$data);
					$companyData = $this->query_model->getData('company_name','company',"company_id='".$this->input->post('company_id')."'");
					
					$data = array(
						'activity_adminid' => $session_admin->id,
						'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> add new brand <a href="[detailBrandURL/'.$brand_id.']">'.$this->input->post('brand_name').'</a> in company <a href="[detailCompanyURL/'.$this->input->post('company_id').']">'.$companyData[0]->company_name.'</a>',
						'activity_type' => 'brand'
					);
					$this->query_model->insertData('activity',$data);
					
					$this->session->set_flashdata('success','ADD Brand Success.');
					if($company_id=='') {
						redirect('brand/all');
					} else {
						redirect('brand/company/'.$company_id);	
					}
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$getCompany = $this->query_model->getData('company_id,company_name','company',"company_status='1'",'','','company_name');
			$content['company'] = $getCompany;
			$template['content'] = $this->load->view('brand/add_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Add Brand';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function edit($brand_id='',$company_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($brand_id=='') {
				$this->session->set_flashdata('error','Brand not found.');
				redirect('brand/all');
			}
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('brand/all');
			}
			$content['error'] = '';
			
			$getData = $this->query_model->getData('brand_companyid,brand_name','brand',"brand_id='".$brand_id."'");
			
			$this->form_validation->set_rules('brand_name', 'Name', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$checkData = $this->query_model->getData('brand_status','brand',"brand_name='".$this->input->post('brand_name')."' AND brand_id!='".$brand_id."'");
				if(count($checkData)>0) {
					if($checkData[0]->brand_status=='1') {
						$content['error'] = '<li>Brand already found.</li>';	
					} else {
						$content['error'] = '<li>Brand already found but not active, please check administrator for activated.</li>';	
					}
				} else {
					$data = array(
						'brand_companyid' => $this->input->post('company_id'),
						'brand_name' => $this->input->post('brand_name')
					);
					$this->query_model->updateData('brand',$data,"brand_id='".$brand_id."'");
					$companyData = $this->query_model->getData('company_name','company',"company_id='".$this->input->post('company_id')."'");
					
					$data = array(
						'activity_adminid' => $session_admin->id,
						'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> edit brand <a href="[detailCompanyURL]/'.$brand_id.'">'.$getData[0]->brand_name.'</a> in company <a href="[detailCompanyURL/'.$this->input->post('company_id').']">'.$companyData[0]->company_name.'</a>',
						'activity_type' => 'brand'
					);
					$this->query_model->insertData('activity',$data);
					
					$this->session->set_flashdata('success','Edit Brand Success.');
					if($company_id=='') {
						redirect('brand/all');
					} else {
						redirect('brand/company/'.$company_id);	
					}
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
				$getData[0]->brand_companyid = $this->input->post('company_id');
				$getData[0]->brand_name = $this->input->post('brand_name');
			}
			
			$getCompany = $this->query_model->getData('company_id,company_name','company',"company_status='1'",'','','company_name');
			$content['company'] = $getCompany;
			$content['data'] = $getData;
			$template['content'] = $this->load->view('brand/edit_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Edit Brand';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function delete($brand_id='',$company_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($brand_id=='') {
				$this->session->set_flashdata('error','Brand not found.');
				redirect('brand/all');
			}
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('brand/all');
			}
			
			$data = array(
				'brand_status' => '0'
			);
			$this->query_model->updateData('brand',$data,"brand_id='".$brand_id."'");
			
			$getData = $this->query_model->getData('brand_name','brand',"brand_id='".$brand_id."'");
			
			$data = array(
				'activity_adminid' => $session_admin->id,
				'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">'.$session_admin->fullname.'</a> delete brand <a href="[detailCompanyURL]/'.$brand_id.'">'.$getData[0]->brand_name.'</a> in company <a href="[detailCompanyURL]/'.$this->input->post('company_id').'">'.$companyData[0]->company_name.'</a>',
				'activity_type' => 'brand'
			);
			$this->query_model->insertData('activity',$data);
					
			$this->session->set_flashdata('success','Delete Brand Success.');
			if($company_id=='') {
				redirect('brand/all');
			} else {
				redirect('brand/company/'.$company_id);	
			}
		} else {
			redirect('home');	
		}
	}
}