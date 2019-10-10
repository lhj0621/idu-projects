<?
    class Admin_yeyag_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
        $sql="select yeyag.*, 
			product.name as product_name,
			freeTravel.product_no as freeTravel_product_no,
			freeTravel.name as freeTravel_name,
			hotel.name as hotel_name
            from yeyag 
			left join product on yeyag.product_no=product.no
			left join freeTravel on yeyag.product_no=freeTravel.product_no
			left join hotel on yeyag.product_no=hotel.no
            order by yeyag.no limit $start,$limit";    // 전체 자료
		else
        $sql="select yeyag.*, 
			product.name as product_name,
			freeTravel.product_no as freeTravel_product_no,
			freeTravel.name as freeTravel_name,
			hotel.name as hotel_name
            from yeyag 
			left join product on yeyag.product_no=product.no
			left join freeTravel on yeyag.product_no=freeTravel.product_no
			left join hotel on yeyag.product_no=hotel.no
			where freeTravel.name like '%$text1%'
			and product.name like '%$text1%'
			and hotel.name like '%$text1%'
            order by yeyag.no limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select yeyag.*, 
			product.name as product_name,
			freeTravel.product_no as freeTravel_product_no,
			freeTravel.name as freeTravel_name,
			hotel.name as hotel_name
            from yeyag 
			left join product on yeyag.product_no=product.no
			left join freeTravel on yeyag.product_no=freeTravel.product_no
			left join hotel on yeyag.product_no=hotel.no";
		else
			$sql="select yeyag.*, 
			product.name as product_name,
			freeTravel.product_no as freeTravel_product_no,
			freeTravel.name as freeTravel_name,
			hotel.name as hotel_name
            from yeyag 
			left join product on yeyag.product_no=product.no
			left join freeTravel on yeyag.product_no=freeTravel.product_no
			left join hotel on yeyag.product_no=hotel.no
			where freeTravel.name like '%$text1%'
			and product.name like '%$text1%'
			and hotel.name like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select yeyag.*, 
			product.name as product_name,
			freeTravel.product_no as freeTravel_product_no,
			freeTravel.name as freeTravel_name,
			hotel.name as hotel_name
            from yeyag 
			left join product on yeyag.product_no=product.no
			left join freeTravel on yeyag.product_no=freeTravel.product_no
			left join hotel on yeyag.product_no=hotel.no
			where yeyag.no=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from yeyag where no=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("yeyag",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no"=>$no );
		return $this->db->update( "yeyag", $row, $where );
		}
    }
?>