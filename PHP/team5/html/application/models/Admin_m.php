<?
    class Admin_m extends CI_Model
    {
        public function get_count($type)
        {
			if($type=="hotel")
				$sql="select * from hotel";    //남자
			else if($type=="freetravel")
				$sql="select * from freetrevel";    //여자
			else if($type=="product")
				$sql="select * from a_chart";    //product
			else if($type=="yeyag")
				$sql="select * from yeyag";
			else
				$sql="select * from member"; 
			return $this->db->query($sql)->num_rows();
        }
		public function sum_sales(){
			$sql="select sum(price) as total from yeyag";
			return $this->db->query($sql)->result();
		}
		public function refresh(){
			$sql="drop table if exists a_chart;";
			$this->db->query($sql);
			
			$sql="create table a_chart(
				no int not null auto_increment,
				product_no int,
				country_no int,
				city_no int,
				primary key(no) );";
			$this->db->query($sql);

			$sql="insert into a_chart (product_no, country_no, city_no) select no,country_no,city_no from product";
			$this->db->query($sql);
			$sql="insert into a_chart (product_no, country_no, city_no) select no,country_no,city_no from freeTravel";
			$this->db->query($sql);
		}
		public function Reply(){
			$sql="drop table if exists ReplyCount;";
			$this->db->query($sql);
			
			$sql="create table ReplyCount(
				no int not null auto_increment,
				name char(12),
				count int,
				primary key(no) );";
			$this->db->query($sql);
			
			$country=$this->countryreply();
			$hotel=$this->hotelreply();
			$product=$this->productreply();
			$free=$this->freereply();

			$sql="insert into ReplyCount (name, count) values ('country',$country)";
			$this->db->query($sql);
			$sql="insert into ReplyCount (name, count) values ('hotel',$hotel)";
			$this->db->query($sql);
			$sql="insert into ReplyCount (name, count) values ('package',$product)";
			$this->db->query($sql);
			$sql="insert into ReplyCount (name, count) values ('free',$free)";
			$this->db->query($sql);
			$sql="select * from ReplyCount";
			return $this->db->query($sql)->result();
		}

		function countryreply(){
			$sql="select * from countryReply";
			return $this->db->query($sql)->num_rows();
		}
		function hotelreply(){
			$sql="select * from hotelReply";
			return $this->db->query($sql)->num_rows();
		}
		function productreply(){
			$sql="select * from productReply";
			return $this->db->query($sql)->num_rows();
		}
		function freereply(){
			$sql="select * from freeReply";
			return $this->db->query($sql)->num_rows();
		}

		public function check_sales($year){
			//$day=$text2-$text1;
				$sql="select month(payday) as month, sum(price) as sprice
				from yeyag 
				where year(payday)=$year
				group by month(payday)";
			
			return $this->db->query($sql)->result();
		}
		public function yeyag_year(){
			$sql="select year(payday) as y from yeyag group by year(payday)";
			return $this->db->query($sql)->result();
		}
		public function getlist_nation(){//국가
			$sql="select country.name as country_name, count(a_chart.no) as p_count 
			from a_chart left join country on country_no=country.no 
			group by country.name ";
			return $this->db->query($sql)->result();
		}
		public function getlist_country(){//도시
			$sql="select city.name as city_name, count(a_chart.no) as p_count 
			from a_chart left join city on city_no=city.no 
			group by city.name 
			order by p_count desc";
			return $this->db->query($sql)->result();
		}
		public function percentage(){
			$sql="select country_no, count(*) * 100.0 /(select count(*) from a_chart) as percent, country.name as country_name
			from a_chart left join country on country_no=country.no
			group by country_no 
			order by percent desc
			limit 5";
			return $this->db->query($sql)->result();
		}
    }
?>