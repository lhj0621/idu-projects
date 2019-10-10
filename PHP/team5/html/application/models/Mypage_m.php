<?
    class Mypage_m extends CI_Model
    {
		public function getrow(){
		$userid=$this->session->userdata('id');
		$sql="select * from member where id='$userid'";
		return  $this->db->query($sql)->row();
		}

		public function getrow2(){
		$userid=$this->session->userdata('id');
		$sql="select yeyag.*, freeTravel.name as product_name, product.name as product_name2, hotel.name as product_name3
		from yeyag 
		left join freeTravel on yeyag.product_no=freeTravel.product_no
		left join product on yeyag.product_no=product.no
		left join hotel on yeyag.product_no=hotel.no
		where yeyag.member_id='$userid'";
		return  $this->db->query($sql)->result();
		}

		public function getrow3($no){
		$userid=$this->session->userdata('id');
		$sql="select yeyag.*, freeTravel.name as product_name, product.name as product_name2, hotel.name as product_name3, member.name as member_name
		from yeyag 
		left join freeTravel on yeyag.product_no=freeTravel.product_no
		left join product on yeyag.product_no=product.no
		left join hotel on yeyag.product_no=hotel.no
		left join member on yeyag.member_id=member.id
		where yeyag.member_id='$userid' and yeyag.no=$no";
		return  $this->db->query($sql)->row();
		}

		function updaterow( $row, $no )
		{
			$userid=$this->session->userdata('id');
			$where=array("id"=>$userid );
			return $this->db->update( "member", $row, $where );
		}
		function deleterow($no)  {
		$sql="delete from yeyag where no=$no";
		return  $this->db->query($sql);
		}
	}

?>
