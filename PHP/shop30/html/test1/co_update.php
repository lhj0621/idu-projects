<?
  include "common.php";
  
  $no=$_REQUEST[no];
  $coname=$_REQUEST[coname];
  $phone= sprintf("%-3s%-4s%-4s",$_REQUEST[phone1],$_REQUEST[phone2],$_REQUEST[phone3]);
  $startday = sprintf("%04d-%02d-%02d", $_REQUEST[startday1], $_REQUEST[startday2], $_REQUEST[startday3]);
  $gubun=$_REQUEST[gubun];
  $address=$_REQUEST[address];
 $query="update co set coname30='$coname',phone30='$phone',startday30='$startday',gubun30=$gubun, address30='$address' where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
    echo("<script>location.href='co_list.php'</script>");
?>