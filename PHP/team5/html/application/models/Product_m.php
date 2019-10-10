<?
    class Product_m extends CI_Model
    {
        public function getlist($text1,$text2,$text3,$start,$limit)
        {
         if (!$text1 and !$text2)
        $sql="select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name
		 from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.price between '100000' and '5000000' 
		 order by name limit $start,$limit";    // 전체 자료
		else if (!$text1)
        $sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name
		from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		where product.price between '$text2' and '$text3'  
		order by name limit $start,$limit";
		else
        $sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name
		from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.price between '$text2' and '$text3' and country.name like'%$text1%' 
		order by name limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1,$text2,$text3 ) {
		     if (!$text1 and !$text2)
        $sql="select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name
		 from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.price between '100000' and '5000000' 
		 order by name ";    // 전체 자료
		else if (!$text1)
        $sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name
		from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		where product.price between '$text2' and '$text3'  
		order by name ";
		else
        $sql="select product.*, country.name as country_name , city.name as city_name, flight.name as flight_name
		from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.price between '$text2' and '$text3' and country.name like'%$text1%' 
		order by name ";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name
		 from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.no=$no";
		return  $this->db->query($sql)->row();
		}
		public function getrow1($no){
		$sql="select * from country";
		return  $this->db->query($sql)->result();
		}
		public function getrow2($no){
		$sql="select product.*, flight.* ,city.name as flight_city_name
		from (product left join flight on product.flight_no = flight.no)
		left join city on product.city_no=city.no
		where product.no=$no";
		return  $this->db->query($sql)->result();
		}
		public function getrow3($no){
		$sql="select product.*, hotel.* 
		from (product left join hotel on product.hotel_no = hotel.no)
		where product.no=$no";
		return  $this->db->query($sql)->result();
		}
		public function getrow4($no){
		$sql="select * from product where no=$no";
		return  $this->db->query($sql)->result();
		}
		public function getrow5($no){

		$sql="select productReply.*, member.profile as member_profile, member.id as member_id, product.no as product_no from productReply left join product on productReply.product_no=product.no left join member on member.id=productReply.product_id where product.no=$no  order by productReply.no";
		return  $this->db->query($sql)->result();
		}
		public function getrow6($no){
		$sql="select * from product where no=$no";
		return  $this->db->query($sql)->result();
		}
		public function getrow7() {
			$userid=$this->session->userdata('id');
			$sql="select name as user_name2, id as user_id2 from member where id='$userid'";
			return $this->db->query($sql)->result();
		}
		public function getrow8($no){
		$sql="select * from product where no=$no";
		return  $this->db->query($sql)->result();
		}
		public function sessioninfo(){
			$userid=$this->session->userdata('id');
			$sql="select * from member where id='$userid'";
		return  $this->db->query($sql)->row();
		}

		function insertrow($row)
		{
		return $this->db->insert("yeyag",$row);
		}
		function deletereply($no) {
			$sql="delete from productReply where no=$no";
			return $this->db->query($sql);
		}
    }
?>