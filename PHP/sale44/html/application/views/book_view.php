<?
		$no=$row->no44;                     
        $status = $row->status44==0 ? "대여가능" : "대여불가" ;   
		$tmp = $text1 ? "/no/$no/text1/$text1" : "/no/$no";
?>
<br>
<div class="alert mycolor1 mymargin5" role="alert">제품</div>
<form name="form1" method="post">

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$no; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 분야
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->category_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 제목
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->title44; ?>
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 작가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->author44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 출판사
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->publisher44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red"></font> 단가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->price44; ?>
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red"></font> 상태
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$status; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<b>파일이름</b> : <?=$row->pic44; ?> <br>
        </div>

<?
    if ($row->pic44)     // 이미지가 있는 경우
        echo("<img src='/~sale44/book_img/$row->pic44' width='200’ class='img-fluid img-thumbnail'>");
    else                   // 이미지가 없는 경우
        echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
?>

    </td>
</tr>

</table>
</form>
		<div align="center">
			<a href="/~sale44/book/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~sale44/book/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>