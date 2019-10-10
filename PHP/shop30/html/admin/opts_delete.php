<?
 include   "../common.php";
  $no1=$_REQUEST[no1];
  $no2=$_REQUEST[no2];

  $query="delete from opts where no30=$no2;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='opts.php?no1=$no1'</script>");
?>