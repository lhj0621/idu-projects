<?
  include "common.php";
  
  $cookie_no=$_COOKIE[cookie_no];
  $no=$_REQUEST[no];
  $pwd1=$_REQUEST[pwd1];
  $name=$_REQUEST[name];
  $birthday = sprintf("%04d-%02d-%02d", $_REQUEST[birthday1], $_REQUEST[birthday2], $_REQUEST[birthday3]);
  $sm=$_REQUEST[sm];
  $tel= sprintf("%-3s%-4s%-4s",$_REQUEST[tel1],$_REQUEST[tel2],$_REQUEST[tel3]);
  $phone= sprintf("%-3s%-4s%-4s",$_REQUEST[phone1],$_REQUEST[phone2],$_REQUEST[phone3]);
  $email=$_REQUEST[email];
  $zip=$_REQUEST[zip];
  $juso=$_REQUEST[juso];
if(!$pwd1)
 $query="update member set name30='$name',birthday30='$birthday',sm30=$sm,tel30='$tel',phone30='$phone',email30='$email',zip30='$zip',juso30='$juso' where no30=$cookie_no;";
 else
 $query="update member set pwd30='$pwd1',name30='$name',birthday30='$birthday',sm30=$sm,tel30='$tel',phone30='$phone',email30='$email',zip30='$zip',juso30='$juso' where no30=$cookie_no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
    setcookie("cookie_name",$name);
  echo("<script>location.href='index.html'</script>");
?>