<?php
session_start();
include_once("db2.php");



$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<?php
 ob_start();

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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="webcss.css"  >
	<link rel="stylesheet" href="prod.css"  >
	<link rel="stylesheet" href="boots.css"  >
	<link rel="stylesheet" href="button.css"  >
	
	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>
	<style>
	#boton2{
	   background: #ffd633;
	   

	   -webkit-border-radius: 8;
	   -moz-border-radius: 8;
	   border-radius: 8px;
	   font-family: Arial;
	   color: black;
	   font-size: 20px;
	   padding: 10px 20px 10px 20px;
	   text-decoration: none;
	   width: 30%
	} 
	</style>
		<style>
	#search{
		margin-top:55px;
		margin-right:-200px;
	}
	#profile{
		margin-right:-185px;
	}
	</style>
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
	<form class="navbar-form navbar-right" id="search" action="search1.php" method="GET">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search"  type="text" name="query">
			  
			</div>
			<button type="submit" class="btn btn-default" style="font-size:15px;cursor:pointer;">Submit</button>
	</form>
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
			  <a href="p1.php">Начална страница</a>

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
				<li><a href="#">Услуги</a></li>
		  </ul>
		  <ul class="nav navbar-nav">
				<li> <a href="#">Запитване</a></li>
		  </ul>
		 
		</ul>
		
		<ul class="nav navbar-nav navbar-right" id="profile">
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
	<h2 align="center"> Картички </h2>
	<div style="margin-left:31%; margin-top:40px; margin-bottom:20px">
<ul class="nav nav-pills" >
	<li role="presentation" style="background-color:#ffff33;"><a href="#">Картички за празници</a></li>
	<li role="presentation"><a href="#"><font color="black">Картички за рожден ден</font></a></li>
	<li role="presentation"><a href="#"><font color="black">Картички за именни дни</font></a></li>
</ul>
</div>
<hr style = " background-color: #ffff33; height: 2px; ">

	<div align = "center">
	<ul class="products" style="margin-left:0%; margin-right:0.5%;">
	<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name FROM products ORDER BY product_name ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT

    <li style="width:330px; background-color:#ffff33;">
        <a href="{$obj->product_desc}">
            <img style="width:300px; margin-top:10px; height:200px" src="{$obj->product_img_name}">
            <h4>{$obj->product_name}<a href="{$obj->product_desc}"><button type="button" id="boton2" style="height:40px;margin-left:54%; ">Open</button></a></h4>
            
        </a>
    </li>
       

	
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
</ul>
</div>
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
<table class="table" style="background-color:#ffff33;" style="margin-top:20px">
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