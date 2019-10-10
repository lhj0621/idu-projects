<?
    class Findproduct_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="select product.*, gubun.name44 as gubun_name 
            from product left join gubun on product.gubun_no44=gubun.no44
            order by product.name44";// 전체 자료
		else
       $sql="select product.*, gubun.name44 as gubun_name
            from product left join gubun on product.gubun_no44=gubun.no44 
			where product.name44 like'%$text1%'
            order by product.name44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from product";
		else
			$sql="select * from product where name44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select product.*, gubun.name44 as gubun_name 
              from product left join gubun on product.gubun_no44=gubun.no44 
              where product.no44=$no";
		return  $this->db->query($sql)->row();
		}
		
    }
?>