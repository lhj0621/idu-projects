<?
  include "common.php";

  $coname=$_REQUEST[coname];
  $phone= sprintf("%-3s%-4s%-4s",$_REQUEST[phone1],$_REQUEST[phone2],$_REQUEST[phone3]);
  $startday = sprintf("%04d-%02d-%02d", $_REQUEST[startday1], $_REQUEST[startday2], $_REQUEST[startday3]);
  $gubun=$_REQUEST[gubun];
  $address=$_REQUEST[address];

  $query="insert into co(coname30,phone30,startday30,gubun30,address30)
           values('$coname','$phone','$startday',$gubun,'$address');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='co_list.php'</script>");
?>