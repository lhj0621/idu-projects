<?

$newfilename="new.txt"; //새 파일이름
if ($_FILES["filename"]["error"]==0)      // 선택한 파일이 있는지 조사
{
$fname=$_FILES["filename"]["name"];//파일이름
$fsize=$_FILES["filename"]["size"];//파일크기
if(file_exists("product/$newfilename")) exit("동일한 파일이 있음");
if(!move_uploaded_file($_FILES["filename"]["tmp_name"],"product/$newfilename")) exit("업로드 실패");
echo("파일이름 : $newfilename<br> 파일크기 : $fsize");
}
?>