
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
?>
    
 <div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/~team5/">Home</a></span> <span>COUNTRY</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Country Information</h1>
			 <h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">국가별 정보</font></h3>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">

      <div class="container">
	  <script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~team5/country/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~team5/country/lists/text1/" + form1.text1.value + "/#list";
		form1.submit();
    }
</script>
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">나라 찾기</h3>
        			<form name="form1" action="" method="post">
        				<div class="fields">
		              <div class="form-group">
		                <input type="text" name="text1" class="form-control" value="<?=$text1;?>" onKeydown="if (event.keyCode == 13) { find_text(); }"  placeholder="나라명">

		              </div>
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                   
	                  </div>
		              </div>
		              
		              <div class="form-group">
		                <input type="submit" value="검색" class="btn btn-primary py-3 px-5" onClick="find_text();">


		              </div>
		            </div>
	            </form>
        		</div>

        		
          </div>
          <div class="col-lg-9">
          	<div class="row" id="list">
<?
    foreach ($list as $row)
    { 
		$no=$row->no;    
?> 
          		<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="/~team5/country/view/no/<?=$no ?><?=$tmp;?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/~team5/img/<?=$row->pic1?>);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
							
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#"><?=$row->country_name?></a></h3>
											<h6><a href="#"><font color="black"><?=$row->country_english_name?></font></a></h6>
				    						<p class="rate">
				    							<i><?=$row->parallax?></i>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<font size="2" color="red"><?=$row->language?></font>
		    							</div>
		    						</div>
		    						<p>면적 : <?=$row->area?><br/>인구 : <?=$row->population?></br/>화폐 : <?=$row->currency?></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> From <a href="http://www.tourtips.com/dest/main/">Tourtips</a></span> 
		    							<span class="ml-auto"><a href="/~team5/country/view/no/<?=$no ?><?=$tmp;?>">정보</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
<?
	}
?>
		    			
          	</div>
<?=$pagination;?>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

