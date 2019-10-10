<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
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
			function Login_Check() 
			{
				if (!form2.uid.value) {
					alert("아이디를 입력해 주십시오.");
					form2.uid.focus();
					return;
				}
				if (!form2.pwd.value) {
					alert("비밀번호를 입력해 주십시오.");
					form2.pwd.focus();
					return;
				}
				form2.submit();
			}
			</script>

			<!---- 화면 우측(로그인) S -------------------------------------------------->	
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center">
						<img src="images/login_title.gif" width="960" height="30" border="0">
					</td>
				</tr>
				<tr><td height="47"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr>
					<td width="747" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="8" width="523" bgcolor="E9E9E9">
							<tr>
								<td height="210" align="center" bgcolor="white">
									<table border="0" height="120" cellpadding="0" cellspacing="0" width="440">
										<tr>
											<td width="120" align="center"><img src="images/login_image1.gif" width="110" height="90" border="0"></td>
											<td width="320">
												<table border="0" cellpadding="0" cellspacing="0" width="320">
													<tr>
														<td height="35">
															<p style="padding-left:10px;"><img src="images/login_image2.gif" width="220" height="21" border="0"></p>
														</td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="320">
													<!-- form2 시작 ------>
													<form name = "form2" method = "post" action = "member_check.php">
													<tr>
														<td width="220" height="25">
															<p style="padding-left:10px;">
															<img align="absmiddle" src="images/login_id.gif" width="40" height="13" border="0"> 
															<input type="text" name="uid" size="20" maxlength="12" class="cmfont1" tabindex="1">
															</p>
														</td>
														<td width="100" rowspan="2">
															<a href="javascript:Login_Check()" onfocus="this.blur()"><img align="absmiddle" src="images/b_login.gif" width="50" height="39" border="0"></a>
														</td>
													</tr>
													<tr>
														<td width="220" height="25">
															<p style="padding-left:10px;">
															<img align="absmiddle" src="images/login_pw.gif" width="40" height="13" border="0"> 
															<input type="password" name="pwd" size="20" maxlength="12" class="cmfont1" tabindex="2">
															</p>
														</td>
													</tr>
													</form>
													<!--form2 끝 ------>
												</table>
											</td>
										</tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="512">
										<tr><td height="15"></td></tr>
										<tr><td height="2" bgcolor="E9E9E9"></td></tr>
										<tr><td height="15"></td></tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="511">
										<tr>
											<td align="center">
												<table border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td height="30"><img src="images/login_image6.gif" border="0"></td>
														<td height="30">
															<a href="member_idpw.html" onfocus="this.blur()"><img src="images/b_id.gif" width="64" height="19" border="0" align="absmiddle"></a> &nbsp; 
															<a href="member_idpw.html" onfocus="this.blur()"><img src="images/b_pw.gif" width="64" height="19" border="0" align="absmiddle"></a>
														</td>
													</tr>
												</table>												
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
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