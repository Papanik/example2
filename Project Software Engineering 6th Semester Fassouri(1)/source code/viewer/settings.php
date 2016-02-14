<?php
include '../model/connect.php';
session_start();
$user_id = $_SESSION['user_id'];
include '../model/settings_functions.php';


?>
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>
    
    <head>
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/settings.css">
		
		
        <title>Fasouri Waterpark - Settings</title>
    </head>
    <body>

	<div class="container">
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">
				<div class="nav" align="right">
				<ul>
					<li><a href="menu.php"><button type="button" class="btn" title="Return to Main Menu"><img src="img/icons/home.png" alt="Home" style="width:20px;height:20px">Menu</button></a></li>
					<li><a href="../model/logout.php"><button type="button" class="btnR"title="Log out">Log Out</button></a></li>
				</ul>
				
				
				</div>
			</div>
		</div>
		
		<div class="row">
		      <p>Settings</p>	
		</div>
        
		
		<div class="row">									
		  
            <div class="col-md-6">
            <form method="post">
            
                <br>
                <table cellspacing="20">
                <tr>
                        <td>Current User : </td>
                        <td><?php echo $name.' '.$surname.' ('.$username.')'; ?></td>
                    </tr>
                    <tr>
                        <td>New Username: </td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Current Password: </td>
                        <td><input type="password" name="old_pass"></td>
                    </tr>
                    <tr>
                        <td>New Password: </td>
                        <td><input type="password" name="new_pass"></td>
                    </tr>
                    <tr>
                        <td>Verify New Password: </td>
                        <td><input type="password" name="new_pass_conf"></td>
                    </tr>
                
                </table>
                
                <br><br>
                <button type="submit" name="save" onclick="return confirm('Update Username/Password?');" class="btn"title="Log out"><img src="img/icons/save.png" alt="New" style="width:30px;height:30px">&ensp;&ensp;Save Changes</button>
                </form>
            </div>
			
		</div>
		
		
		
		
	
		
	
	
	</div>
        
	
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
                <div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Developed by: TEPAK Software Technology Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Settings.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>