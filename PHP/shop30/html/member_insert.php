<?
  include "common.php";

  $uid=$_REQUEST[uid];
  $pwd=$_REQUEST[pwd];
  $name=$_REQUEST[name];
  $birthday = sprintf("%04d-%02d-%02d", $_REQUEST[birthday1], $_REQUEST[birthday2], $_REQUEST[birthday3]);
  $sm=$_REQUEST[sm];
  $tel= sprintf("%-3s%-4s%-4s",$_REQUEST[tel1],$_REQUEST[tel2],$_REQUEST[tel3]);
  $phone= sprintf("%-3s%-4s%-4s",$_REQUEST[phone1],$_REQUEST[phone2],$_REQUEST[phone3]);
  $zip=$_REQUEST[zip];
  $juso=$_REQUEST[juso];
  $email=$_REQUEST[email];

  $query="insert into member(uid30,pwd30,name30,birthday30,sm30,tel30,phone30,zip30,juso30,email30)
           values('$uid','$pwd','$name','$birthday',$sm,'$tel','$phone','$zip','$juso','$email');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='member_joinend.php'</script>");
?>