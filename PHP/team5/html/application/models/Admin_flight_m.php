<?
    class Admin_flight_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)

		$sql="select flight.*, country.name as country_name, city.name as city_name from flight left join country on country.no=flight.country_no left join city on city.no=flight.city_no order by no limit $start,$limit";

	
		else
        $sql="select flight.*, country.name as country_name, city.name as city_name from flight left join country on country.no=flight.country_no left join city on city.no=flight.city_no where flight.name like '%$text1%' order by no limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select flight.*, country.name as country_name, city.name as city_name from flight left join country on country.no=flight.country_no left join city on city.no=flight.city_no";
		else
			$sql="select flight.*, country.name as country_name, city.name as city_name from flight left join country on country.no=flight.country_no left join city on city.no=flight.city_no where flight.name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select flight.*, country.name as country_name, city.name as city_name from flight left join country on country.no=flight.country_no left join city on city.country_no=country.no where flight.no=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from flight where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("flight",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "flight", $row, $where );
		}
		

    }
?>