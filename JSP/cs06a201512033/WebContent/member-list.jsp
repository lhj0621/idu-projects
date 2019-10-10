<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universal - All In 1 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.marsala.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div id="all">
     	<%@ include file="top-nav.jsp" %> 
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">About Us</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <section class="bar no-mb">
          <div class="container">
            <div class="col-md-12">
              <div class="heading">
                <h2>Meet Our Team</h2>
              </div>
              <div class="row text-center">
               <%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
					<c:forEach var="member" items="${list}">		
                <div class="col-md-4">
                  <div data-animate="fadeInUp" class="team-member">
                    <div class="image"><a href="team-member.html"><img src="files/${member.image}" alt="" class="img-fluid rounded-circle"></a></div>
                    <h3><a href="team-member.html">${member.name}</a></h3>
                    <p class="role">${member.birthday}</p>
                    <ul class="social list-inline">
                      <li class="list-inline-item"><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="email"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    <div class="text">
                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                  </div>
                </div>
                </c:forEach>
              </div>
        	<div class="row">
            <div class="col-md-4"></div>
              <div class="col-md-4">
            		<nav aria-label="Page navigation example">
                      <ul class="pagination">
                      <!--  pagenation 속성은 product-list.do에서 전달됨 -->
                      <c:if test="${pagination.beginPage > pagination.paginationCount }">
                        <li class="page-item"><a href="member-list.do?pageNum=${pagination.beginPage - 1 }&sortType=${sortType}" class="page-link">이전</a></li>
                      </c:if>
                      <c:forEach var="pnum" begin="${pagination.beginPage}" end="${pagination.endPage}">
                      	<c:if test="${pnum == pagination.curPage }">  
                        <li class="page-item active">
                        </c:if>
                        <a href="member-list.do?pageNum=${pnum}&sortType=${sortType}" class="page-link">${pnum }</a></li>
                        </c:forEach>
                        <c:if test="${pagination.endPage < pagination.totalPages }">
                        <li class="page-item"><a href="member-list.do?pageNum=${pagination.endPage + 1 }&sortType=${sortType}" class="page-link">다음</a></li>
                      	</c:if>
                      </ul>
                    </nav>
              </div>
              <div class="col-md-4"></div>
            </div>
              <div class="see-more text-center"><a href="portfolio-4.html" class="btn btn-template-outlined">See all our team members</a></div>
            </div>
          </div>
        </section>
        
      </div>
   	<%@ include file="getit-footer.jsp" %>  
    </div>
    <!-- Javascript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>