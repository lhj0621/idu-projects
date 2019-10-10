<?
  include "common.php";
  $query="select no30, name30 from member where uid30='$uid' and pwd30='$pwd'";
 $result=mysqli_query($db,$query);
   if (!$result) exit("에러:$query");

	setcookie("cookie_no","");
	setcookie("cookie_name","");
	  echo("<script>location.href='index.html'</script>");
  
   ?>