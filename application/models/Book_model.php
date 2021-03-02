<?php
class Book_model extends CI_Model {

	public function reserveRoom($data) {
        $this->db->insert('reserve', $data);
	}
	
}
?>