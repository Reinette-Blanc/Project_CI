<?php

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index(){

	}
	public function login(){

		$this->form_validation->set_rules('username',' รหัสผู้ใช้', 'required|alpha_numeric',
		array('required'=>' Please, fill in username.','alpha_numeric'=>'%s อนุญาตภาษาอังกฤษและตัวเลขเท่านั้น'));
		$this->form_validation->set_rules('pwd',' รหัสผ่าน', 'required',
		array('required'=>' Please, fill in password.'));

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('flash_error', validation_errors());
			$this->load->view("login");
		}
		else
		{
			$username = $this->input->post('username');
			$pwd = $this->input->post('pwd');
			if($user = $this->User_model->checklogin($username,$pwd)){
				$sess_data = array(
					'ss_user_id'=> $user->user_id,
					'ss_user_username'=> $user->username,
					'ss_user_fullname'=> $user->fullname
				);
				$this->session->set_userdata($sess_data);
				if(isset($_GET['date']))
				{
					redirect("Schedule?date=".$_GET['date']);
				}
				else
				{
					redirect("Home");
				}
			}
			else{
				$this->session->set_flashdata('flash_error', "Username or password is incorrect.");
				$this->load->view("login");
			}
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("Home");
	}
}
 ?>
