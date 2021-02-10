<?php 

class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		
	}

	public function login()
	{

		$this->form_validation->set_rules('username', ' รหัสผู้ใช้ ', 'required|alpha_numeric' , 
							array(
								'required'=> ' กรุณากรอก %s ',
								'alpha_numeric'=>'%s อนุญาติภาษาอังกฤษและตัวเลขเท่านั้น')
		);
		$this->form_validation->set_rules('pwd', ' รหัสผ่าน ', 'required' , array('required'=> ' กรุณากรอก %s '));

		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('flash_errors',validation_errors());

            $this->load->view("login");
        }
        else
        {

            // echo "Check username and password";
            $username = $this->input->post('username');
            $pwd = $this->input->post('pwd');
            // echo "$pwd <br>";
            // echo '$pwd <br>';
            // exit();
            if($user = $this->Admin_model->checklogin($username,$pwd)){
            	// echo $this->db->last_query();
            	// echo "Login OK";
            	// print_r($user);
            	// exit();
            	$sess_data = array(
            		'ss_admin_id'=> $user->admin_id,
            		'ss_admin_username'=> $user->username,
            		'ss_admin_fullname'=> $user->fullname,
            		'ss_admin_dt'=> date('d M Y H:i:s'),
            	);
            	$this->session->set_userdata($sess_data);
            	redirect("Home");
            }
            else
            {
            	$this->session->set_flashdata('flash_errors', "Username or password invalid");
            	$this->load->view("login");
            }
        }
		

	}

	public function changePassword()
	{

		$this->form_validation->set_rules('old_password', ' รหัสผ่านเดิม ', 'required' , array('required'=> ' กรุณากรอก %s '));
		$this->form_validation->set_rules('new_password', ' รหัสผ่านใหม่ ', 'required|regex_match[/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/]' , 
			array(
				'required'=> ' กรุณากรอก %s ',
				'regex_match'=>'<ol>
								<li>At least one digit [0-9]</li>
								<li>At least one lowercase character [a-z]</li>
								<li>At least one uppercase character [A-Z]</li>								
								</ol>',
			)
		);
		$this->form_validation->set_rules('confirm_password', ' ยืนยันรหัสผ่าน ', 'required|matches[new_password]' , 
							array(
								'required'=> ' กรุณากรอก %s ',
								'matches'=> ' ยืนยันรหัสไม่ตรงกับรหัสผ่านใหม่ ',
		));

		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('flash_errors',validation_errors());
            
            $data['content'] = "user/changepass";
			$this->load->view("layout/main",$data);

        }
        else
        {
        	$admin_id = $this->session->userdata('ss_admin_id');	
        	$old_password = $this->input->post('old_password');
        	$new_password = $this->input->post('new_password');

        	$params['pwd'] = md5($new_password);
        	$this->db->where('admin_id',$admin_id);
        	$this->db->update('admin', $params );        	
        	redirect('Home');

        }
	}

	public function changeProfile()
	{
			$data['content'] = "user/changeprofile";
			$this->load->view("layout/main",$data);;
	}

	public function logout()
	{
		// One by one
		// $this->session->unset_userdata('ss_admin_id');
		// $this->session->unset_userdata('ss_admin_username');
		// $this->session->unset_userdata('ss_admin_fullname');
		// $this->session->unset_userdata('ss_admin_dt');

		// All Session
		$this->session->sess_destroy();

		redirect("Home");

	}


}

 ?>