
<div class="alert mycolor1 mymargin5" role="alert">대여/반납</div>
<script>
	function find_text()
	{
		form1.action="/~sale44/statusl/lists/text1/"+form1.text1.value+"/text2/"+form1.text2.value+"/text3/"+form1.text3.value+"/page";
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
		$('#text2') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$("#text2").on("dp.change",function(e){
			find_text();
		});
	});
</script>
  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
		<div class="row">
			<div class="col-4" align="left">
			  <div class="form-inline">
				<div class="input-group input-group-sm date table-sm" id="text1">
					<div class="input-group-prepend">
						<span class="input-group-text">날짜</span>
					</div>
					<input type="text" name="text1" value="<?=$text1;?>" class="form-control" size="9" onKeydown="if(event.keyCode == 13){find_text();}">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
						</div>
					</div>
				</div>
				&nbsp;-&nbsp;
				<div class="input-group input-group-sm date table-sm" id="text2">
					<input type="text" name="text2" value="<?=$text2;?>" class="form-control" size="9" onKeydown="if(event.keyCode == 13){find_text();}">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
						</div>
					</div>
				</div>
			   </div>
			</div>
<div class="btn-group btn-group-toggle col-3" data-toggle="buttons" onchange="javascript:find_text();">
<?
if($text3 == 0){ 
?>
  <label class="btn btn btn-info active">
    <input type="radio" name="text3" value="0" autocomplete="off" checked > 전체
  </label>
  <label class="btn btn btn-info">
    <input type="radio" name="text3" value="1" autocomplete="off"> 대여 중
  </label>
  <label class="btn btn btn-info">
    <input type="radio" name="text3" value="2" autocomplete="off"> 반납 완료
  </label>
</div>
<?
}
?>
<?
if($text3=="1"){ 
?>
  <label class="btn btn btn-info ">
    <input type="radio" name="text3" value="0" autocomplete="off"  > 전체
  </label>
  <label class="btn btn btn-info active">
    <input type="radio" name="text3" value="1" autocomplete="off" checked> 대여 중
  </label>
  <label class="btn btn btn-info">
    <input type="radio" name="text3" value="2" autocomplete="off"> 반납 완료
  </label>
</div>
<?
}
?>
<?
if($text3=="2"){ 
?>
  <label class="btn btn btn-info ">
    <input type="radio" name="text3" value="0" autocomplete="off"  > 전체
  </label>
  <label class="btn btn btn-info">
    <input type="radio" name="text3" value="1" autocomplete="off" > 대여 중
  </label>
  <label class="btn btn btn-info active">
    <input type="radio" name="text3" value="2" autocomplete="off" checked> 반납 완료
  </label>
</div>
<?
}
?>
<?
	$tmp = $text1 ? "/text1/$text1" : "";   
?>
     
        <div class="col-5" align="right">           
             <a href="/~sale44/statusl/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
			 </div>
		</div>
</form>

    <tr class="mycolor2 mymargin5">
        <td width="10%">번호</td>
		<td width="30%">제목</td>
		<td width="30%">이름</td>
		<td width="20%">날짜</td>
		<td width="10%">상태</td>
    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no44; 
		$lr = $row->lr44==0 ? "대여 중": "반납 완료" ;   
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="/~sale44/statusl/view/no/<?=$no ?><?=$tmp;?>"><?=$row->book_title; ?></a></td>
	<td><?=$row->person_name ?></td>
    <td><?=$row->writeday44; ?></td>
	<td><?=$lr; ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

