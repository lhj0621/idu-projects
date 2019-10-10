<?
    class Best_m extends CI_Model
    {
        public function getlist($text1,$text2,$start,$limit)
        {    
			
			$sql="select product.name44 as product_name, count(jangbu.numo44) as cnumo
    from jangbu left join product on jangbu.product_no44=product.no44 
    where io44=1 and jangbu.writeday44 between '$text1' and '$text2' 
    group by product.name44
	order by cnumo desc limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1,$text2) {
		
		$sql="select product.name44 as product_name, count(jangbu.numo44) as cnumo
    from jangbu left join product on jangbu.product_no44=product.no44 
    where jangbu.writeday44 between '$text1' and '$text2' 
    group by product.name44";
		return $this->db->query($sql)->num_rows();
		}
		function getlist_product()
		{
		$sql="select * from product order by name44";
		return $this->db->query($sql)->result();
		}


    }
?>