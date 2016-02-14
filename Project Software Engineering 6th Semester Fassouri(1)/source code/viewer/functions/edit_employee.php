<?php
	include '../model/connect.php';
	session_start();
if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
}
else
{
	header("Location:login_form.php");
}
 ?> 
<!DOCTYPE html>




<html>
    
    <head>
		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="../js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/function.css">
		
		<script src="../js/function.js"></script>
        <title>New Section</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
			Insert New Section<br><br>
			Name: <input type="text" name="sectionName"> <br><br>
			<br>
			<button type="button" class="btnG">Insert</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>