<?php 

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('language')==''){
			$this->session->set_userdata('language','TH');
		}

	}

	public function index()
	{
		$this->session->set_userdata('language','GB');	

		$data['lang'] = $this->session->userdata('language');

		$this->load->view('conference/index.php',$data);
	}

	public function test()
	{
	
	}
}
 ?>