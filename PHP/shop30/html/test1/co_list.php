<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<?
include "common.php";
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];
?>

<html>
<head>
	<title>거래처 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="750" border="0">
	<form name="form1" method="post" action="co_list.html">
	<tr>
		<td width="300">&nbsp
			거래처명 : <input type="text" name="text1" size="10" value="">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
    <td align="right"><a href="co_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="750"  border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#555555">
    <td width="150" align="center"><font color="white">거래처명</font></td>
    <td width="100" align="center"><font color="white">전화</font></td>
    <td width="100" align="center"><font color="white">소매/도매</font></td>
    <td width="100" align="center"><font color="white">창립일</font></td>
    <td width="250" align="center"><font color="white">주소</font></td>
    <td width="50"  align="center"><font color="white">삭제</font></td>
  </tr>
 
<?
  if(!$text1)
	$query="select * from co order by coname30;";
	else
	$query="select * from co where coname30 like '%$text1%'order by coname30;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $count=mysqli_num_rows($result);
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
	if ($row[gubun30]==0)  $row[gubun30]="소매";  else $row[gubun30]="도매";
	$phone1=trim(substr($row[phone30],0,3));
	$phone2=trim(substr($row[phone30],3,4));
	$phone3=trim(substr($row[phone30],7,4));
	$row[phone30] = $phone1 . "-" . $phone2 . "-" . $phone3;	
 echo("<tr bgcolor='lightyellow'>
    <td width='100' align='cente'>&nbsp 
	<a href='co_edit.php?no=$row[no30]'> $row[coname30]</a></td>
    <td width='200' align='cente'>&nbsp $row[phone30]</td>
    <td width='50'  align='cente'>&nbsp $row[gubun30]</td>
    <td width='150' align='cente'>&nbsp $row[startday30]</td>
    <td width='500' align='cente'>&nbsp $row[address30]</td>
	<td align='center'>
	<a href='co_delete.php?no=$row[no30]'onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a>
	</td>
  </tr>");
  }
  ?>
</table>
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
	echo("<a href='co_list.php?page=$tmp&text1=$text1'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo(" <a href='co_list.php?page=$i&text1=$text1'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='co_list.php?page=$tmp&text1=$text1'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>



</body>
</html>
