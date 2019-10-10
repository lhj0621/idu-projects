<?
		$no=$row->no;                     
      
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
                    <h2>사용자 추가</h2>
                    
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
        <font color="red">*</font> 투어명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 한줄소개
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->intro; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 국가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->country_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 도시
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->city_name; ?>
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 상품번호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->product_no; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 기간
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->term; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 출발일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->startday; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 도착일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->endday; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
         여행특징
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->feature; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
         추천정도
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->recommend_no; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 사진1
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?
				if($row->pic1)
					echo("<img src='/~team5/img/$row->pic1' width='200' class='img-fluid img-thumbnail'>");
				else
					echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
			?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 사진2
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
             <?
				if($row->pic2)
					echo("<img src='/~team5/img/$row->pic2' width='200' class='img-fluid img-thumbnail'>");
				else
					echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
			?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 사진3
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
             <?
				if($row->pic3)
					echo("<img src='/~team5/img/$row->pic3' width='200' class='img-fluid img-thumbnail'>");
				else
					echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
			?>
        </div>
    </td>
</tr>


</table>
</form>
		<div align="center">
			<a href="/~team5/admin_freetravel/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team5/admin_freetravel/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
