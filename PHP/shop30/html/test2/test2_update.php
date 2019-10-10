<?
include   "common.php";
    $no=$_REQUEST[no1];
	$name=$_REQUEST[name];
	$tel= sprintf("%-3s%-4s%-4s",$_REQUEST[tel1],$_REQUEST[tel2],$_REQUEST[tel3]);

 $query="update test2 set name30='$name',tel30='$tel' where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='test2.php'</script>");
 
 
 ?>