<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include   "common.php";
$no=$_REQUEST[no];
$kind = $_REQUEST [kind];
$query="select * from product where no30=$no";
 $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);
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
			<script language = "javascript">

			function Zoomimage(no) 
			{
				window.open("zoomimage.php?no="+no, "", "menubar=no, scrollbars=yes, width=560, height=640, top=30, left=50");
			}

			function check_form2(str) 
			{
				if (!form2.opts1.value) {
						alert("옵션1을 선택하십시요.");
						form2.opts1.focus();
						return;
				}
				if (!form2.opts2.value) {
						alert("옵션2를 선택하십시요.");
						form2.opts2.focus();
						return;
				}
				if (!form2.num.value) {
						alert("수량을 입력하십시요.");
						form2.num.focus();
						return;
				}
				if (str == "D") {
					form2.action = "cart_edit.php";
					form2.kind .value = "order";
					form2.submit();
				}
				else {
					form2.action = "cart_edit.php";
					form2.submit();
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/product_title3.gif" width="960" height="30" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="">
			<input type="hidden" name="no" value="<?=$no?>">

		 	<input type="hidden" name="kind" value="insert">

			<table border="0" cellpadding="0" cellspacing="0" width="950">
				<tr>
					<td width="335" align="center" valign="top">
						<!-- 상품이미지 -->
						<table border="0" cellpadding="0" cellspacing="1" width="500" height="315" bgcolor="D4D0C8">
							<tr>
								<td bgcolor="white" align="center">
									<img src="product/<?=$row[image2]?>" height="400" width="500" border="0" align="absmiddle" ONCLICK="Zoomimage('<?=$no?>')" STYLE="cursor:hand">
								</td>
							</tr>
						</table>
					</td>
					<td width="410 " align="center" valign="top">
						<!-- 상품명 -->
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<tr>
								<td width="80" height="45" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>제품명</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<font color="282828"><?=$row[name30]?></font><br>
									<?
									if($row[icon_new30])
							echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
						if($row[icon_hit30])
							echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'> ");
						if($row[icon_sale30])
							echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'>$row[discount30]%</font>");
							?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 시중가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>소비자가</b></font>
								</td>
								<?
			$discontprice=number_format(round($row[price30]*(100-$row[discount30])/100, -3) );
			$row[price30]=number_format($row[price30]);
			?>
								<td width="1" bgcolor="E8E7EA"></td>
								<td width="289" style="padding-left:10px"><font color="666666"><?=$row[price30]?>원</font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 판매가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>판매가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px"><font color="0288DD"><b><?=$discontprice?>원</b></font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 옵션 -->
							<?
							    $query = "select * from opts where opt_no30=$row[opt1]";
								 $result=mysqli_query($db,$query);
								 if (!$result) exit("에러:$query");
								  $count=mysqli_num_rows($result);
								?>
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>옵션선택</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<select name="opts1" class="cmfont1">
										<option value="">선택하세요</option>
										<?for ($i=0; $i<$count; $i++){   
										$row1=mysqli_fetch_array($result);
										echo("<option value='$row1[no30]'>$row1[name30]</option>");
								}
										?>
									</select> &nbsp;
									<?
							    $query = "select * from opts where opt_no30=$row[opt2]";
								 $result=mysqli_query($db,$query);
								 if (!$result) exit("에러:$query");
								  $count=mysqli_num_rows($result);
								?>
									<select name="opts2" class="cmfont1">
										<option value="">선택하세요</option>
										<?for ($i=0; $i<$count; $i++){   
										$row2=mysqli_fetch_array($result);
										echo("<option value='$row2[no30]'>$row2[name30]</option>");
								}
										?>
									</select>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 수량 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>수량</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<input type="text" name="num" value="1" size="3" maxlength="5" class="cmfont1"> <font color="666666">개</font>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="70" align="center">
									<a href="javascript:check_form2('D')"><img src="images/b_order.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;
									<a href="javascript:check_form2('C')"><img src="images/b_cart.gif"  border="0" align="absmiddle"></a>
								</td>
							</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="30" align="center">
									<img src="images/product_text1.gif" border="0" align="absmiddle">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="22"></td></tr>
			</table>

			<!-- 상세설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr>
					<td height="30" align="center">
						<img src="images/product_title.gif" width="960" height="30" border="0">
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960" style="font-size:9pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="200" valign=top style="line-height:14pt">
						본제품의 상세설명은 다음과 같습니다.
			
						<br>
						<br>
						<center>
						<img  width="960"src ="product/<?=$row[image3]?>"><br><br><br>	
						<!---
						<img src="product/0000_L1.jpg">&nbsp
						<img src="product/0000_L1.jpg"><br><br>
						<img src="product/0000_L1.jpg">&nbsp
						<img src="product/0000_L1.jpg"><br><br>
						--->
						</center>
					</td>
				</tr>
			</table>

			<!-- 교환배송정보 -->
			<table border="0" cellpadding="0" cellspacing="0" width="960" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr>
					<td align="center" class="cmfont"><?=$row[contents30]?></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960" class="cmfont">
				<tr><td height="10"></td></tr>
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