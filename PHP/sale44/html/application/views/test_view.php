<?
   $no=$row->no44;                     
        $phone1 = trim(substr($row->phone44,0,3));  
        $phone2 = trim(substr($row->phone44,3,4));   
        $phone3 = trim(substr($row->phone44,7,4));      
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;      
        $gubun= $row->gubun44==0 ? "소매" : "도매" ;   

		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";

?>
<br>
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>
<form name="form1" method="post">

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
    <td width="80%" align="left"><?=$no; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 거래처명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->coname44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 전화
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$phone; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 소메/도매
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$gubun; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 창립일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
        <?=$row->startday44; ?>   
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red">*</font> 주소
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<?=$row->address44; ?>
        </div>
    </td>
</tr>
</table>
</form>
		<div align="center">
			<a href="/~sale44/test/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~sale44/test/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
