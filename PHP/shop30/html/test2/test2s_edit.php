<?
 include   "common.php";
    $no2=$_REQUEST[no2];
	$no1=$_REQUEST[no1];
  $query="select * from test2s where no30=$no2;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);

    $birthday1=substr($row[birthday30],0,4);
  $birthday2=substr($row[birthday30],5,2);
  $birthday3=substr($row[birthday30],8,2);
 ?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="test2s_update.php">

<input type="hidden" name="no1" value="<?=$no1?>">
<input type="hidden" name="no2" value="<?=$no2?>">

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">가족이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name30]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">생일</td>
    <td width="400" align="left">
      <input type="text" name="birthday1" size="4" maxlength="4" value="<?=$birthday1?>"> -
      <input type="text" name="birthday2" size="2" maxlength="2" value="<?=$birthday2?>"> -
      <input type="text" name="birthday3" size="2" maxlength="2" value="<?=$birthday3?>"> 
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
	  <input type="submit" value="저장"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>