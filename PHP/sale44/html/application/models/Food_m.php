<?
    class Food_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
		{
			if (!$text1)
			$sql="select * from food order by food_Name limit $start,$limit";    // 전체 자료
			else
			$sql="select * from food where food_Name like '%$text1%' order by food_Name limit $start,$limit";
			 return $this->db->query($sql)->result();
        }
		public function rowcount( $text1 ) {
			if (!$text1)
				$sql="select * from food";
			else
				$sql="select * from food where food_Name like '%$text1%'";

			return $this->db->query($sql)->num_rows();
		}
		public function getrow($no){
			$sql="select * from food where 	food_Id=$no";
			return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
			$sql="delete from food where 	food_Id=$no";
			return  $this->db->query($sql);
		}
		function insertrow($row)
		{
			return $this->db->insert("food",$row);
		}
		function updaterow( $row, $no )
		{
			$where=array( "food_Id"=>$no );
			return $this->db->update( "food", $row, $where );
		}
		

    }
?>