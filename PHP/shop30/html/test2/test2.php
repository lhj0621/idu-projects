<?
  include "common.php";
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];
if(!$text1)
	$query="select * from test2 order by name30;";
	else
	$query="select * from test2 where name30 like '%$text1%'order by name30;";
	$result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $count=mysqli_num_rows($result);
?>

<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="500" border="0">
	<form name="form1" method="post" action="test2.php">
	<tr>
		<td width="300">
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="test2_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">이름</td>
    <td width="100" align="center">전화</td>
    <td width="100" align="center">수정/삭제</td>
    <td width="100" align="center">가족</td>
  </tr>
    <?

if(!$page) $page=1;
  $pages=ceil($count/$page_line);
  //전체 페이지수 
  $first=1;
  if($count>0)$first=$page_line*($page-1);
  //현재 페이지가 몇 번째 자료부터 시작하는지 계산
  $page_last=$count - $first;
  if($page_last>$page_line)$page_last=$page_line;
  if($count>0)mysqli_data_seek($result,$first);
  for ($i=0; $i<$page_last; $i++){   
	  $row=mysqli_fetch_array($result);
	 $tel1=trim(substr($row[tel30],0,3));
	$tel2=trim(substr($row[tel30],3,4));
	$tel3=trim(substr($row[tel30],7,4));
	$row[tel30] = $tel1 . "-" . $tel2 . "-" . $tel3;	
	  echo("
<tr bgcolor='#F2F2F2'>
   <td width='100' align='center'>&nbsp $row[name30]</td>
    <td width='100'  align='left'>&nbsp $row[tel30]</td>
		<td align='center'>
	<a href='test2_edit.php?no=$row[no30]'> 수정</a>
	/
	<a href='test2_delete.php?no=$row[no30]'onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a>
	</td>
	<td align='center'>
	<a href='test2s.php?no1=$row[no30]'>가족 편집<a>
	</td>

   ");
   }
	?>

</table>

<table width="500" border="0" cellspacing="0" cellpadding="0">
 <?
$blocks = ceil($pages/$page_block); //전체 블록 수
$block = ceil($page/$page_block);   //현재 블록
$page_s=$page_block*($block-1);  //표시해야 할 시작페이지번호
$page_e=$page_block*$block;  //표시해야 할 마지막 페이지번호
if($blocks<=$block)$page_e=$pages;
echo("<table border='0' cellpadding='0' cellspacing='0' width='400'>
	<tr>
		<td height='40' align='center'>");
if($block>1){
	$tmp=$page_s;
	echo("<a href='test2.php?page=$tmp&text1=$text1'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo(" <a href='test2.php?page=$i&text1=$text1'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='test2.php?page=$tmp&text1=$text1'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>
</table>

</body>
</html>
