
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>예약</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>예약 추가</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<script>
						function find_product(){
							window.open("/~team5/admin_findproduct","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_member(){
							window.open("/~team5/admin_findmember","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
					</script>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="hidden" name="product_no" value="<?=$row->product_no?>">
                         <input type="text" name="product_name" value="<?=$row->product_name?>" required="required" class="form-control col-md-7 col-xs-12">
						 <input type="button" value="상품찾기" onClick="find_product();" class="btn">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">사용자 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="hidden" name="member_no" value="<?=$row->member_no?>">
                         <input type="text" name="member_name" value="<?=$row->member_name?>" required="required" class="form-control col-md-7 col-xs-12">
						 <input type="button" value="사용자찾기" onClick="find_member();" class="btn">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">승인 여부 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<?if($row->yn==0){?>
                      <p>
                        &nbsp 승인
                        <input type="radio" class="flat" name="yn" value="0" checked="" required /> 미승인
                        <input type="radio" class="flat" name="yn" value="1" />
                      </p>
					  <?}else{?>
						<p>
                        &nbsp 승인
                        <input type="radio" class="flat" name="yn" value="0"/> 미승인
                        <input type="radio" class="flat" name="yn" value="1" checked="" required  />
                      </p>
					  <?}?>
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


