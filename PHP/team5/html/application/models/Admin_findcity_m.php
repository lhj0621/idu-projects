<?
    class Admin_findcity_m extends CI_Model
    {
        public function getlist($text1,$text2,$start,$limit)
        {
			if(!$text1)
	            $sql="select city.*, country.name as country_name 
				from city left join country on city.country_no=country.no order by name limit $start,$limit";
			else{
				if($text2==2){
					$sql="select city.*, country.name as country_name from city left join country on city.country_no=country.no where city.name like '%$text1%' order by city.name limit $start,$limit";
				}else{
					$sql="select city.*, country.name as country_name from city left join country on city.country_no=country.no where country.name like '%$text1%' order by city.name limit $start,$limit";
				}
			}
            return $this->db->query($sql)->result();
        }
		public function getrow($no)
        {
            $sql="select * from city where no=$no";
            return $this->db->query($sql)->row();
        }
		
		public function rowcount($text1,$text2){
			if(!$text1)
				$sql="select * from city order by name";
			else{
				if($text2==2)
					$sql="select city.*, country.name as country_name from city left join country on city.country_no=country.no where city.name like '%$text1%' order by city.name";
				else
					$sql="select city.*, country.name as country_name from city left join country on city.country_no=country.no where country.name like '%$text1%' order by city.name";
			}
			return $this->db->query($sql)->num_rows();
		}
    }
?>
