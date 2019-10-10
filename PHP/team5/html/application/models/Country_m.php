<?
    class Country_m extends CI_Model
    {
		public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no where country.name like '%$text1%' order by name limit $start,$limit"; 
		 return $this->db->query($sql)->result();
        }

		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no order by name";
		else
			$sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no where country.name like '%$text1%' order by name";

		return $this->db->query($sql)->num_rows();
		}

		public function getrow($no){


		$sql="select countryDetail.*, country.name as country_name, country.english_name as country_english_name, countryReply.country_no as reply_coutry_no, countryReply.username as user_name, countryReply.country_id as country_reply_id, member.profile as member_profile, member.id as member_id from countryDetail left join country on country.no=countryDetail.country_no left join countryReply on countryDetail.country_no=countryReply.country_no left join member on member.id=countryReply.country_id where countryDetail.no=$no order by countryReply.no";
		return  $this->db->query($sql)->row();
		}

		public function getrow2($no){
		$sql="select countryDetail.*, country.name as country_name, country.english_name as country_english_name, countryReply.country_no as reply_coutry_no, countryReply.username as user_name, countryReply.no as reply_no, countryReply.country_reply as country_reply, countryReply.country_score as country_score, countryReply.country_id as country_reply_id, member.profile as member_profile, member.id as member_id from countryDetail left join country on country.no=countryDetail.country_no left join countryReply on countryDetail.country_no=countryReply.country_no left join member on member.id=countryReply.country_id where countryDetail.no=$no order by countryReply.no";
		return  $this->db->query($sql)->result();
		}

		public function getrow3() {
			$userid=$this->session->userdata('id');
			$sql="select name as user_name2 from member where id='$userid'";
			return $this->db->query($sql)->result();
		}

		/*public function getrow($no){
		$sql="select countryDetail. *, country.name as country_name, country.english_name as country_english_name from countryDetail left join country on countryDetail.country_no=country.no where countryDetail.no=$no";
		return  $this->db->query($sql)->row();
		}*/

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
		function deletereply($no) {
			$sql="delete from countryReply where no=$no";
			return $this->db->query($sql);
		}
		

    }
?>