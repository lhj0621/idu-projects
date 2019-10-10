<?
$cookie_no=$_COOKIE[cookie_no];
$cookie_name=$_COOKIE[cookie_name];
include "common.php";
?>

<table width="100%" height="45" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#f9e7dd">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->

		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table  border="0" cellspacing="0" cellpadding="0" >
				<tr>
					<td><a href="index.html">HOME</a></td>
					<td width="11"></td>
<?
if (!$cookie_no) 
echo("
					<td><a href='member_login.php'>LOGIN</a></td>
					<td width='11'></td>
					<td><a href='member_agree.php'>JOIN</a></td> ");
else
echo("
					<td><a href='member_logout.php'>LOGOUT</a></td>
					<td width='11'></td>
					<td><a href='member_edit.php'>EDIT	</a></td>");
?>
					<td width="11"></td>
					<td><a href="cart.php">CART</a></td>
					<td width="110"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

	<tr>
		<td><a href="index.html"><center><img src="images/main_logo.gif" width="1247" height="195"></center></a></td>
	</tr>

</table>

<table width="100%" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="center" bgcolor="#FFFFFF">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="product.php?menu=1"><img src="images/main_menu01_off.gif" width="230" height="36" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=2"><img src="images/main_menu02_off.gif" width="230" height="36" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=3"><img src="images/main_menu03_off.gif" width="230" height="36" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=4"><img src="images/main_menu04_off.gif" width="230" height="36" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=5"><img src="images/main_menu05_off.gif" width="230" height="36" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<!-- 상품 검색 -----------------------------------
<table width="100%" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="1" colspan="5" bgcolor="#F7F7F7"></td></tr>
	<tr bgcolor="#F0F0F0">
	<?
	if (!$cookie_no)
	echo("<td width='181' alsign='center'><font color='#666666'>&nbsp <b>Welcome ! &nbsp;&nbsp 고객님.</b></font></td> ");
	else
	echo("<td width='181' align='center'><font color='#666666'>&nbsp <b>Welcome ! &nbsp;&nbsp  $cookie_name .</b></font></td> ");
	?>
		<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:돋움;"><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 
		<form name="form1" method="post" action="product_search.html">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="17" class="cmfont1">
		</td>
		</form>
		<!-- form1 끝 -
		<td width="65" align="center"><a href="javascript:Search()"><img src="images/i_search1.gif" border="0"></a></td>
	</tr>
	<tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
</table>
	---->