 <link rel="stylesheet" href="/~team5/my/usercss/style2.css?ver=0">
  <link rel="stylesheet" href="/~team5/my/usercss2/vendors.css?ver=1">
 <script type="text/javascript">
 function addComma(num) {
  var regexp = /\B(?=(\d{3})+(?!\d))/g;
  return num.toString().replace(regexp, ',');
}
function uncomma(str) {
    str = String(str);
    return str.replace(/[^\d]+/g, '');
}
 function count1(checkboxElem) {

				if (checkboxElem.checked)
				{
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_1.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_1.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_1.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_1.value));
				}
					
	}

function count2(checkboxElem) {
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_2.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_2.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_2.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_2.value));
				}
					
	}
	function count3(checkboxElem) {
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_3.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_3.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_3.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_3.value));
				}
					
	}
	function count4(checkboxElem) {
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_4.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_4.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_4.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_4.value));
				}
					
	}
	function count5(checkboxElem) {
		
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_5.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_5.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_5.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_5.value));
				}
					
	}
	function count6(checkboxElem) {
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_6.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_6.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_6.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_6.value));
				}
					
	}
	function count7(checkboxElem) {
				if (checkboxElem.checked)
				{
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) + Number(form1.option_7.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) + Number(form1.option_7.value));
				}
				else {
					form2.totalp.value=uncomma(form2.totalp.value);
					form2.totals.value=uncomma(form2.totals.value);
					form2.totalp.value=addComma(Number(form2.totalp.value) - Number(form1.option_7.value)) + " 원";
					form2.totals.value=addComma(Number(form2.totals.value) - Number(form1.option_7.value));
				}
					
	}
</script>

                   

	<section id="hero_2">
		<div class="intro_title">
			<h1>예약</h1>
			<div class="bs-wizard row">

				<div class="col-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">선택한 상품 확인</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="cart.html" class="bs-wizard-dot"></a>
				</div>

				<div class="col-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">결제</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="payment.html" class="bs-wizard-dot"></a>
				</div>

				<div class="col-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">예약 완료</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="confirmation.html" class="bs-wizard-dot"></a>
				</div>

			</div>
			<!-- End bs-wizard -->
		</div>
		<!-- End intro-title -->
	</section>
	<!-- End Section hero_2 -->

	<main>
		
		<!-- End position -->
<? foreach($row as $row2){}?>
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8">
					<h3>선택한 상품</h3>
					<table class="table table-striped cart-list add_bottom_30">
						<thead>
							<tr>
								<th>
									이미지
								</th>
								<th>
									상품명
								</th>
								<th>
									인원수
								</th>
								<th>
									합계
								</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									
										<img src="/~team5/img/<?=$row2->img?>" height="50" width="60">
									
									<span class="item_cart"></span>
								</td>
								<td>
									<div class="numbers-row">
										<?=$row2->name?>
									</div>
								</td>
								<td>
									어&nbsp&nbsp&nbsp&nbsp른: <?=$Adult?>명<br>어린이: <?=$Child?>명
								</td>
								<td>
									<strong><?=number_format($totalPrice)?></strong>
									
								</td>

							</tr>
							
						</tbody>
					</table>
			<form name="form1" method="post">
					<table class="table table-striped options_cart">
						<thead>
							<tr>
								<th colspan="3">서비스 / 옵션 상품</th>
						
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:10%">
									<i class="icon-mobile"></i>
								</td>
								<td style="width:60%">
									 로밍 서비스 <strong>+100,000 원</strong>
								</td>
								<td style="width:35%">
									<label class="switch-light switch-ios float-right">
									<input type="checkbox" name="option_1" id="option_1" value="100000" onChange="count1(this);" checked>
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									  </label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-26"></i>
								</td>
								<td>
									공항 픽업 서비스 <strong>+49,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_2" id="option_2" value="49000" onChange="count2(this);">
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-71"></i>
								</td>
								<td>
									안심 보험 <strong>+24,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_3" id="option_3" value="24000" onChange="count3(this);" checked>
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-15"></i>
								</td>
								<td>
									영유아 물품 <strong>+49,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_4" id="option_4" value="49000" onChange="count4(this);">
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class=" icon_set_1_icon-86"></i>
								</td>
								<td>
									와이파이 에그 <strong>+34,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_5" id="option_5" value="34000" onChange="count5(this);">
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-58"></i>
								</td>
								<td>
									호텔 식사 서비스 <strong>+149,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_6" id="option_6" value="149000" onChange="count6(this);">
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-40"></i>
								</td>
								<td>
									호텔 주변 바이크 투어 <strong>+79,000 원</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_7" id="option_7" value="79000" onChange="count7(this);">
										<span>
                    					<span>해제</span>
										<span>선택</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
						</tbody>
					</table>
					
					<div class="add_bottom_15"><small>* 인원수 상관없이 적용되는 특가상품</small>
			
			
					</div>
				</div>
				</form>
				<!-- End col -->

				<aside class="col-lg-4">
				<form name="form2" method="post" action="/~team5/hotel/pay">
				<input type="hidden" name="productno" value="<?=$productno?>">
					<div class="box_style_1">
						<h3 class="inner">- 요약 -</h3>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										체크인
									</td>
									<td class="text-right">
										<?=$checkin?>
										<input type="hidden" name="checkin" value="<?=$checkin?>">					
									</td>
								</tr>
								<tr>
									<td>
										체크아웃
									</td>
									<td class="text-right">
										<?=$checkout?>
										<input type="hidden" name="checkout" value="<?=$checkout?>">					
									</td>
								</tr>
								<tr>
									<td>
										어른
									</td>
									<td class="text-right">
										<?=$Adult?>
										<input type="hidden" name="adult" value="<?=$Adult?>">					
									</td>
								</tr>
								<tr>
									<td>
										어린이	
									</td>
									<td class="text-right">
										<?=$Child?>
										<input type="hidden" name="child" value="<?=$Child?>">
									</td>
								</tr>
								<tr>
									<td>
										상품 합계
									</td>
									<td class="text-right">
										<?=number_format($totalPrice)?>
										<input type="hidden" name="totalproduct" value="<?=$totalPrice?>">
									</td>
								</tr>
								<tr>
									<td>
										옵션 합계
									</td>
									<td class="text-right">
										<input type="text" name="totals" value="124,000" style="border:0; color:#000; text-align: right;" readonly>
									</td>
								</tr>
								<tr class="total">
									<td>
										총 합계
									</td>
									<? $totalPrice= $totalPrice + 124000;?> 									<td class="text-right">
										<input type="text" name="totalp" value="<?=number_format($totalPrice);?> 원" style="border:0; color:#DD484D; font-weight:bold; text-align: right;" readonly>
										<input type="hidden" name="totalt" value="<?=$totalPrice?>">
									</td>
								</tr>
							</tbody>
						</table>
						<input type="submit" value="결제하기" class="btn_full">
						<input type="submit" onclick="history.back()" value="뒤로가기" class="btn_full_outline">
						
					</div>
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">02 123 4567</a>
						<small>9.00am - 7.30pm</small>
					</div></form>
				</aside>
				
				<!-- End aside -->

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
	<!-- End main -->
