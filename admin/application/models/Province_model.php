<?php

class Province_model extends CI_Model {

    public function __construct()
    {
        // $this->load->database();
    }

    public function count($keyword='')
    {
        if(strlen($keyword) > 0){
            $this->db->like('province_name', $keyword, 'both'); 
        }
        $this->db->from('province');       

        return $this->db->count_all_results();

    }

    public function getAll($start=0 , $perpage=0, $keyword='')
    {
    	//$query = $this->db->query(" select * from province  order by province_name ");
        if(strlen($keyword) > 0){
            $this->db->like('province_name', $keyword, 'both'); 
        }

        $this->db->order_by('province_name', 'ASC');
		// $this->db->where('geo_id','2');
		$this->db->select('*');
        // limit perpage , start
        $this->db->limit($perpage,$start);

		$query = $this->db->get('province');

		return $query->result();
    }

    public function getOne($id)
    {
        $this->db->where('province_id',$id);
        $query = $this->db->get('province');

        return $query->row(0);
    }


}