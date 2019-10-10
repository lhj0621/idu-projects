
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no44;?></td>
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
        <font color="red">*</font> 아이디
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="uid" value ="<?=$row->uid44;?>" 
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("uid")==true) echo form_error("uid"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 암호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="pwd" value ="<?=$row->pwd44;?>" 
                         class="form-control from-control-sm" >
        </div>
		<? If (form_error("pwd")==true) echo form_error("pwd"); ?>

    </td>
</tr>
<?
        $tel1 = trim(substr($row->tel44,0,3));  
        $tel2 = trim(substr($row->tel44,3,4));   
        $tel3 = trim(substr($row->tel44,7,4)); 
?>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 전화
    </td>
    <td width="20%" align="left">
        <div class="form-inline">
            <input  type="text" name="tel1" size="3" value ="<?=$tel1;?>" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="tel2" size="4" value ="<?=$tel2;?>" 
                         class="form-control from-control-sm" >-
			<input  type="text" name="tel3" size="4" value ="<?=$tel3;?>" 
                         class="form-control from-control-sm" >
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red">*</font> 등급
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<?if($row->rank44==0) { ?>
            <input  type="radio" name="rank" value ="0"checked> 직원&nbsp;&nbsp;
			<input  type="radio" name="rank" value ="1" > 관리자&nbsp;
		<?}else{?>
			 <input  type="radio" name="rank" value ="0"> 직원&nbsp;&nbsp;
			<input  type="radio" name="rank" value ="1" checked> 관리자&nbsp;
		<?}?>
        </div>
    </td>
</tr>
</table>

		<div align="center">	
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
</form>