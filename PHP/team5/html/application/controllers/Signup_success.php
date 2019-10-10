<?
class Signup_success extends CI_Controller {  
    public function index()            
    {
        $this->load->view("main_header");
		$this->load->view("signup_success");
        $this->load->view("main_footer");
    }
}
?>
