<?
	if ($row->gender == 0)
	{
		$row->gender = "남성";
	}
	else
	{
		$row->gender = "여성";
	}
?>

<div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/profile.jpg');">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
#leftPanel{
    background-color:#0079ac;
    color:#fff;
    text-align: center;
}

#rightPanel{
    min-height:415px;
}

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

	.signup-button-color{
		color: #fff;
        border-radius: 4px;
		background: #f85959;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
	}
	.signup-button-color:hover, .signup-button-color:focus {
		background: #FFF;
		color: #f85959;
		border: 0.5px solid red;
	}
</style>
<br><br><br><br><br><br><br><br>

<div class="container">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><font color="black">회원 정보</font></a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><font color="black">예약 확인</font></a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  
  <div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div><br><br>
        				<img src="/~team5/img/<?=$row->profile?>"" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<h2><?=$row->name?></h2>
        				
        			</div>
        		</div>
            </div>
        </div>

		<div class="col-md-8 well" id="rightPanel">
			<div class="row">
				<div class="col-md-12">
    			<form role="form" action="/~team5/mypage/edit">
					<h2>회원정보<small></small></h2>
					<hr class="colorgraph">

						<div class="row">

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">이름<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->name;?></td>
									</div>                     
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">아이디<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->id;?></td>
									</div>              
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">비밀번호<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->pw;?></td>
									</div>                        
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">성별<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->gender;?></td>
									</div>                       
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">전화번호<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->tel;?></td>
									</div>                       
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">나이<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->age;?></td>
									</div>                       
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">이메일<br>
									<div class="alert alert-light" role="alert">
										<td class="form-control"> <?=$row->email;?></td>
									</div>                       
								</div>
							</div>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class=" offset-md-3">
							<button type="submit" class="btn  signup-button-color btn-lg btn-block">수정하기</button>
							<br>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div><br><br>
        				<img src="/~team5/img/<?=$row->profile?>"" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<h2><?=$row->name?></h2>
        				
        			</div>
        		</div>
            </div>
        </div>

		<div class="col-md-8 well" id="rightPanel">
			<div class="row">
				<div class="col-md-12">
				<? foreach($reservation as $row2)
					  {}
					  ?>
    			
					<h2>예약 확인<small></small></h2>
					<hr class="colorgraph">

						
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">상품명</th>
						  <th scope="col">상품 타입</th>
						  <th scope="col">결제방식</th>
						  <th scope="col">가격</th>
						  <th scope="col">확인상태</th>
						  <th scope="col">결제 정보</th>
						  <th scope="col">예약 취소</th>

						</tr>
					  </thead>
					  <tbody>
					  <? foreach($reservation as $row2)
					  {
						  
						  if($row2->type == 0){
							  $type="자유여행";
						  }
						  else if($row2->type ==1){
							  $type="패키지";
						  }
						  else if($row2->type ==3){
							  $type="호텔";
						  }

						   if($row2->pay_type == 0){
							  $pay_type="카드결제";
						  }
						  else if($row2->pay_type ==1){
							  $pay_type="무통장";
						  }
						  if($row2->status == 0){
							  $status="미확인";
						  }
						  else if($row2->status ==1){
							  $status="확인";
						  }
					  ?>
						<tr>
						  <th scope="row">
						  

						  <? 
							if ($row2->type == 0) {
							  echo($row2->product_name);
						  }
						  else if ($row2->type == 1) {

								echo ($row2->product_name2);

						 }

							else if ($row2->type == 3) {
								echo ($row2->product_name3);
						 }
						  ?>
						
						  </th>

						  <td><?=$type?></td>
						  <td><?=$pay_type?></td>
						  <td><?=number_format($row2->price);?>원</td>
						  <td><?=$status?></td>

						 
						  <td>
							<a href="/~team5/Mypage/receipt/no/<?=$row2->no?>" onclick="window.open(this.href, '_blank', 'width=800, height=600,toolbars=no,scrollbars=no'); return false;">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="black"><i class="fas fa-info"></i></font>

								
							</a>
							
						 </td>
						  <td>
						  <form name="form1" action="/~team5/mypage/del/no/<?=$row2->no?>" method="post">
							&nbsp&nbsp&nbsp<button type="submit" class="btn btn-outline-danger" onClick="return confirm('정말 취소하시겠습니까?');">
								<i class="fas fa-times"></i>
							</button>
							<input type="hidden" name="delnumber" value="<?=$row2->no?>">
							</form>
						 </td>
						 </form>
						  
						</tr>
						<?
						}
						?>
					  </tbody>
					</table>




					</form>
					<br>
					<br>
					<br>

				</div>
			</div>
		</div>
	</div>
</div></div>

</div>
</div>







	

	

