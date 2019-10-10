<?
  include "common.php";
$uid =$_POST[uid];
$pwd=$_POST[pwd];

$query="select no30, name30 from member where uid30='$uid' and pwd30='$pwd'";
 $result=mysqli_query($db,$query);
   if (!$result) exit("에러:$query");
   $count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
   if ($count>0) {

	setcookie("cookie_no",$row[no30]);
	setcookie("cookie_name",$row[name30]);
	  echo("<script>location.href='index.html'</script>");
   }
   else 
     echo("<script>location.href='member_login.php '</script>");

?>
