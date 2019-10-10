
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome to vist AppleTour</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="/~team5/my/usercss/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/~team5/my/usercss/animate.css">

   
    <link rel="stylesheet" href="/~team5/my/usercss/owl.carousel.min.css">
    <link rel="stylesheet" href="/~team5/my/usercss/owl.theme.default.min.css">
    <link rel="stylesheet" href="/~team5/my/usercss/magnific-popup.css">

    <link rel="stylesheet" href="/~team5/my/usercss/aos.css">

    <link rel="stylesheet" href="/~team5/my/usercss/ionicons.min.css">

    <link rel="stylesheet" href="/~team5/my/usercss/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/~team5/my/usercss/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/~team5/my/usercss/flaticon.css">
    <link rel="stylesheet" href="/~team5/my/usercss/icomoon.css">
    <link rel="stylesheet" href="/~team5/my/usercss/style.css?ver=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="/~team5/my/images/favicon_96x96.png" size="96x96">
	<link rel="icon" type="image/png" href="/~team5/my/images/favicon_32x32.png" size="32x32">
	<link rel="icon" type="image/png" href="/~team5/my/images/favicon_16x16.png" size="16x16">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>

  <script>

function active1(){
	var afterStr = location.pathname.split('/');
	alert(afterStr[2]);
	}
function bookmarksite(title,url) {
   // Internet Explorer

   if(document.all){
       window.external.AddFavorite(url, title);
   }
   // Google Chrome
   else if(window.chrome) {
      alert("Ctrl+D키를 누르시면 즐겨찾기에 추가하실 수 있습니다.(chrome한정)");
   }
   // Firefox
   else if (window.sidebar) {
       window.sidebar.addPanel(title, url, "");
   }
   // Opera
   else if(window.opera && window.print) {
      var elem = document.createElement('a');
      elem.setAttribute('href',url);
      elem.setAttribute('title',title);
      elem.setAttribute('rel','sidebar');
      elem.click();
   }
}

$(function(){
    
   $('ul li a').click(function(){
      var item=$(this).parent();

       item.addClass("active")
    });
       
});
</script>



<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #fff;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
	.modal-login.modal-dialog {
		margin-top: 80px;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #f85959;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #FFF;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
  <body>
   
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/~team5/main"><i class="fab fa-apple">&nbsp</i>AppleTour</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/~team5/main" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/~team5/about" class="nav-link">About</a></li>
		  <li class="nav-item"><a href="/~team5/country" class="nav-link">Country</a></li>
					
		<li class="nav-item"><a href="/~team5/product" class="nav-link">Package</a></li>
        <!--- <li class="nav-item"><a href="tour.html" class="nav-link">Tour</a></li> -->
          <li class="nav-item"><a href="/~team5/freeTravel" class="nav-link">Free Travel</a></li>
          <li class="nav-item"><a href="/~team5/hotel" class="nav-link">Hotel</a></li>
	
<?

	if (!$this->session->userdata('id'))
		echo("<li class='nav-item'><a href='/~team5/signup' class='nav-link'>Sign Up</a></li>
		<li class='nav-item'><a href='#exampleModal' data-toggle='modal' class='nav-link'>LogIn</a></li>

		");
	else
		if($this->session->userdata('rank')==1)
			echo("<li class='nav-item'><a href='/~team5/mypage/view' class='nav-link'>Mypage</a><li class='nav-item'><a href='/~team5/admin' class='nav-link'>Admin</a><li class='nav-item'><a href='/~team5/login/logout' class='nav-link'>Logout</a>
			");
		else
			echo("<li class='nav-item'><a href='/~team5/mypage/view' class='nav-link'>Mypage</a><li class='nav-item'><a href='/~team5/login/logout' class='nav-link'>Logout</a>
			");

	
		
?> 

          <li class="nav-item cta"><a href="javascript:bookmarksite('AppleTour', 'http://gamejigix.induk.ac.kr/~team5/main')"class="nav-link"><span>Bookmark</span></a></li>
        </ul>

      </div>
    </div>

  </nav>


    <!-- END nav -->
<div id="exampleModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="/~team5/my/images/avatar.jpg" alt="Avatar">
				</div>				
				<h4 class="modal-title">로그인</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="/~team5/login/check" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="id" placeholder="아이디" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pw" placeholder="비밀번호" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">로그인</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="/~team5/signup">회원가입</a>
			</div>
		</div>
	</div>
</div>     
