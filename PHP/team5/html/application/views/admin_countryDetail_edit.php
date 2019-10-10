
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>국가설명</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>국가 설명 추가</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
				<script>
						function find_country(){
							window.open("/~team5/admin_findcountry","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
					</script>

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="" enctype="multipart/form-data">

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">번호 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no" value="<?=$row->no;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">국가 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="country_no" value="<?=$row->country_no;?>">
                          <input type="text" name="country_name" value="<?=$row->country_name;?>" required="required" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="국가찾기" onClick="find_country();" class="btn">
                        </div>
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">언어 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="language" value="<?=$row->language;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">면적 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="area" value="<?=$row->area;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">인구 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="population" value="<?=$row->population;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">시차 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="parallax" value="<?=$row->parallax;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">종교 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="religion" value="<?=$row->religion;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">전압 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="voltage" value="<?=$row->voltage;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">통화 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="currency" value="<?=$row->currency;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">비자 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="visa" value="<?=$row->visa;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">물가 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="prices" value="<?=$row->prices;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">기후 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="climate" value="<?=$row->climate;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">요약 정보 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="information" value="<?=$row->information;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


											
					  <div class="form-group">
						 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">개요 <span class="required">*</span>
                        </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-inline">
						 <textarea name="summary" rows="10" cols="150" size="30" maxlength="9192" value="<?=$row->summary?>" 
											 class="form-control from-control-sm" wrap="hard"><?php echo $row->summary?> </textarea>
											
						</div>
						</div>
						</div>



					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">사진1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic1 ?>
                          <input type="file" name="pic1" value="" class="form-control form-control-sm col-md-7 col-xs-12"><br>
                        </div>
						<?
							if($row->pic1)
								echo("<img src='/~team5/img/$row->pic1' width='200' class='img-fluid img-thumbnail'>");
							else
								echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
						?>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">사진2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic2 ?>
                          <input type="file" name="pic2" value="" class="form-control form-control-sm col-md-7 col-xs-12"><br>
                        </div>
						<?
							if($row->pic2)
								echo("<img src='/~team5/img/$row->pic2' width='200' class='img-fluid img-thumbnail'>");
							else
								echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
						?>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">국기 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic3 ?>
                          <input type="file" name="pic3" value="" class="form-control form-control-sm col-md-7 col-xs-12"><br>
                        </div>
						<?
							if($row->pic3)
								echo("<img src='/~team5/img/$row->pic3' width='200' class='img-fluid img-thumbnail'>");
							else
								echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
						?>
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


