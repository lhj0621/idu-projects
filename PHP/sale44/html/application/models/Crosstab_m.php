<?
    class Crosstab_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {    
			$sql="select product.name44 as product_name,
			sum( if(month(jangbu.writeday44)=1, jangbu.numo44,0) ) as s1,
			sum( if(month(jangbu.writeday44)=2, jangbu.numo44,0) ) as s2,
			sum( if(month(jangbu.writeday44)=3, jangbu.numo44,0) ) as s3,
			sum( if(month(jangbu.writeday44)=4, jangbu.numo44,0) ) as s4,
			sum( if(month(jangbu.writeday44)=5, jangbu.numo44,0) ) as s5,
			sum( if(month(jangbu.writeday44)=6, jangbu.numo44,0) ) as s6,
			sum( if(month(jangbu.writeday44)=7, jangbu.numo44,0) ) as s7,
			sum( if(month(jangbu.writeday44)=8, jangbu.numo44,0) ) as s8,
			sum( if(month(jangbu.writeday44)=9, jangbu.numo44,0) ) as s9,
			sum( if(month(jangbu.writeday44)=10, jangbu.numo44,0) ) as s10,
			sum( if(month(jangbu.writeday44)=11, jangbu.numo44,0) ) as s11,
			sum( if(month(jangbu.writeday44)=12, jangbu.numo44,0) ) as s12
			from jangbu left join product on jangbu.product_no44=product.no44
			where year(jangbu.writeday44)=$text1 
			group by jangbu.product_no44
			order by product.name44 limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1) {
		
		$sql="select product_no44 from jangbu where year(writeday44)=$text1 
		group by product_no44";
		return $this->db->query($sql)->num_rows();
		}
		function getlist_product()
		{
		$sql="select * from product order by name44";
		return $this->db->query($sql)->result();
		}


    }
?>