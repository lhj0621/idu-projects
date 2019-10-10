<!DOCTYPE html>
<?
	if($this->session->userdata('rank')!=1)
		echo("<script>document.location.href='/~team5/admin'</script>");
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/Favicon2.ico" type="image/ico" />

    <title>AppleTour Admin </title>

    <!-- Bootstrap -->
    <link href="/~team5/my/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/~team5/my/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/~team5/my/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/~team5/my/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/~team5/my/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/~team5/my/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/~team5/my/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/~team5/my/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/~team5/admin" class="site_title"><i class="fa fa-apple"></i> <span>AppleTour</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/~team5/img/<?=$this->session->userdata('profile')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->userdata('name');?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/main">HomePage</a></li>
                    </ul>
                  </li>

				  <!--<li><a><i class="fa fa-table"></i> 테이블 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_member">사용자</a></li>
                      <li><a href="/~team5/admin_product">상품</a></li>
					  <li><a href="/~team5/admin_country">국가</a></li>
 					  <li><a href="/~team5/admin_countryDetail">국가상세</a></li>
					  <li><a href="/~team5/admin_city">도시</a></li>
					  <li><a href="/~team5/admin_hotel">호텔</a></li>
   					  <li><a href="/~team5/admin_yeyag">예약관리</a></li>
   					  <li><a href="/~team5/admin_flight">항공기</a></li>
					  <li><a href="/~team5/admin_freetravel">자유여행</a></li>
                    </ul>
                  </li>-->
		<li><a><i class="fa fa-user"></i>사용자 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_member">사용자 정보</a></li>
                      <li><a href="/~team5/admin_member/add">사용자 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-support"></i>국가 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_country">국가 정보</a></li>
                      <li><a href="/~team5/admin_country/add">국가 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-institution"></i>도시 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_city">도시 정보</a></li>
                      <li><a href="/~team5/admin_city/add">도시 정보 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-quote-left"></i>국가 상세정보 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_countryDetail">국가 상세정보</a></li>
                      <li><a href="/~team5/admin_countryDetail/add">국가 상세정보 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-inbox"></i>패키지 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_product">패키지 상품 정보</a></li>
                      <li><a href="/~team5/admin_product/add">패키지 상품 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-thumbs-up"></i>자유여행 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_freetravel">자유여행 목록</a></li>
                      <li><a href="/~team5/admin_freetravel/add">자유여행 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-h-square"></i>호텔 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_hotel">호텔 목록</a></li>
                      <li><a href="/~team5/admin_hotel/add">호텔 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-plane"></i>항공기 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_flight">항공기 목록</a></li>
                      <li><a href="/~team5/admin_flight/add">항공기 추가</a></li>
                    </ul>
                  </li>

				  <li><a><i class="fa fa-qq"></i>예약관리 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/~team5/admin_yeyag">예약정보</a></li>

                    </ul>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="/~team5/login/admin_logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?=$this->session->userdata('name');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/~team5/login/admin_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->