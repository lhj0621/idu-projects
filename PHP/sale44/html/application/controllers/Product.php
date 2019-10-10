<?
    class Product extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("product_m");
			$this->load->helper(array("url","date"));   
			$this->load->library('pagination');
			$this->load->library('upload');
			$this->load->library('image_lib');
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
		$base_url = "/product/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/product/lists/text1/$text1/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~sale44" . $base_url;

		$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->product_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
        $data["list"] = $this->product_m->getlist($text1,$start,$limit); // 해당페이지 자료읽기
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

		$this->load->view("main_header");
        $this->load->view("product_view",$data); 
        $this->load->view("main_footer");

		}

		public function del()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->product_m->deleterow($no);
		redirect("/~sale44/product/lists/".$text1.$page);
		}

		public function add()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("gubun_no","구분명","required");
		$this->form_validation->set_rules("name","이름","required|max_length[50]");
		$this->form_validation->set_rules("price","단가","required");		
		if ( $this->form_validation->run()==FALSE )
		{
		$data["list"] = $this->product_m->getlist_gubun();
		 $this->load->view("main_header");
		 $this->load->view("product_add",$data);    // 입력화면 표시
         $this->load->view("main_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 { 
         $data=array(
			'gubun_no44'=>$this->input->post("gubun_no",true),
			'name44'=>$this->input->post("name",true),
			'price44'=>$this->input->post("price",true),
			'jaego44'=>$this->input->post("jaego",true),
			 );
		$picname = $this->call_upload();
		if($picname)$data["pic44"]=$picname;

         $result=$this->product_m->insertrow($data); 

        redirect("/~sale44/product/lists/".$text1.$page);    //   목록화면으로 이동.
			}
		}
		public function edit()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("gubun_no","구분명","required");
		$this->form_validation->set_rules("name","이름","required|max_length[50]");
		$this->form_validation->set_rules("price","단가","required");	

		if ( $this->form_validation->run()==FALSE )
		{
		 $data["list"] = $this->product_m->getlist_gubun();
		 $this->load->view("main_header");
		 $data["row"]=$this->product_m->getrow($no);
         $this->load->view("product_edit",$data);
         $this->load->view("main_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $data=array(
			'gubun_no44'=>$this->input->post("gubun_no",true),
			'name44'=>$this->input->post("name",true),
			'price44'=>$this->input->post("price",true),
			'jaego44'=>$this->input->post("jaego",true),
			 );
		$picname = $this->call_upload();
		if($picname)$data["pic44"]=$picname;

         $result=$this->product_m->updaterow($data,$no);
        redirect("/~sale44/product/lists/".$text1 . $page);    //   목록화면으로 이동.
		}
		}
		public function call_upload()
		{
			$config['upload_path']	= './product_img';
			$config['allowed_types']	= 'gif|jpg|png'; 
			$config['overwrite']	= TRUE; 
			$config['max_size']		= 10000000; 
			$config['max_width']	= 10000; 
			$config['max_height']	= 10000; 
			$this->upload->initialize($config); 
			if (!$this->upload->do_upload('pic')) 
				$picname="";
			else{
			$picname=$this->upload->data("file_name");
			$config['image_library'] = 'gd2';
			$config['source_image'] = './product_img/' .$picname;
			$config['thumb_marker'] = '';
			$config['new_image'] = './product_img/thumb';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 200;
			$config['height']       = 150;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			}
			return $picname;
		}

		public function jaego(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "" ;

			$data["text1"]=$text1;
			$data["page"]=$page;
			$this->product_m->cal_jaego();

			redirect("/~sale44/product/lists".$text1.$page);
		}


    }
?>
