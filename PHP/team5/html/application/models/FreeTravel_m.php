<?
    class FreeTravel_m extends CI_Model
    {
		public function getlist($text1,$text2,$text3,$start,$limit)
        {
         if (!$text1 and !$text2)
		 $sql = "select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		 left join city on freeTravel.city_no=city.no 
		 left join country on freeTravel.country_no=country.no 
		 left join flight on flight.city_no=city.no 
		 where flight.price between '100000' and '5000000' 
		 group by freeTravel.name 
		 order by freeTravel.name limit $start,$limit";

		 else if (!$text1)
		 $sql = "select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		 left join city on freeTravel.city_no=city.no 
		 left join country on freeTravel.country_no=country.no 
		 left join flight on flight.city_no=city.no 
		 where flight.price between '$text2' and '$text3'  
		 group by freeTravel.name 
		 order by freeTravel.name limit $start,$limit";
		 else
			$sql="select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		 left join city on freeTravel.city_no=city.no 
		 left join country on freeTravel.country_no=country.no 
		 left join flight on flight.city_no=city.no 
		 where flight.price between '$text2' and '$text3' and country.name like'%$text1%' 
		 group by freeTravel.name 
		 order by freeTravel.name limit $start,$limit";
		 return $this->db->query($sql)->result();
		
        }

		public function rowcount( $text1,$text2,$text3 ) {
		if (!$text1 and !$text2)
			$sql="select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		left join city on freeTravel.city_no=city.no 
		left join country on freeTravel.country_no=country.no 
		left join flight on flight.city_no=city.no 
		where flight.price between '100000' and '5000000' 
		group by freeTravel.name 
		order by freeTravel.name";
		else if (!$text1)
		$sql = "select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		left join city on freeTravel.city_no=city.no 
		left join country on freeTravel.country_no=country.no 
		left join flight on flight.city_no=city.no 
		where flight.price between '$text2' and '$text3' 
		group by freeTravel.name
		order by freeTravel.name";
		else
			$sql="select freeTravel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name, MIN(flight.price) as flight_min_price from freeTravel 
		left join city on freeTravel.city_no=city.no 
		left join country on freeTravel.country_no=country.no 
		left join flight on flight.city_no=city.no 
		where flight.price between '$text2' and '$text3' and country.name like'%$text1%' 
		group by freeTravel.name 
		order by freeTravel.name";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){


		$sql="select freeTravel. *, country.name as country_name, country.english_name as country_english_name, city.name as city_name, flight.name as flight_name, flight.price as flight_price from freeTravel left join city on freeTravel.city_no=city.no left join country on freeTravel.country_no=country.no left join flight on city.no=flight.city_no where freeTravel.no=$no";
		return  $this->db->query($sql)->row();
		}

		public function getrow2($no){
		$sql="select * from country";
		return  $this->db->query($sql)->result();
		}

		public function getrow3() {
			$userid=$this->session->userdata('id');
			$sql="select name as user_name2, id as user_id2 from member where id='$userid'";
			return $this->db->query($sql)->result();
		}
		public function getrow4($no) {
			$sql="select flight.*, city.name as flight_city_name, freeTravel.city_no as free_city_no,freeTravel.feature as free_feature from freeTravel inner join flight on freeTravel.city_no=flight.city_no inner join city on freeTravel.city_no=city.no where freeTravel.no=$no order by flight.price";
			return $this->db->query($sql)->result();
		}
		public function getrow5($no) {
			$sql="select hotel.*, city.name as flight_city_name, freeTravel.city_no as free_city_no,freeTravel.feature as free_feature from freeTravel inner join hotel on freeTravel.city_no=hotel.city_no inner join city on freeTravel.city_no=city.no where freeTravel.no=$no order by hotel.price";
			return $this->db->query($sql)->result();
		}
		function getrow6($no)  
		{

			$sql="select hotel.*, freeTravel.city_no as travel_city_no, city.no as originial_city_no, city.name as original_city_name, country.name as original_country_name from hotel left join city on hotel.city_no=city.no left join freeTravel on freeTravel.city_no=city.no left join country on country.no=city.country_no where hotel.no=$no";
			return $this->db->query($sql)->row();			
		}
		public function getrow7($no){
		$sql="select * from freeTravel where no=$no";
		return  $this->db->query($sql)->result();
		}

		public function getrow8($no){

		$sql="select freeReply.*, member.profile as member_profile, member.id as member_id, freeTravel.no as freeTravel_no from freeReply left join freeTravel on freeReply.free_no=freeTravel.no left join member on member.id=freeReply.free_id where freeTravel.no=$no order by freeReply.no";
		return  $this->db->query($sql)->result();
		}

		public function getrow9($no){
		$sql="select * from freeTravel where no=$no";
		return  $this->db->query($sql)->result();
		}

		public function sessioninfo(){
			$userid=$this->session->userdata('id');
			$sql="select * from member where id='$userid'";
		return  $this->db->query($sql)->row();
		}

			

		function deleterow($no)  {
		$sql="delete from country where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("yeyag",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array("no"=>$no );
		return $this->db->update( "country", $row, $where );
		}
		function deletereply($no) {
			$sql="delete from freeReply where no=$no";
			return $this->db->query($sql);
		}

    }
?>