<?php 

class Province extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	
		
		$this->load->helper('url');

		$this->load->model("Province_model");
	}

	public function index()
	{	

		// Original PHP
		// $keyword = $_GET['keyword'];
		// CI
		$keyword = $this->input->get('keyword');
		$data['keyword'] = $keyword;
		// $data['provinces'] = $this->Province_model->getAll($keyword);

		// Pagination library
		$config['base_url'] = base_url('Province/index/');	
		$config['total_rows'] = $this->Province_model->count($keyword);
		$config['per_page'] = 10;
		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$start = $this->uri->segment(3)>0?$this->uri->segment(3):0;
		$provinces  = $this->Province_model->getAll($start, $config['per_page'] ,$keyword);

		$data['total_rows'] = $config['total_rows'];
		$data['provinces'] = $provinces;
		// echo $this->db->last_query();
		// exit();
		$data['content'] = 'province/show';

		$this->load->view('layout/main',$data);		 
	}

	public function addForm()
	{
		$data['method'] = '';
		$data['province'] = '';
		
		$data['content'] = 'province/form';
		
		$this->load->view('layout/main',$data);		
		
	}

	public function addSave()
	{
		// $xxx = $_POST['xxx'];
		$province_code = $this->input->post('province_code');	
		$province_name = $this->input->post('province_name');	
		
		$arr = array();
		$arr['province_code'] = $province_code;
		$arr['province_name'] = $province_name;

		// insert (tablename , array field and data)
		$this->db->insert('province',$arr);

		redirect("Province/index");
	}

	public function editForm($province_id)
	{
		$data['method'] = 'edit';
		$data['province'] = $this->Province_model->getOne($province_id);
		$data['province_id'] = $province_id;
		// echo $this->db->last_query();
		// exit();
		// print_r($data['province']);
		$data['content'] = 'province/form';
		$this->load->view('layout/main',$data);	
		
	}

	public function editSave($province_id)
	{
		// $xxx = $_POST['xxx'];
		$province_code = $this->input->post('province_code');	
		$province_name = $this->input->post('province_name');	
		
		$arr = array();
		$arr['province_code'] = $province_code;
		$arr['province_name'] = $province_name;

		// insert (tablename , array field and data)
		$this->db->where('province_id',$province_id);
		$this->db->update('province',$arr);

		redirect("Province/index");
	}

	public function delete($province_id)
	{
		$this->db->where('province_id',$province_id);
		$this->db->delete('province');

		redirect("Province/index");
	}


}

 ?>
