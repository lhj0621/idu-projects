<?
    class About_m extends CI_Model
    {

     function member()
		{
		  $sql="select * from member where no=1 or no=2 or no=3 or no=4";    // 전체 자료
		 return $this->db->query($sql)->result();
		}


	}
?>
