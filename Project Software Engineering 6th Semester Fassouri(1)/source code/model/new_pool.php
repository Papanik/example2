<?php 
include '../../controler/addpool.php';



 

	
	

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
        <title>New Pool</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
			<p>Insert New Pool</p>
			
            Section:
				<form method="post">
                <select name="section" style="width:90%";>
                  <?php section(); ?>
                </select><br><br>
         
            
            Pool Name: <input type="text" name="poolName"> <br><br>
			<br><br>
			<button type="submit" name="save" class="btnG">Insert</button>
			</form>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>