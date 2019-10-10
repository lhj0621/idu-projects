<?
  include "common.php";
  $no=$_REQUEST[no];

   $query="select * from test2 where no30=$no;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);

  $tel1=trim(substr($row[tel30],0,3));
  $tel2=trim(substr($row[tel30],3,4));
  $tel3=trim(substr($row[tel30],7,4));   
  ?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="test2_update.php">

<input type="hidden" name="no1" value="<?=$no?>">

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name30]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">전화</td>
    <td width="400" align="left">
      <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
      <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
      <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
		<input type="submit" value="수정"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>