

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
<br>
<br>
    		<form action="" method="post" enctype="multipart/form-data">
	<div class="row" id="main">
        <div class="col-md-4 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div><br><br>
        				<img src="/~team5/img/<?=$row->profile?>"" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<h2><?=$row->name?></h2>
        				<input type="file" class="form-control-sm" name="profile">
        			</div>
        		</div>
            </div>
        </div>


        <div class="col-md-8 well" id="rightPanel">
            <div class="row">
		 <div class="col-md-12">

			<h2>회원정보 수정<small></small></h2>
			<hr class="colorgraph">
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">이름(수정불가)<br>
						<td class="form-control"> <input type="name" class="form-control" name="name" value="<?=$row->name;?>" required="required" readonly="readonly"></td>                       
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">아이디(수정불가)<br>
						<td class="form-control"> <input type="name" class="form-control" name="id" value="<?=$row->id;?>" required="required" readonly="readonly"></td>                       
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">비밀번호<br>
						<td class="form-control"><input type="text" class="form-control" name="pw" value="<?=$row->pw;?>" required="required"></td>         
					</div>
				</div>


				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
				<?
					  if($row->gender == 0) {
				?>
                      <p>성별<br><br>
                        남자
                        <input type="radio" class="flat" name="gender" value="0" checked="" required /> 여자
                        <input type="radio" class="flat" name="gender" value="1" />
                      </p>
				<?
					  }
					  else {
				?>
					  <p>성별<br><br>
                        남자
                        <input type="radio" class="flat" name="gender" value="0" /> 여자
                        <input type="radio" class="flat" name="gender" value="1" checked="" required  />
                      </p>
					<?
					  }
					  ?>      
					</div>
				</div>
<?
        $tel1 = trim(substr($row->tel,0,3));  
        $tel2 = trim(substr($row->tel,3,4));   
        $tel3 = trim(substr($row->tel,7,4));
?>

			<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">전화번호<br>
						<td class="form-control"><input type="text" name="tel1" size="3" value="<?=$tel1?>" class="form-control-sm" required> -
						  <input type="text" name="tel2" size="4" value="<?=$tel2?>" class="form-control-sm" required> -
						  <input type="text" name="tel3" size="4" value="<?=$tel3?>" class="form-control-sm" required> 
						 </td>
					</div>
			</div>


			<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">나이<br>
						<td class="form-control">
						<select name="age" class="custom-select custom-select-sm">
		  
						<?		
									for($i=10;$i<=70;$i++){
										if($row->age == $i){
						?>
											<option value="<? echo $i; ?>" selected><? echo$i; ?></option>
						<?
										$i+1;  
									}
									else if($i<=70){
						?>
									<option value="<? echo $i; ?>"><? echo$i; ?> 세</option>
						<?
									}}
						?>
						</select>						
						</td>            
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-12">
				<div class="form-group">이메일
					<td class="form-control">
						<input type="email" class="form-control" name="email" value="<?=$row->email;?>" required="required">
					</td>                 
				</div>
			</div>

										&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<div class="form-group offset-md-3">
            <button type="submit" class="btn signup-button-color btn-lg btn-block">수정하기</button>
			<br>
		</div>
		

		</form>
	</div>
</div>
</div>
</div>
</div>
</div>       
</div>