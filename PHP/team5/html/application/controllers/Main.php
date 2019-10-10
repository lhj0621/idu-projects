<?
class Main extends CI_Controller { 
	function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model("Main_m");
			$this->load->library('pagination');
	}		
    public function index()            
    {
		 $this->lists();    
    }

	public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		if ($text1=="") 
		$base_url = "/main/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/main/lists/text1/$text1/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 10;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->Main_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
        $data["list"] = $this->Main_m->getlist($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list2"] = $this->Main_m->getlist2($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list3"] = $this->Main_m->getlist3($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list4"] = $this->Main_m->getlist4($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list5"] = $this->Main_m->getlist5($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list6"] = $this->Main_m->getlist6($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list7"] = $this->Main_m->getlist7($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list8"] = $this->Main_m->getlist8($text1,$start,$limit); // 해당페이지 자료읽기
		$data["list9"] = $this->Main_m->getlist9(); // 해당페이지 자료읽기
		$this->load->view("main_header");
        $this->load->view("main",$data); 
        $this->load->view("main_footer");
        }
}
?>
