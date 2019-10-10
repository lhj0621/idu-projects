<?
    class Test_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select * from test order by coname44 limit $start,$limit";    // 전체 자료
		else
        $sql="select * from test where coname44 like '%$text1%' order by coname44 limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from test";
		else
			$sql="select * from test where coname44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select * from test where no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from test where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("test",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update( "test", $row, $where );
		}
		

    }
?>