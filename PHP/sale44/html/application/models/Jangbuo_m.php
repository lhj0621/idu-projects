<?
    class Jangbuo_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {         
       $sql="select jangbu.*, product.name44 as product_name
            from jangbu left join product on jangbu.product_no44=product.no44 
			where jangbu.io44=1 and jangbu.writeday44='$text1'
            order by jangbu.no44 limit $start,$limit";
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {

		$sql="select * from jangbu where io44=1 and jangbu.writeday44='$text1'";
		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select jangbu.*, product.name44 as product_name 
              from jangbu left join product on jangbu.product_no44=product.no44 
              where jangbu.no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from jangbu where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("jangbu",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update("jangbu", $row, $where);
		}
		function getlist_product()
		{
		$sql="select * from product order by name44";
		return $this->db->query($sql)->result();
		}


    }
?>