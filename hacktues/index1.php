<?php
 ob_start();
 session_start();
 require_once 'db.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: p1.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: p1.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
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
	<form class="navbar-form navbar-right" id="search" action="search.php" method="GET">
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
			  <a href="p1u.php">Начална страница</a>

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
				<li><a href="produ.php"><font color="black">Картички</font></a></li>
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
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size:20px;cursor:pointer">Профил <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="Index1.php"><font color="black">Вход</font></a></li>
					<li><a href="Register.php"><font color="black">Регистрация</font></a></li>
					
				</ul>
				</li>
				</ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

<div class="container">

 <div id="login-form" style="width:50%; margin-left:39%"">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="" style="color:black">Sign In.</h2>
            </div>
        
         <div class="form-group">
             <hr style="background-color:#ffff33; "/>
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr style="background-color:#ffff33"/>
            </div>
            
            <div class="form-group">
             <button  type="submit" class="boton" name="btn-login" href="p1.php">Sign In</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="Register.php" style="color:black">Sign Up Here...</a>
            </div>
			
			<div class="form-group">
             <a href="p1u.php" style="color:black">Go back</a>
            </div>
			
			<div class="form-group">
             <a href="#" style="color:black">Forgotten Password...</a>
            </div>
        
        </div>
   
    </form>
    </div> 

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
<?php ob_end_flush(); ?>