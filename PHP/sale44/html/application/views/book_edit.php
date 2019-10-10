
<div class="alert mycolor1 mymargin5" role="alert">제품</div>

<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle"><font color="red"></font> 카테고리명</td>
    <td width="80%" align="left">
        <div class="form-inline">
  			<select name="category_no" class="form-control from-control-sm" >
				<option value="">선택하세요.</option>
<?
	$category_no=set_value("category_no");
	foreach($list as $row1)
	{
		if($row->category_no44==$row1->no44)
			echo("<option value='$row1->no44' selected> $row1->name44</option>");
		else
			echo("<option value='$row1->no44' > $row1->name44</option>");
	}
?>
			</select>
        </div>
		<? If (form_error("category_no")==true) echo form_error("category_no"); ?>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 제목
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="title" value ="<?=$row->title44;?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("title")==true) echo form_error("title"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 작가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="author" value ="<?=$row->author44;?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("author")==true) echo form_error("author"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 출판사
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="publisher" value ="<?=$row->publisher44;?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("publisher")==true) echo form_error("publisher"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 단가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="price" value ="<?=$row->price44;?>" 
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("price")==true) echo form_error("price"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red"></font> 상태
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<?if($row->status44==0) { ?>
            <input  type="radio" name="status" value ="0"checked> 대여가능&nbsp;&nbsp;
			<input  type="radio" name="status" value ="1" > 대여불가&nbsp;
		<?}else{?>
			 <input  type="radio" name="status" value ="0"> 대여가능&nbsp;&nbsp;
			<input  type="radio" name="status" value ="1" checked> 대여불가&nbsp;
		<?}?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
				<b>파일이름</b> : <?=$row->pic44 ?>
	<input  type="file" name="pic" value ="" size="20" class="form-control from-control-sm" >

</div>
<?
    if ($row->pic44)     // 이미지가 있는 경우
        echo("<img src='/~sale44/book_img/$row->pic44' width='200' class='img-fluid img-thumbnail'>");
    else                   // 이미지가 없는 경우
        echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
?>

       
    </td>
</tr>
</table>

		<div align="center">	
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
</form>