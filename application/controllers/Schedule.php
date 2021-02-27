<?php

class Schedule extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Schedule_model');
	}

	public function index()
	{
		if (isset($_GET['date'])) {
			$date = $_GET['date'];
			if ($this->session->userdata('ss_user_id') == '')
			{
				redirect("User/login?date=".$date);
			}
			else
			{
				$data['room'] = $this->Schedule_model->getRoom();
				$data['date'] = $date;
				$data['reserve'] = $this->Schedule_model->getByDate($date);
				$this->load->view("rooming/schedule", $data);
			}
		} else {
			redirect("Home");
		}
	}
}
