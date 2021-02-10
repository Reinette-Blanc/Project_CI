<?php

class Admin_model extends CI_Model {

	public function getAll($start=0 , $perpage=0)
	{
		$this->db->limit($perpage,$start);
		$query = $this->db->get('admin');
		
		return $query->result();

	}
	public function count()
	{
		
        $this->db->from('admin');    
        
        return $this->db->count_all_results();

	}

	public function getOne($admin_id)
	{
		$this->db->where('admin_id',$admin_id);
        $query = $this->db->get('admin');
        
        return $query->row(0);
	}

	public function checklogin($username,$pwd)
	{
		$pwd = md5($pwd);
		
		$this->db->where('username',$username);
		$this->db->where('pwd',$pwd);
		$this->db->where('is_active',1);

		$query = $this->db->get('admin');

		if($query->num_rows()==0){
			return FALSE;
		}
		else{
			return $query->row(0);
		}

	}

   
}