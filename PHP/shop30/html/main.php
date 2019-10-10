<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	

<?

include   "common.php";
$query="select * from product where icon_new30=1 and status30=1 order by rand() limit 15;";
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.cycle2.js"></script>
<style type="text/css">
#wrapper {
    width:100%;
    margin : 0 auto ;#000;
}
</style>
<div class="cycle-slideshow"  id="wrapper" 
    cycle-slideshow data-cycle-loader="wait"
    data-cycle-timeout=1000
>
    <img src="images/temp_1.PNG" width="100%" height="400" >
    <img src="images/temp_2.PNG" width="100%" height="400">
	<img src="images/temp_3.PNG" width="100%" height="400">
	<img src="images/temp_4.PNG" width="100%" height="400">
</div>

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

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/main_newproduct.gif"  height="40">
					</td>
				</tr>
			</table>
<?
$num_col=5;   
$num_row=3;                   // column수, row수
$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
$count=mysqli_num_rows($result);           // 출력할 제품 개수
$icount=0;       // 출력한 제품개수 카운터
echo("<table border='0' cellpadding='0' cellspacing='0'>");
for ($ir=0; $ir<$num_row; $ir++)
{
     echo("<tr>");
     for ($ic=0;  $ic<$num_col;  $ic++)
    {
         if ($icount < $count)
        {
             $row=mysqli_fetch_array($result);
             echo("<td> 
			        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='cmfont'  height=''>
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no30]'><img src='product/$row[image1]' width='192' height='210' border='0' hspace='15'  ></a>
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
				echo("<tr><td height='20' align='center' ><b>$row[price30] 원</b></td></tr>");
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
			

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

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