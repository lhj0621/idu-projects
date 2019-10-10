<?
    class Product extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("product_m");
			$this->load->helper(array("url","date"));
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
		$text2=array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : "";  
		$text3=array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "";
		if ($text1=="") 
		$base_url = "/product/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/product/lists/text1/$text1/text2/$text2/text3/$text3/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 4;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->product_m->rowcount($text1,$text2,$text3);  // 전체 레코드개수 구하기
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
        $data["list"] = $this->product_m->getlist($text1,$text2,$text3,$start,$limit); // 해당페이지 자료읽기
		$data["list1"] = $this->product_m->getrow1($text1,$start,$limit);//국가 자료읽기
		$this->load->view("main_header");
        $this->load->view("product_list",$data); 
        $this->load->view("main_footer");
        }

		public function view(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->product_m->getrow($no);
		$data["list1"] = $this->product_m->getrow2($no);
		$data["list2"] = $this->product_m->getrow3($no);
		$data["list3"] = $this->product_m->getrow4($no);
		$data["list4"]=$this->product_m->getrow5($no);
		$data["list5"]=$this->product_m->getrow6($no);
		$data["sessionname"] = $this->product_m->getrow7();

		$this->load->view("main_header");
        $this->load->view("product_view",$data); 
        $this->load->view("main_footer");

		}

	public function reservation()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;
			$no=$_POST["number"];
			$data["page"]=$page;
			$data["row"] = $this->product_m->getrow8($no);
			$data["Adult"] = $_POST["price1"];
			$data["Child"] = $_POST["price2"];
			$data["totalPrice"] = $_POST["totalprice"];
			$data["productno"] = $_POST["productno"];
			$data["checkin"] = $_POST["checkin"];
			$data["checkout"] = $_POST["checkout"];
			$this->load->view("main_header");
			$this->load->view("product_reservation",$data); 
			$this->load->view("main_footer");
		}

		public function pay()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;
			$data["Child"] = $_POST["child"];
			$data["Adult"] = $_POST["adult"];
			$data["totalPrice"] = $_POST["totalp"];
			$data["formtotal"] = $_POST["totalt"];
			$data["totalProduct"] = $_POST["totalproduct"];
			$data["realTotal"] = $_POST["totals"];
			$data["productno"] = $_POST["productno"];
			$data["member"] = $this->product_m->sessioninfo();
			$data["checkin"] = $_POST["checkin"];
			$data["checkout"] = $_POST["checkout"];
			$this->load->view("main_header");
			$this->load->view("product_pay",$data); 
			$this->load->view("main_footer");
		}

		public function payadd()
		{
		 $card1 = $this->input->post("card1",true);
         $card2 = $this->input->post("card2",true);
		 $card3 = $this->input->post("card3",true);
		 $card4 = $this->input->post("card4",true);
		 $card = sprintf("%-4s%-4s%-4s%-4s",$card1,$card2,$card3,$card4);
		 $month = $this->input->post("expire_month",true);
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");

			 $data=array(
				'product_no'=>$this->input->post("product_no",true),
				'type'=>1,
				'member_id'=>$this->input->post("lastname_booking",true),
				'pay_type'=>$this->input->post("pay_method",true),
				'card_no'=>$card,
				'month'=>$month,
				'year'=>$this->input->post("expire_year",true),
				'cvc'=>$this->input->post("cvc",true),
				'bankbook'=>$this->input->post("muselect",true),
				'payday'=>date("Y-m-d"),
				'price'=>$this->input->post("total_price",true),
				'status'=>0,
				 'checkin'=>$this->input->post("checkin",true),
				 'checkout'=>$this->input->post("checkout",true)
				 );

				$result=$this->product_m->insertrow($data); 
			$this->load->view("main_header");
			$this->load->view("reservation_complete"); 
			$this->load->view("main_footer");
		}

		public function delReply()
		{
				$prevPage = $_SERVER['HTTP_REFERER'];
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

			$this->product_m->deletereply($no);
			header('location:'.$prevPage);   //   목록화면으로 이동.
		}
	}
?>