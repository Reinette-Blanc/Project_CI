<?php
class Schedule_model extends CI_Model {

	public function getRoom(){
		$query = $this->db->get('room');
		return $query->result_array();
	}

	public function getByDate($date){
		$this->db->where('date',$date);
        $query = $this->db->get('reserve');
        return $query->result_array();
	}
	
}
?>