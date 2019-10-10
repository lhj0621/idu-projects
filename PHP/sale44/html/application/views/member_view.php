<?
		$no=$row->no44;                     
        $tel1 = trim(substr($row->tel44,0,3));  
        $tel2 = trim(substr($row->tel44,3,4));   
        $tel3 = trim(substr($row->tel44,7,4));      
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;      
        $rank = $row->rank44==0 ? "직원" : "관리자" ;   

		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";

?>
<br>
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>
<form name="form1" method="post">

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$no; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 이름
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 아이디
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->uid44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 암호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->pwd44; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 전화
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$tel; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
<font color="red">*</font> 등급
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$rank; ?>
        </div>
    </td>
</tr>
</table>
</form>
		<div align="center">
			<a href="/~sale44/member/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~sale44/member/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
