<?php 

class Room extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Data_model');
	}

	public function index()
	{
		$data['content'] = "room/show";
		$data['rooms'] = $this->Data_model->getRoom();
		$this->load->view("layout/main",$data);
	}

	public function form() 
	{
		if(isset($_GET['id']))
		{
			$data['room'] = $this->Data_model->getOneRoom($_GET['id']);
		}
		$data['content'] = "room/form";
		$this->load->view("layout/main",$data);
	}

	public function add() 
	{
		$data['room_name'] = $_GET['name'];
		$this->Data_model->insertRoom($data);
		redirect("Room");
	}

	public function update() 
	{
		$this->Data_model->updateRoom($_GET['name'],$_GET['id']);
		redirect("Room");
	} 

	public function delete() 
	{
		$this->Data_model->deleteRoom($_GET['id']);
		redirect("Room");
	} 
}
 ?>