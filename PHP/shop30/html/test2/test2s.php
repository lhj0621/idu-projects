<?
  include "common.php";
 $no1=$_REQUEST[no1];
  $query="select name30 from test2 where no30=$no1;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<input type="hidden" name="no1" value="<?$no1?>">

<table width="500" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <font color="blue"><b><?=$row[name30]?></b></font>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="test2s_new.php?no1=<?=$no1?>">신규입력</a>
		</td>
	</tr>
</table>

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">기족생일</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
  <?
	$query="select * from test2s where test2_no30=$no1 order by name30;";
	$result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query");
	  $count=mysqli_num_rows($result);
     for ($i=0; $i<$count; $i++){   
	  $row=mysqli_fetch_array($result);
	  echo("
	  <tr bgcolor='#F2F2F2'>
	   <td width='100' align='center'>&nbsp $row[name30]</td>
	      <td width='100' align='center'>&nbsp $row[birthday30]</td>
		  <td align='center'>
		  	<a href='test2s_edit.php?no2=$row[no30]&no1=$no1'> 수정</a>/
	<a href='test2s_delete.php?no2=$row[no30]&no1=$no1 'onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a>
	</td>
	  ");
	 }
?>
 
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>

</body>
</html>
