<?php
 ob_start();
 session_start();
 require_once 'db.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: Index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<title>Тони Пеловски </title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="webcss.css"  >
	<link rel="stylesheet" href="prod.css"  >
	<link rel="stylesheet" href="boots.css"  >
	<script src="couro.js"></script>
	<style>
    .carousel-inner .active.left  { left: -33%;             }
    .carousel-inner .active.right { left: 33%;              }
    .carousel-inner .next         { left: 33%               }
    .carousel-inner .prev         { left: -33%              }
    .carousel-control.left        { background-image: none; }
    .carousel-control.right       { background-image: none; }
    .carousel-inner .item         { background: none;      }
	</style>

	
	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>
<title>Title</title>
<script src="js.js"></script>

</head>

<body background="http://www.bene.be/images/uploads/2012-blog/20120712/images-summer02.png">
<nav background="http://www.bene.be/images/uploads/2012-blog/20120712/images-summer02.png" style="margin-bottom:0px; height:100px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"c>
        <img alt="" style="width:150px; height:80px;" src="http://www.ue-varna.bg/Uploads/dmbakalova@ue-varna.bg/Logo_TV_2015.png">
      </a>
    </div>
  </div>
</nav>

<nav  style="height:70px; background-color:#ffff33; !Important" >
	  <div class="container-fluid" ALIGN="CENTER">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  
		  <div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="p1u.php">Начална страница</a>
			  <a href="#">Услуги</a>
			  <a href="#">Запитване</a>
			  <a href="#">Картички за рожден ден</a>
			  <a href="#">Картички за празници</a>
			  <a href="#">Картички за именни дни</a>
			   <a href="#">Покани</a>
			  <a href="#">Колажи</a>
		  </div>
		  <span style="font-size:35px;cursor:pointer" onclick="openNav()"><img src="img/threelines.png" style="height:40px; width:40px"></span>
		
		
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
				<li><a></a></li>
		  </ul>
	

		  <ul class="nav navbar-nav">
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size:20px;cursor:pointer">Продукти <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="prodr.php"><font color="black">Картички</font></a></li>
				<li><a href="#"><font color="black">Колажи</font></a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#"><font color="black">Направи си сам</font></a></li>
			  </ul>
			</li>
		  </ul>
		 
		  <ul class="nav navbar-nav">
				<li><a></a></li>
		  </ul>
		  <ul class="nav navbar-nav">
				<li><a></a></li>
		  </ul>
		 <form class="navbar-form navbar-left" action="search1.php" method="GET">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search"  type="text" name="query">
			  
			</div>
			<button type="submit" class="btn btn-default" style="font-size:15px;cursor:pointer;">Submit</button>
		  </form>
		</ul>
		  
	<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Здравейте! <?php echo $userRow['userName']; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><font style="color:black"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</font></a></li>
              </ul>
            </li>
          </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<nav class="navco" style="margin-top:20px; background-color:#ffff33"><center style="font-size:20px;cursor:pointer">Най-нови</center></nav>

<script src="js/jssor.slider-22.1.8.min.js" type="text/javascript"></script>
       <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: http://www.jssor.com -->
    <!-- This code works without jquery library. -->
    <script src="js/jssor.slider-22.1.8.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
    <style>
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        .jssora22l.jssora22lds      (disabled)
        .jssora22r.jssora22rds      (disabled)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
        .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
        .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            <div>
                <img data-u="image" src="img/red.jpg" />
                <div style="position:absolute;top:30px;left:30px;width:480px;height:120px;z-index:0;font-size:50px;color:#ffffff;line-height:60px;">TOUCH SWIPE SLIDER</div>
                <div style="position:absolute;top:300px;left:30px;width:480px;height:120px;z-index:0;font-size:30px;color:#ffffff;line-height:38px;">Build your slider with anything, includes image, content, text, html, photo, picture</div>
            </div>
            <div>
                <img data-u="image" src="img/purple.jpg" />
            </div>
            <a data-u="any" href="http://www.jssor.com" style="display:none">Full Width Slider</a>
            <div>
                <img data-u="image" src="img/blue.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
<div/>
<hr style = " background-color: #ffff33; height: 2px; ">

	<nav class="navco" style="margin-top:50px; width:100%; background-color:#ffff33"><center style="font-size:20px;cursor:pointer">Най-използвани</center></nav>
<div id="myCarousel" class="carousel slide" style="height:400px">

<div class="carousel-inner">
    <div class="item active">
        <div class="col-xs-4"><a href="#"><img src="http://placehold.it/400/bbbbbb/fff&amp;text=1" class="img-responsive"></a></div>
    </div>
    <div class="item">
        <div class="col-xs-4"><a href="#"><img  style="height:400px; width:400px" src="babamarta35.jpg" class="img-responsive"></a></div>
    </div>
    <div class="item">
        <div class="col-xs-4"><a href="#"><img  style="height:400px; width:400px" src="mart.jpg-3.jpg" class="img-responsive"></a></div>
    </div>
    <div class="item">
        <div class="col-xs-4"><a href="#"><img style="height:400px; width:400px" src="babamarta35.jpg" class="img-responsive"></a></div>
    </div>
    <div class="item">
        <div class="col-xs-4"><a href="#"><img src="http://placehold.it/400/fcfcfc/333&amp;text=5" class="img-responsive"></a></div>
    </div>
    <div class="item">
        <div class="col-xs-4"><a href="#"><img src="http://placehold.it/400/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
    </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>



<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.js"></script>

<!-- Script to Activate the Carousel -->
<script>

    $('#myCarousel').carousel({
        interval: 10000
    });

    $('.carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });

</script>

<hr style = " background-color: #ffff33; height: 3px; ">
<div id="ad">
   <iframe
      src=""
      border="0"
      scrolling="no"
      allowtransparency="true"
      width="100%"
      height="100%"
      style="border:0;">
   </iframe>
</div>
<table class="table" style="background-color:#ffff33" style="margin-top:20px">
		<tr>
			<th COLSPAN="3"><BR><H3 ALIGN="CENTER" style="font-size:25px;cursor:pointer">Something more</H3>
			  </th>
		</tr>
		<tr ALIGN="CENTER">
			<td style="width:33%" > <a href="uslugi.html"><h3 style="font-size:20px;cursor:pointer" > Favours </h3></a> <p style="width:45%">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p></td>
			<td style="width:33%"> <a href="contactform.php"><h3 style="font-size:20px;cursor:pointer"> Ask </h3></a> <p style="width:45%">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p> </td>
			<td style="width:33%" > <a href=""><h3 style="font-size:20px;cursor:pointer" > Contacts</h3></a> <p >- Phone </br>- E-mail <br/>- Address</p> </td>
			
		</tr>
	
	</table>
	
	
	<nav class="navcpy">

		<p align="middle">Copyright © Copyright Животно</p>
	</nav>
</body>



</html>