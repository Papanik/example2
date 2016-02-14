<?php
	include'../../model/staff_functions.php';
	include '../../model/connect.php';

	if(isset($_POST['insert']))
	{
		if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$name = "INSERT INTO employee_section (employee_section_name) VALUES ('$name')  "; 
			$name_result = $dbh->exec($name);
			if($name_result)			
			{
				echo '<script>alert("Section added successfully!")</script>';
				echo '<script> window.opener.location.reload();</script>';
				echo '<script>self.close()</script>';
			}
		}
		else
		{
			echo '<script>alert("Please fill all fields!")</script>';
		}	
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
		<form method="post">
			Insert New Section<br><br>
			Name: <input type="text" name="name"> <br><br>
			<br>
			<input type="submit" onclick="return confirm('Insert new Section?')" class="btnG" name="insert" value="Insert">
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>