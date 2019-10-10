<?
    class Signup_m extends CI_Model
    {

     function insertrow($row)
		{
		return $this->db->insert("member",$row);
		}
     function checkID($id)
		{
		$sql="select * from member where id = '$id'";
		return $this->db->query($sql)->num_rows();
		}

	}
?>
