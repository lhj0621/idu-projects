<?
    class Findbook_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="select book.*, category.name44 as category_name 
            from book left join category on book.category_no44 = category.no44
			where book.status44=0 
            order by name44 limit $start,$limit";// 전체 자료
		else
       $sql="select book.*, category.name44 as gubun_name
            from book left join category on book.category_no44=category.no44 
			where book.name44 like'%$text1%' and book.status44=0 
            order by name44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from book";
		else
			$sql="select * from book where name44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select book.*, category.name44 as gubun_name 
              from book left join category on book.category_no44=category.no44 
              where book.no44=$no";
		return  $this->db->query($sql)->row();
		}
		
    }
?>