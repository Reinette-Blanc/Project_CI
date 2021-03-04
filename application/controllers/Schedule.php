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
				$data['rooms'] = $this->Schedule_model->getRoom();
				$data['date'] = $date;
				$data['day'] = explode("-",$date)[2];
				$data['month'] = explode("-",$date)[1];
				$data['year'] = explode("-",$date)[0];
				$data['time'] = array("08:00 - 08:30","08:30 - 09:00","09:00 - 09:30","09:30 - 10:00","10:00 - 10:30","10:30 - 11:00","11:00 - 11:30","11:30 - 12:00","12:00 - 12:30","12:30 - 13:00","13:00 - 13:30","13:30 - 14:00","14:00 - 14:30","14:30 - 15:00","15:00 - 15:30","15:30 - 16:00","16:00 - 16:30","16:30 - 17:00");
				$data['starttime'] = array("800","850","900","950","1000","1050","1100","1150","1200","1250","1300","1350","1400","1450","1500","1550","1600","1650","1700");
				$data['monthlist'] = array("01"=>"January","02"=>"Febuary","03"=>"March");
				if(isset($_GET['roomid']))
				{
					$data['roomid'] = $_GET['roomid'];
					$reserves = $this->Schedule_model->getByDate($date,($data['roomid']));
				}
				else
				{
					$data['roomid'] = 1;
					$reserves = $this->Schedule_model->getByDate($date,($data['roomid']));
				}
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
				$this->load->view("rooming/schedule", $data);
			}
		} else {
			redirect("Home");
		}
	}
}
