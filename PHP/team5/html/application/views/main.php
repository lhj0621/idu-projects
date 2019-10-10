<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
	$num_rows=count($list);
	$num_rows2=count($list5);
	$num_rows3=count($list6);
	$num_rows4=count($list7);
?>
<script>
    function find_text()
    {
		if (form1.text1.value == 1)
			form1.action="/~team5/country/lists/text1/" + form1.text2.value;
		else if (form1.text1.value == 2)	
			form1.action="/~team5/product/lists/text1/" + form1.text2.value +"/text2/100000/text3/5000000/list";
		else if (form1.text1.value == 3)	
			form1.action="/~team5/freeTravel/lists/text1/" + form1.text2.value +"/text2/100000/text3/5000000/list";
		else if (form1.text1.value == 4)	
			form1.action="/~team5/hotel/lists/text1/" + form1.text2.value +"/text2/100000/text3/1000000/list";
		form1.submit();
    }
</script>
    <div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>최고의 여행지로 떠나세요 <br></strong> </h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>
            <div class="block-17 my-4">
              <form name="form1" action="" method="post" class="d-block d-flex">
                <div class="fields d-block d-flex">
                  <div class="textfield-search one-third">
                  	<select name="text1" id="" class="form-control" placeholder="Keyword search">
                      <option value="1">국가 정보</option>
                      <option value="2">패키지 상품</option>
                      <option value="3">자유여행 상품</option>
                      <option value="4">호텔</option>
                    </select>
                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="text2" id="" class="form-control" placeholder="Keyword search">
                      <?
							foreach ($list8 as $row)
							{
								if ($row->name==$text1)
									echo("<option value='$row->name' selected>$row->name </option>");
								else
									echo("<option value='$row->name'>$row->name</option>");
							}
						?>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" onClick="find_text();" value="검색">  
              </form>
            </div>
            <p>원하는 정보를 찾아보세요</p>
            <p class="browse d-md-flex">
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="/~team5/country"><i class="fas fa-globe-americas"></i>국가</a></span>
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="/~team5/product"><i class="fas fa-briefcase"></i>패키지</a></span> 
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="/~team5/freeTravel"><i class="fa fa-map-marker-alt"></i>자유여행</a></span> 
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="/~team5/hotel"><i class="fa fa-hotel"></i>호텔</a></span> 
            </p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">최저가 보장</h3>
                <p>다른 곳에서 더 저렴한 가격을 발견하시면 이 가격에서 10%를 돌려드립니다.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-hotel"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">호텔예약까지 한번에</h3>
                <p>호텔만 따로 예약하실 필요없이 모든 예약 한번에 가능합니다.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">최고의 여행업체</h3>
                <p>이용하실 모든 고객들이 만족하실수 있도록 최선을 다하겠습니다. </p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">상담문의</h3>
                <p>02-950-7000<br/>상담시간 : 9:00 ~ 18:00</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-destination">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Country Information</span>
            <h2 class="mb-4"><strong>국가 </strong>정보</h2>
          </div>
        </div>

    		<div class="row">
    			<div class="col-md-12">
    				<div class="destination-slider owl-carousel ftco-animate">
  <?
    foreach ($list as $row)
    {
        $no=$row->no;                       
?>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="/~team5/country/view/no/<?=$no ?><?=$tmp;?>" class="img d-flex justify-content-center align-items-center" style="background-image: url(/~team5/img/<?=$row->pic1?>);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">
									<?=$row->country_name ?></a></h3>
		    						<span class="listing"><?=$row->country_english_name?></span>
		    					</div>
		    				</div>
	    				</div>
<?
    }
?>


    				</div>
    			</div>
    		</div>
    	</div>
    </section>

	<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Package</span>
            <h2 class="mb-4"><strong>최저가</strong> 패키지 상품</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
<?
	foreach ($list3 as $row)
	{			$no=$row->no;
?>			
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="/~team5/product/view/no/<?=$no ?><?=$tmp;?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/~team5/img/<?=$row->pic1?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="/~team5/product/view/no/<?=$no ?><?=$tmp;?>"><?=$row->name?></a></h3>
		    						<?
										if($row->recommend_no == 1)
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}
										else if ($row->recommend_no == 2 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}

										else if ($row->recommend_no == 3 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->recommend_no == 4 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->recommend_no == 5 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													</p>");
											}
	?>
	    						</div>
	    						<div class="two">
	    							<span class="price"><?=  number_format($row->price);?></span>
    							</div>
    						</div>
    						<p><?=$row->intro?></p>
    						<p class="days"><span><?=$row->departure?> ~ <?=$row->arrive?>
							<hr>
    						<p class="bottom-area d-flex">

    							<span><i class="icon-map-o"></i> <?=$row->country_name?>, <?=$row->city_name?></span> 
    							<span class="ml-auto"><a href="/~team5/product/view/no/<?=$no ?><?=$tmp;?>">보기</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
