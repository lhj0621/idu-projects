<?
 include   "../common.php";

  $no=$_REQUEST[no];

  $query="delete from opt where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='opt.php'</script>");
?>