<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include   "../common.php";
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];
$sel1=$_REQUEST[sel1];
$sel2=$_REQUEST[sel2];
$day1_y=$_REQUEST[day1_y];
$day2_y=$_REQUEST[day2_y];
$day1_m=$_REQUEST[day1_m];
$day2_m=$_REQUEST[day2_m];
$day1_d=$_REQUEST[day1_d];
$day2_d=$_REQUEST[day2_d];
//날짜는 좌측은 이전 일주일? 정도  오른쪽은 오늘날자 출력 순서는 가장 최근순으로 정렬

	if(!$sel1) $sel1=0;
	if(!$sel2) $sel2=1;
	if(!$text1) $text1="";
	$today = date("Y-m-d");
	$dayy=trim(substr($today,0,4));
	$daym=trim(substr($today,5,2));
	$dayd=trim(substr($today,8,2));
	if(!$day1_y) $day1_y = 2018;
	if(!$day2_y) $day2_y = $dayy;
	if(!$day1_m) $day1_m = 1;
	if(!$day2_m) $day2_m = $daym;
	if(!$day1_d) $day1_d = 31;
	if(!$day2_d) $day2_d = $dayd;

$date1= sprintf("%04d-%02d-%02d",$day1_y,$day1_m,$day1_d);
$date2= sprintf("%04d-%02d-%02d",$day2_y,$day2_m,$day2_d);

$k=0;
if ($sel1 != 0)        { $s[$k] = "state30=" . $sel1;  $k++; }
if($text1){
	if ($sel2 == 1)    { $s[$k] = "no30 like '%" .$text1. "%'";   $k++; }
	else if ($sel2 == 2)    { $s[$k] = "o_name30 like '%". $text1. "%'";   $k++; }
	else if ($sel2 == 3)    { $s[$k] = "product_names30 like'%". $text1. "%'";   $k++; }
}

	if($k>0)
	{
		$tmp=implode(" and ",$s);
		$tmp = " and " . $tmp;
	}

 $query="select * from jumun where jumunday30 between '$date1' and '$date2' ".$tmp." order by no30 desc";
