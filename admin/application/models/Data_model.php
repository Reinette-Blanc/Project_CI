<?php
class Data_model extends CI_Model {

	public function getRoom() {
		$query = $this->db->get('room');
		return $query->result_array();
	}

    public function getOneRoom($id) {
        $this->db->where('room_id',$id);
		$query = $this->db->get('room');
		return $query->row_array();
	}

    public function getReserve($id) {
        $this->db->select('subject,reserver,start,length');
        $this->db->where('reserve_id',$id);
        $query = $this->db->get('reserve');
        return $query->row_array();
    }

    public function getBeforeTime($date,$roomid,$start) {
        $this->db->select('start,length');
        $this->db->where('date',$date);
        $this->db->where('room_id',$roomid);
        $this->db->where('start <',$start);
        $this->db->order_by('start', 'DESC');
        $query = $this->db->get('reserve');
        return $query->row_array();
    }

    public function getAfterTime($date,$roomid,$start) {
        $this->db->select('start,length');
        $this->db->where('date',$date);
        $this->db->where('room_id',$roomid);
        $this->db->where('start >',$start);
        $this->db->order_by('start', 'ASC');
        $query = $this->db->get('reserve');
        return $query->row_array();
    }

    public function insertRoom($data) {
        $this->db->insert('room', $data);
    }

    public function updateRoom($data,$id) {
        $this->db->set('room_name', $data);
        $this->db->where('room_id', $id);
        $this->db->update('room');
    }

    public function deleteRoom($id) {
        $this->db->where('room_id', $id);
        $this->db->delete('room');
    }

    public function getByDate($date,$id) {
		$this->db->select('reserve_id,subject,reserver,start,length');
		$this->db->where('date',$date);
		$this->db->where('room_id',$id);
		$this->db->order_by('start', 'ASC');
        $query = $this->db->get('reserve');
        return $query->result_array();
	}
	
    public function deleteReserve($id) {
        $this->db->where('reserve_id', $id);
        $this->db->delete('reserve');
    }

    public function insertReserve($data) {
        $this->db->insert('reserve', $data);
	}

    public function updateReserve($data,$id) {
        $this->db->where('reserve_id', $id);
        $this->db->update('reserve',$data);
    }

}
?>