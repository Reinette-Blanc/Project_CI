<?php

class District_model extends CI_Model {

    public function __construct()
    {
        // $this->load->database();
    }

    public function count($keyword='',$province_id=0)
    {
        if(strlen($keyword) > 0){
            $this->db->like('district_name', $keyword, 'both'); 
        }

        if($province_id > 0){
            $this->db->where('district_id',$province_id);
        }

        if($amphur_id > 0){
            $this->db->where('district_id',$amphur_id);
        }

        $this->db->from('district');       

        return $this->db->count_all_results();

    }

    public function getAll($start=0 , $perpage=0, $keyword='',$province_id=0)
    {
    	//$query = $this->db->query(" select * from amphur  order by amphur_name ");

        $this->db->select('districts.*,amphur_name,province_name');
        $this->db->from('province');
        $this->db->join('amphur','province.province_id=amphur.province_id');
        $this->db->join('districts','districts.amphur_id=amphur.amphur_id');

        if(strlen($keyword) > 0){
            $this->db->like('amphur_name', $keyword, 'both'); 
        }

        if($province_id > 0){
            $this->db->where('amphur.province_id',$province_id);
        }

        $this->db->order_by('province_name', 'ASC');
        $this->db->order_by('amphur_name', 'ASC');
		// $this->db->where('geo_id','2');		
        // limit perpage , start
        $this->db->limit($perpage,$start);

		$query = $this->db->get();

		return $query->result();
    }

    public function getOne($id)
    {
        $this->db->where('district_id',$id);
        $query = $this->db->get('districts');

        return $query->row(0);
    }

   
   

}