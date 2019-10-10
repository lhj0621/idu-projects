<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!------ Include the above in your HEAD tag ---------->
						 <?
						  if($row->type == 0){
							  $type="자유여행";
						  }
						  else if($row->type ==1){
							  $type="패키지";
						  }
						  else if($row->type ==3){
							  $type="호텔";
						  }

						   if($row->pay_type == 0){
							  $pay_type="카드결제";
						  }
						  else if($row->pay_type ==1){
							  $pay_type="무통장";
						  }
						  if($row->status == 0){
							  $status="미확인";
						  }
						  else if($row->status ==1){
							  $status="확인";
						  }
							?>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><i class="fab fa-apple">&nbsp</i>AppleTour</strong>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
					<p>
						</em>상품번호: <?=$row->product_no?>
						</p>
                    <p>
                        <em>결제일: <?=$row->payday?></em>
                    </p>
					                    <p>
                        <em>예약자명: <?=$row->member_name?></em>
                    </p>
					                    </p>
										<? if ($row->type == 3) { ?>
					 <p>
                        <em>체크인: <?=$row->checkin?></em>
                    </p>
					                    </p>
					                    <p>
                        <em>체크아웃: <?=$row->checkout?></em>
                    </p>
					<? } 
					 else if ($row->type == 0) { ?>
					 <p>
                        <em>출발일: <?=$row->checkin?></em>
                    </p>
					                    </p>
					                    <p>
                        <em>도착일: <?=$row->checkout?></em>
                    </p>
					<? } 
					else if ($row->type == 1) { ?>
										 <p>
                        <em>출발일: <?=$row->checkin?></em>
                    </p>
					                    </p>
					                    <p>
                        <em>도착일: <?=$row->checkout?></em>
                    </p>
					<? }?>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>결제정보</h1>
					<br><br><br>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>상품명</th>
                            <th>상품 유형</th>
							 <th>결제방식</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
							 <? 
								if ($row->type == 0) {
								  echo($row->product_name);
								  }
								  else if ($row->type == 1) {

										echo ($row->product_name2);

								 }

									else if ($row->type == 3) {
										echo ($row->product_name3);
								 }
						  ?>

							</td>
                            <td><?=$type?></td>
							<td><?=$pay_type?></td>
                           
                        </tr>
						

						<tr>
                            <td><h4><strong>합계:</strong></h4></td>
							<td></td>
                            <td><h4><strong><?=number_format($row->price)?>원</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
				<? if($row->bankbook == 1) {
						$bankbook = "신한 110-548-7845321";
					}
					else if ($row->bankbook == 2) {
						$bankbook = "우리 115-742-123678";
					}
					else if ($row->bankbook == 3) {
						$bankbook = "국민 113-451-000054";
					}
				
				if ($row->pay_type == 0)
						{ 
						?>
						<p align="right"><strong> 카드번호 : <?=$row->card_no?></strong></p>
							<? } ?>
				<p align="center">
				<? if ($row->pay_type == 1 && $row->status == 0) {?> 
				※아직 입금이 완료되지 않았거나 관리자가 확인하지 않은 상태입니다.<br>
				아직 입금을 하지 않으셨다면 결제시 선택한 계좌인<br> 
				<?=$bankbook?>으로 입금후 연락해 주시기 바랍니다.


				</p>

				<? }
				 else if ($row->status == 0) {?> 
				※관리자가 확인하지 않은 상태입니다.
				<? } ?></p>
                <button type="button" class="btn btn-danger btn-lg btn-block" onclick=" window.close();">
                    닫기<span class="glyphicon"></span>
                </button></td>
            </div>
        </div>
    </div>

