<?
    class Admin_product_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name, hotel.name as hotel_name
		 from (((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no)
		 left join hotel on product.hotel_no=hotel.no
		 order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name, hotel.name as hotel_name
		from (((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no)
		 left join hotel on product.hotel_no=hotel.no
		where product.name like '%$text1%' 
		order by name limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from product";
		else
			$sql="select * from product where name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name, hotel.name as hotel_name 
		from (((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no)
		 left join hotel on product.hotel_no=hotel.no
		where product.no=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from product where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("product",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "product", $row, $where );
		}
	
    }
?>