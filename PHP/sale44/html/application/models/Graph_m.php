<?
    class Graph_m extends CI_Model
    {
        public function getlist($text1,$text2)
        {    
			
	$sql="select gubun.name44 as gubun_name, count(jangbu.numo44) as cnumo
    from (gubun right join product on gubun.no44=product.gubun_no44) 
    right join jangbu on product.no44=jangbu.product_no44
    where io44=1 and jangbu.writeday44 between '$text1' and '$text2'
    group by gubun.name44
    order by cnumo desc limit 14";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1,$text2) {	
	$sql="select gubun.name44 as gubun_name, count(jangbu.numo44) as cnumo
    from (gubun right join product on gubun.no44=product.gubun_no44) 
    right join jangbu on product.no44=jangbu.product_no44
    where io44=1 and jangbu.writeday44 between '$text1' and '$text2' 
    group by gubun.name44 limit 14";
		return $this->db->query($sql)->num_rows();
		}

		function getlist_product()
		{
		$sql="select * from product order by name44";
		return $this->db->query($sql)->result();
		}

    }
?>