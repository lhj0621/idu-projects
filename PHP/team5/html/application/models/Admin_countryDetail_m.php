<?
    class Admin_countryDetail_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select countryDetail. *, country.name as country_name from countryDetail left join country on countryDetail.country_no=country.no order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select countryDetail. *, country.name as country_name from countryDetail left join country on countryDetail.country_no=country.no where country.name like '%$text1%' order by name limit $start,$limit"; 
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select countryDetail. *, country.name as country_name from countryDetail left join country on countryDetail.country_no=country.no order by name";
		else
			$sql="select countryDetail. *, country.name as country_name from countryDetail left join country on countryDetail.country_no=country.no where country.name like '%$text1%' order by name";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){
		$sql="select countryDetail. *, country.name as country_name from countryDetail left join country on countryDetail.country_no=country.no where countryDetail.no=$no";
		return  $this->db->query($sql)->row();
		}

		function deleterow($no)  {
		$sql="delete from countryDetail where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("countryDetail",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "countryDetail", $row, $where );
		}
    }
?>