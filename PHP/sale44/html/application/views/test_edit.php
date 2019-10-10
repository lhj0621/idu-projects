
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no44;?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 거래처명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="coname" value ="<?=$row->coname44; ?>"  
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("coname")==true) echo form_error("coname"); ?>
    </td>
</tr>
<?
        $phone1 = trim(substr($row->phone44,0,3));  
        $phone2 = trim(substr($row->phone44,3,4));   
        $phone3 = trim(substr($row->phone44,7,4)); 
?>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 전화
    </td>
    <td width="20%" align="left">
        <div class="form-inline">
            <input  type="text" name="phone1" size="3" value ="<?=$phone1;?>" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="phone2" size="4" value ="<?=$phone2;?>" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="phone3" size="4" value ="<?=$phone3;?>" 
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
          <?if($row->gubun44==0) { ?>
            <input  type="radio" name="gubun" value ="0"checked> 소매&nbsp;&nbsp;
			<input  type="radio" name="gubun" value ="1" > 도매&nbsp;
		<?}else{?>
			 <input  type="radio" name="gubun" value ="0"> 소매&nbsp;&nbsp;
			<input  type="radio" name="gubun" value ="1" checked> 도매&nbsp;
		<?}?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 창립일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="startday" value ="<?=$row->startday44; ?>" 
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
            <input  type="text" name="address" value ="<?=$row->address44; ?>" 
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