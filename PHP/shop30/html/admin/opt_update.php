<?
include   "../common.php";
    $no=$_REQUEST[no1];
	$name=$_REQUEST[name];

  $query="update opt set name30='$name' where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='opt.php'</script>");
 
 
 ?>