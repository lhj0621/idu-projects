<?
    class Admin_findcity extends CI_Controller {
		
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_findcity_m");
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
			$text1=array_key_exists("text1",$uri_array)?urldecode($uri_array["text1"]):"";
			$text2=array_key_exists("text2",$uri_array)?urldecode($uri_array["text2"]):"0";
			
			if($text1=="")
				$base_url="/admin_findcity/lists/page";
			else
				$base_url="/admin_findcity/lists/text1/$text1/text2/$text2/page";
			$page_segment=substr_count(substr($base_url,0,strpos($base_url,"page")),"/")+1;
			$base_url="/~team5".$base_url;

			$config["per_page"]=5;
			$config["total_rows"]=$this->admin_findcity_m->rowcount($text1,$text2);
			$config["uri_segment"]=$page_segment;
			$config["base_url"]=$base_url;
			$this->pagination->initialize($config);

			$data["page"]=$this->uri->segment($page_segment,0);
			$data["pagination"]=$this->pagination->create_links();

			$start=$data["page"];
			$limit=$config["per_page"];

			$data["text1"]=$text1;
			$data["text2"]=$text2;
			$data["list"]=$this->admin_findcity_m->getlist($text1,$text2,$start,$limit);

            $this->load->view("admin_header_nomenu");
            $this->load->view("admin_findcity_list",$data);
            $this->load->view("admin_footer");
        }
        
    }
?>
