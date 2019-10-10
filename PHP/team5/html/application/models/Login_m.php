<?
    class Login_m extends CI_Model
    {
     function getrow($id,$pw)
		{
		 $sql="select * from member where id='$id' and pw='$pw'";
		 return $this->db->query($sql)->row();

	}
	}
?>
