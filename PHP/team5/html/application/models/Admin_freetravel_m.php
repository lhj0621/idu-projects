<?
    class Admin_freetravel_m extends CI_Model
    {
		public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select freeTravel.*, country.name as country_name, city.name as city_name from freeTravel left join country on country.no=freeTravel.country_no left join city on city.no=freeTravel.city_no order by no limit $start,$limit";    // 전체 자료


		else
        $sql="select freeTravel.*, country.name as country_name, city.name as city_name from freeTravel left join country on country.no=freeTravel.country_no left join city on city.no=freeTravel.city_no where freeTravel.name like '%$text1%' order by no limit $start,$limit"; 
		 return $this->db->query($sql)->result();
        }




		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select freeTravel.*, country.name as country_name, city.name as city_name from freeTravel left join country on country.no=freeTravel.country_no left join city on city.no=freeTravel.city_no";
		else
			$sql="select freeTravel.*, country.name as country_name, city.name as city_name from freeTravel left join country on country.no=freeTravel.country_no left join city on city.no=freeTravel.city_no where freeTravel.name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){
			$sql="select freeTravel.*, country.name as country_name, city.name as city_name from freeTravel left join country on country.no=freeTravel.country_no left join city on city.country_no=country.no where freeTravel.no=$no";
			return  $this->db->query($sql)->row();
		}

		/*public function getrow($no){
		$sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no where countryDetail.no=$no";
		return  $this->db->query($sql)->row();
		}*/

		function deleterow($no)  {
		$sql="delete from freeTravel where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("freeTravel",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array("no"=>$no );
		return $this->db->update( "freeTravel", $row, $where );
		}

		

    }
?>