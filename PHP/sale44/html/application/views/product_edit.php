
<div class="alert mycolor1 mymargin5" role="alert">제품</div>

<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle"><font color="red">*</font> 구분명</td>
    <td width="80%" align="left">
        <div class="form-inline">
  			<select name="gubun_no" class="form-control from-control-sm" >
				<option value="">선택하세요.</option>
<?
	$gubun_no=set_value("gubun_no");
	foreach($list as $row1)
	{
		if($row->gubun_no44==$row1->no44)
			echo("<option value='$row1->no44' selected> $row1->name44</option>");
		else
			echo("<option value='$row1->no44' > $row1->name44</option>");
	}
?>
			</select>
        </div>
		<? If (form_error("gubun_no")==true) echo form_error("gubun_no"); ?>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 이름
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="name" value ="<?=$row->name44;?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("name")==true) echo form_error("name"); ?>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 단가
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
    <td width="20%" class="info mycolor2" style="vertical-align:middle">재고
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="jaego" value ="<?=$row->jaego44;?>" class="form-control from-control-sm" >
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
        echo("<img src='/~sale44/product_img/$row->pic44' width='200' class='img-fluid img-thumbnail'>");
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