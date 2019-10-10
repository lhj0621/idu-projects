<?
class Blog extends CI_Controller {  
    public function index()            
    {
        $this->load->view("main_header");
		$this->load->view("blog_list");
        $this->load->view("main_footer");
    }
}
?>
