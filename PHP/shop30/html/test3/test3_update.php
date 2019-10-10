<?
$no = $_REQUEST[no];
$name=$_REQUEST[name];
$num=$_REQUEST[num];
$data = $_COOKIE[data];

$data[$no] = implode("^",array($no,$num,$name));
setcookie("data[$no]",$data[$no]);

 echo("<script>location.href='test3.php'</script>");
	?>
