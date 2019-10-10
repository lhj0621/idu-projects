<?
		$no=$row->no;                     
        $tel1 = trim(substr($row->tel,0,3));  
        $tel2 = trim(substr($row->tel,3,4));   
        $tel3 = trim(substr($row->tel,7,4));      
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;      
        $rank = $row->rank==0 ? "사용자" : "관리자" ;   
		$gender = $row->gender==0 ? "남자" : "여자" ;   
		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";

?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>사용자</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>사용자 정보</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="">

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
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 아이디
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<?=$row->id; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 암호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->pw; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        전화
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$tel; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
         나이
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->age; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        성별
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$gender; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        이메일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->email; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
		등급
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$rank; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 프로필 사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
             <?
				if($row->profile)
					echo("<img src='/~team5/img/$row->profile' width='200' class='img-fluid img-thumbnail'>");
				else
					echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
			?>
        </div>
    </td>
</tr>
</table>
</form>
		<div align="center">
			<a href="/~team5/admin_member/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team5/admin_member/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
