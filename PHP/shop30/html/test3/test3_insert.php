<?
 $name=$_REQUEST[name];
$num=$_REQUEST[num];

$n_data = $_COOKIE[n_data];

	$n_data++;
	$data[$n_data] = implode("^",array($n_data,$num,$name));
	setcookie("data[$n_data]",$data[$n_data]);
	setcookie("n_data",$n_data);


 echo("<script>location.href='test3.php'</script>");
?>
