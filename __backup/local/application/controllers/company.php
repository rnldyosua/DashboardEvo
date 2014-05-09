<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
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
			
			$getDataTotal = $this->query_model->getData('count(*) as total','company',"company_status='1'");
			$config['base_url'] = site_url('company/all');
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
			
			$getData = $this->query_model->getData('company_id,company_name,(SELECT COUNT(*) FROM brand WHERE brand_companyid = company_id AND brand_status = "1") as brand','company',"company_status='1'",$limit,$offset,'company_name');
			$content['offset'] = $offset;
			$content['data'] = $getData;
			
			$template['content'] = $this->load->view('company/list_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Company';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function add()
	{
		if($this->session->userdata('session_admin')) {
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('company/all');
			}
			$content['error'] = '';
			
			$this->form_validation->set_rules('company_name', 'Name', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$checkData = $this->query_model->getData('company_status','company',"company_name='".$this->input->post('company_name')."'");
				if(count($checkData)>0) {
					if($checkData[0]->company_status=='1') {
						$content['error'] = '<li>Company already found.</li>';	
					} else {
						$content['error'] = '<li>Company already found but not active, please check administrator for activated.</li>';	
					}
				} else {
					$data = array(
						'company_name' => $this->input->post('company_name'),
						'company_status' => '1'
					);
					$company_id = $this->query_model->insertData('company',$data);
					
					$data = array(
						'activity_adminid' => $session_admin->id,
						'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">"'.$session_admin->fullname.'"</a> add new company <a href="[detailCompanyURL]/'.$company_id.'">"'.$this->input->post('company_name').'"</a>',
						'activity_type' => 'company'
					);
					$this->query_model->insertData('activity',$data);
					
					$this->session->set_flashdata('success','ADD Company Success.');
					redirect('company/all');
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$template['content'] = $this->load->view('company/add_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Add Company';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function edit($company_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($company_id=='') {
				$this->session->set_flashdata('error','Company not found.');
				redirect('company/all');
			}
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('company/all');
			}
			$content['error'] = '';
			
			$getData = $this->query_model->getData('company_name','company',"company_id='".$company_id."'");
			
			$this->form_validation->set_rules('company_name', 'Name', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$checkData = $this->query_model->getData('company_status','company',"company_name='".$this->input->post('company_name')."' AND company_id!='".$company_id."'");
				if(count($checkData)>0) {
					if($checkData[0]->company_status=='1') {
						$content['error'] = '<li>Company already found.</li>';	
					} else {
						$content['error'] = '<li>Company already found but not active, please check administrator for activated.</li>';	
					}
				} else {
					$data = array(
						'company_name' => $this->input->post('company_name')
					);
					$this->query_model->updateData('company',$data,"company_id='".$company_id."'");
					
					$data = array(
						'activity_adminid' => $session_admin->id,
						'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">"'.$session_admin->fullname.'"</a> edit company <a href="[detailCompanyURL]/'.$company_id.'">"'.$getData[0]->company_name.'"</a>',
						'activity_type' => 'company'
					);
					$this->query_model->insertData('activity',$data);
					
					$this->session->set_flashdata('success','Edit Company Success.');
					redirect('company/all');
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
				$getData[0]->company_name = $this->input->post('company_name');
			}
			
			$content['data'] = $getData;
			$template['content'] = $this->load->view('company/edit_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Edit Company';
			$this->load->view('template', $template);
		} else {
			redirect('home');	
		}
	}
	public function delete($company_id='')
	{
		if($this->session->userdata('session_admin')) {
			if($company_id=='') {
				$this->session->set_flashdata('error','Company not found.');
				redirect('company/all');
			}
			$session_admin = $this->session->userdata('session_admin');
			if($session_admin->roles!='superadmin') {
				$this->session->set_flashdata('error','Access denied.');
				redirect('company/all');
			}
			
			$data = array(
				'brand_status' => '0'
			);
			$this->query_model->updateData('brand',$data,"brand_companyid='".$company_id."'");
			
			$data = array(
				'company_status' => '0'
			);
			$this->query_model->updateData('company',$data,"company_id='".$company_id."'");
			
			$getData = $this->query_model->getData('company_name','company',"company_id='".$company_id."'");
			
			$data = array(
				'activity_adminid' => $session_admin->id,
				'activity_desc' => '<a href="[detailAdminURL]/'.$session_admin->id.'">"'.$session_admin->fullname.'"</a> delete company <a href="[detailCompanyURL]/'.$company_id.'">"'.$getData[0]->company_name.'"</a>',
				'activity_type' => 'company'
			);
			$this->query_model->insertData('activity',$data);
					
			$this->session->set_flashdata('success','Delete Company Success.');
			redirect('company/all');
		} else {
			redirect('home');	
		}
	}
}