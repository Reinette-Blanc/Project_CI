<?php 

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	

		// if($this->session->userdata("ss_admin_id")==''){
		// 	redirect("User/login");
		// }
		
	}

	public function index()
	{

		// print_r($this->session->userdata());
		// exit();
		// $this->session->userdata("ss_admin_id");

		$data['content'] = "home/index";
		$this->load->view('layout/main',$data);		
	}
	
}

