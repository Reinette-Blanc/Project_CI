<?php
class Book_model extends CI_Model {

	public function insertReserve($data) {
        $this->db->insert('reserve', $data);
	}
	
}
?>