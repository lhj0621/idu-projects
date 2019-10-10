<?
	$num_rows=count($list3)
?>

<link rel="stylesheet" href="/~team5/my/usercss/style2.css?ver=1">
<script>
function cal_prices()
{
	form3.price3.value=Number(form3.price1.value) * Number(form3.price2.value);
}
</script>
<script type="text/javascript">
function addComma(num) {
  var regexp = /\B(?=(\d{3})+(?!\d))/g;
  return num.toString().replace(regexp, ',');
}

function dateCheck() {
	var d1 = new Date(form3.checkin.value);
	var d2 = new Date(form3.checkout.value);
	if(d2!=null) {
			if(d1<=d2) {
				$("#yeyag").prop("disabled",false);
				$("#yeyag").val("지금 예약하기");
		}
		else if(d1>d2) {
			$("#yeyag").prop("disabled",true);
			$("#yeyag").val("잘못된 날짜");
		}
	}
}

function count1() {
		var count = $("#count").val();
		var countb = $("#countb").val();
		var diff = $("#different").val();
		var price = form3.price4.value;
		var tempResult ;
		var tempResult2 ;
		var sdd = document.getElementById("checkin_date").value;
		var edd = document.getElementById("checkout_date").value;
		var ar1 = sdd.split('-');
		var ar2 = edd.split('-');
		var da1 = new Date(ar1[0], ar1[1], ar1[2]);
		var da2 = new Date(ar2[0], ar2[1], ar2[2]);
		var dif = da2 - da1;
		var cDay = 24 * 60 * 60 * 1000;// 시 * 분 * 초 * 밀리세컨

	 if(sdd && edd){

    document.getElementById('different').value = parseInt(dif/cDay)
 }
		tempResult=(price*count*diff)+(price/2*countb*diff);
		form3.price3.value=addComma(tempResult) + "원";
		form3.totalprice.value=(tempResult);

	}

	function call()
{
    var sdd = document.getElementById("checkin_date").value;
    var edd = document.getElementById("checkout_date").value;
    var ar1 = sdd.split('-');
    var ar2 = edd.split('-');
    var da1 = new Date(ar1[0], ar1[1], ar1[2]);
    var da2 = new Date(ar2[0], ar2[1], ar2[2]);
    var dif = da2 - da1;
    var cDay = 24 * 60 * 60 * 1000;// 시 * 분 * 초 * 밀리세컨

 if(sdd && edd){

    document.getElementById('different').value = parseInt(dif/cDay)
 }
}
</script>

<div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/HotelMain.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/~team5">Home</a></span> <span>Hotel</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels</h1>
			 <h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">호텔</font></h3>
          </div>
        </div>
      </div>
    </div>



		
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8" id="single_tour_desc">
					<div id="single_tour_feat">
						<ul>
							<li><i class="fas fa-hotel"></i>호텔 예약</li>
							<li><i class="fas fa-wifi"></i>무료 와이파이</li>
							<li><i class="fas fa-utensils"></i>조식 제공</li>
							<li><i class="fas fa-parking"></i>주차 가능</li>
							<li><i class="fas fa-headset"></i></i>친절상담</li>
							<li><i class="fas fa-dollar-sign"></i>온라인 최저가</li>
							<li><i class="fas fa-child"></i>어린이 50%할인</li>
						</ul>
					</div>
				<form name="form3" method="post" action="/~team5/hotel/reservation">
					<!-- Map button for tablets/mobiles -->
						<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
							<div class="carousel-item active">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->img?>" alt="First slide">

							</div>							
						  </div>
						</div>
						<h2><strong><?=$row->name?></strong></h2>
						<span class="subheading"><?=$row->country_name?>, <?=$row->city_name?></span>
					<hr>

					<div class="row">
						<div class="col-lg-2">
							<h3>호텔 설명</h3>
						</div>
						<div class="col-lg-10">
							<p>
								<?=nl2br($row->information)?>
							</p>
							
							<!-- End row  -->
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>

					<div class="row">
						<div class="col-lg-2">
							<h3>위치</h3>
						</div>							
					
					<div class="col-lg-10">
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<iframe src="<?=$row->mapurl?>" width="800" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>	
</div>
				
					<!-- End row  -->

					<hr>

					

				<div class="row">

						<div class="col-lg-3">
							<h4><strong>이용 후기(<?=$num_rows?>)</strong></h4>
							<?
							if($this->session->userdata('id'))
							{
								?>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">후기 남기기</a>
							<?
							}
							else
							{
							?>
							<a href="#exampleModal" data-toggle='modal'><div class="btn_1 add_bottom_30">로그인</div></a>
							<?
							}
							?>
						</div>

							<div class="col-lg-9">
							<? 
								foreach($list3 as $row)
								{
									
										
							?>
							
								<img src="/~team5/img/<?=$row->member_profile?>" alt="Image" class="rounded-circle" width="50" height="50">
								<font size="5"><?=$row->username?> &nbsp&nbsp

								<? if ($row->member_id == $this->session->userdata('id')) { ?>
									<a href="/~team5/hotel/delReply/no/<?=$row->no?>" onClick="return confirm('정말 삭제하시겠습니까?');">										
										<font color="red"><i class="fas fa-times"></i></font>
									</a>
								<? } ?></font>
								<br>
								<span class="subheading">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ID:  <?=$row->hotel_id?></span><br><br>
								<?
					if($row->hotel_score == 1)
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>

								</p>");
					}
					else if ($row->hotel_score == 2 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}

					else if ($row->hotel_score == 3 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->hotel_score == 4 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->hotel_score == 5 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								</p>");
					}
	?>
								<p>
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$row->hotel_reply?>
								</p>
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
										
								<?
																}
								?>
							</div>




						</div>

				</div>
				<!--End  single_tour_desc-->

				<aside class="col-lg-4">
					<div class="box_style_1 expose">
						<h3 class="inner">예약하기</h3>
						<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label><i class="far fa-calendar-check"></i> 체크인</label>
									<input type="text" id="checkin_date" class="form-control" placeholder="날짜 선택" name="checkin" onchange="dateCheck()" value="" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><i class="far fa-calendar-check"></i> 체크아웃</label>
									<input type="text" id="checkout_date" class="form-control" placeholder="날짜 선택" name="checkout" value="" onchange="javascript:dateCheck(); count1();" required>

									<input type="hidden" id="different" class="form-control" placeholder="날짜 선택" name="checkout2" value="" onchange="call()" required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>성인</label>
									<div class="numbers-row">
											<input type="text" value="1" id="count" class="qty2 form-control" name="price1" onChange='count1();'>
										<div class="inc button_inc" id="plus" onclick="plus()">+</div>
										<div class="dec button_inc" id="moins" onclick="minus()">-</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>어린이</label>
									<div class="numbers-row">
										<input type="text" value="0" id="countb" class="qty2 form-control" name="price2" onChange='count1();'>
										<div class="inc button_inc" id="plus2" onclick="plus2()">+</div>
										<div class="dec button_inc" id="moins2" onclick="minus2()">-</div>
									</div>
								</div>
							</div>

						</div>
	
						<br>
		<? foreach ($list5 as $row){ ?>
						<input type="text" name="price3" value="<?=number_format($row->price)?>원" class="form-control from-control-sm" id="result" style="border:0; font-size:20pt; color:#DD484D; font-weight:bold; text-align: center;" readonly>
						<input type="hidden" name="totalprice" value="0" class="form-control from-control-sm" id="result">
						<input type="hidden" name="price4" value="<?=$row->price?>">
						<input type="hidden" name="number" value="<?=$row->no?>">
		<? }?>
			

						<br>
					<p align="center">※전체가격 = 1박가격 * 날짜간의 차이 * 인원수 </p>

