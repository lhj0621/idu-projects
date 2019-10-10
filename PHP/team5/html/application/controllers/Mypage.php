<?
class Mypage extends CI_Controller {  

	function __construct()
    {
            parent::__construct();
            $this->load->database();
			$this->load->helper(array("url","date"));  
            $this->load->model("Mypage_m");
			$this->load->library('upload');
			$this->load->library('image_lib');
	}		
    public function index()            
    {
        $this->load->view("main_header");
		$this->load->view("mypage");
        $this->load->view("main_footer");
    }

	public function view(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->Mypage_m->getrow();
		$data["reservation"] = $this->Mypage_m->getrow2();

		$this->load->view("main_header");
        $this->load->view("mypage_view",$data); 
        $this->load->view("main_footer");

		}
		public function receipt(){
		$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->Mypage_m->getrow3($no);
        $this->load->view("mypage_receipt",$data); 


		}

		public function edit()
		{
	
	$uri_array=$this->uri->uri_to_assoc(3);
		$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","이	름","required|max_length[20]");
		 $this->form_validation->set_rules("id","아이디","required|max_length[20]");
		 $this->form_validation->set_rules("pw","암호","required|max_length[20]");
		if ( $this->form_validation->run()==FALSE )
		{
		 $this->load->view("main_header");
		 $data["row"]=$this->Mypage_m->getrow($no);
         $this->load->view("mypage_edit",$data);
         $this->load->view("main_footer");
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $tel1 = $this->input->post("tel1",true);
         $tel2 = $this->input->post("tel2",true);
		 $tel3 = $this->input->post("tel3",true);
		 $tel = sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
           $data=array(

			'pw'=>$this->input->post("pw",true),
			'tel'=>$tel,
			'age'=>$this->input->post("age",true),
			'gender'=>$this->input->post("gender",true),
			'email'=>$this->input->post("email",true),
			'rank'=>$this->input->post("rank",true)
			 );
		   
		    $picname1=$this->call_upload(1);
			if($picname1) $data["profile"]=$picname1;

         $result=$this->Mypage_m->updaterow($data,$no);
        redirect("/~team5/mypage/view/".$text1 . $page);    //   목록화면으로 이동.
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
				if (!$this->upload->do_upload('profile')) 
					$picname="";
				else{
					$picname=$this->upload->data("file_name");
				}
			}
			return $picname;
		}

		public function del()
		{
			$prevPage = $_SERVER['HTTP_REFERER'];
		$uri_array=$this->uri->uri_to_assoc(3);
		$no= $_POST["delnumber"];
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;
		
		$this->Mypage_m->deleterow($no);
		header('location:'.$prevPage);   //   목록화면으로 이동.
		}
}

?>