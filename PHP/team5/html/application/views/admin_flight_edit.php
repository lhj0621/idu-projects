
<script>
						function find_country(){
							window.open("/~team5/admin_findcountry","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_city(){
							window.open("/~team5/admin_findcity","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
				</script>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>항공사</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>항공사 수정</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					</script>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="">

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">번호 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no" value="<?=$row->no;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">항공사명 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$row->name;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">항공편 이름 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="flight" value="<?=$row->flight;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  	 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">가격 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="price" value="<?=$row->price?>" required="required" class="form-control col-md-7 col-xs-12">
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


