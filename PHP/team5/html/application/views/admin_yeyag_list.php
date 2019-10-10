
<div class="alert mycolor1 mymargin5" role="alert">예약</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~team5/admin_yeyag/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~team5/admin_yeyag/lists/text1/" + form1.text1.value;
		form1.submit();
    }
</script>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>예약</h3>
              </div>
			<form name="form1" action="" method="post">

		</div>
 
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
?>
   <!------- <div class="col-8" align="right">           
             <a href="/~team5/admin_yeyag/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
				</div>
			 </div>
	---->
</form>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>예약 테이블 <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <!--li><a href="/~team5/admin_yeyag/add<?=$tmp;?>">추가</a>
                      </li-->
                    </ul>
                    <div class="clearfix"></div>
                  
				  </div>
<div class="x_content">
<table class="table table-striped">
<thead>
    <tr>
        <th>번호</th>
		<th>상품</th>
		<th>분류</th>
		<th>사용자</th>
		<th>결제수단</th>
		<th>카드번호</th>
		<th>유효기간</th>
		<th>cvc</th>
		<th>무통장</th>
		<th>결제일</th>
		<th>금액</th>
		<th>승인여부</th>
    </tr>
</thead>
<tbody>
<?
    foreach ($list as $row)
    {
        $no=$row->no;
		$status=$row->status == 0 ? "미확인" : "확인";
		if($row->type==0)
			$type="자유여행";
		else if($row->type==1)
			$type="패키지";
		else if($row->type==3)
			$type="호텔";
		$pay_type=$row->pay_type==0?"카드":"무통장";
		if($row->bankbook==1)
			$bankbook="신한 110-548-7845321";
		else if($row->bankbook==2)
			$bankbook="우리 115-742-123678";
		else if ($row->bankbook ==3)
			$bankbook="국민 113-451-000054";
		else
			$bankbook="";
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="/~team5/admin_yeyag/view/no/<?=$no ?><?=$tmp;?>"><?=$row->freeTravel_name; ?></a>
		<a href="/~team5/admin_yeyag/view/no/<?=$no ?><?=$tmp;?>"><?=$row->product_name; ?></a>
		<a href="/~team5/admin_yeyag/view/no/<?=$no ?><?=$tmp;?>"><?=$row->hotel_name; ?></a>
	</td>
	<td><?=$type?></td>
	<td><?=$row->member_id; ?></td>
	<td><?=$pay_type?></td>
	<td><?=$row->card_no?></td>
	<td><?=$row->month?>/<?=$row->year?></td>
	<td><?=$row->cvc?></td>
	<td><?=$bankbook?></td>
	<td><?=$row->payday?></td>
	<td><?=number_format($row->price)?></td>
	<td><?=$status; ?></td>
</tr>
<?
    }
?>
</tbody>
</table>

<?=$pagination; ?>

