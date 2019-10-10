<?
  include "common.php";
  $no=$_REQUEST[no];
  $name=$_REQUEST[name];
  $kor=$_REQUEST[kor];
  $eng=$_REQUEST[eng];
  $mat=$_REQUEST[mat];
  $hap=$_REQUEST[hap];
  $avg=$_REQUEST[avg];

  $query="update sj set name30='$name',kor30=$kor,eng30=$eng, mat30=$mat, hap30=$hap, avg30=$avg where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='sj_list.php'</script>");
?>