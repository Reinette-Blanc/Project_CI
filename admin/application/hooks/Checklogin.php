<?
class Checklogin {

	private $ci ;

	public function __construct(){
		$this->ci = & get_instance();
	}
	public function check()
	{
		$classname = $this->ci->router->class;
		$methodname = $this->ci->router->method;
		// echo $this->ci->session->userdata("ss_admin_id");
		// exit();
		if($this->ci->session->userdata("ss_admin_id")=='' && 
			strtolower($classname) != "user" && $methodname!="login"){
			redirect("User/login");
		}
	}
}
?>