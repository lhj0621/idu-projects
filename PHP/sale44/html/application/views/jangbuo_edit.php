
<div class="alert mycolor1 mymargin5" role="alert">매출장</div>
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
	function select_product()
		{
			var str;
			str = form1.sel_product_no.value;
			if ( str == "")
			{
				form1.product_no.value = "";
				form1.price.value = "";
				form1.prices.value = "";
			}
			else
			{
				str = str.split("^^");
				form1.product_no.value = str[0];
				form1.price.value = str[1];
				form1.prices.value=Number(form1.price.value) * Number(form1.numo.value);
			}
		}

	function cal_prices()
		{
			form1.prices.value=Number(form1.price.value) * Number(form1.numo.value);
			form1.bigo.focus();
		}
	function find_product()
	{
	window.open("/~sale44/findproduct/", "", "resizable=yes, scrollbars=yes, width=500, height=600");
	}
</script>
<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no44; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle"><font color="red">*</font>날짜</td>
    <td width="80%" align="left">
        <div class="form-inline">
			<div class="input-group input-group-sm date" id="writeday">
            <input  type="text" name="writeday" value ="<?=$row->writeday44;?>"  
                         class="form-control from-control-sm" >
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
        <font color="red">*</font> 제품명
    </td>
    <td width="80%" align="left">
                <div class="form-inline">
			<input type='hidden' name='product_no' value = "<?=set_value("product_no");?>">
			<input type="text" name="product_name" value="" class="form-control form-control-sm" disabled>
			<input type="button" value="제품찾기" onClick="find_product();" class="form-control btn btn-sm mycolor1">

        </div>
		<? If (form_error("product_no")==true) echo form_error("product_no"); ?>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">단가</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="price" value ="<?=$row->price44;?>" 
                         class="form-control from-control-sm" onChange='cal_prices();' >
        </div>
		<? If (form_error("price")==true) echo form_error("price"); ?>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">수량
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="numo" value ="<?=$row->numo44;?>" class="form-control from-control-sm" onChange='cal_prices();'>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">금액
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="prices" value ="<?=$row->prices44;?>" class="form-control from-control-sm" readonly style="border:0" >
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">비고
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="bigo" value ="<?=$row->bigo44;?>" class="form-control from-control-sm" >
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