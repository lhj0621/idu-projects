<?
    class Main_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
        
        $sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no order by rand() limit $start,$limit";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist2($text1,$start,$limit)
        {
        
        $sql="select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel left join city on freeTravel.city_no=city.no left join country on freeTravel.country_no=country.no left join flight on flight.city_no=city.no where flight.price between '100000' and '5000000' group by freeTravel.name order by rand() limit 5";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist3($text1,$start,$limit)
        {
        
        $sql="select product. *, country.name as country_name, country.english_name as country_english_name, city.name as city_name 
		from product
		left join country on product.country_no=country.no
		left join city on product.city_no=city.no
		order by rand() limit 5";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist4($text1,$start,$limit)
        {
        
        $sql="select hotel. *, country.name as country_name, country.english_name as country_english_name, city.name as city_name 
		from hotel
		left join country on hotel.country_no=country.no
		left join city on hotel.city_no=city.no
		order by rand() limit 5";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist5($text1,$start,$limit)
        {
        
        $sql="select * from product";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist6($text1,$start,$limit)
        {
        
        $sql="select * from freeTravel";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist7($text1,$start,$limit)
        {
        
        $sql="select * from hotel";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist8($text1,$start,$limit)
        {
        
        $sql="select * from country";    // 전체 자료
		 return $this->db->query($sql)->result();
        }
		public function getlist9()
        {
        
        $sql="select * from member where no=1 or no=2 or no=3 or no=4";    // 전체 자료
		 return $this->db->query($sql)->result();
        }

		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from country";
		else
			$sql="select * from country where name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no where countryDetail.no=$no";
		return  $this->db->query($sql)->row();
		}

		function deleterow($no)  {
		$sql="delete from country where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("country",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array("no"=>$no );
		return $this->db->update( "country", $row, $where );
		}
		

    }
?>