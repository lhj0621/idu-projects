<?
class Admin extends CI_Controller { 
	function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_m");
			$this->load->helper(array("url","date"));   

			date_default_timezone_set("Asia/Seoul");
        }
    public function index()            
    {
		$uri_array=$this->uri->uri_to_assoc(3);
		$year=array_key_exists("year",$uri_array)?urldecode($uri_array["year"]):date("Y");

		$this->admin_m->refresh();

		$data["hotel"]=$this->admin_m->get_count("hotel");
		$data["freetrevel"]=$this->admin_m->get_count("freetrevel");
		$data["gender"]=$this->admin_m->get_count(2);
		$data["product"]=$this->admin_m->get_count("product");
		$data["yeyag"]=$this->admin_m->get_count("yeyag");
		$data["year_list"]=$this->admin_m->yeyag_year();
		$data["percent"]=$this->admin_m->percentage();
		$data["rcountlist"]=$this->admin_m->Reply();
				
		$data["sales"]=$this->admin_m->sum_sales();
		$data["year"]=$year;
		$data["s_sales"]=$this->admin_m->check_sales($year);

		$data["n_list"]=$this->admin_m->getlist_nation();
		$data["c_list"]=$this->admin_m->getlist_country();

		if($this->session->userdata("rank")==1){
			$this->load->view("admin_header");
			$this->load->view("admin",$data);
	        $this->load->view("admin_footer");
		}else{
			$this->load->view("admin_login");
		}
    }
}
?>
