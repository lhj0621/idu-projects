<?
    class Login extends CI_Controller { 

        function __construct()        
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('login_m');
			$this->load->helper(array("url","date"));

        }

        public function index()                            
        {
                                 
        }

       public function check()
	{
		   $prevPage = $_SERVER['HTTP_REFERER'];
		   $id=$this->input->post("id",TRUE);
		   $pw=$this->input->post("pw",TRUE);
		   $row=$this->login_m->getrow($id,$pw);

			$profile="";
		   if ($row)
		{
			   $data=array(
				   "id" =>$row->id,
				   "rank" =>$row->rank,
					"name"=>$row->name,
				   "profile"=>$profile
				   );
			   $this->session->set_userdata($data);
		header('location:'.$prevPage);   //   목록화면으로 이동.
		}
		else if(!$row)
		{
					$this->load->view("main_header");
					$this->load->view("main_fail");
					$this->load->view("main_footer");

		}
}
	public function admin_check(){
		   $id=$this->input->post("id",TRUE);
		   $pw=$this->input->post("pw",TRUE);
		   $row=$this->login_m->getrow($id,$pw);
			
		   if ($row)
		{
			   if($row->rank==1)
				$profile=$row->profile;
			else
				$profile="";
			   if($row->rank==1){
				   $data=array(
					   "id" =>$row->id,
					   "rank" =>$row->rank,
						"name"=>$row->name,
					   "profile"=>$profile
					   );
				   $this->session->set_userdata($data);
					echo("<script>document.location.href='/~team5/admin'</script>");
			   }else{
					$this->load->view("admin_login");	
				}
		}
		else if(!$row)
		{
					$this->load->view("admin_login");

		}
	}
	public function logout()
	{
		$prevPage = $_SERVER['HTTP_REFERER'];
		$data = array('id','rank','name','profile');
		$this->session->unset_userdata($data);
		$this->load->view("main_header");
		$this->load->view("main_logout");
		$this->load->view("main_footer");
	}
	public function admin_logout()
	{
		$prevPage = $_SERVER['HTTP_REFERER'];
		$data = array('id','rank','name','profile');
		$this->session->unset_userdata($data);
		echo("<script>document.location.href='/~team5/admin'</script>");
	}

}
?>
