
<div class="alert mycolor1 mymargin5" role="alert">대여/반납</div>
<script>
	$(function(){
		$('#writeday') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$("#writeday").on("dp.change",function(e){
			find_text();
		});
	});
	function find_book()
	{
	window.open("/~sale44/findbook/", "", "resizable=yes, scrollbars=yes, width=600, height=600");
	}
	function find_person()
	{
	window.open("/~sale44/findperson/", "", "resizable=yes, scrollbars=yes, width=600, height=600");
	}

</script>
<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle"> <font color="red"></font> 날짜</td>
    <td width="80%" align="left">
        <div class="form-inline">
			<div class="input-group input-group-sm date" id="writeday">
            <input  type="text" name="writeday" value ="<?=set_value("writeday")?>" class="form-control from-control-sm" >
			<div class="input-group-append">
				<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>
			</div>
        </div>
<? If (form_error("writeday")==true) echo form_error("writeday"); ?>
	</td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 제목
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<input type='hidden' name='book_no' value = "<?=set_value("book_no");?>">
			<input type="text" name="book_title" value="" class="form-control form-control-sm" disabled>
			<input type="button" value="찾기" onClick="find_book();" class="form-control btn btn-sm mycolor1">
        </div>
		<? If (form_error("book_no")==true) echo form_error("book_no"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 사용자명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<input type='hidden' name='person_no' value = "<?=set_value("person_no");?>">
			<input type="text" name="person_name" value="" class="form-control form-control-sm" disabled>
			<input type="button" value="사용자찾기" onClick="find_person();" class="form-control btn btn-sm mycolor1">
        </div>
		<? If (form_error("person_no")==true) echo form_error("person_no"); ?>
    </td>
</tr>

</table>

		<div align="center">	
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
</form>