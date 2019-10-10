
    
    <div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/~team5/main">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
			<h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">팀원 소개</font></h3>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-md-6 ftco-animate img about-image" style="background-image: url(/~team5/my/images/about.jpg);">
	    		</div>
	    		<div class="col-md-6 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">Introduce us</a>

		              <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false" >Our Mission</a>

		              <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
		              	<div>
			                <h2 class="mb-4">팀 소개</h2>
			              	<p>안녕하세요 저희는 인덕대학교 컴퓨터소프트웨어과 team5입니다.</p><p> 부족한 실력이지만 최선을 다해 만들었습니다!</p>
							<p>궁금하신 사항은 언제나 문의주시면 감사하겠습니다.</p>
			                
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
		                <div>
			                <h2 class="mb-4">추구하는 길</h2>
			              	<p>여행문화를 선도하는 기업으로서 기업의 사회적 가치를 키우고 꿈과 희망을 나누며 행복하고 지속 가능한 사회를 이룩하는데 기여하겠습니다.</p>
			                
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
		                <div>
			                <h2 class="mb-4">최상의 여행정보 제공</h2>
			              	<p>저희 애플투어는 인적자원의 글로벌 역량을 강화하고, 문화관광 유통 관련 사업의 역량을 강화하여 고객에게 세계 최고의 문화관광 유통 서비스를 제공하는 기업으로 성장하겠습니다.</p>
			               
				            </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

  <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">

		<? foreach($member as $member){?>
				  <div class="col-md-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
					  <div class="d-flex justify-content-center">
					  <div class="item">	
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(/~team5/img/<?=$member->profile?>)">

		                  </div>
						  </div></div></div>
					  <div class="media-body p-2 mt-2">
						<h3 class="heading mb-3">
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
							</h3>
							<span class="subheading"><? 
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
							?>	</span>

					  </div>
					</div>      
				  </div>
		<?}?>

        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading"><a id="faq">FAQS</a></span>
            <h2 class="mb-4"><strong>자주묻는</strong>질문</h2>
          </div>
        </div>  
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div id="accordion">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menuone" aria-expanded="false" aria-controls="menuone">탑승 수속은 어떻게 하나요?<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menuone" class="collapse">
						          <div class="card-body">
												<pre>원활한 탑승 수속을 위해 항공편 출발 2시간 전까지 여권 및 이티켓 소지하시어 
출발 당일 해당 항공사 수속 카운터로 방문 부탁드립니다.</pre>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menutwo" aria-expanded="false" aria-controls="menutwo">NO-SHOW란 무엇인가요? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menutwo" class="collapse">
						          <div class="card-body">
												<pre>항공권 구매 후 정해진 날짜에 항공사나 여행사에 아무런 inform 없이 
탑승하지 않는 것을 노쇼(No-show)라고 합니다. 
탑승을 못했을 경우  벌금을 내도록 하는 규정을 있으니(일부항공사) 
출/도착지에서 정해진 날짜에 탑승을 못하시거나,
예약변경을 하시는 경우에는 반드시 72시간 이전에 
미리 요청을 하셔야 고객님께서 손실을 보지 않습니다. 

그러므로 No-show를 방지하는 가장 좋은 방법은 
귀국 3일전에 반드시 항공사에 재확인(Re-confirm)해주셔야 합니다.
항공 스케줄은 사전 통보없이 변경될 수 있으며, 전산상의 문제로 
고객님의 예약사항이 없어질 수도 있습니다. 이는 여행사의 잘못도 아니고,
항공사의 잘못도 아닌 "오류"입니다. 따라서, 귀국 3일전 재확인 하는 
습관을 기르는 것이 No-show를 방지하는 가장 좋은 대표적 방법입니다.
날짜 변경 또한 기존 예약일자 전에 반드시 취소하시고 
변경하셔야 문제없이 변경 재발행 가능합니다 . 
기존일자를 취소를 안하고 변경요청시 불가능할 수 있습니다.
취소나 변경은 업무시간이내에만 가능합니다. 
주말이나 이른아침, 늦은밤 비행기 시에는 
꼭 업무시간에 요청하셔야 하십니다.</pre>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu3" aria-expanded="false" aria-controls="menu3"> 탑승수속을 위해 언제까지 공항에 가야하나요? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu3" class="collapse">
						          <div class="card-body">
												<pre>탑승수속 위치와 출국장 또는 출발장 내의 혼잡이 예상되며, 
최근 기내수화물 제한문제로 인해
국제선 탑승 의 경우 항공편 출발 2시간 전까지
(성수기에는 3시간 전까지로 권장 해 드립니다)
국내선 탑승 의 경우 항공편 출발 1시간 전까지 
공항 수속 카운터로 오시는 것을 권장하고 있습니다.</pre>
						          </div>
						        </div>
						      </div>
    						</div>

    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4">도심공항 서비스란 무엇인가요?<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu4" class="collapse">
						          <div class="card-body">
												<pre>도심공항 서비스란 도심공항 터미널에서는 공항 이용에 필요한 탑승 수속과 
출국심사를 마치고 편안하게 인천공항까지 가실 수 있도록 서비스를 제공하는 
것입니다. 현재는 삼성동 코엑스 도심공항과 서울역 도심공항, 광명역 도심공항 
총 3곳이 있습니다.</pre>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu5" aria-expanded="false" aria-controls="menu5">좌석배정 미리 할 수 있나요?<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu5" class="collapse">
						          <div class="card-body">
												<pre>예약코드내 우측 탭 '요청/변경'> '좌석배정'으로 신청가능합니다.(일부항공사제외)
발권완료후에도 '요청/변경'에서 '좌석배정' 이 보이지 않는 경우는 
게시판으로 문의주시면 확인해드립니다.
-좌석 등급(클래스)에 따라 배정에 제한이 따를수 있습니다.
-항공사에서 여행사에 허용한 범위내에서만 지정이 가능합니다.
  (항공사를 통한 좌석배정과 다를수 있습니다.)
-좌석 배정후에도 항공사편수 변경.기종변경등의 이유로 좌석배정이 취소되거나 
  변경될수 있으므로 출발당일 공항에서 다시한번 확인해주셔야 합니다.
-항공사 자체적으로 사전좌석배정이 불가한 항공사는 
  출발당일 공항에 일찍 나가 직접 배정받아야 합니다.</pre>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu6" aria-expanded="false" aria-controls="menu6">기내식 신청은 어떻게 하나요?<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu6" class="collapse">
						          <div class="card-body">
												<pre>기내식 신청은 번거로우시겠지만, 항공사를 통해 상담 부탁 드리며, 
출발 72시간 전까지 신청 가능합니다</pre>
						          </div>
						        </div>
						      </div>
    						</div>
    					</div>
				    </div>
    			</div>
    		</div>
    	</div>
    </section>