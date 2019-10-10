<?
	$num_rows = count($list);
?>
<script language="javascript">
	function LoginNeed()
	{
		alert("로그인이 필요합니다");
	}
</script>



    <div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Country</a></span> <span>Country Information</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Country Information</h1>
			<h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">국가별 정보</font></h3>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
           <h2 class="mb-4"><strong><?=$row->country_name?></strong></h2>
				<span class="subheading"><?=$row->country_english_name?></span>
					<hr>
            
              <img src="/~team5/img/<?=$row->pic3?>" alt="" class="img-fluid">
            </p>
            <p><?=$row->information?></p>
            <h2 class="mb-3 mt-5">#2. 기본 정보</h2>
			<hr>
			<img src="/~team5/img/<?=$row->pic1?>" alt="" class="img-fluid">
            <p>언어 : <?=$row->language?></p>
			<p>면적 : <?=$row->area?></p>
			<p>인구 : <?=$row->population?></p>
			<p>시차 : <?=$row->parallax?> (KST - 한국 표준시)</p>
			<p>종교 : <?=$row->religion?></p>
			

			<h2 class="mb-3 mt-5">#3. 여행시 도움이 되는 정보</h2>
			<hr>
			<img src="/~team5/img/<?=$row->pic2?>" alt="" class="img-fluid">
			<p>전압 : <?=$row->voltage?></p>
			<p>통화 : <?=$row->currency?></p>
			<p>비자 : <?=$row->visa?></p>
			<p>물가 : <?=$row->prices?></p>
			<p>기후 : <?=$row->climate?></p>
			



            
<h2 class="mb-3 mt-5">#4. 개요</h2>
			<hr>
 <p><?=nl2br($row->summary) ?></p>
<br/>
<hr>
<h2 class ="mb-3 mt-5">#5. 홍보 영상</h2>

<iframe width="1100" height="600" src="<?=$row->video?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<hr>

<h2 class ="mb-3 mt-5">#6. 지도</h2>

<iframe src="<?=$row->mapurl?>?" width="1100" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
<hr>


     <h2 class="mb-3 mt-5">
<? 	
	if($row->user_name)
	{	
		
		echo ($num_rows);
	}
	else
	{
		echo ("0");
	}
	 
?> 개의 댓글</h2>
	 <br>
<? 
	foreach($list as $row)
	{
			if($row->user_name){
?>
			
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="/~team5/img/<?=$row->member_profile?>" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
				  <form name="form1" action="/~team5/country/delReply/no/<?=$row->reply_no?>" method="post" >
                    <h3><?=$row->user_name?>
					<? if ($row->member_id == $this->session->userdata('id')) { ?>

							<button type="submit" class="btn btn-outline-danger" onClick="return confirm('정말 삭제하시겠습니까?');">
								<i class="fas fa-times"></i>
							</button>

					<? } ?>	
					</h3>
					</form>
					<span class="subheading"><?=$row->country_reply_id?></span>
                    <div class="meta">



<?
					if($row->country_score == 1)
					{
						echo ("<p class='rate'>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>

								</p>");
					}
					else if ($row->country_score == 2 )
					{
						echo ("<p class='rate'>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}

					else if ($row->country_score == 3 )
					{
						echo ("<p class='rate'>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->country_score == 4 )
					{
						echo ("<p class='rate'>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star'></i>
								<i class='icon-star-o'></i>
								</p>");
					}
					else if ($row->country_score == 5 )
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
                    <p><?=$row->country_reply?></p>
					 
                </li>
              </ul>
              <!-- END comment-list -->		  
<? 
			}
	}
?>


<?
					
					if($this->session->userdata('id'))
					{
?>
					<div class="pt-5 mt-5">

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">댓글 달기</h3>
                <form action="/~team5/country_reply/add" class="p-5 bg-light" method="post" name="form1">
				<div class="form-group">
					<input type="hidden" class="form-control" name="country_no" value="<?=$row->country_no?>">
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" name="reply_id" value="<?=$this->session->userdata('id')?>">
				</div>
<? 
				foreach ($sessionname as $row2){
?>
                  <div class="form-group">
                    <label for="name">이름(수정불가)</label>
                    <input type="text" class="form-control" name="reply_name"  
					value="<?=$row2->user_name2?>" readonly="readonly">
                  </div>
<? 
				} 
?>
				  <br>
                  <div class="form-group">
                    <label for="website">추천 *</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline1" name="reply_score" class="custom-control-input" value="1">
					  <label class="custom-control-label" for="customRadioInline1">매우 비추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline2" name="reply_score" class="custom-control-input" value="2">
					  <label class="custom-control-label" for="customRadioInline2">비추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline3" name="reply_score" class="custom-control-input" value="3">
					  <label class="custom-control-label" for="customRadioInline3">보통</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline4" name="reply_score" class="custom-control-input" value="4">
					  <label class="custom-control-label" for="customRadioInline4">추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline5" name="reply_score" class="custom-control-input" value="5" checked="checked">
					  <label class="custom-control-label" for="customRadioInline5">매우추천</label>
					</div>
                  </div>
					<br>
                  <div class="form-group">
                    <label for="message">댓글 *</label>
                    <textarea name="reply_message" cols="30" rows="10" class="form-control" value="" required></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="등록" class="btn py-3 px-4 btn-primary">
	

                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
<?
					}
					else
					{
?>
					<div class="pt-5 mt-5">

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">댓글 달기</h3><br><span class="subheading">※로그인후 이용하세요</span>
                <form action="" class="p-5 bg-light" method="post" name="form1">
				<div class="form-group">
					<input type="hidden" class="form-control" name="country_no" value="<?=$row->country_no?>">
				</div>
                  <div class="form-group">
                    <label for="name">이름</label>
                    <input type="text" class="form-control" name="reply_name" value="" required="required" readonly>
                  </div>
          <div class="form-group">
                    <label for="website">나라 추천 *</label><br>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline1" name="reply_score" class="custom-control-input" value="1">
					  <label class="custom-control-label" for="customRadioInline1">매우 비추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline2" name="reply_score" class="custom-control-input" value="2">
					  <label class="custom-control-label" for="customRadioInline2">비추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline3" name="reply_score" class="custom-control-input" value="3">
					  <label class="custom-control-label" for="customRadioInline3">보통</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline4" name="reply_score" class="custom-control-input" value="4">
					  <label class="custom-control-label" for="customRadioInline4">추천</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="customRadioInline5" name="reply_score" class="custom-control-input" value="5">
					  <label class="custom-control-label" for="customRadioInline5">매우추천</label>
					</div>
                  </div>

                  <div class="form-group">
                    <label for="message">댓글 *</label>
                    <textarea name="reply_message" cols="30" rows="10" class="form-control" value="" required></textarea>
                  </div>
                  <div class="form-group">

                    <input type="button" value="등록2" class="btn py-3 px-4 btn-primary" onClick="LoginNeed()">
	

                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
<?
						}
?>

        </div>
      </div>
    </section> <!-- .section -->

<? $this->session->userdata('id')?>
