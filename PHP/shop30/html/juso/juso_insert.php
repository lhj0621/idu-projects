<?
  include "common.php";

  $name=$_REQUEST[name];
  $tel= sprintf("%-3s%-4s%-4s",$_REQUEST[tel1],$_REQUEST[tel2],$_REQUEST[tel3]);
  $birthday = sprintf("%04d-%02d-%02d", $_REQUEST[birthday1], $_REQUEST[birthday2], $_REQUEST[birthday3]);
  $sm=$_REQUEST[sm];
  $juso=$_REQUEST[juso];

  $query="insert into juso(name30,tel30,birthday30,sm30,juso30)
           values('$name','$tel','$birthday',$sm,'$juso');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='juso_list.php'</script>");
?>