<?
    class Hotel_m extends CI_Model
    {
		public function getlist($text1,$text2,$text3,$start,$limit)
        {
         if (!$text1 and !$text2)
		 $sql = "select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '100000' and '5000000' 
		 order by hotel.name limit $start,$limit";

		 else if (!$text1)
		 $sql = "select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '$text2' and '$text3'  
		 order by hotel.name limit $start,$limit";
		 else
			$sql="select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '$text2' and '$text3' and country.name like'%$text1%' 
		 order by hotel.name limit $start,$limit";
		 return $this->db->query($sql)->result();
		
        }

		public function rowcount( $text1,$text2,$text3 ) {
		if (!$text1 and !$text2)
			$sql="select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '100000' and '5000000' 
		 order by hotel.name";
		else if (!$text1)
		$sql = "select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '$text2' and '$text3'
		order by hotel.name";
		else
			$sql="select hotel.*, country.name as country_name, country.english_name as country_english_name, city.name as city_name from hotel
		 left join city on hotel.city_no=city.no 
		 left join country on hotel.country_no=country.no 
		 where hotel.price between '$text2' and '$text3' and country.name like'%$text1%' 
		order by hotel.name";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){


		$sql="select hotel. *, country.name as country_name, country.english_name as country_english_name, city.name as city_name 
		from hotel 
		left join city on hotel.city_no=city.no 
		left join country on hotel.country_no=country.no  
		where hotel.no=$no";
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

		public function sessioninfo(){
			$userid=$this->session->userdata('id');
			$sql="select * from member where id='$userid'";
		return  $this->db->query($sql)->row();
		}

		public function getrow4($no){
		$sql="select hotelReply.*, member.profile as member_profile, hotel.no as hotel_no, member.id as member_id
		from hotelReply 
		left join hotel on hotelReply.hotel_no=hotel.no 
		left join member on member.id=hotelReply.hotel_id 
		where hotel.no=$no order by hotelReply.no";
		return  $this->db->query($sql)->result();
		}

		public function getrow5($no){
		$sql="select * from hotel where no=$no";
		return  $this->db->query($sql)->result();
		}
		public function getrow6($no){
		$sql="select * from hotel where no=$no";
		return  $this->db->query($sql)->result();
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
			$sql="delete from hotelReply where no=$no";
			return $this->db->query($sql);
		}
    }
?>