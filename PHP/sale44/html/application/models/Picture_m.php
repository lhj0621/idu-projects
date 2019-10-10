<?
    class Picture_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="select * from book order by title44 limit $start,$limit";
		else
			$sql="select * from book where title44 like ' order by title44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from book";
		else
			$sql="select * from book where title44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		
    }
?>