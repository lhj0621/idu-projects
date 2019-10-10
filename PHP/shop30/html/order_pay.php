<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include "common.php";
$no = $_REQUEST [no];
$num = $_REQUEST [num];
$opts1 = $_REQUEST [opts1];
$opts2 = $_REQUEST [opts2];
$o_name=$_REQUEST[o_name];

$o_email=$_REQUEST[o_email];
$o_zip=$_REQUEST[o_zip];
$o_juso=$_REQUEST[o_juso];
$r_name=$_REQUEST[r_name];
$r_email=$_REQUEST[r_email];
$r_zip=$_REQUEST[r_zip];
$r_juso=$_REQUEST[r_juso];
$memo=$_REQUEST[memo];
$cart = $_COOKIE[cart];
$n_cart = $_COOKIE[n_cart];
?>
<html>
<head>
<title>DARU</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>
<!--  화면 상단메뉴 시작 (main_top) ------------------------------->
<? include "main_top.php";?>
<!--  화면 상단메뉴 끝 (main_top) ------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">

		<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
<? include "main_left.php";?>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
			
		</td>
		<td width="10"></td>
		<td valign="top">
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
	<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">

			function Check_Value() 
			{
				if (form2.pay_method[0].checked)
				{
					if (!form2.card_kind.value) {
						alert("카드종류를 선택하세요.");	form2.card_kind.focus();	return;
					}
					if (!form2.card_no1.value || form2.card_no1.value.length!=4) {
						alert("카드번호를 입력하세요.");	form2.card_no1.focus();	return;
					}
					if (!form2.card_no2.value || form2.card_no2.value.length!=4) {
						alert("카드번호를 입력하세요.");	form2.card_no2.focus();	return;
					}
					if (!form2.card_no3.value || form2.card_no3.value.length!=4) {
						alert("카드번호를 입력하세요.");	form2.card_no3.focus();	return;
					}
					if (!form2.card_no4.value || form2.card_no4.value.length!=4) {
						alert("카드번호를 입력하세요.");	form2.card_no4.focus();	return;
					}
					if (!form2.card_year.value) {
						alert("카드기간 년도를 선택하세요.");	form2.card_year.focus();	return;
					}
					if (!form2.card_month.value) {
						alert("카드기간 월을 선택하세요.");	form2.card_month.focus();	return;
					}
					if (!form2.card_pw.value) {
						alert("카드 암호 뒷의 2자리를 선택하세요.");	form2.card_pw.focus();	return;
					}
				}
				else
				{
					if (!form2.bank_kind.value) {
						alert("입금할 은행을 선택하세요.");	form2.bank_kind.focus();	return;
					}
					if (!form2.bank_sender.value) {
						alert("입금자 이름을 입력하세요.");	form2.bank_sender.focus();	return;
					}
				}
				form2.card_kind.disabled = false;
				form2.card_no1.disabled = false;
				form2.card_no2.disabled = false;
				form2.card_no3.disabled = false;
				form2.card_no4.disabled = false;
				form2.card_year.disabled = false;
				form2.card_month.disabled = false;
				form2.card_pw.disabled = false;
				form2.bank_kind.disabled = false;
				form2.bank_sender.disabled = false;
				
				form2.submit();
			}

			function PaySel(n) 
			{
				if (n == 0) {
					form2.card_kind.disabled = false;
					form2.card_no1.disabled = false;
					form2.card_no2.disabled = false;
					form2.card_no3.disabled = false;
					form2.card_no4.disabled = false;
					form2.card_year.disabled = false;
					form2.card_month.disabled = false;
					form2.card_pw.disabled = false;
					form2.bank_kind.disabled = true;
					form2.bank_sender.disabled = true;
				}
				else {
					form2.card_kind.disabled = true;
					form2.card_no1.disabled = true;
					form2.card_no2.disabled = true;
					form2.card_no3.disabled = true;
					form2.card_no4.disabled = true;
					form2.card_year.disabled = true;
					form2.card_month.disabled = true;
					form2.card_pw.disabled = true;
					form2.bank_kind.disabled = false;
					form2.bank_sender.disabled = false;
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="960" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr>
					<td><img src="images/order_title1.gif" width="65" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="940" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="440" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="100" align="center">가격</td>
					<td width="100" align="center">합계</td>
				</tr>
						</tr>
				<?
$total=0;
if (!$n_cart) $n_cart=0;
for ($i=1;  $i<=$n_cart;  $i++)
{
    if ($cart[$i])
   {
       list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
echo("$pos");
 $query="select * from product where no30=$no";
 $result=mysqli_query($db,$query);
 if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
 $row=mysqli_fetch_array($result);

 $query1 = "select * from opts where no30=$opts1";
 $result1=mysqli_query($db,$query1);
 if (!$result1) exit("에러:$query");
 $count1=mysqli_num_rows($result1);
 $row1=mysqli_fetch_array($result1);

 $query2 = "select * from opts where no30=$opts2";
 $result2=mysqli_query($db,$query2);
 if (!$result2) exit("에러:$query");
 $count2=mysqli_num_rows($result2);
 $row2=mysqli_fetch_array($result2);

echo("<tr>
					<td height='60' align='center' bgcolor='#FFFFFF'>
						<table cellpadding='0' cellspacing='0' width='100%'>
							<tr>
								<td width='60'>
									<a href='product_detail.php?no=$row[no30]'><img src='product/$row[image1]' width='50' height='50' border='0'></a>
								</td>
								<td class='cmfont'>
									<a href='product_detail.php?no=$row[no30]'>$row[name30]</a><br>
									<font color='#0066CC'>[옵션사항]</font> $row1[name30] $row2[name30]
								</td>
							</tr>
						</table>
					</td>
					");
		$discontprice=round($row[price30]*(100-$row[discount30])/100, -3);
		$pricetotal=$discontprice*$num;
		$total=$total+$pricetotal;

$price1=number_format($discontprice);
$price2=number_format($pricetotal);
echo("
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$num 개</font></td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price1</font></td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price2</font></td>
					</td>
				</tr>");
		}

}

echo("<tr>
					<td colspan='5' bgcolor='#F0F0F0'>
						<table width='100%' border='0' cellpadding='0' cellspacing='0' class='cmfont'>
							<tr>
								<td bgcolor='#F0F0F0'><img src='images/cart_image1.gif' border='0'></td>
								<td align='right' bgcolor='#F0F0F0'>");
if ($total< $max_baesongbi) {
$total1=$total + $baesongbi ;
$price3=number_format($total);
$price4=number_format($total1);
echo("
									<font color='#0066CC'><b>총 합계금액</font></b> : 상품대금( $price3 원) + 배송료( $baesongbi 원) = <font color='#FF3333'><b>$price4  원</b></font>&nbsp;&nbsp");
}
else{
$baesongbi=0;
$total=$total + $baesongbi ;
$price3=number_format($total);
echo("
									<font color='#0066CC'><b>총 합계금액</font></b> : 상품대금( $price3 원) + 배송료( $baesongbi 원) = <font color='#FF3333'><b>$price3  원</b></font>&nbsp;&nbsp");
}

echo("
								</td>
							</tr>
						</table>
					</td>
				</tr>");

?>
		
			</table>
			<br><br>

			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
			</table>
			<br><br>
			<br><br>
			<?
				$o_tel=sprintf("%-3s%-4s%-4s",$_REQUEST[o_tel1],$_REQUEST[o_tel2],$_REQUEST[o_tel3]);
				$o_phone=sprintf("%-3s%-4s%-4s",$_REQUEST[o_phone1],$_REQUEST[o_phone2],$_REQUEST[o_phone3]);
				$r_tel=sprintf("%-3s%-4s%-4s",$_REQUEST[r_tel1],$_REQUEST[r_tel2],$_REQUEST[r_tel3]);
				$r_phone=sprintf("%-3s%-4s%-4s",$_REQUEST[r_phone1],$_REQUEST[r_phone2],$_REQUEST[r_phone3]);
			?>
			<!-- form2 시작  -->
			<form name="form2" method="post"action="order_insert.php">

			<input type="hidden" name="o_name"   value="<?=$o_name?>">
			<input type="hidden" name="o_tel"    value="<?=$o_tel?>">
			<input type="hidden" name="o_phone"  value="<?=$o_phone?>">
			<input type="hidden" name="o_email"  value="<?=$o_email?>">
			<input type="hidden" name="o_zip"    value="<?=$o_zip?>">
			<input type="hidden" name="o_juso"   value="<?=$o_juso?>">

			<input type="hidden" name="r_name"   value="<?=$r_name?>">
			<input type="hidden" name="r_tel"    value="<?=$r_tel?>">
			<input type="hidden" name="r_phone"  value="<?=$r_phone?>">
			<input type="hidden" name="r_email"  value="<?=$r_email?>">
			<input type="hidden" name="r_zip"    value="<?=$r_zip?>">
			<input type="hidden" name="r_juso"   value="<?=$r_juso?>">
			<input type="hidden" name="memo"    value="<?=$memo?>">

			<!-- 결재방법 선택 및 입력 -->
			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>결재방법</b></font></td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>결재방법 선택</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="radio" name="pay_method" value="0" onclick="javascript:PaySel(0);" checked>카드 &nbsp;
									<input type="radio" name="pay_method" value="1" onclick="javascript:PaySel(1);">무통장
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="1" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>
			<!-- 카드 -->
			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>카드</b></font></td>
					<td align="center" width="560">
						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>카드종류</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<select name="card_kind" class="cmfont1">
										<option value="0">카드종류를 선택하세요.</option>
										<option value="1">국민카드</option>
										<option value="2">신한카드</option>
										<option value="3">우리카드</option>
										<option value="4">하나카드</option>
									</select>
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>카드번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="card_no1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="card_no2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="card_no3" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="card_no4" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>카드기간</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="card_month" size="2" maxlength="2" value="" class="cmfont1"> 월 / 
									<input type="text" name="card_year"  size="2" maxlength="2" value="" class="cmfont1"> 년
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>카드비밀번호(뒷2자리)</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									**<input type="password" name="card_pw" size="2" maxlength="2" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>할부</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<select name="card_halbu" class="cmfont1">
										<option value="0">일시불</option>
										<option value="3">3 개월</option>
										<option value="6">6 개월</option>
										<option value="9">9 개월</option>
										<option value="12">12 개월</option>
									</select>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="1" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>
			<!-- 무통장 -->
			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" style="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>무통장 입금</b></font></td>
					<td align="center" width="560">
						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>은행선택</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<select name="bank_kind"  class="cmfont1" disabled>
										<option value="0">입금할 은행을 선택하세요.</option>
										<option value="1">국민은행 000-00000-0000</option>
										<option value="2">신한은행 000-00000-0000</option>
									</select>
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>입금자 이름</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="bank_sender" size="15" maxlength="20" value="" class="cmfont1" disabled>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="940" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			</form>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="center">
						<img src="images/b_order1.gif" onclick="Check_Value()" style="cursor:hand">
					</td>
				</tr>
				<tr height="20"><td></td></tr>
			</table>

			

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

		</td>
	</tr>
</table>
<br><br>

<!-- 화면 하단 부분 시작 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->
<? include "main_bottom.php";?>
<!-- 화면 하단 부분 끝 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->

&nbsp
</center>

</body>
</html>