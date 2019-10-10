<?
 include   "../common.php";
  $no=$_REQUEST[no];

  $query="delete from product where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

  echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>