<?
    class Admin_findmember_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
			if(!$text1)
	            $sql="select * from member order by name limit $start,$limit";
			else
				$sql="select * from member where name like '%$text1%' order by name limit $start,$limit";
            return $this->db->query($sql)->result();
        }
		public function getrow($no)
        {
            $sql="select * from member where no=$no";
            return $this->db->query($sql)->row();
        }
		
		public function rowcount($text1){
			if(!$text1)
				$sql="select * from member order by name";
			else
				$sql="select * from member where name like '%$text1%' order by name";
			return $this->db->query($sql)->num_rows();
		}
    }
?>
