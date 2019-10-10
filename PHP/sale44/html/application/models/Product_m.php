<?
    class Product_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="select product.*, gubun.name44 as gubun_name 
            from product left join gubun on product.gubun_no44=gubun.no44
            order by product.name44";// 전체 자료
		else
       $sql="select product.*, gubun.name44 as gubun_name
            from product left join gubun on product.gubun_no44=gubun.no44 
			where product.name44 like'%$text1%'
            order by product.name44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from product";
		else
			$sql="select * from product where name44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select product.*, gubun.name44 as gubun_name 
              from product left join gubun on product.gubun_no44=gubun.no44 
              where product.no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from product where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("product",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update( "product", $row, $where );
		}
		function getlist_gubun()
		{
		$sql="select * from gubun order by name44";
		return $this->db->query($sql)->result();
		}
		
		function cal_jaego(){
		$sql="drop table if exists temp;";
		$this->db->query($sql);

		$sql="create table temp (
				no int not null auto_increment,
				product_no int,
				jaego int default 0,
				primary key(no));";
			$this->db->query($sql);
		
		$sql="update product set jaego44=0;";
				$this->db->query($sql);

		$sql="insert into temp (product_no, jaego)
			select product_no44, sum(numi44)-sum(numo44) from jangbu
			group by product_no44;";
		$this->db->query($sql);

		$sql="update product inner join temp on product.no44=temp.product_no 
			set product.jaego44=temp.jaego;";
			$this->db->query($sql);
		}

    }
?>