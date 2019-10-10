<?
include   "../common.php";
  
$no=$_REQUEST[no];
$menu=$_REQUEST[menu];
$code=$_REQUEST[code];
$name=$_REQUEST[name];
$coname=$_REQUEST[coname];
$price=$_REQUEST[price];
$opt1=$_REQUEST[opt1];
$opt2=$_REQUEST[opt2];
$contents=$_REQUEST[contents];
$status=$_REQUEST[status];
$icon_new=$_REQUEST[icon_new];
$icon_hit=$_REQUEST[icon_hit];
$icon_sale=$_REQUEST[icon_sale];
$discount=$_REQUEST[discount];
$regday = sprintf("%04d-%02d-%02d", $_REQUEST[regday1], $_REQUEST[regday2], $_REQUEST[regday3]);
$image1=$_REQUEST[image1];
$image2=$_REQUEST[image2];
$image3=$_REQUEST[image3];
if (!$icon_new)   $icon_new=0;   else   $icon_new=1;
if (!$icon_hit)   $icon_hit=0;   else   $icon_hit=1;
if (!$icon_sale)  $icon_sale=0;  else   $icon_sale=1;
if (!$icon_sale) $discount=0;
$imagename1=$_REQUEST[imagename1];
$imagename2=$_REQUEST[imagename2];
$imagename3=$_REQUEST[imagename3];

$checkno1=$_REQUEST[checkno1];
$checkno2=$_REQUEST[checkno2];
$checkno3=$_REQUEST[checkno3];

$sel1=$_REQUEST[sel1];
$sel2=$_REQUEST[sel2];
$sel3=$_REQUEST[sel3];
$sel4=$_REQUEST[sel4];
$test1=$_REQUEST[test1];
$page=$_REQUEST[page];

$name = addslashes($name);
$contents = addslashes($contents);

$fname1=$imagename1;
if($checkno1=="1") $fname1="";
if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname1=$_FILES["image1"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image1"]["tmp_name"],"../product/$fname1")) exit("업로드 실패");
}

$fname2=$imagename2; //새 파일이름
if($checkno2=="1") $fname2="";
if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname2=$_FILES["image2"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image2"]["tmp_name"],"../product/$fname2")) exit("업로드 실패");
}

$fname3=$imagename3; //새 파일이름
if($checkno3=="1") $fname3="";
if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname3=$_FILES["image3"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image3"]["tmp_name"],"../product/$fname3")) exit("업로드 실패");
}

 $query="update product set menu30='$menu',code30='$code',name30='$name',coname30='$coname',price30='$price',opt1='$opt1',opt2='$opt2',contents30='$contents',status30='$status',regday30='$regday',icon_new30='$icon_new',icon_hit30='$icon_hit',icon_sale30='$icon_sale',discount30='$discount',image1='$fname1',image2='$fname2',image3='$fname3' where no30=$no;";

  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
	

   echo("<script>location.href='product.php?&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");


?>