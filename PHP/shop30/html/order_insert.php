<?	
include "common.php";
$cookie_no=$_COOKIE[cookie_no];
$cart = $_COOKIE[cart];
$n_cart = $_COOKIE[n_cart];
$o_name=$_REQUEST[o_name];
$o_tel=$_REQUEST[o_tel];
$o_phone=$_REQUEST[o_phone];
$o_email=$_REQUEST[o_email];
$o_zip=$_REQUEST[o_zip];
$o_juso=$_REQUEST[o_juso];
$r_name=$_REQUEST[r_name];
$r_tel=$_REQUEST[r_tel];
$r_phone=$_REQUEST[r_phone];
$r_email=$_REQUEST[r_email];
$r_zip=$_REQUEST[r_zip];
$r_juso=$_REQUEST[r_juso];
$memo=$_REQUEST[memo];
$pay_method=$_REQUEST[pay_method];
$card_halbu=$_REQUEST[card_halbu];
$card_kind=$_REQUEST[card_kind];
$bank_kind=$_REQUEST[bank_kind];
$bank_sender=$_REQUEST[bank_sender];
$total_cash=$_REQUEST[total_cash];
$state=$_REQUEST[state];


$query="select no30 from jumun where jumunday30=curdate() order by no30 desc";
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);

if ($count>0){
	$jumun_no = date("ymd").sprintf("%04d",substr("$row[no30]",-4)+1);
}
else{
	$jumun_no = date("ymd")."0001";
}

$total=0;
$product_nums= 0;
$product_names= "";
$jumunday=date("Y-m-d");
for ($i=1;  $i<=$n_cart;  $i++)
{	
   if ($cart[$i]) // 제품정보가 있는 경우만
  {echo("dddd");
	  list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
	 $query="select * from product where no30=$no";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query");
	 $count=mysqli_num_rows($result);
	 $row1=mysqli_fetch_array($result);
	 if(!$row1[icon_sale30]){
		$price=$row1[price30];
		$cash=$num*$price;
		$discount=$row1[discount30];
	 }
	 else{
		$price=round($row1[price30]*(100-$row1[discount30])/100, -3);
		$cash=$num*$price;
		$discount=$row1[discount30];
	 }

	 $query="insert into jumuns(jumun_no30,product_no30,num30,price30,cash30,discount30,opts_no1,opts_no2) values('$jumun_no','$no','$num','$price','$cash','$discount','$opts1','$opts2')";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query");
	setcookie("cart[$i]","");
	setcookie("n_cart","");
	 $total=$total+$cash;
	 $product_nums = $product_nums + 1;
	 if ($product_nums==1) $product_names = $row1[name30];
  }
}
if ($product_nums>1)      // 제품수가 2개 이상인 경우만, "외 ?" 추가
{
    $tmp = $product_nums;
    $product_names = $product_names . " 외 " . $tmp;
}
if ($cookie_no)
   $member_no=$cookie_no;
else
	$member_no=0;
 if($total < $max_baesongbi){ 	 
	$query="insert into jumuns(jumun_no30,product_no30,num30,price30,cash30,discount30,opts_no1,opts_no2) values('$jumun_no','0','1','$baesongbi','$baesongbi','0','0','0')";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$total=$total+$baesongbi;
	}
		echo("$jumun_no");
	$card_okno=date("Ymd");
	$state=1;
$query="insert into jumun (no30, member_no30, jumunday30, product_names30, product_nums30,o_name30, o_tel30, o_phone30,o_email30, o_zip30, o_juso30,r_name30, r_tel30, r_phone30, r_email30, r_zip30, r_juso30, memo30,pay_method30, card_okno30, card_halbu30, card_kind30,bank_kind30, bank_sender30,total_cash30,state30) values('$jumun_no','$member_no','$jumunday','$product_names','$product_nums','$o_name','$o_tel','$o_phone','$o_email','$o_zip','$o_juso','$r_name','$r_tel','$r_phone','$r_email','$r_zip','$r_juso','$memo','$pay_method','$card_okno','$card_halbu','$card_kind','$bank_kind','$bank_sender','$total','$state')";
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");

?>
<script>location.href='order_ok.php'</script>