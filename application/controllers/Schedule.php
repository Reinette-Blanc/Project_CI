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
				$data['time'] = array("08:00 - 08:30","08:30 - 09:00","09:00 - 09:30","09:30 - 10:00","10:00 - 10:30","10:30 - 11:00","11:00 - 11:30","11:30 - 12:00","12:00 - 12:30","12:30 - 13:00","13:00 - 13:30","13:30 - 14:00","14:00 - 14:30","14:30 - 15:00","15:00 - 15:30","15:30 - 16:00","16:00 - 16:30","16:30 - 17:00");
				$data['starttime'] = array("800","850","900","950","1000","1050","1100","1150","1200","1250","1300","1350","1400","1450","1500","1550","1600","1650","1700");
				if(isset($_GET['roomid']))
				{
					$data['roomid'] = $_GET['roomid'];
					$reserve = $this->Schedule_model->getByDate($date,($data['roomid']));
				}
				else
				{
					$data['roomid'] = 1;
					$reserve = $this->Schedule_model->getByDate($date,($data['roomid']));
				}
				if(!empty($reserve))
				{
					$reserve_array = array();
					$index = 0;
					foreach($reserve as $reserves)
					{
						if($reserves['start']==800)
						{
							array_push($reserve_array,$reserves);
							$index++;
						}
						else if($reserves['start']==($reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length'])))
						{
							array_push($reserve_array,$reserves);
							$index++;
						}
						else if($reserves['start']!=($reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length'])))
						{
							$freetimestart = $reserve_array[$index-1]['start']+(50*$reserve_array[$index-1]['length']);
							$freetimelength = ($reserves['start'] - $freetimestart)/50;
							array_push($reserve_array,array("subject"=>"Free","reserver"=>"None","start"=>$freetimestart,"length"=>$freetimelength));
							$index++;
							array_push($reserve_array,$reserves);
							$index++;
						}
					}
					if($reserve_array[count($reserve_array)-1]['start']!=1650)
					{
						$freetimestart = $reserve_array[count($reserve_array)-1]['start']+(50*$reserve_array[count($reserve_array)-1]['length']);
						$freetimelength = (1650 - $freetimestart)/50;
						array_push($reserve_array,array("subject"=>"Free","reserver"=>"None","start"=>$freetimestart,"length"=>$freetimelength));
					}
				}
				else
				{
					$data['reserve'] = NULL;
				}
				$data['reserve']=$reserve_array;
				$this->load->view("rooming/schedule", $data);
			}
		} else {
			redirect("Home");
		}
	}
}
