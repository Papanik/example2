<?php
session_start();
if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
	include '../model/permissions.php';
}
else
{
	header("Location:login_form.php");
}
?>
<!DOCTYPE html>



<html>
    
    <head>
    <link rel="stylesheet" href="css/style.css">
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/menu.css">
        <title>Fasouri Waterpark - Main Menu</title>
    </head>
    <body>

	<div class="container">
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">
				<div class="nav" align="right">
				<ul>
					<li><a href="../model/logout.php"><button type="button" class="btnR">Log Out</button></a></li>
				</ul>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="formTitle">Main Menu</div>
		</div>
		
		<div class="row">									
			<div class="menuBtn">									
				<ul>
						<form method = "post">
						<li><button type="submit" id="stock" class="btnL" name = "stock" >Stock <br> control</button> </li>
						<li><button type="submit" id="staff" class="btnL" name = "staff" >Staff <br>Management</button></li>
						<li><button type="submit" id="employee" class="btnL" name = "employee" ><br> Employee</button></li>				
						<li><button type="submit" id="technical" class="btnL" name = "technical" ><br>Technical</button></li>
						<li><button type="submit" id="incident" class="btnL" name = "incident" ><br>Incident</button></li>
						<li><button type="submit" id="settings" class="btnL" name = "settings" >User <br> Account</button></li>
					
						
						</form>
					
				</ul>
			</div>
			<br>
		</div>
		
	
		
	
	
	</div>
        
	
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/MainMenuScreen.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
    </body>
	</html>
	
	<?php
		if ((isset($_POST['stock'])) ||(isset($_POST['staff'])) || (isset($_POST['technical']))
			|| (isset($_POST['incident'])) || (isset($_POST['employee'])))
		{
			include '../model/permissions.php';
		}