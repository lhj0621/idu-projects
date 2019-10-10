<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include "common.php";
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];
?>
<html>
<head>
	<title>성적처리 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>
<table width="400" border="0">
<form name="form1" method="post"action="sj_list.php">
<tr>
<td>
이름 : <input type="text"name="text1"size="15" value="<?=$text1?>">
<input type="button" value="검색" onClick="javascript:form1.submit();">
</td>
<td align="right"><a href="sj_new.html">입력</a></td>
</tr>
</form>
</table>
<table width="400" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="50"  align="center">국어</td>
    <td width="50"  align="center">영어</td>
    <td width="50"  align="center">수학</td>
    <td width="50"  align="center">총점</td>
    <td width="50"  align="center">평균</td>
	<td width="50"  align="center">삭제</td>
  </tr>
  <?
  if(!$text1)
	$query="select * from sj order by name30;";
	else
	$query="select * from sj  where name30 like '%$text1%'order by name30;";
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
	  $row=mysqli_fetch_array($result);
	  $avg=sprintf("%6.1f",$row[avg30]);
  echo("<tr bgcolor='lightyellow'>
    <td width='100' align='right'>&nbsp 
	<a href='sj_edit.php?no=$row[no30]'> $row[name30]</a></td>
    <td width='50'  align='right'>&nbsp $row[kor30]</td>
    <td width='50'  align='right'>&nbsp $row[eng30]</td>
    <td width='50'  align='right'>&nbsp $row[mat30]</td>
    <td width='50'  align='right'>&nbsp $row[hap30]</td>
    <td width='50'  align='right'>$avg &nbsp </td>
	<td align='center'>
	<a href='sj_delete.php?no=$row[no30]'onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a>
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
	echo("<a href='sj_list.php?page=$tmp&text1=$text1'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo(" <a href='sj_list.php?page=$i&text1=$text1'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='sj_list.php?page=$tmp&text1=$text1'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>
</body>
</html>
