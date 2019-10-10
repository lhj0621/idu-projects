<?
    class Admin_yeyag extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_yeyag_m");
			$this->load->helper(array("url","date"));   
			$this->load->library('pagination');
        }
        public function index()
        {
			//if (!$this->session->userdata("rnak")!=1) redirect("/");

            $this->lists();     
        }
        public function lists()
        {
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		if ($text1=="") 
		$base_url = "/admin_yeyag/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/admin_yeyag/lists/text1/$text1/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->admin_yeyag_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
        $data["list"] = $this->admin_yeyag_m->getlist($text1,$start,$limit); // 해당페이지 자료읽기
		$this->load->view("admin_header");
        $this->load->view("admin_yeyag_list",$data); 
        $this->load->view("admin_footer");
        }

		public function view(){
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;
			$data["page"]=$page;
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("status","상태","required");

			if ( $this->form_validation->run()==FALSE )
			{
			$data["row"] = $this->admin_yeyag_m->getrow($no);

			$this->load->view("admin_header");
			$this->load->view("admin_yeyag_view",$data); 
			$this->load->view("admin_footer");
			 }
			 else              // 입력화면의 저장버튼 클릭한 경우
			 {
			 $data=array(
				'status'=>$this->input->post("status",true),
				 );
			 $result=$this->admin_yeyag_m->updaterow($data,$no);
			redirect("/~team5/admin_yeyag/lists/".$text1 . $page);    //   목록화면으로 이동.
			}
		}

		public function del()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->admin_yeyag_m->deleterow($no);
		redirect("/~team5/admin_yeyag/lists/".$text1.$page);
		}

		/*public function add()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("product_no","상품번호","required|max_length[20]");
		if ( $this->form_validation->run()==FALSE )
		{
		 $this->load->view("admin_header");
		 $this->load->view("admin_yeyag_add");    // 입력화면 표시
         $this->load->view("admin_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $data=array(
			'product_no'=>$this->input->post("product_no",true),
			'type'=>$this->input->post("type",true),
			'member_id'=>$this->input->post("member_id",true),
			 'pay_type'=>$this->input->post("pay_type",true),
			 'card_no'=>$this->input->post("card_no",true),
			 'month'=>$this->input->post("month",true),
			 'year'=>$this->input->post("year",true),
			 'cvc'=>$this->input->post("cvc",true),
			 'bankbook'=>$this->input->post("bankbook",true),
			 'payday'=>$this->input->post("payday",true),
			'price'=>$this->input->post("price",true),
			'status'=>$this->input->post("status",true),
			 );

         $result=$this->admin_yeyag_m->insertrow($data); 

        redirect("/~team5/admin_yeyag/lists/".$text1.$page);    //   목록화면으로 이동.
			}
		}*/
		public function edit()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("product_no","상품번호","required|max_length[20]");
		if ( $this->form_validation->run()==FALSE )
		{
		 $this->load->view("admin_header");
		 $data["row"]=$this->admin_yeyag_m->getrow($no);
		 $this->load->view("admin_yeyag_view",$data);    // 입력화면 표시
         $this->load->view("admin_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $data=array(
			'status'=>$this->input->post("status",true),
			 );

         $result=$this->admin_yeyag_m->updaterow($data,$no);
        redirect("/~team5/admin_yeyag/lists/".$text1 . $page);    //   목록화면으로 이동.
		}
		}

    }
?>
