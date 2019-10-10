<?
    class Statusl_m extends CI_Model
    {
        public function getlist($text1,$text2,$text3,$start,$limit)
        {    
			if(!$text3 || $text3 == 0){ 
		 $sql="select status.*, book.title44 as book_title, person.name44 as person_name 
            from (status left join book on status.book_no44=book.no44)
			left join person on person.no44=status.person_no44
			where status.writeday44 between '$text1' and '$text2'
            order by status.no44 limit $start,$limit";
			} else if ($text3 == 1){
			 $sql="select status.*, book.title44 as book_title, person.name44 as person_name 
            from (status left join book on status.book_no44=book.no44)
			left join person on person.no44=status.person_no44
			where status.writeday44 between '$text1' and '$text2' and lr44=0 
            order by status.no44 limit $start,$limit";
			}else if ($text3 == 2){
			 $sql="select status.*, book.title44 as book_title, person.name44 as person_name 
            from (status left join book on status.book_no44=book.no44)
			left join person on person.no44=status.person_no44
			where status.writeday44 between '$text1' and '$text2' and lr44=1 
            order by status.no44 limit $start,$limit";
			}
		 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1,$text2,$text3 ) {
		if(!$text3 || $text3 == 0){ 
		$sql="select * from status where status.writeday44 between '$text1' and '$text2'";
		}else if ($text3 == 1){
		$sql="select * from status where status.writeday44 between '$text1' and '$text2' and lr44=0";
		}else if ($text3 == 2){
		$sql="select * from status where status.writeday44 between '$text1' and '$text2' and lr44=1";
		}

		return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
		$sql="select status.*, book.title44 as book_title, person.name44 as person_name 
            from (status left join book on status.book_no44=book.no44)
			left join person on person.no44=status.person_no44
              where status.no44=$no";
		return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
		$sql="delete from status where no44=$no";
		return  $this->db->query($sql);
		}
		function insertrow($row)
		{
		return $this->db->insert("status",$row);
		}
		function updaterow( $row, $no )
		{
		$where=array( "no44"=>$no );
		return $this->db->update("status", $row, $where);
		}
		function getlist_book()
		{
		$sql="select * from book order by title44";
		return $this->db->query($sql)->result();
		}
		function update_book_statusl($no){
		$sql="update book set status44=1 where no44=$no";
			return $this->db->query($sql);
		}
		function update_book_statusr($no){
			$sql="update book set status44=0 where no44=$no";
			return $this->db->query($sql);
		}
		function update_status($no){
		$sql="update status set lr44=1 where no44=$no";
			return $this->db->query($sql);
		}

    }
?>