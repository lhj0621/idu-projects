<div class="hero-wrap js-fullheight" style="background-image: url('/~team5/my/images/sign_up.jpg');">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script>
var idck = 0;
$(function(){
	$("#checkID").click(function(){
		var id = $("#id").val();
		$.ajax({					
					url: "/~team5/signup/checkID",
					type: "POST",
					data:{
						"id":id
					},
					dataType:"html",
					complete : function(xhr, textStatus) {
					var num = xhr.responseText;
                if (num > 0) {
                    alert("아이디가 존재합니다. 다른 아이디를 입력해주세요.");
					idck = 0;
				} else {
                    alert("사용가능한 아이디입니다.");
					 idck = 1;
					}
			}
        });
    });
});
</script>
<script>
function checkId1() {
		var id = $("#id").val();
		$.ajax({					
					url: "/~team5/signup/checkID",
					type: "POST",
					data:{
						"id":id
					},
					dataType:"html",
					complete : function(xhr, textStatus) {
					var num = xhr.responseText;
                if (num > 0) {           
					$('#cktext').text("※아이디 중복");
					$('#cktext').css("color","red");
				   $(".id-input").css("border-color", "#FF0000");
				   $(".signup-button-color").prop("disabled", true);
				   idck = 0;
				} else {  
					$('#cktext').text("");
					$(".id-input").css("border-color", "#5cb85c");
					$(".signup-button-color").prop("disabled", false);
					idck = 1;
					}
				},
					
        });
	}
</script>

<script>

</script>
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
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
		border: 0.5px solid red;
		border-color: #f85959;
		color: #f85959;

	}
	.w3-red{
		color: #fff;
        border-radius: 4px;
		background: #f85959;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
	}	
	.w3-red:hover,.w3-red:focus{
		background: #FFF;
		border: 0.5px solid red;
		border-color: #f85959;
		color: #f85959;
	}
	.id-input{
		
		
	}
</style>
</head>
<body><br><br>
<div class="signup-form">

    <form action="/~team5/signup/add" method="post" enctype="multipart/form-data">
		<h2>회원가입</h2>
		<div class="form-row">

		<div class="form-group col-md-6">아이디 <font id="cktext" size=1></font>
			 <input type="text" class="form-control id-input" name="id" id="id" oninput="checkId1()">
        </div>
        <div class="form-group col-md-6">이름
			 <input type="name" class="form-control" name="name" required="required">  	
        </div>
		<div class="form-group col-md-12"> 
        </div>
		<div class="form-group col-md-6">비밀번호
            <input type="password" class="form-control" name="pw" required="required">
        </div>

		<div class="form-group col-md-6">나이
		  
        	<select name="age" class="custom-select custom-select-sm">
		  <option selected>나이 선택</option>
<?		
			for($i=10;$i<=70;$i++){
?>
			<option value="<? echo $i; ?>"><? echo$i; ?> 세</option>
<?
		  }
?>
			</select>
        </div>
        <div class="form-group col-md-12">이메일
        	<input type="email" class="form-control" name="email" required="required">
        </div>

					  <div class="form-group">&nbsp&nbsp번호</br>&nbsp&nbsp                  
                          <input type="text" name="tel1" size="3" value="" maxlength="3" class="form-control-sm" required> -
						  <input type="text" name="tel2" size="4" value="" maxlength="4" class="form-control-sm" required> -
						  <input type="text" name="tel3" size="4" value="" maxlength="4" class="form-control-sm" required>                     
                      </div>

					
					  <div class="form group col-md-6">
                      <p>성별<br>
                        남자
                        <input type="radio" class="flat" name="gender" value="0" checked="" required /> 여자
                        <input type="radio" class="flat" name="gender" value="1" />
                      </p>
</div>
		  

	<div class="form-group">&nbsp&nbsp프로필 사진 <br>
	  <input type="file" class="form-control-sm" name="profile">
	</div>
	</div>

        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> <a href="http://www.kisa.or.kr/customer/privacy.jsp">개인정보 처리 방침</a>에 동의합니다</label>
		</div>
		<div class="form-group">

            <button type="submit" class="btn signup-button-color btn-lg btn-block">지금 등록하기</button>
        </div>
    </form>
	
</div>
 