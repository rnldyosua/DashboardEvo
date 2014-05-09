<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('session_admin')) {
			$content['error'] = '';
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE) {
				$getDataAdmin = $this->query_model->getData('admin_id,admin_password,admin_fullname,admin_roles','admin',"admin_email='".$this->input->post('email')."'");
				if(count($getDataAdmin)==0) {
					$content['error'] = '<li>Email not found.</li>';
				} else {
					if($getDataAdmin[0]->admin_password!=sha1(md5($this->input->post('password')))) {
						$content['error'] = '<li>Incorrect password.</li>';
					} else {
						$session_admin = new stdClass();
						$session_admin->id = $getDataAdmin[0]->admin_id;
						$session_admin->email = $this->input->post('email');
						$session_admin->fullname = $getDataAdmin[0]->admin_fullname;
						$session_admin->roles = $getDataAdmin[0]->admin_roles;
						$this->session->set_userdata('session_admin',$session_admin);
						redirect('survey/all');  	
					}
				}
			}
			if(validation_errors() != '') {
				$content['error'] = validation_errors();
			}
			
			$template['content'] = $this->load->view('admin/login_view', $content, TRUE);
			$template['title'] = 'Survey - PT. Merah Cipta Media | Login Area';
			$this->load->view('template', $template);
		} else {
			redirect('survey/all');	
		}
	}
	public function logout()
	{
		if($this->session->userdata('session_admin')) {
			$this->session->unset_userdata('session_admin');
			redirect('home');
		} else {
			redirect('home');	
		}
	}
        
        function init(){
            
        }
}