<?
  include "common.php";

  $name=$_REQUEST[name];
  $kor=$_REQUEST[kor];
  $eng=$_REQUEST[eng];
  $mat=$_REQUEST[mat];
  $hap=$_REQUEST[hap];
  $avg=$_REQUEST[avg];

  $query="insert into sj (name30,kor30,eng30,mat30,hap30,avg30)
           values('$name',$kor,$eng,$mat,$hap,$avg);";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='sj_list.php'</script>");
?>