<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
	<title>거래처 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<form name="form1" method="post" action="co_insert.php">

<table width="500" border="1" cellpadding="1" cellspacing="0" bgcolor="#DDDDDD">
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">거래처명</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="coname" size="40" value="">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">전화</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="phone1" size="3" value="">-
      <input type="text" name="phone2" size="4" value="">-
      <input type="text" name="phone3" size="4" value="">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">창립일</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="startday1" size="4" value="">-
      <input type="text" name="startday2" size="2" value="">-
      <input type="text" name="startday3" size="2" value=""> 
			&nbsp;&nbsp 
      <input type="radio" name="gubun" value="0" checked>소매
      <input type="radio" name="gubun" value="1">도매
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">주소</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="address" size="50" value="">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
	  <input type="submit" value="등록"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>

</form>

</body>
</html>