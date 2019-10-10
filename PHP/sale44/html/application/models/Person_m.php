<?
    class Person_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select * from person order by name44 limit $start,$limit";    // 전체 자료
		else
        $sql="select * from person where name44 like '%$text1%' order by name44 limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from person";
		else
			$sql="select * from person where name44 like '%$text1%'";
		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select * from person where no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from person where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("person",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update( "person", $row, $where );
		}
    }
?>