<?php 

class Book extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		{
			$this->load->model('Book_model');
		}

	}

	public function index()
	{
		$data['starttime']=$this->input->post('starttime');
		$data['length']=$this->input->post('length');
		$data['date']=$this->input->post('date');
		$data['roomid']=$this->input->post('roomid');
		$this->load->view('rooming/book.php',$data);
	}

	public function add()
	{
		$data['subject'] = $this->input->post('subject');
		$data['reserver'] = $this->session->userdata('ss_user_fullname');
		$data['start'] = $this->input->post('starttime');
		$data['length'] = $this->input->post('length');
		$data['date'] = $this->input->post('date');
		$data['room_id'] = $this->input->post('roomid');
		$this->Book_model->reserveRoom($data);
		redirect("Schedule?date=".$data['date']."&roomid=".$data['room_id']);
	}

}
 ?>