<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include   "common.php";
$menu=$_REQUEST[menu];
$sort=$_REQUEST[sort];
$page=$_REQUEST[page];
$query="SELECT * FROM product where menu30=$menu;"; 
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
 $a_sort=array("신상품순 정렬", "고가격순 정렬", "저가격순 정렬", "상품명 정렬");
 $n_sort=count($a_sort);

?>
<html>
<head>
<title>DARU</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>
<!--  화면 상단메뉴 시작 (main_top) ------------------------------->
<? include "main_top.php";?>
<!--  화면 상단메뉴 끝 (main_top) ------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">

		<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
<? include "main_left.php";?>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
			
		</td>
		<td width="10"></td>
		<td valign="top">
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
<!-- 하위 상품목록 -->

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php?menu=<?=$menu?>">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="960" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="950" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="940" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b> <?=$a_menu[$menu]?>&nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
															<?
																for($i=0;$i<$n_sort;$i++){
																	if($sort==$i)
																		echo("<option value='$i'selected>$a_sort[$i]</option>");
																	else
																		echo("<option value='$i'>$a_sort[$i]</option>");
																	}
																	?>
															</select>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			<?
if ($sort=="1")            // 고가격순
   $query="SELECT * FROM product where menu30=$menu order by price30 desc";
elseif ($sort=="2")  // 저가격순
   $query="SELECT * FROM product where menu30=$menu order by price30";
elseif ($sort=="3")  // 이름순
   $query="SELECT * FROM product where menu30=$menu order by name30";
else                              // 신상품순
   $query="SELECT * FROM product where menu30=$menu order by no30 desc";
$result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  $row=mysqli_fetch_array($result);
 $count=mysqli_num_rows($result);
$num_col=5;   
$num_row=3;                   // column수, row수
$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수


  if(!$page) $page=1;
  $pages=ceil($count/$page_line);
  //전체 페이지수 
  $first=1;
  if($count>0)$first=$page_line*($page-1);
  //현재 페이지가 몇 번째 자료부터 시작하는지 계산
  $page_last=$count - $first;
  if($page_last>$page_line)$page_last=$page_line;
  if($count>0)mysqli_data_seek($result,$first);



$icount=0;       // 출력한 제품개수 카운터
echo("<table border='0' cellpadding='0' cellspacing='0'>");
for ($ir=0; $ir<$num_row; $ir++)
{
     echo("<tr>");
     for ($ic=0;$ic<$num_col;  $ic++)
    {
         if ($icount <= $page_last-1)
        {
             $row=mysqli_fetch_array($result);
             echo("<td> <table border='0' cellpadding='0' cellspacing='0' width='100%' class='cmfont'>
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no30]'><img src='product/$row[image1]' width='' height='140' border='0' hspace='15' ></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=$row[no30]'><font color='444444'>$row[name30]</font></a><br>&nbsp; ");

					
						if($row[icon_new30])
							echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
						if($row[icon_hit30])
							echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'> ");
						if($row[icon_sale30])
							echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <br><font color='red'>$row[discount30]%</font>");
					echo("</td> </tr>");
			$discontprice=number_format( round($row[price30]*(100-$row[discount30])/100, -3) );
			$row[price30]=number_format($row[price30]);
			if($row[icon_sale30]){
				echo("<tr><td height='20' align='center'><strike>$row[price30]원</strike><br><b>$discontprice 원</b></td></tr>");		}
			else{	
				echo("<tr><td height='20' align='center'><b>$row[price30] 원</b></td></tr>");
			}
			echo("<br></table>
				</td>");
         }
         else
             echo("<td></td>");      // 제품 없는 경우
         $icount++;
     }
    echo("</tr>");
}
echo("</table>");
?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<?
$blocks = ceil($pages/$page_block); //전체 블록 수
$block = ceil($page/$page_block);   //현재 블록
$page_s=$page_block*($block-1);  //표시해야 할 시작페이지번호
$page_e=$page_block*$block;  //표시해야 할 마지막 페이지번호
if($blocks<=$block)$page_e=$pages;
echo("<table border='0' cellpadding='0' cellspacing='0' width='960'>
	<tr>
		<td height='40' align='center'>");
if($block>1){
	$tmp=$page_s;
	echo("<a href='product.php?menu=$menu&text1=$text1&page=$tmp'>
	<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp;");
}
for	($i=$page_s+1;$i<=$page_e;$i++){
  if($page==$i) echo("&nbsp<font color='red'><b>$i</b></font>&nbsp");
	else echo(" <a href='product.php?menu=$menu&text1=$text1&page=$i'>[$i]</a>");
}
if($block<$blocks){
	$tmp=$page_e+1;
	echo(" <a href='product.php?menu=$menu&text1=$text1&page=$tmp'>
	<img src='images/i_next.gif' align='absmiddle' border='0'>&nbsp;");
}
?>
</table>
<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

		</td>
	</tr>
</table>
<br><br>

<!-- 화면 하단 부분 시작 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->
<? include "main_bottom.php";?>
<!-- 화면 하단 부분 끝 (main_bottom) : 회사정보/회사소개/이용정보/개인보호정책 ... ---------->

&nbsp
</center>

</body>
</html>