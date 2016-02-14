<?php
	include'../../model/stock_functions.php';
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
        <title>New Item Section</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
		<form method="post">
			Insert New Section<br><br>
			Name: <input type="text" name="sectionName"> <br><br>
			<br>
			<input type="submit" class="btnG" name="insert" onclick="return confirm('Insert new section?')" value="Insert">
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>