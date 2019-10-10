<?
		$no=$row->no;
		$type=$row->type==0?"자유여행":"패키지";
		$pay_type=$row->pay_type==0?"카드":"무통장";
		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
		if($row->bankbook==1)
			$bankbook="신한 110-548-7845321";
		else if($row->bankbook==2)
			$bankbook="우리 115-742-123678";
		else if ($row->bankbook ==3)
			$bankbook="국민 113-451-000054";
		else
			$bankbook="";
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>예약</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>예약 정보</h2>
                    
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
        <font color="red">*</font> 상품
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->freeTravel_name; ?>
			<?=$row->product_name; ?>
			<?=$row->hotel_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 사용자
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->member_id; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 결제수단
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$pay_type; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 카드번호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->card_no; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 유효기간
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->month; ?>/<?=$row->year;?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> CVC
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->cvc; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 무통장 입금 은행
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$bankbook ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 결제일
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->payday; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 금액
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=number_format($row->price); ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 승인여부
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?
				if($row->status==0){
			?>
				&nbsp 미확인
                <input type="radio" class="flat" name="status" value="0" checked /> 확인
                <input type="radio" class="flat" name="status" value="1" />
			<?}else{?>
				&nbsp 미확인
                <input type="radio" class="flat" name="status" value="0" /> 확인
                <input type="radio" class="flat" name="status" value="1" checked/>
			<?}?>
        </div>
    </td>
</tr>
</table>
<div aligh="center">
	<input type="submit" value="저장" class="btn">
</div>
</form>
		<div align="center">
			<a href="/~team5/admin_yeyag/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