//$query="select * from jumun ";

  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_update(no,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?no="+no+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1_y="+form1.day1_y.value+"&day1_m="+form1.day1_m.value+"&day1_d="+form1.day1_d.value+
			"&day2_y="+form1.day2_y.value+"&day2_m="+form1.day2_m.value+"&day2_d="+form1.day2_d.value;
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<form name="form1" method="post" action="jumun.php">
<input type="hidden" name="page" value="0">

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<tr height="40">
		<td align="left"  width="70" valign="bottom">&nbsp 주문수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="730" valign="bottom">
			기간 : 
			<input type="text" name="day1_y" size="4" value="<?=$day1_y?>">
			<select name="day1_m">
			<?
				for($i=1;$i<=12;$i++)
			{
				if($i==$day1_m)
				echo("<option value='$i' selected>$i</option>");
					else
				echo("<option value='$i'>$i</option>");
			}
			?>
			</select>
			<select name="day1_d">
			<?
				for($i=1;$i<=31;$i++)
			{
				if($i==$day1_d)
				echo("<option value='$i' selected>$i</option>");
					else
				echo("<option value='$i'>$i</option>");
			}
			?>
			</select> - 
			<input type="text" name="day2_y" size="4" value="<?=$day2_y?>">
			<select name="day2_m">
				<?
				for($i=1;$i<=12;$i++)
			{
				if($i==$day2_m)
				echo("<option value='$i' selected>$i</option>");
					else
				echo("<option value='$i'>$i</option>");
			}
			?>
			</select>
			<select name="day2_d">
			<?
				for($i=1;$i<=31;$i++)
			{
				if($i==$day2_d)
				echo("<option value='$i' selected>$i</option>");
					else
				echo("<option value='$i'>$i</option>");
			}
			?>
			</select> &nbsp
			<select name="sel1">
<?
			for ($i=0; $i<$n_state; $i++){
				if ($sel1==$i)
		 echo("<option value='$i'selected>$a_state[$i]</option>");
		else
         echo("<option value='$i'>$a_state[$i]</option>");
}
?>
			</select> &nbsp 
			<select name="sel2">
<?
			for ($i=0; $i<$n_jumun; $i++){
				if ($sel2==$i)
		 echo("<option value='$i'selected>$a_jumun[$i]</option>");
		else
         echo("<option value='$i'>$a_jumun[$i]</option>");
}
?>
			</select>
			<input type="text" name="text1" size="10" value="<?=$text1?>">&nbsp
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;
		</td>
	</tr>
	</tr><td height="5" colspan="2"></td></tr>
</table>

<table width="800" border="1" cellpadding="0" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="70"  align="center">주문번호</td>
		<td width="70"  align="center">주문일</td>
		<td width="250" align="center">상품명</td>
		<td width="50"  align="center">제품수</td>	
		<td width="70"  align="center">총금액</td>
	    <td width="65"  align="center">주문자</td>
		<td width="50"  align="center">결재</td>
		<td width="135" align="center" colspan="2">주문상태</td>
	    <td width="50"  align="center">삭제</td>
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
	  $total_cash=number_format($row[total_cash30]);
	  if ($row[pay_method30]==0) $pay_method="카드"; else $pay_method="무통장";
	  $state=$row[state30];
	  $color="black";
	if ($state==5)  $color="blue";  // 주문완료 
	if ($state==6)  $color="red";   // 주문취소
  echo("
  	<tr bgcolor='#F2F2F2' height='23'> 
		<td width='70'  align='center'><a href='jumun_info.php?no=$row[no30]'>$row[no30]</a></td>
		<td width='70'  align='center'>$row[jumunday30]</td>
		<td width='250' align='left'>&nbsp;	$row[product_names30]</td>	
		<td width='40' align='center'>$row[product_nums30]</td>	
		<td width='70'  align='right'>$total_cash&nbsp</td>	
		<td width='65'  align='center'>$row[o_name30]</td>	
		<td width='50'  align='center'>$pay_method</td>	
		<td width='85' align='center' valign='bottom'>
			<select name='state' style='font-size:9pt; color:$color'>");
			for ($j=1; $j<$n_state; $j++){
				if ($row[state30]==$j)
		 echo("<option value='$j'selected>$a_state[$j]</option>");
				else
         echo("<option value='$j'>$a_state[$j]</option>");
			}
		echo("
			</select>&nbsp;
		</td>
		<td width='50' align='center'>
			<a href='javascript:go_update(\"$row[no30]\",\"$i\");'><img src='images/b_edit1.gif' border='0'></a>
		</td>	
		<td width='50' align='center'>
			<a href='jumun_delete.php?no=$row[no30]'&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m& day2_d=$day2_d&sel1=$sel1&sel2=$sel2&text1=$text1&page=$page' onclick='javascript:return confirm('삭제할까요 ?');'>
	 <img src='images/b_delete1.gif' border='0'></a>
		</td>
	</tr>");
  }
  ?>

</table>

<input type="hidden" name="state">
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
	echo("<a href='jumun.php?no=$no
     &day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d
     &day2_y=$day2_y&day2_m=$day2_m& day2_d=$day2_d
     &sel1=$sel1&sel2=$sel2&text1=$text1&page=$tmp'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo("<a href='jumun.php?no=$no
     &day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d
     &day2_y=$day2_y&day2_m=$day2_m& day2_d=$day2_d
     &sel1=$sel1&sel2=$sel2&text1=$text1&page=$i'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='jumun.php?no=$no
     &day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d
     &day2_y=$day2_y&day2_m=$day2_m& day2_d=$day2_d
     &sel1=$sel1&sel2=$sel2&text1=$text1&page=$tmp'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>
	
</table>

</form>

</center>

</body>
</html>