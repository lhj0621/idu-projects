<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apple Tour Admin</title>

	 <!-- Bootstrap -->
    <link href="/~team5/my/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/~team5/my/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/~team5/my/admin/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/~team5/my/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">Admin Login</h1>
				<div class="modal-body">
				<form action="/~team5/login/admin_check" method="post">
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
				<button class="btn btn-secondary btn-lg btn-block" onClick="document.location.href='/~team5/main'">홈으로</button>
			</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/~team5/my/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/~team5/my/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/~team5/my/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/~team5/my/admin/vendors/nprogress/nprogress.js"></script>

     <!-- Custom Theme Scripts -->
    <script src="/~team5/my/admin/build/js/custom.min.js"></script>
  </body>
</html>