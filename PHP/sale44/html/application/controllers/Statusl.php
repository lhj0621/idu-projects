<?
    class Statusl extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("statusl_m");
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
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month"));
		$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");

		$text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "0";

		$base_url= "/best/lists/text1/$text1/text2/$text2/text3/$text3/page";
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~sale44" . $base_url;

		$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->statusl_m->rowcount($text1,$text2,$text3);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
		$data["text2"]=$text2;
		$data["text3"]=$text3;

        $data["list"] = $this->statusl_m->getlist($text1,$text2,$text3,$start,$limit); // 해당페이지 자료읽기
		$this->load->view("main_header");
        $this->load->view("statusl_list",$data); 
        $this->load->view("main_footer");
        }

		public function view(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->statusl_m->getrow($no);

		$this->load->view("main_header");
        $this->load->view("statusl_view",$data); 
        $this->load->view("main_footer");

		}

		public function del()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "" ;

		$this->statusl_m->deleterow($no);
		redirect("/~sale44/statusl/lists/".$text1.$page);
		}

		public function add()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "" ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("writeday","날짜","required");
		$this->form_validation->set_rules("book_no","제품명","required");
		
		if ( $this->form_validation->run()==FALSE )
		{
		$data["list"] = $this->statusl_m->getlist_book();

		 $this->load->view("main_header");
		 $this->load->view("statusl_add",$data);    // 입력화면 표시
         $this->load->view("main_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 { 
      $data=array(
			'lr44' => 0,
			'writeday44'=>$this->input->post("writeday",true),
			'book_no44'=>$this->input->post("book_no",true),
			'person_no44'=>$this->input->post("person_no",true),
			 );
         $result=$this->statusl_m->insertrow($data); 
		 $result1=$this->statusl_m->update_book_statusl($this->input->post("book_no",true));
        redirect("/~sale44/statusl/lists".$text1.$page);    //   목록화면으로 이동.
			}
		}
		public function edit()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "" ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("writeday","날짜","required");
		$this->form_validation->set_rules("book_no","제품명","required");

		if ( $this->form_validation->run()==FALSE )
		{
		 $data["list"] = $this->statusl_m->getlist_product();
		 $this->load->view("main_header");
		 $data["row"]=$this->statusl_m->getrow($no);
         $this->load->view("statusl_edit",$data);
         $this->load->view("main_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $data=array(
			'io44' => 0,
			'writeday44'=>$this->input->post("writeday",true),
			'product_no44'=>$this->input->post("product_no",true),
			'price44'=>$this->input->post("price",true),
			'numi44'=>$this->input->post("numi",true),
			'numo44'=>0,
			'prices44	'=>$this->input->post("prices",true),
			'bigo44'=>$this->input->post("bigo",true)
			 );

         $result=$this->statusl_m->updaterow($data,$no);
        redirect("/~sale44/statusl/lists".$text1 . $page);    //   목록화면으로 이동.
		}
		}
		public function ret()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "" ;

        $result=$this->statusl_m->update_status($no);
		$data["row"]=$this->statusl_m->getrow($no);
		$result1=$this->statusl_m->update_book_statusr($data["row"]->book_no44);
		
        redirect("/~sale44/statusl/lists".$text1 . $page);    //   목록화면으로 이동.
		}
    }
?>
