<?
    class Admin_findproduct_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select product.*, country.name as country_name  from product left join country on product.country_no=country.no order by name limit $start,$limit";    // 전체 자료
		else
        $sql="select product.*, country.name as country_name from product left join country on product.country_no=country.no where name like '%$text1%' order by name limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from product";
		else
			$sql="select * from product where name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select product.*, country.name as country_name from product left join country on product.country_no=country.no where product.no=$no";
		return  $this->db->query($sql)->row();
		}
    }
?>