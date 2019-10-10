<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include   "../common.php";
$no=$_REQUEST[no];
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];
$sel1=$_REQUEST[sel1];
$sel2=$_REQUEST[sel2];
$sel3=$_REQUEST[sel3];
$sel4=$_REQUEST[sel4];
 $query="select * from product  ;";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);
 $count=mysqli_num_rows($result);
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="product_new.php";
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" method="post" action="product.php">
	<tr height="40">
		<td align="left"  width="150" valign="bottom">&nbsp 제품수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="550" valign="bottom">
			<select name="sel1">
			<?
			for ($i=0; $i<$n_status; $i++){
				if ($sel1==$i)
		 echo("<option value='$i'selected>$a_status[$i]</option>");
		else
         echo("<option value='$i'>$a_status[$i]</option>");
}
?>
			</select> &nbsp 
			<select name="sel2">
					<?
			for ($i=0; $i<$n_icon; $i++){
				if ($sel2==$i)
		 echo("<option value='$i'selected>$a_icon[$i]</option>");
		else
       echo("<option value='$i'>$a_icon[$i]</option>");
}
?>
			</select> &nbsp 
			<select name="sel3">
			<?
			for ($i=0; $i<$n_menu; $i++){
				if ($sel3==$i)
		 echo("<option value='$i'selected>$a_menu[$i]</option>");
		else
       echo("<option value='$i'>$a_menu[$i]</option>");
}
?>
			</select> &nbsp 
			<select name="sel4">
					<?
			for ($i=1; $i<$n_text1; $i++){
				if ($sel4==$i)
		 echo("<option value='$i'selected>$a_text1[$i]</option>");
		else
       echo("<option value='$i'>$a_text1[$i]</option>");
}
?>
			</select>
			<input type="text" name="text1" size="10" value="<?=$text1?>">&nbsp
		</td>
		<td align="left" width="120" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;&nbsp
			<input type="button" value="입력" onclick="javascript:go_new();">
		</td>
	</tr>
	<tr><td height="5"></td></tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">제품분류</td>
		<td width="100" align="center">제품코드</td>
		<td width="280" align="center">제품명</td>
		<td width="70"  align="center">판매가</td>
		<td width="50"  align="center">상태</td>
		<td width="120" align="center">이벤트</td>
		<td width="80"  align="center">수정/삭제</td>
	</tr>
<?
if (!$sel1)   $sel1=0;
if (!$sel2)   $sel2=0;
if (!$sel3)   $sel3=0;
if (!$sel4)   $sel4=1;
if (!$text1) $text1=""; 
      
$k=0;
if ($sel1 != 0)        { $s[$k] = "status30=" . $sel1;  $k++; }
if ($sel2 == 1)       { $s[$k] = "icon_new30=1";      $k++; }
elseif ($sel2==2)   { $s[$k] = "icon_hit30=1";         $k++; }
elseif ($sel2==3)   { $s[$k] = "icon_sale30=1";       $k++; }
if ($sel3 != 0)        { $s[$k] = "menu30=" . $sel3;   $k++; }
if ($text1)
{
    if ($sel4==1)       { $s[$k] = "name30 like '%" . $text1 . "%'"; $k++; }
    elseif ($sel4==2) { $s[$k] = "code30 like '%" . $text1 . "%'"; $k++; }
}
if ($k> 0)
{
    $tmp=implode(" and ", $s); 
    $tmp = " where " . $tmp;
}

$query="select * from product " . $tmp . " order by code30";

 $result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);    // 레코드개수
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
	  $row[menu30]=$a_menu[$row[menu30]];
	  $row[price30]= number_format($row[price30]);
	  $row[status30]=$a_status[$row[status30]];
	if ($row[icon_new30])  $row[icon_new30]="NEW&nbsp;";  else $row[icon_new30]="";
	if ($row[icon_hit30])  $row[icon_hit30]="HIT&nbsp;";  else $row[icon_hit30]="";
	if ($row[icon_sale30])  $row[icon_sale30]="SALE";  else $row[icon_sale30]="";
	$icon = $row[icon_new30] .  $row[icon_hit30] .$row[icon_sale30]."(".$row[discount30]."%)"  ;
  echo("<tr bgcolor='#F2F2F2' height='23'>	
		<td width='100'>&nbsp $row[menu30]</td>
		<td width='100'>&nbsp $row[code30]</td>
		<td width='280'>&nbsp $row[name30]</td>	
		<td width='70'  align='right'>$row[price30] &nbsp</td>	
		<td width='50'  align='center'>$row[status30]</td>	
		<td width='120' align='center'>&nbsp $icon</td>	
		<td width='80'  align='center'>
			<a href='product_edit.php?no=$row[no30]&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'>수정</a>/
			<a href='product_delete.php?no=$row[no30]&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page' onclick='javascript:return confirm('삭제할까요 ?');'>삭제</a>
		</td>
	</tr> ");
  }

?>

</table>

<table width="800" border="0" cellpadding="0" cellspacing="0">
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
	echo("<a href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$tmp'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo(" <a href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$i'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$tmp'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>
</table>

</center>

</body>
</html>