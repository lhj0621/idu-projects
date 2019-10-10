<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include   "../common.php";
  $no1=$_REQUEST[no1];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="opts_new.php?no1=<?=$no1?>";
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<?  $query="select name30 from opt where no30=$no1;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);
  ?>
<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr height="50">
		<td align="left"  width="300" valign="bottom">&nbsp 옵션명 : <font color="#0457A2"><b><?=$row[name30]?></b></font></td>
	<input type="hidden" name="no1" value="<?$no1?>">
		<td align="right" width="200" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="100" align="center"><font color="#142712">소옵션번호</font></td>
		<td width="300" align="center"><font color="#142712">소옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
	</tr>
<?
	$query="select * from opts where opt_no30=$no1 order by name30;";
	$result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query");
	  $count=mysqli_num_rows($result);
     for ($i=0; $i<$count; $i++){   
	  $row=mysqli_fetch_array($result);
	  echo("
	  <tr bgcolor='#F2F2F2'>
	   <td width='100' align='center'>&nbsp $row[no30]</td>
	      <td width='100' align='center'>&nbsp $row[name30]</td>
		  <td align='center'>
		  	<a href='opts_edit.php?no2=$row[no30]&no1=$no1'> 수정</a>/
	<a href='opts_delete.php?no2=$row[no30]&no1=$no1 'onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a>
	</td>
	  ");
	 }
?>
	
</table>

</center>

</body>
</html>