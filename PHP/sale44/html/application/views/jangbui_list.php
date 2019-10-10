
<div class="alert mycolor1 mymargin5" role="alert">매입장</div>
<script>
	function find_text()
	{
		form1.action="/~sale44/jangbui/lists/text1/"+form1.text.value+"/page";
		form1.submit();
	}

	$(function(){	 
		$('#text1') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$("#text1").on("dp.change",function(e){
			find_text();
		});
	});
</script>
  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
		<div class="row">
			<div class="col-3" align="left">
				<div class="input-group input-group-sm date table-sm" id="text1">
					<div class="input-group-prepend">
						<span class="input-group-text">날짜</span>
					</div>
					<input type="text" name="text" value="<?=$text1;?>" class="form-control" placeholder="찾을 이름은?" onKeydown="if(event.keyCode == 13){find_text();}">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
						</div>
				</div>
			</div>
<?
	$tmp = $text1 ? "/text1/$text1" : "";   
?>
     
        <div class="col-9" align="right">           
             <a href="/~sale44/statusl/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

    <tr class="mycolor2 mymargin5">
        <td width="5%">번호</td>
        <td width="15%">날짜</td>
		<td width="30%">제품명</td>
		<td width="15%">단가</td>
		<td width="10%">수량</td>
        <td width="15%">금액</td>
        <td width="10%">비고</td>
    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no44;                     
?>
<tr>
    <td><?=$no; ?></td>
    <td><?=$row->writeday44; ?></td>
    <td align="left"><a href="/~sale44/statusl/view/no/<?=$no ?><?=$tmp;?>"><?=$row->product_name; ?></a></td>
	<td align="right"><?=number_format($row->price44) ?></td>
	<td align="right"><?=number_format($row->numi44) ?></td>
	<td align="right"><?=number_format($row->prices44) ?></td>
	<td align="right"><?=$row->bigo44 ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

