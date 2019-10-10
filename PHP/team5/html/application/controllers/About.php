<?
class About extends CI_Controller { 
		function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model("About_m");

	}		
    public function index()            
    {
		$data["member"] = $this->About_m->member(); // 해당페이지 자료읽기
        $this->load->view("main_header");
		$this->load->view("about",$data);
        $this->load->view("main_footer");
    }
}
?>