<?
	}
?>


    		</div>
    	</div>
    </section>

 

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/~team5/my/images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">등록된 상품수</h2>
            <span class="subheading">몇개의 상품이 등록되어있을까요?</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$num_rows?>">0</strong>
		                <span>나라별 정보</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$num_rows2?>">0</strong>
		                <span>패키지 상품</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$num_rows3?>">0</strong>
		                <span>자유여행 상품</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$num_rows4?>">0</strong>
		                <span>호텔</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

   <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Free Travel</span>
            <h2 class="mb-4"><strong>최저가</strong> 자유여행 상품</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
<?
	foreach ($list2 as $row)
	{			$no=$row->no;
?>			
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="/~team5/freeTravel/view/no/<?=$no ?><?=$tmp;?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/~team5/img/<?=$row->pic1?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="/~team5/freeTravel/view/no/<?=$no ?><?=$tmp;?>"><?=$row->name?></a></h3>
		    						<?
										if($row->recommend_no == 1)
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}
										else if ($row->recommend_no == 2 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}

										else if ($row->recommend_no == 3 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->recommend_no == 4 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->recommend_no == 5 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													</p>");
											}
	?>
	    						</div>
	    						<div class="two">
	    							<span class="price"><?=  number_format($row->flight_min_price);?></span>
    							</div>
    						</div>
    						<p><?=$row->intro?></p>
							<hr>
    						<p class="bottom-area d-flex">

    							<span><i class="icon-map-o"></i> <?=$row->country_name?>, <?=$row->city_name?></span> 
    							<span class="ml-auto"><a href="/~team5/freeTravel/view/no/<?=$no ?><?=$tmp;?>">보기</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
<?
	}
?>


    		</div>
    	</div>
    </section>

      <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Hotels</span>
            <h2 class="mb-4"><strong>최저가</strong> 호텔</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
<?
	foreach ($list4 as $row)
	{			$no=$row->no;
?>			
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="/~team5/hotel/view/no/<?=$no ?><?=$tmp;?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/~team5/img/<?=$row->img?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="/~team5/hotel/view/no/<?=$no ?><?=$tmp;?>"><?=$row->name?></a></h3>
		    						<?
										if($row->score == 1)
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
	?>
	    						</div>
	    						<div class="two">
	    							<span class="price"><?=  number_format($row->price);?><br><small>/1박기준</small></span>
    							</div>
    						</div>
    						<p><?=$row->address?></p>
							<hr>
    						<p class="bottom-area d-flex">

    							<span><i class="icon-map-o"></i> <?=$row->country_name?>, <?=$row->city_name?></span> 
    							<span class="ml-auto"><a href="/~team5/hotel/view/no/<?=$no ?><?=$tmp;?>">보기</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
<?
	}
?>


    		</div>
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Information</span>
            <h2 class="mb-4 pb-3"><strong>만든이 </strong>정보</h2>
            <p>안녕하세요 인덕대학교 컴퓨터소프트웨어학과 Team5 입니다!</p>
			<p>이 사이트는 php 기반 으로 이루어져있으며 codeigniter 프레임워크를 사용하였습니다</p>
            <p><a href="/~team5/about" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">더보기</a></p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Introduce</span>
            <h2 class="mb-4 pb-3"><strong>팀원</strong> 소개</h2>

          	<div class="row ftco-animate">
		          <div class="col-md-12">
				  					
		            <div class="carousel-testimony owl-carousel">
		<? foreach ($list9 as $member){ ?>
		              <div class="item">	
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(/~team5/img/<?=$member->profile?>)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">
							<? 
								if($member->no == 1)
								{
									echo("찾아주셔서 감사합니다!");
								}
								else if($member->no == 2)
								{
									echo("좋은 서비스로 보답하겠습니다!");
								}
								else if($member->no == 3)
								{
									echo("문의사항은 연락주세요!");
								}
								else if($member->no == 4)
								{
									echo("최고의 여행지에서 최고의 추억 만드시길 바랍니다.");
								}
							?>
							</p>
		                    <p class="name">
							<? 
								if($member->no == 1)
								{
									echo("조세영");
								}
								else if($member->no == 2)
								{
									echo("이현준");
								}
								else if($member->no == 3)
								{
									echo("허조원");
								}
								else if($member->no == 4)
								{
									echo("김종연");
								}
							?>
							</p>
		                    <span class="position">
							<? 
								if($member->no == 1)
								{
									echo("15-011");
								}
								else if($member->no == 2)
								{
									echo("15-033");
								}
								else if($member->no == 3)
								{
									echo("16-067");
								}
								else if($member->no == 4)
								{
									echo("16-028");
								}
							?>
							</span>
		                  </div>
		                </div>
		              </div>
	<? }?>
				
		            </div>
					
		          </div>
		        </div>
				
          </div>
        </div>
      </div>
    </section>

    
		
	
