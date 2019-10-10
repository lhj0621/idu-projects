
<div class="alert mycolor1 mymargin5" role="alert">카테고리</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no44;?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 카테고리
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="name" value ="<?=$row->name44;?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("name")==true) echo form_error("name"); ?>
    </td>
</tr>
</table>

		<div align="center">	
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
</form>