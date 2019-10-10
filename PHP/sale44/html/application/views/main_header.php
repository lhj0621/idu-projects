<!doctype html>
<html lang='kr'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Hello, world!</title>
    <!-- Bootstrap CSS -->
       <link  href='/~sale44/my/css/bootstrap.min.css' rel='stylesheet'>
	   <link  href='/~sale44/my/css/my.css' rel='stylesheet'>
	    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='/~sale44/my/js/jquery-3.3.1.min.js'></script>
    <script src='/~sale44/my/js/popper.min.js'></script>
    <script src='/~sale44/my/js/bootstrap.min.js'></script>

	<script src='/~sale44/my/js/moment-with-locales.min.js'></script>
	<script src='/~sale44/my/js/bootstrap-datetimepicker.js'></script>

	<link href='/~sale44/my/css/bootstrap-datetimepicker.css' rel='stylesheet'>
	<link href='/~sale44/my/css/fontawesome-all.css' rel='stylesheet'></script>

  </head>
  <body>
  <div class='container'>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
<a class="navbar-brand" href="/~sale44"> 
    <img src="/~sale44/my/img/logo.png" width="100" height="37" alt="">
  </a>
  <!-- <a class='navbar-brand' href='#'>판매 관리</a> -->
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
<!--  
  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item'>
        <a class='nav-link' href='/~sale44/jangbui'>매입 </a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/~sale44/jangbuo'>매출</a>
      </li>
	  <li class='nav-item'>
        <a class='nav-link' href='/~sale44/gigan'>기간조회</a>
      </li>
      <li class='nav-item dropdown'>
		<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          통계
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='/~sale44/best'>Best제품</a>
          <a class='dropdown-item' href='/~sale44/crosstab'>월별제품별현황</a>
          <a class='dropdown-item' href='/~sale44/graph'>종류별분포도</a>
        </div>
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          기초정보
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='/~sale44/gubun'>구분</a>
          <a class='dropdown-item' href='/~sale44/product'>제품</a>

<?
if ($this->session->userdata("rank")==1)
echo("<div class='dropdown-divider'></div>
          <a class='dropdown-item' href='/~sale44/member'>사용자</a>");
 ?>	
        </div>
		<li class='nav-item'>
			<a class='nav-link' href='/~sale44/picture'>사진</a>
        </li>
	    <li class="nav-item">
			<a class="nav-link" href="/~sale44/ajax">Ajax</a>
		</li>
	    <li class='nav-item'>
			<a class='nav-link' href='/~sale44/test'>test</a>
        </li>
      </li>
-->
	   <div class='collapse navbar-collapse' id='navbarSupportedContent'>
	   <ul class='navbar-nav mr-auto'>
	    <li class='nav-item dropdown'>
		  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          기초정보
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='/~sale44/category'>카테고리</a>
          <a class='dropdown-item' href='/~sale44/book'>제품</a>
        </div>
		<li class='nav-item'>
			<a class='nav-link' href='/~sale44/person'>사용자</a>
        </li>
		<li class='nav-item'>
        <a class='nav-link' href='/~sale44/statusl'>대여/반납</a>
        </li>
		<li class='nav-item'>
			<a class='nav-link' href='/~sale44/picture'>사진</a>
        </li>
      </ul>
<?
if (!$this->session->userdata("uid"))
echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-outline-success btn-secondary my-2 my-lg-0'>로그인</a>");
else
echo("<a href='/~sale44/login/logout' class='btn btn-outline-success btn-secondary my-2 my-lg-0'>로그 아웃</a>");
?>

	</nav>

	<!--Modal Login-->
	<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog modal-sm' role='document'>
		<div class='modal-content'>
			<div class='modal-header mycolor1'>
				<h4 class='modal-title' id='exampleModalLabel'>로그인</h4>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			</div>
			<div class='modal-body bg-light' style='text-align:center'>
				<form name='form_login' method='post' action='/~sale44/login/check'>
					<div class='form-inline'>
						아이디 : &nbsp;&nbsp;
						<input type='text' name='uid' size='15' value='' class='form-control form-control-sm'>
					</div>
					<div style='height:10px'></div>
					<div class='form-inline'>
						암 &nbsp;&nbsp; 호 : &nbsp;&nbsp;
						<input type='password' name='pwd' size='15' value='' class='form-control form-control-sm'>
					</div>
				</form>
			</div>
			<div class='modal-footer alert-secondary' style='text-align:center'>
				<button type='button' class='btn btn-sm btn-secondary' onClick='javascript:form_login.submit();'>확인</button>
				<button type='button' class='btn btn-sm btn-light' data-dismiss='modal'>닫기</button>
			</div>
		</div>
	</div>
	</div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/~sale44/my/img/main1.jpg" height="200" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/~sale44/my/img/main2.jpg" height="200" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/~sale44/my/img/main3.jpg" height="200" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>