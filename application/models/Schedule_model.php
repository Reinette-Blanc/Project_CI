<?php
class Schedule_model extends CI_Model {

	public function getRoom(){
		$query = $this->db->get('room');
		return $query->result_array();
	}

	public function getByDate($date,$id){
		$this->db->select('subject,reserver,start,length');
		$this->db->where('date',$date);
		$this->db->where('room_id',$id);
		$this->db->order_by('start', 'ASC');
        $query = $this->db->get('reserve');
        return $query->result_array();
	}
	
}
?>