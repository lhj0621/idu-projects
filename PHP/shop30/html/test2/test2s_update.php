<?
include   "common.php";

    $no1=$_REQUEST[no1];
	$no2=$_REQUEST[no2];
	$name=$_REQUEST[name];
	$birthday = sprintf("%04d-%02d-%02d", $_REQUEST[birthday1], $_REQUEST[birthday2], $_REQUEST[birthday3]);

   $query="update test2s set name30='$name',birthday30='$birthday' where no30=$no2;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");




  echo("<script>location.href='test2s.php?no1=$no1'</script>");
 
 
 ?>