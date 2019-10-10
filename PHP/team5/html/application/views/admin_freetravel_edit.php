
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>자유여행</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>자유여행 정보 수정</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
				<script>
						function find_country(){
							window.open("/~team5/admin_findcountry","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_city(){
							window.open("/~team5/admin_findcity","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
				</script>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="" enctype="multipart/form-data">

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품명 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$row->name?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">한줄소개 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="intro" value="<?=$row->intro?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품번호 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="product_no" value="<?=$row->product_no?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">출발일 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" ></span>
                                
                          <input type="date" class="form-control has-feedback-left" id="" placeholder="First Name" name="startday" value="<?=$row->startday?>">
                                
                        </div>
                      </div>

					   

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">도착일 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control has-feedback-left" name="endday" id="" placeholder="First Name" aria-describedby="inputSuccess2Status2" value="<?=$row->endday?>" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" ></span>
                               
                        </div>
                      </div>



								

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">기간<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="term" value="<?=$row->term?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품 특징 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="feature" value="<?=$row->feature?>" required="required" class="form-control col-md-7 col-xs-12" rows="10" cols="30"><?php echo $row->feature?></textarea>
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">추천일정 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="recommend_no" value="<?=$row->recommend_no?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">국가 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="country_no" value="<?=$row->country_no?>">
                          <input type="text" name="country_name" value="<?=$row->country_name?>" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="국가찾기" onClick="find_country();" class="btn">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">도시 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="city_no" value="<?=$row->city_no?>">
                          <input type="text" name="city_name" value="<?=$row->city_name?>" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="도시찾기" onClick="find_city();" class="btn">
                        </div>
                      </div>




					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">사진1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="pic1" value="<?=$row->pic1?>" class="form-control form-control-sm col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">사진2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="pic2" value="<?=$row->pic2?>" class="form-control form-control-sm col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">국기 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="pic3" value="<?=$row->pic3?>" class="form-control form-control-sm col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="center">
						  <input type="submit" value="저장" class="btn">
						  <button class="btn" type="reset">초기화</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <input type="button" value="이전화면" class="btn" onClick="history.back();">

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
</div>


