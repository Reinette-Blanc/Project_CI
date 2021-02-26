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
		$data['lang'] = $this->session->userdata('language');
		$this->load->view('rooming/index.php',$data);
	}

}
 ?>