<?
							if($this->session->userdata('id'))
							{
								?>

							<input type="submit" id="yeyag" value="지금 예약하기" class="btn_full">
							<?
							}
							else
							{
							?>
							<a href="#exampleModal" data-toggle='modal'><div class="btn_full">로그인후 예약하세요</div></a>
							<?
							}
							?>

					
					</div>
					<!--/box_style_1 -->
					
					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Booked</span> by phone</h4>
						<a href="" class="phone"><font color="red">02 123 4567</font></a>
						<small>9.00am - 7.30pm</small>
					</div>
				</form>
				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
    
	</main>


	<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myReviewLabel">상품평 남기기</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
					<? foreach ($list4 as $row){ ?>
					<form method="post" action="/~team5/hotel_reply/add" name="form10" id="review_hotel">
					<input type="hidden" class="form-control" name="hotel_no" value="<?=$row->no?>">
					<? }
						foreach ($sessionname as $row2){
					?>
										<? 
									} 
					?>
						<input name="reply_name" id="hotel_name" type="hidden" value="Mariott Hotel Paris">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input name="hotel_id" id="name_review" type="text"value="<?=$row2->user_id2?>" class="form-control">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input name="reply_name" id="lastname_review" type="text" value="<?=$row2->user_name2?>" class="form-control" readonly>
								</div>
							</div>
						</div>

						<!-- End row -->
						
						<!-- End row -->
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-group">
									<label for="website">추천</label><br>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline1" name="hotel_score" class="custom-control-input" value="1">
									  <label class="custom-control-label" for="customRadioInline1">매우 비추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline2" name="hotel_score" class="custom-control-input" value="2">
									  <label class="custom-control-label" for="customRadioInline2">비추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline3" name="hotel_score" class="custom-control-input" value="3">
									  <label class="custom-control-label" for="customRadioInline3">보통</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline4" name="hotel_score" class="custom-control-input" value="4">
									  <label class="custom-control-label" for="customRadioInline4">추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline5" name="hotel_score" class="custom-control-input" value="5" checked="checked">
									  <label class="custom-control-label" for="customRadioInline5">매우추천</label>
									</div>
								  </div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
								<label for="message">상품평</label>
								<textarea name="hotel_message" cols="30" rows="10" class="form-control" value="" required></textarea>
							  </div>
							</div>
							
						</div>
						<!-- End row -->
						<div align="center"> 

						<input type="submit" value="등록" class="btn py-3 px-5 btn-primary">
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

    var count = 1;
    var countEl = document.getElementById("count");
	var countb = 0;
    var countEl2 = document.getElementById("countb");
    function plus(){
        count++;
        countEl.value = count;
		count1();
    }
    function minus(){
      if (count >= 1) {
        count--;
        countEl.value = count;
		count1();
      }  
    }
	    function plus2(){
        countb++;
        countEl2.value = countb;
		count1();
    }
    function minus2(){
      if (countb >= 1) {
        countb--;
        countEl2.value = countb;
		count1();

      }  
    }



</script>
