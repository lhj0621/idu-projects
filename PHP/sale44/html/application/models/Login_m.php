<?
    class Login_m extends CI_Model
    {

	function getrow($uid,$pwd) {	
	$sql="select * from member where uid44='$uid' and pwd44='$pwd'";
		return $this->db->query($sql)->row();
		}


    }
?>