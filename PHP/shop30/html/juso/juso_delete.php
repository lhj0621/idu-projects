<?
  include "common.php";

  $no=$_REQUEST[no];

  $query="delete from juso where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='juso_list.php'</script>");
?>