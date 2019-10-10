<?
    class Login extends CI_Controller {
        function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("login_m");
			$this->load->helper(array("url","date"));   

        }
        public function index()
        {

        }
        public function check()
        {
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);

			$row=$this->login_m->getrow($uid,$pwd);
			if ($row)
			{
				$data=array(
					"uid" =>$row->uid44,
					"rank"=>$row->rank44
					);
				$this->session->set_userdata($data);
			}

		$this->load->view("main_header");
        $this->load->view("main_footer");
        }
		public function logout(){
		$data = array('uid','rank');
		$this->session->unset_userdata($data);

		$this->load->view("main_header");
        $this->load->view("main_footer");
		}
    }
?>
