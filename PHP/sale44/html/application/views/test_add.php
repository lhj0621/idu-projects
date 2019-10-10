
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 거래처명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="coname" value ="<?=set_value("coname"); ?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("coname")==true) echo form_error("coname"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 전화
    </td>
    <td width="20%" align="left">
        <div class="form-inline">
            <input  type="text" name="phone1" size="3" value ="" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="phone2" size="4" value ="" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="phone3" size="4" value ="" 
                         class="form-control from-control-sm" >
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red">*</font> 소매/도매
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="radio" name="gubun" value ="0"> 소매&nbsp;&nbsp;
			<input  type="radio" name="gubun" value ="1" checked> 도매&nbsp;
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 창립일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="startday" value ="<?=set_value("startday"); ?>" 
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("startday")==true) echo form_error("startday"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 주소
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="address" value ="<?=set_value("address"); ?>" 
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("address")==true) echo form_error("address"); ?>

    </td>
</tr>
</table>

		<div align="center">	
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
</form>