<?
include   "../common.php";
    $no=$_REQUEST[no];
	$state=$_REQUEST[state];

  $query="update  jumun set state30=$state where no30='$no';";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");

 echo("<script>location.href='jumun.php?day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m& day2_d=$day2_d&sel1=$sel1&sel2=$sel2&text1=$text1&page=$page'</script>");
 
 
 ?>