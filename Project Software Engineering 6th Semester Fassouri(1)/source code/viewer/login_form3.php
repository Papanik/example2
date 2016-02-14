<?php
    include '../model/connect.php';
	session_start();
	if(isset($_SESSION['user_id']))
	{
		header("Location:menu.php");
	}
?>
<!DOCTYPE html>




<html>
    
    <head>
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="viewer/css/style.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">

        <title>Fasouri Waterpark - Login</title>
    </head>
    <body>

	<div class="row">						<!-- Company Logo -->
		<div class="col-xs-12" align="center">
			<div id="logoFas"></div><br>
		</div>
	</div>	
	
	<div class="container">
			
		
			
			
		<div class="row">									<!-- 1st row contains Login form -->
		
			Management Software - Login
			<div class="login">
			<br>
                <form method="post" > 
				<ul>
					<li>Username: <br><br> Password: </li>  
					<li><input type="text" name="username" name="username" placeholder="Type your Username" required autofocus><br><br>
                        <input id = "password" type="password" name="password" placeholder="Type your Password" required></li>
			<br><br>
				</ul>		               		
			</div>								
			<div class="col-xs-12">				
				<button class = "btnG" type = "submit" name = "login_button">Login</button>
				<button class = "btnR" onclick="window.open('forgot_password.php','_blank');" name = "forgot">Forgot Password?</button>
				</form>
			</div>
		</div>				
	</div>  
 <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br>Cyprus University of Technology Software Development Team 2015<br>© 2015.  <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Login.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>	
    </body>
	</html>
	<?php 
		if(isset($_POST['login_button']))
		{
			include '../model/login.php';
		}
	?>
	