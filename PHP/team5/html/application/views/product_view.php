<link rel="stylesheet" href="/~team5/my/usercss/style2.css?ver=2">
<?
	$num_rows=count($list4)
?>

<style>
input[type="text2"]
{
    font-size:32px;

}
</style>
<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

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


function count1() {
		var count = $("#count").val();
		var countb = $("#countb").val();
		var price = form3.price4.value;
		var tempResult ;
		var tempResult2 ;
		tempResult=(price*count)+(price/2*countb);
		form3.price3.value=addComma(tempResult) + "원";
		form3.totalprice.value=(tempResult);

	}
</script>

 <div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/Package.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/~team5/">Home</a></span> <span>Package</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Package</h1>
			<h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">패키지 여행</font></h3>
          </div>
        </div>
      </div>
    </div>


		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8" id="single_tour_desc">
					<div id="single_tour_feat">
						<ul>
							<li><i class="fa fa-globe"></i>패키지 여행</li>
							<li><i class="fab fa-accessible-icon"></i>장애인 여행 지원</li>
							<li><i class="fas fa-headset"></i></i>친절상담</li>
							<li><i class="fas fa-dollar-sign"></i>온라인 최저가</li>
							<li><i class="fas fa-child"></i>어린이 50%할인</li>
						</ul>
					</div>
					<form name="form3" method="post" action="/~team5/product/reservation">
					</p>
					<!-- Map button for tablets/mobiles -->
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					 <div class="carousel-inner" role="listbox" style=" width:100%; height: 500px !important;">
						  <div class="carousel-inner">
							<div class="carousel-item active">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->pic1?>" alt="First slide">
							</div>
							<div class="carousel-item">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->pic2?>" alt="Second slide">
							</div>
							<div class="carousel-item">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->pic3?>" alt="Third slide">
							</div>
							<?
							if($row->pic4 != null){
							?>
							<div class="carousel-item">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->pic4?>" alt="Third slide">
							</div>
							<?
								}
							?>
							<?
							if($row->pic5 != null){
							?>
							<div class="carousel-item">
							  <img class="d-block w-100" src="/~team5/img/<?=$row->pic5?>" alt="Third slide">
							</div>
							<?
								}
							?>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
						</div>
						<?
							$start = new DateTime($row->departure);
							$end = new DateTime($row->arrive);
							$gap = date_diff($start, $end);
						?>
						<input type="hidden" id="checkin_date" class="form-control" placeholder="날짜 선택" name="checkin" value="<?=$row->departure?>" required>
						<input type="hidden" id="checkin_date" class="form-control" placeholder="날짜 선택" name="checkout" value="<?=$row->arrive?>" required>
						상품번호: <?=$row->no?>
						<input type="hidden" name="productno" value="<?=$row->no?>"?>
						<h2><strong><?=$row->name?></strong></h2>
						<span class="subheading"><?=$row->departure?> ~ <?=$row->arrive?></span>
						
					<hr>

					<div class="row">
						<div class="col-lg-2">
							<h4><strong>비행기</strong></h4>
						</div>
						<div class="col-lg-10">
							<table class="table">
							
							  <thead>
								<tr>
								  <th width="40%">목적지</th>
								  <th width="40%">항공사</th>
								  <th width="33%">항공편</th>

								</tr>
							  </thead>
								
							  <tbody>
							  <? foreach($list1 as $row)
							  {	
							   ?>
								<tr>

								  <td><?=$row->flight_city_name?></td>
								  <td><?=$row->name?></td>
								  <td><?=$row->flight?></td>
								</tr>
								<?
								
							  }
							   ?>
							  </tbody>
			
							</table>

						
							<!-- End photo carousel  -->
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>

					
					<div class="row">
						<div class="col-lg-2">
							<h4><strong>호텔</strong></h4>
						</div>
						
						<div class="col-lg-10">
							<table class="table">
							
						
							  <thead>
								<tr>
								  <th width="40%">호텔명</th>
								  <th width="40%">평점</th>
								  <th width="33%">정보</th>


								</tr>
							  </thead>

							  <tbody>
							  <? foreach($list2 as $row)
							  {	
									
							   ?>
								<tr>

								  <td><?=$row->name?></td>
								  <td><?
										if ($row->score ==0)
										{
											echo ("<p class='rate'>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}

										else if($row->score == 1)
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}
										else if ($row->score == 2 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}

										else if ($row->score == 3 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->score == 4 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->score == 5 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													</p>");
										}
	?></td> 
								<td><a href="/~team5/FreeTravel/viewHotel/no/<?=$row->no?>" onclick="window.open(this.href, '_blank', 'width=1050, height=900,toolbars=no,scrollbars=no'); return false;"><font color="black"><i class="fas fa-info-circle fa-2x"></i></font></a></td>
								</tr>

								<?
								
							  }
							   ?>
							  </tbody>
	
							</table>

						
							<!-- End photo carousel  -->
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>
					<div class="row">
						<div class="col-lg-2">
							<h4><strong>상품특징</strong></h4>
						</div>
						<div class="col-lg-10">

								 <p><?=nl2br($row->point) ?></p>

							<!-- End row  -->
						</div>
						<!-- End col-md-9  -->
					</div>
      
			<hr>
					<div class="row">
						<div class="col-lg-2">
							<h4><strong>상품안내</strong></h4>
						</div>
						<div class="col-lg-10">

								 <p><?=nl2br($row->	guid) ?></p>

							<!-- End row  -->
						</div>
						<!-- End col-md-9  -->
					</div>
      
			<hr>
			<!-- 상품평 -->			


				<div class="row">

						<div class="col-lg-2">
							<h4><strong>상품평(<?=$num_rows?>)</strong></h4>
							<?
							if($this->session->userdata('id'))
							{
								?>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">등록</a>
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

							<div class="col-lg-10">
							<? 
								foreach($list4 as $row)
								{
									
										
							?>
							
								<img src="/~team5/img/<?=$row->member_profile?>" alt="Image" class="rounded-circle" width="50" height="50">
								
								<font size="5">
								<?=$row->username?>&nbsp&nbsp

								<? if ($row->member_id == $this->session->userdata('id')) { ?>
									<a href="/~team5/product/delReply/no/<?=$row->no?>" onClick="return confirm('정말 삭제하시겠습니까?');">										
										<font color="red"><i class="fas fa-times"></i></font>
									</a>
								<? } ?>	

								</font>
						

								<br>
								<span class="subheading">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ID:  <?=$row->product_id?></span><br><br>
								<?
					if($row->product_score == 1)
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspz&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>

								</p>");
					}
					else if ($row->product_score == 2 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}

					else if ($row->product_score == 3 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->product_score == 4 )
					{
						echo ("<p class='rate'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->product_score == 5 )
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
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?=$row->product_reply?>
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

				
				<aside class="col-lg-4">
				
				

					
					<br><br><br><br><br>
					<div class="box_style_1 expose">
						<h3 class="inner">예약하기</h3>
						<div class="row">
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
				<? foreach ($list3 as $row){ ?>
						<input type="text" name="price3" value="<?=number_format($row->price)?>원" class="form-control from-control-sm" id="result" style="border:0; font-size:20pt; color:#DD484D; font-weight:bold; text-align: center;" readonly>
						<input type="hidden" name="totalprice" value="<?=$row->price?>" class="form-control from-control-sm" id="result">
						<input type="hidden" name="price4" value="<?=$row->price?>">
						
						<input type="hidden" name="number" value="<?=$row->no?>">								<? }?>

						<br>

<?
							if($this->session->userdata('id'))
							{
								?>

							<input type="submit" value="지금 예약하기" class="btn_full">
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
	<!-- End main -->

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
					<? foreach ($list5 as $row){ ?>
					<form method="post" action="/~team5/Product_reply/add" name="form10" id="review_hotel">
					<input type="hidden" class="form-control" name="product_no" value="<?=$row->no?>">
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
									<input name="product_id" id="name_review" type="text"value="<?=$row2->user_id2?>" class="form-control">
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
									  <input type="radio" id="customRadioInline1" name="product_score" class="custom-control-input" value="1">
									  <label class="custom-control-label" for="customRadioInline1">매우 비추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline2" name="product_score" class="custom-control-input" value="2">
									  <label class="custom-control-label" for="customRadioInline2">비추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline3" name="product_score" class="custom-control-input" value="3">
									  <label class="custom-control-label" for="customRadioInline3">보통</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline4" name="product_score" class="custom-control-input" value="4">
									  <label class="custom-control-label" for="customRadioInline4">추천</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="customRadioInline5" name="product_score" class="custom-control-input" value="5" checked="checked">
									  <label class="custom-control-label" for="customRadioInline5">매우추천</label>
									</div>
								  </div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
								<label for="message">상품평</label>
								<textarea name="product_message" cols="30" rows="10" class="form-control" value="" required></textarea>
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





