<?
 include   "common.php";

  $name=$_REQUEST[name];
  $tel= sprintf("%-3s%-4s%-4s",$_REQUEST[tel1],$_REQUEST[tel2],$_REQUEST[tel3]);

 $query="insert into test2(name30,tel30) values('$name','$tel');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  
  
  echo("<script>location.href='test2.php'</script>");
?>