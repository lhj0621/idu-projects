<?
    class Admin_country_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select * from country order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select * from country where name like '%$text1%' order by name limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from country";
		else
			$sql="select * from country where name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select * from country where no=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from country where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("country",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "country", $row, $where );
		}
		

    }
?>