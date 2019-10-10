<?
    class Graph extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("graph_m");
			$this->load->helper(array("url","date"));   
			date_default_timezone_set("Asia/Seoul");
        }
        public function index()
        {
            $this->lists();
        }
        public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month"));
		$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");
		
		$data["rowcount"] = $this->graph_m->rowcount($text1,$text2);
		$data["text1"]=$text1;
		$data["text2"]=$text2;
		$data["list_product"]=$this->graph_m->getlist_product();
        $data["list"] = $this->graph_m->getlist($text1,$text2); // 해당페이지 자료읽기

		$this->load->view("main_header");
        $this->load->view("graph_list",$data); 
        $this->load->view("main_footer");
        }
    }
?>
