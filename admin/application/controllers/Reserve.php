<?php 

class Reserve extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Data_model');
	}

	public function index()
	{
		if(isset($_GET['date']))
		{
			$data['date'] = $_GET['date'];
		}
		else
		{
			$data['date'] = date("Y-m-d");
		}
		if(isset($_GET['roomid']))
		{
			$data['roomid'] = $_GET['roomid'];
			$reserves = $this->Data_model->getByDate($data['date'],($data['roomid']));
		}
		else
		{
			$data['roomid'] = 1;
			$reserves = $this->Data_model->getByDate($data['date'],($data['roomid']));
		}
		$data['content'] = "reserve/show";
		$data['rooms'] = $this->Data_model->getRoom();
		$data['time'] = array("08:00 - 08:30","08:30 - 09:00","09:00 - 09:30","09:30 - 10:00","10:00 - 10:30","10:30 - 11:00","11:00 - 11:30","11:30 - 12:00","12:00 - 12:30","12:30 - 13:00","13:00 - 13:30","13:30 - 14:00","14:00 - 14:30","14:30 - 15:00","15:00 - 15:30","15:30 - 16:00","16:00 - 16:30","16:30 - 17:00");
		$data['starttime'] = array("800","850","900","950","1000","1050","1100","1150","1200","1250","1300","1350","1400","1450","1500","1550","1600","1650","1700");

		if(!empty($reserves))
		{
			$reserve_array = array();
			$index = 0;
			foreach($reserves as $reserve)
			{
				if($reserve['start']==800)
				{
					array_push($reserve_array,$reserve);
					$index++;
				}
				else if($reserve['start']!=800 && $index==0)
				{
					$freetimelength = ($reserve['start'] - 800)/50;
					array_push($reserve_array,array("subject"=>"Free","reserver"=>"None","start"=>"800","length"=>$freetimelength));
					$index++;
					array_push($reserve_array,$reserve);
					$index++;
				}
				else if($reserve['start']==($reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length'])))
				{
					array_push($reserve_array,$reserve);
					$index++;
				}
				else if($reserve['start']!=($reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length'])))
				{
					$freetimestart = $reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length']);
					$freetimelength = ($reserve['start'] - $freetimestart)/50;
					array_push($reserve_array,array("subject"=>"Free","reserver"=>"None","start"=>$freetimestart,"length"=>$freetimelength));
					$index++;
					array_push($reserve_array,$reserve);
					$index++;
				}
			}
			if($reserve_array[count($reserve_array)-1]['start']!=1650)
			{
				$freetimestart = $reserve_array[count($reserve_array)-1]['start']+(50*$reserve_array[count($reserve_array)-1]['length']);
				$freetimelength = (1700 - $freetimestart)/50;
				array_push($reserve_array,array("subject"=>"Free","reserver"=>"None","start"=>$freetimestart,"length"=>$freetimelength));
			}
			$data['reserves']=$reserve_array;
		}
		else
		{
			$data['reserves'] = array(array("subject"=>"Free","reserver"=>"None","start"=>800,"length"=>18));
		}
		$this->load->view("layout/main",$data);
	}

	public function addForm() {
		$data['starttime']=$this->input->get('starttime');
		$data['length']=$this->input->get('length');
		$data['date']=$this->input->get('date');
		$data['roomid']=$this->input->get('roomid');
		$data['content'] = "reserve/addForm";
		$this->load->view("layout/main",$data);
	}

	public function editForm() {
		$data['date']=$this->input->get('date');
		$data['roomid']=$this->input->get('roomid');
		$data['reserveid']=$this->input->get('reserveid');
		$data['content'] = "reserve/editForm";
		$data['select'] = $this->Data_model->getReserve($data['reserveid']);
		$before = $this->Data_model->getBeforeTime($data['date'],$data['roomid'],$data['select']['start']);
		if($before)
		{
			$freebefore['start'] = $data['select']['start'] - ($data['select']['start'] - ($before['start']+($before['length']*50)));
			$freebefore['length'] = ($data['select']['start'] - ($before['start']+($before['length']*50)))/50;
		}
		else
		{
			$freebefore['start'] = 800;
			$freebefore['length'] = ($data['select']['start']-800)/50;
		}
		$data['before'] = $freebefore;

		$after = $this->Data_model->getAfterTime($data['date'],$data['roomid'],$data['select']['start']);

		if($after)
		{
			$freeafter['start'] = $data['select']['start'] + ($data['select']['length']*50);
			$freeafter['length'] = ($after['start'] - $freeafter['start'])/50;
		}
		else
		{
			$freeafter['start'] = $data['select']['start'] + ($data['select']['length']*50);
			$freeafter['length'] = (1700-($data['select']['start']+($data['select']['length']*50)))/50;
		}

		$data['after'] = $freeafter;
		$this->load->view("layout/main",$data);
	}

	public function add() {
		$data['subject'] = $this->input->post('subject');
		$data['reserver'] = $this->input->post('reserver');
		$data['start'] = $this->input->post('starttime');
		$data['length'] = $this->input->post('length');
		$data['date'] = $this->input->post('date');
		$data['room_id'] = $this->input->post('roomid');
		$this->Data_model->insertReserve($data);
		redirect("Reserve?date=".$_POST['date']."&roomid=".$_POST['roomid']);
	}

	public function update() {
		$id = $this->input->post('reserveid');
		$data['subject'] = $this->input->post('subject');
		$data['reserver'] = $this->input->post('reserver');
		$data['start'] = $this->input->post('starttime');
		$data['length'] = $this->input->post('length');
		$data['date'] = $this->input->post('date');
		$data['room_id'] = $this->input->post('roomid');
		$this->Data_model->updateReserve($data,$id);
		redirect("Reserve?date=".$_POST['date']."&roomid=".$_POST['roomid']);
	}

	public function delete() {
		$this->Data_model->deleteReserve($_GET['reserveid']);
		redirect("Reserve?date=".$_GET['date']."&roomid=".$_GET['roomid']);
	}

}
 ?>