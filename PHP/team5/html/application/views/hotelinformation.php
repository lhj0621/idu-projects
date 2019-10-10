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
    <link rel="stylesheet" href="/~team5/my/usercss/style.css?ver=2">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Gothic+A1" rel="stylesheet">
  </head>
  <style>
		p.a{
			font-family: 'Do Hyeon', sans-serif;
			
		}
		p.b{
			font-family: 'Gothic A1', sans-serif;
		}
  </style>
  <body>


<br>
			
			<p class="a" align="center" style="font-size: 30px;">호텔정보</p>
			<hr>
			<div class="card" style="width: 63rem;" align="center">

			  <img class="card-img-top" src="/~team5/img/<?=$row->img?>" alt="Card image cap">
			  <div class="card-body">
			  <p class="b"><?=$row->original_country_name?>, <?=$row->original_city_name?></p>
			  
				<p class="b" style="font-size:22px"><?=$row->name?>
				<p class="b"><?=$row->address?></p>
										<?
										if ($row->score ==0)
										{
											echo ("<p class='rate'>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}

										else if($row->score == 1)
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>

													</p>");
										}
										else if ($row->score == 2 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}

										else if ($row->score == 3 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->score == 4 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if ($row->score == 5 )
										{
											echo ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													</p>");
										}
	?></p>
				<p class="b">1박 숙박 가격 : <?=number_format($row->price)?>원</p>
			  </div>
			</div>
			<p class="b"><?=nl2br($row->information) ?></p>
  </body>

  </html>