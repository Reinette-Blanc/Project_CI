<?php 

class Checklogin 
{
	private $ci ;
    
    
    public function __construct(){

       $this->ci = & get_instance();
        
    }

	public function check()
	{
		
		$classname = $this->ci->router->class;
		$methodname = $this->ci->router->method;
		// echo "$classname $methodname";
		// print_r($this->ci);
		// echo $this->ci->session->userdata("ss_admin_id");
		// exit();
		// echo "$classname ";
		if($this->ci->session->userdata("ss_admin_id")=='' && $methodname!="login" ){
			
			redirect("User/login");
			
		}

	}

	

}

 ?>