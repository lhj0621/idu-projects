<?
 include   "../common.php";

  $no1=$_REQUEST[no1];

  $name=$_REQUEST[name];

  $query="INSERT INTO opts (opt_no30,name30) VALUES ('$no1','$name');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='opts.php?no1=$no1'</script>");
?>