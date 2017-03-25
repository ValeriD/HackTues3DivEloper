<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'db.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
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
				<li><a href="produ.php"><font color="black">Картички</font></a></li>
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
		 <form class="navbar-form navbar-left" action="search.php" method="GET">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search"  type="text" name="query">
			  
			</div>
			<button type="submit" class="btn btn-default" style="font-size:15px;cursor:pointer;">Submit</button>
		  </form>
		</ul>
		  
		<ul class="nav navbar-nav navbar-right">
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

<div class="container" >

 <div id="login-form" style="width:50%; margin-left:39%">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="" style="color:black">Sign Up.</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span style="color:white"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span style="color:white"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span style="color:white"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="boton" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="index1.php" style="color:black">Sign in Here...</a>
            </div>
			
			<div class="form-group">
             <a href="p1u.php" style="color:black">Go back</a>
            </div>
        
		
        </div>
   
    </form>
    </div> 

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
<?php ob_end_flush(); ?>