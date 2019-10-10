<?
class Signup extends CI_Controller {  

	function __construct()
    {
            parent::__construct();
            $this->load->database();
			$this->load->helper(array("url","date"));  
            $this->load->model("Signup_m");
			$this->load->library('upload');
			$this->load->library('image_lib');

	}		
    public function index()            
    {
        $this->load->view("main_header");
		$this->load->view("signup");
        $this->load->view("main_footer");
    }

public function checkID(){
	$id=$this->input->post("id",TRUE);
	$result=$this->Signup_m->checkID($id);
	if($result) echo $result;	
}
public function add()
		{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("name","이	름","required|max_length[20]");

		if ( $this->form_validation->run()==FALSE )
		{
		 }
		 else              // 입력화면의 저장버튼 클릭한 경우
		 {
         $tel1 = $this->input->post("tel1",true);
         $tel2 = $this->input->post("tel2",true);
		 $tel3 = $this->input->post("tel3",true);
		 $tel = sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
         $data=array(
			'name'=>$this->input->post("name",true),
			'id'=>$this->input->post("id",true),
			'pw'=>$this->input->post("pw",true),
			'tel'=>$tel,
			'age'=>$this->input->post("age",true),
			'gender'=>$this->input->post("gender",true),
			'email'=>$this->input->post("email",true),
			'rank'=>0
			 );

		   $picname1=$this->call_upload(1);
			if($picname1) $data["profile"]=$picname1;


         $result=$this->Signup_m->insertrow($data); 

        redirect("/~team5/signup_success");    //   목록화면으로 이동.
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

}
?>
