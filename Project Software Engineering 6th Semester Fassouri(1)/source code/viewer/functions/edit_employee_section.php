<?php 
	include '../../model/connect.php';
	include '../../model/employee_functions.php';
	session_start();
	echo $_SESSION['section_id'];

	$section_id = $_SESSION['section_id'];
	$section = "SELECT *
				FROM employee_section 
				WHERE section_id = '$section_id'";
	$section_result = $dbh->query($section);
	foreach ($section_result as $section_details)
	{
		$section_name = $section_details['name'];	
	}


	if (isset($_POST['section_name'],$_POST['save']))		
	{
		$section_name = $_POST['section_name'];
		$edit = "UPDATE employee_section SET name ='$section_name' WHERE section_id='$section_id' ";		
		if($dbh->exec($edit))
		{
			echo "<script>alert('Section name Successfully updated!');</script>";
			echo '<script> window.opener.location.reload();</script>';
            echo "<script>location.reload;</script>";		
		}
		else
		{
			echo "<script>alert('What a shame...Error Occured!');</script>";
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
        <title>Edit Employee Section</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
			<p>Edit Section</p>

			<form method="post"> 
			Section Selected: <strong><?php echo $section_name ?> </strong> <br>         
            Section Name: <input type="text" name="section_name" value="<?php echo "$section_name"; ?>"> <br><br>
			<br><br>
			<button type="submit" class="btnG" name ="save">Save</button>
			<input type="submit" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>