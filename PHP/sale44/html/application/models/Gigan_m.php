<?
    class Gigan_m extends CI_Model
    {
        public function getlist($text1,$text2,$text3,$start,$limit)
        {    
			if($text3=="0")
			$sql="select jangbu.*, product.name44 as product_name
            from jangbu left join product on jangbu.product_no44=product.no44 
			where jangbu.writeday44 between'$text1' and '$text2'
            order by jangbu.no44 limit $start,$limit";
			else
			$sql="select jangbu.*, product.name44 as product_name
            from jangbu left join product on jangbu.product_no44=product.no44 
			where jangbu.writeday44 between'$text1' and '$text2' and jangbu.product_no44=$text3 
            order by jangbu.no44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1,$text2,$text3 ) {
			if($text3=="0")
		$sql="select * from jangbu where writeday44 between'$text1' and '$text2'";
			else
		$sql="select * from jangbu where writeday44 between'$text1' and '$text2' and product_no44='$text3'";
		return $this->db->query($sql)->num_rows();
		}
		function getlist_product()
		{
		$sql="select * from product order by name44";
		return $this->db->query($sql)->result();
		}
		public function getlist_all( $text1,$text2,$text3 )
		{
		if ($text3=="0")    // 전체인 경우
		    $sql="select jangbu.*, product.name44 as product_name 
                     from jangbu left join product on jangbu.product_no44=product.no44 
	                 where jangbu.writeday44 between'$text1' and '$text2' 
                     order by jangbu.no44";
		  else
	      $sql="select jangbu.*, product.name44 as product_name 
                     from jangbu left join product on jangbu.product_no44=product.no44 
                     where jangbu.writeday44 between'$text1' and '$text2' and
                               jangbu.product_no44=$text3 
                     order by jangbu.no44";
		return $this->db->query($sql)->result();
}




    }
?>