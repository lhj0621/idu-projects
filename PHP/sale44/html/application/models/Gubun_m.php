<?
    class Gubun_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select * from gubun order by name44 limit $start,$limit";    // 전체 자료
		else
        $sql="select * from gubun where name44 like '%$text1%' order by name44 limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from gubun";
		else
			$sql="select * from gubun where name44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select * from gubun where no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from gubun where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("gubun",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update( "gubun", $row, $where );
		}
		

    }
?>