<?
class Admin_freetravel extends CI_Controller { 
	function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model("Admin_freetravel_m");
			$this->load->library('pagination');
			$this->load->library('upload');
			$this->load->library('image_lib');
			$this->load->helper(array("url","date"));  
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
		$base_url = "/admin_freetravel/lists/page";               // $page_segment = 4;
		else 
		$base_url = "/admin_freetravel/lists/text1/$text1/page";    // $page_segment = 6;
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$base_url = "/~team5" . $base_url;

		$config["per_page"]	 = 6;                              // 페이지당 표시할 line 수
		$config["total_rows"] = $this->Admin_freetravel_m->rowcount($text1);  // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
		$config["base_url"]	 = $base_url;                // 기본 URL
		$this->pagination->initialize($config);           // pagination 설정 적용

		$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

		$start=$data["page"];                 // n페이지 : 시작위치
		$limit=$config["per_page"];        // 페이지 당 라인수

		$data["text1"]=$text1;
        $data["list"] = $this->Admin_freetravel_m->getlist($text1,$start,$limit); // 해당페이지 자료읽기
		$this->load->view("admin_header");
        $this->load->view("admin_freetravel_list",$data); 
        $this->load->view("admin_footer");
        }

		public function view(){
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

			$data["text1"]=$text1;
			$data["page"]=$page;
			$data["row"] = $this->Admin_freetravel_m->getrow($no);
			
			$this->load->view("admin_header");
			$this->load->view("admin_freetravel_view",$data); 
			$this->load->view("admin_footer");

		}

		
		public function del()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->Admin_freetravel_m->deleterow($no);
		redirect("/~team5/admin_freetravel/lists/".$text1.$page);
		}

public function add()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","상품명","required|max_length[20]");
		if ( $this->form_validation->run()==FALSE )
		{
		 $this->load->view("admin_header");
		 $this->load->view("admin_freetravel_add");    // 입력화면 표시
         $this->load->view("admin_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $data=array(
			'name'=>$this->input->post("name",true),
 			'intro'=>$this->input->post("intro",true),
			'product_no'=>$this->input->post("product_no",true),
			'term'=>$this->input->post("term",true),
			'startday'=>$this->input->post("startday",true),
			'endday'=>$this->input->post("endday",true),
			'feature'=>$this->input->post("feature",true),
			'recommend_no'=>$this->input->post("recommend_no",true),
			'country_no'=>$this->input->post("country_no",true),
			'city_no'=>$this->input->post("city_no",true)
			 );
		 $picname1=$this->call_upload(1);
		 $picname2=$this->call_upload(2);
		 $picname3=$this->call_upload(3);
		 if($picname1) $data["pic1"]=$picname1;
		 if($picname2) $data["pic2"]=$picname2;
		 if($picname3) $data["pic3"]=$picname3;
         $result=$this->Admin_freetravel_m->insertrow($data); 

        redirect("/~team5/admin_freetravel/lists/".$text1.$page);    //   목록화면으로 이동.
			}
		}
		public function edit()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("country_no","국가","required|max_length[20]");

		if ( $this->form_validation->run()==FALSE )
		{
		 $this->load->view("admin_header");
		 $data["row"] = $this->Admin_freetravel_m->getrow($no);
         $this->load->view("admin_freetravel_edit",$data);
         $this->load->view("admin_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
           $data=array(
			'name'=>$this->input->post("name",true),
 			'intro'=>$this->input->post("intro",true),
			'product_no'=>$this->input->post("product_no",true),
			'term'=>$this->input->post("term",true),
			'startday'=>$this->input->post("startday",true),
			'endday'=>$this->input->post("endday",true),
			'feature'=>$this->input->post("feature",true),
			'recommend_no'=>$this->input->post("recommend_no",true),
			'country_no'=>$this->input->post("country_no",true),
			'city_no'=>$this->input->post("city_no",true)
			 );
		 $picname1=$this->call_upload(1);
		 $picname2=$this->call_upload(2);
		 $picname3=$this->call_upload(3);
		 if($picname1) $data["pic1"]=$picname1;
		 if($picname2) $data["pic2"]=$picname2;
		 if($picname3) $data["pic3"]=$picname3;
         $result=$this->Admin_freetravel_m->updaterow($data,$no);
        redirect("/~team5/admin_freetravel/lists/".$text1 . $page);    //   목록화면으로 이동.
		}
		}

		public function call_upload($num){
			$config['upload_path']='./img/';
			$config['allowed_types']	= 'gif|jpg|png'; 
			$config['overwrite']		= TRUE; 
			$config['max_size']=10000000;
			$config['max_width']=10000;
			$config['max_height']=10000;
			$this->upload->initialize($config); 
			if($num==1){
				if (!$this->upload->do_upload('pic1')) 
					$picname="";
				else{
					$picname=$this->upload->data("file_name");
				}
			}else if($num==2){
				if (!$this->upload->do_upload('pic2')) 
					$picname="";
				else{
					$picname=$this->upload->data("file_name");
				}
			}
			else{
				if (!$this->upload->do_upload('pic3')) 
					$picname="";
				else{
					$picname=$this->upload->data("file_name");
				}
			}

			return $picname;
		}

}
?>
