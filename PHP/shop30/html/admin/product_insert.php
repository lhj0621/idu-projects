<?
 include   "../common.php";

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
$name = addslashes($name);
$contents = addslashes($contents);

$fname1=""; //새 파일이름
if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname1=$_FILES["image1"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image1"]["tmp_name"],"../product/$fname1")) exit("업로드 실패");
}

$fname2=""; //새 파일이름
if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname2=$_FILES["image2"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image2"]["tmp_name"],"../product/$fname2")) exit("업로드 실패");
}

$fname3=""; //새 파일이름
if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname3=$_FILES["image3"]["name"];//파일이름
if(!move_uploaded_file($_FILES["image3"]["tmp_name"],"../product/$fname3")) exit("업로드 실패");
}

$query="insert into product(menu30,code30,name30,coname30,price30,opt1,opt2,contents30,status30,icon_new30,icon_hit30,icon_sale30,discount30,regday30,image1,image2,image3)
           values('$menu','$code','$name','$coname','$price','$opt1','$opt2','$contents','$status','$icon_new','$icon_hit','$icon_sale','$discount','$regday','$fname1','$fname2','$fname3');";
  $result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
  

  echo("<script>location.href='product.php'</script>");
?>