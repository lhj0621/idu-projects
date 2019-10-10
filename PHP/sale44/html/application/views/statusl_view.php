<?
		$no=$row->no44;                     

		$tmp = $text1 ? "/no/$no/text1/$text1" : "/no/$no";
?>
<br>
<div class="alert mycolor1 mymargin5" role="alert">대여 확인</div>
<form name="form1" method="post" >

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$no; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 날짜
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->writeday44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 제목
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->book_title; ?>
   
		<input type='hidden' name='book_no' value ="<?=$row->book_no44; ?>" class="form-control">
		</div>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">빌린 사람</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->person_name; ?>
        </div>
    </td>
</tr>

</table>
</form>
		<div align="center">
		<?
			if($row->lr44 == 0){
		?>
			<a href="/~sale44/statusl/ret<?=$tmp; ?>" class="btn btn-sm mycolor1">반납</a>
		<?
		}
		?>
			<a href="/~sale44/statusl/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
</div>