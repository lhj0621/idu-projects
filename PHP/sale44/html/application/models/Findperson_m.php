<?
    class Findperson_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="SELECT * FROM person where rank44=0 order by name44 ";// 전체 자료
		else
       $sql="SELECT * FROM person where name44 like'%$text1%' and where rank44=0 order by name44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from person";
		else
			$sql="select * from person where name44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select person.*, category.name44 as gubun_name 
              from person left join category on person.category_no44=category.no44 
              where person.no44=$no";
		return  $this->db->query($sql)->row();
		}
		
    }
?>