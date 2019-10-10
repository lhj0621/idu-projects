<?
 include   "common.php";

  $no1=$_REQUEST[no1];
  $name=$_REQUEST[name];
  $birthday = sprintf("%04d-%02d-%02d", $_REQUEST[birthday1], $_REQUEST[birthday2], $_REQUEST[birthday3]);

  $query="INSERT INTO test2s (test2_no30,name30,birthday30) VALUES ('$no1','$name','$birthday');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='test2s.php?no1=$no1'</script>");
?>