<?
    class Admin_city_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select city.*, country.name as country_name
		 from city left join country on city.country_no=country.no order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select city.*, country.name as country_name
		 from city left join country on city.country_no=country.no
		where city.name like '%$text1%' order by name limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from city";
		else
			$sql="select * from city where name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select city.*, country.name as country_name
		from city left join country on city.country_no=country.no
		where city.no=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from city where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("city",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "city", $row, $where );
		}
		

    }
?>