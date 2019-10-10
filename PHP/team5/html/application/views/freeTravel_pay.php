
 <link rel="stylesheet" href="/~team5/my/usercss/style2.css?ver=0">
  <link rel="stylesheet" href="/~team5/my/usercss2/vendors.css?ver=1">
<script>
function PaySel(n) 
			{
				if (n == 1) {
					form2.card1.disabled = true;
					form2.card2.disabled = true;
					form2.card3.disabled = true;
					form2.card4.disabled = true;
					form2.cardselect.disabled = true;
					form2.expire_year.disabled = true;
					form2.expire_month.disabled = true;
					form2.cvc.disabled = true;
					form2.muselect.disabled = false;
					
				}
				else {
					form2.card1.disabled = false;
					form2.card2.disabled = false;
					form2.card3.disabled = false;
					form2.card4.disabled = false;
					form2.cardselect.disabled = false;
					form2.expire_year.disabled = false;
					form2.expire_month.disabled = false;
					form2.cvc.disabled = false;
					form2.muselect.disabled = true;
				}
			}
</script>
<script>
function ckpay() {
		var chpay1 = form2.pay_method.value;
		if(chpay1==0){
			$("div[name=bankbook]").hide();
			$("div[name=card]").show();
		}	
		else{
			$("div[name=bankbook]").show();
			$("div[name=card]").hide();
		}
}

			function Check_Value() 
			{
				if(confirm("정말 예약하시겠습니까?") == true)
				{
					if(form2.pay_method.value == 0)
					{
						if (!form2.card1.value) 
						{
						alert("카드번호를 입력하세요.");	form2.card1.focus();	return;
						}
						if (!form2.card2.value) 
						{
						alert("카드번호를 입력하세요.");	form2.card2.focus();	return;
						}
						if (!form2.card3.value) 
						{
						alert("카드번호를 입력하세요.");	form2.card3.focus();	return;
						}
						if (!form2.card4.value) 
						{
						alert("카드번호를 입력하세요.");	form2.card4.focus();	return;
						}
						if (!form2.expire_month.value) 
						{
						alert("만료월을 입력하세요.");	form2.expire_month.focus();	return;
						}
						if (!form2.expire_year.value) 
						{
						alert("만료 년도를 입력하세요.");	form2.expire_year.focus();	return;
						}
						if (!form2.cvc.value) 
						{
						alert("보안코드를 입력하세요.");	form2.cvc.focus();	return;
						}
					}
					document.getElementById('payadd').submit();

				}
					
				else
				{
					return;
				}
			}
			
</script>
	<section id="hero_2">
		<div class="intro_title">
			<h1>예약</h1>
			<div class="bs-wizard row">

				<div class="col-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">선택한 상품 확인</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="cart.html" class="bs-wizard-dot"></a>
				</div>

				<div class="col-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">결제</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
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

		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8 add_bottom_15">
				<form name="form2" method="post" action="/~team5/freeTravel/payadd" id="payadd">
					<div class="form_title">
						<h3><strong>1</strong>회원 정보</h3>
						<p>
							로그인된 회원의 정보를 불러옵니다
						</p>
					</div>
					<div class="step">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>예약자명</label>
									<input type="text" class="form-control" id="firstname_booking" name="firstname_booking" value="<?=$member->name?>" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>예약자 ID</label>
									<input type="text" class="form-control" id="lastname_booking" name="lastname_booking" value="<?=$member->id?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>E-Mail</label>
									<input type="email" id="email_booking" name="email_booking" class="form-control" value="<?=$member->email?>" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>휴대폰 번호</label>
									<input type="email" id="email_booking_2" name="email_booking_2" class="form-control" value="<?=$member->tel?>" readonly>
								</div>
							</div>
						</div>

					</div>
					<!--End step -->
					
					<div class="form_title">
						<h3><strong>2</strong>결제 정보</h3>
						<p>
							<input type="radio" name="pay_method" value="0"  oninput="ckpay()" onclick="javascript:PaySel(0);" checked>카드 &nbsp;
							<input type="radio" name="pay_method" value="1"  oninput="ckpay()" onclick="javascript:PaySel(1);">무통장
						</p>
					</div>
					<div class="step">
				<div name="card">
					<div class="row">
						<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label>카드종류</label>
							<select class="custom-select" name="cardselect" >
							  <option >카드선택</option>
							  <option value="1" selected>신한카드</option>
							  <option value="2">BC카드</option>
							  <option value="3">KB국민카드</option>
							  <option value="4">우리카드</option>
							  <option value="5">카카오뱅크</option>
							</select>
						</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-sm-12">
								<div class="form-group">
									<label>카드번호 ※-없이 입력</label><br>
									<td class="form-control">
									<input type="text" name="card1" size="3" value="" class="form-control-sm" maxlength="4" required> -
									<input type="text" name="card2" size="4" value="" class="form-control-sm" maxlength="4" required> -
									<input type="text" name="card3" size="4" value="" class="form-control-sm" maxlength="4" required> -
									<input type="text" name="card4" size="4" value="" class="form-control-sm" maxlength="4" required> 
						 </td>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>만료일</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" id="expire_month" name="expire_month" value="" class="form-control" placeholder="월" maxlength="2" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" id="expire_year" name="expire_year" value="" class="form-control" placeholder="년도" maxlength="2" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>보안코드</label>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<input type="text" id="cvc" name="cvc" value="" class="form-control" placeholder="CVC" maxlength="3" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						<!--End row -->
					
						
						<hr>

						
					<div class="row" name ="bankbook">
				
						<div class="col-md-6 col-sm-12">

						<div class="form-group">
								<h4>무통장입금</h4>
							<label>계좌 선택</label>
							<select class="custom-select" name="muselect" disabled>
							  <option >입금할 계좌</option>
							  <option value="1" selected>신한 110-548-7845321</option>
							  <option value="2">우리 115-742-123678</option>
							  <option value="3">국민 113-451-000054</option>
							</select>
						</div>
						</div>
						</div>

					</div>
					<!--End step -->

					
					<!--End step -->

					
				</div>

				<aside class="col-lg-4">
					<div class="box_style_1">
						<h3 class="inner">- 요약 -</h3>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										상품번호
									</td>
									<td class="text-right">
									<input type="hidden" name="product_no" value="<?=$productno?>">
										<?=$productno?>
									</td>
								</tr>
								<tr>
									<td>
										출발일
									</td>
									<td class="text-right">
										<?=$checkin?>
										<input type="hidden" name="checkin" value="<?=$checkin?>">					
									</td>
								</tr>
								<tr>
									<td>
										도착일
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
									</td>
								</tr>
								<tr>
									<td>
										어린이
									</td>
									<td class="text-right">
										<?=$Child?>
									</td>
								</tr>
								<tr>
									<td>
										상품합계
									</td>
									<td class="text-right">
										<?=number_format($totalProduct)?>
									</td>
								</tr>
								<tr>
									<td>
										옵션합계
									</td>
									<td class="text-right">
										<?=($realTotal)?>
									</td>
								</tr>
								<tr class="total">
									<td>
										총 합계
									</td>
									<td class="text-right">
										<?=$totalPrice?>
										<input type="hidden" name="total_price" value="<?=$formtotal?>">
									</td>
								</tr>
							</tbody>
						</table> 
						<input type="button" value="결제하기" class="btn_full" onclick="Check_Value();">
						<input type="submit" onclick="history.back()" value="뒤로가기" class="btn_full_outline">
					</div>
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
						</form>
				</aside>

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
	<!-- End main -->

