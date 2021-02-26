<?php 

class Schedule extends CI_Controller
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
		if(isset($_GET['date']))
        {
            echo $_GET['date'];
        }
        else
        {
            redirect("Home");
        }
		if($this->session->userdata('ss_user_id')=='')
		{
			redirect("User/login");
		}
		else
		{
			echo "Login laew na";
		}
        $data['date']=$_GET['date'];
        $data['lang'] = $this->session->userdata('language');
        echo $data['lang'];
	}

}
 ?>