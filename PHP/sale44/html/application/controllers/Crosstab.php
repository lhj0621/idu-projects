
<?
    class crosstab extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("crosstab_m");
			$this->load->helper(array("url","date"));   
			$this->load->library('pagination');

			date_default_timezone_set("Asia/Seoul");
        }
        public function index()
        {
            $this->lists();
        }
        public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y");
		

		$base_url= "/crosstab/lists/text1/$text1/page";
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~sale44" . $base_url;

		$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->crosstab_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
		$data["list_product"]=$this->crosstab_m->getlist_product();
        $data["list"] = $this->crosstab_m->getlist($text1,$start,$limit); // 해당페이지 자료읽기1

		$this->load->view("main_header");
        $this->load->view("crosstab_list",$data); 
        $this->load->view("main_footer");
        }
    }
?>
