<?php
class User_model extends CI_Model {

	public function getAll($start=0 , $perpage=0){
		
		$this->db->limit($perpage,$start);

		$query = $this->db->get('user');

		return $query->result();
	}

	public function count(){

		$this->db->from('user');
		return $this->db->count_all_results();
	}

	public function getOne($user_id){
		$this->db->where('user_id',$user_id);
        $query = $this->db->get('user');

        return $query->row(0);
	}
	public function checklogin($username,$pwd){
		$pwd = md5($pwd);
		$this->db->where('username',$username);
		$this->db->where('pwd',$pwd);
		 $query = $this->db->get('user');
		 if($query->num_rows()==0){
		 	return False;
		 }
		 else{
		 	return $query->row(0);
		 }
	}
}
?>