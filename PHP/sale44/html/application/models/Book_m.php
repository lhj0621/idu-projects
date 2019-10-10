<?
    class book_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
         if (!$text1)
			$sql="select book.*, category.name44 as category_name 
            from book left join category on book.category_no44=category.no44
            order by book.title44 limit $start,$limit";// 전체 자료
		else
       $sql="select book.*, category.name44 as category_name
            from book left join category on book.category_no44=category.no44 
			where book.title44 like'%$text1%'
            order by book.title44 limit $start,$limit";

		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
		if (!$text1)
			$sql="select * from book";
		else
			$sql="select * from book where title44 like '%$text1%'";

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select book.*, category.name44 as category_name 
              from book left join category on book.category_no44=category.no44 
              where book.no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from book where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("book",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update( "book", $row, $where );
		}
		function getlist_category()
		{
		$sql="select * from category order by name44";
		return $this->db->query($sql)->result();
		}
		
		function cal_jaego(){
		$sql="drop table if exists temp;";
		$this->db->query($sql);

		$sql="create table temp (
				no int not null auto_increment,
				book_no int,
				jaego int default 0,
				primary key(no));";
			$this->db->query($sql);
		
		$sql="update book set jaego44=0;";
				$this->db->query($sql);

		$sql="insert into temp (book_no, jaego)
			select book_no44, sum(numi44)-sum(numo44) from jangbu
			group by book_no44;";
		$this->db->query($sql);

		$sql="update book inner join temp on book.no44=temp.book_no 
			set book.jaego44=temp.jaego;";
			$this->db->query($sql);
		}

    }
?>