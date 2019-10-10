<?
		$no=$row->no;                     
		
		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";

?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>나라</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>나라 정보 보기</h2>
                    
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
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red"></font> 국가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red"></font> 영어 이름
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->english_name; ?>
        </div>
    </td>
</tr>
</table>
</form>
		<div align="center">
			<a href="/~team5/admin_country/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team5/admin_country/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
