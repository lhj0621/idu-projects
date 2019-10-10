<?
	$no=$row->no;
	$tel1 = trim(substr($row->tel,0,3));
	$tel2 = trim(substr($row->tel,3,4));
	$tel3 = trim(substr($row->tel,7,4));
	//$tel = $tel1 . "-" . $tel2 . "-" . $tel3;
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>사용자</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>사용자 수정</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="" enctype="multipart/form-data">
						<tr>
							<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
							<td width="80%" align="left"><?=$no; ?></td>
						</tr>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">이름 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$row->name?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">아이디 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id" value="<?=$row->id?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">암호 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="pw" value="<?=$row->pw?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">번호 <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tel1" size="3" value="<?=$tel1?>" class="form-control-sm"> -
						  <input type="text" name="tel2" size="4" value="<?=$tel2?>" class="form-control-sm"> -
						  <input type="text" name="tel3" size="4" value="<?=$tel3?>" class="form-control-sm">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">나이 <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="age" value="<?=$row->age?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
<div class="form-group">
					   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">성별</label>
					   <? if($row->gender==0){?>
						  <p>
							&nbsp남자
							<input type="radio" class="flat" name="gender" value="0" checked="" required /> 여자
							<input type="radio" class="flat" name="gender" value="1" />
						  </p>
						<?}else{?>
						<p>
                        &nbsp남자
                        <input type="radio" class="flat" name="gender" value="0"  /> 여자
                        <input type="radio" class="flat" name="gender" value="1" checked="" required/>
                      </p>
					  <?}?>
</div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">이메일 <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" value="<?=$row->email?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">등급</label>
					<?if($row->rank==0){?>
                      <p>
                        &nbsp 사용자
                        <input type="radio" class="flat" name="rank" value="0" checked="" required /> 관리자
                        <input type="radio" class="flat" name="rank" value="1" />
                      </p>
					  <?}else{?>
						<p>
                        &nbsp 사용자
                        <input type="radio" class="flat" name="rank" value="0"/> 관리자
                        <input type="radio" class="flat" name="rank" value="1" checked="" required  />
                      </p>
					  <?}?>
                      

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">프로필 사진 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->profile ?>
                          <input type="file" name="profile" value="" class="form-control form-control-sm col-md-7 col-xs-12"><br>
                        </div>
						<?
							if($row->profile)
								echo("<img src='/~team5/img/$row->profile' width='200' class='img-fluid img-thumbnail'>");
							else
								echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
						?>
                      </div>

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


