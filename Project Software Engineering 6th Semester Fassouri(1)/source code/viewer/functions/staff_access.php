<?php

	include '../../model/connect.php';
	session_start();
	$employee_id = $_SESSION['employee_id'];//Read employee id
	$password = $_SESSION['password'];

	$details = "SELECT *
				FROM employee
				WHERE employee_id='$employee_id' ";
	$details_result = $dbh->query($details);//Get Details

	//Assign Data
	foreach ($details_result as $data)
	{
		$employee_name = $data['name'];
		$employee_surname = $data['surname'];
	}

	//Check if exists in user table
	$exists = "	SELECT * 
				FROM user
				WHERE employee_employee_id = '$employee_id' ";

	$exists_result = $dbh->query($exists);
	$first =0;
	
	//If so, get user_id 
	if ($count = $exists_result->rowCount() > 0) 
	{	
		$status = "Registerd";
		foreach ($exists_result as $row)
		{
			$user_id = $row['user_id'];
		}
			$username = 'N/A';
			$password = 'N/A';
	
		$i=0;

		
		if(isset($_POST['save_button']))
		{
			if(isset($_POST['stock'])){$stock = 1;$i++;}else{$stock = 0;}
			if(isset($_POST['staff'])){$staff = 1;$i++;}else{$staff = 0;}
			if(isset($_POST['technical'])){$technical = 1;$i++;}else{$technical = 0;}
			if(isset($_POST['incident'])){$incidents = 1;$i++;}else{$incidents = 0;}
			if(isset($_POST['employee'])){$employees = 1;$i++;}else{$employees = 0;}
			if(isset($_POST['settings'])){$settings = 1;$i++;}else{$settings = 0;}		

			$edit_level = "	UPDATE access_level
							SET stock_control ='$stock', staff_management='$staff', incidents='$incidents', technical='$technical', employee='$employees', settings='$settings' 
							WHERE user_id = '$user_id'";
			if($dbh->query($edit_level))
			{
				echo '<script>alert("Access Granted!")</script>';
				echo '<script> window.opener.location.reload();</script>';			
				echo '<script>self.close()</script>';
			}
			/*self.close()*/
		}						
	}

	else
	{	
		$status = "Un - Registerd";
		$i=0;
		$first =1;
		//FUNCTION - USERNAME - PASSWORD
		$sbstr1 = substr($employee_name,0,2);
		
		
		$username = strtolower($sbstr1.".".$employee_surname);
		

		if(isset($_POST['save_button']))		
		{

			
			if (isset($_POST['stock'])){$stock = 1;$i++;}else{$stock = 0;}
			if (isset($_POST['staff'])){$staff = 1;$i++;}else{$staff = 0;}
			if (isset($_POST['technical'])){$technical = 1;$i++;}else{$technical = 0;}
			if (isset($_POST['incident'])){$incidents = 1;$i++;}else{$incidents = 0;}
			if (isset($_POST['employee'])){$employees = 1;$i++;}else{$employees = 0;}
			if (isset($_POST['settings'])){$settings = 1;$i++;}else{$settings = 0;}
			if($i==0)
			{
				echo "<script>alert('Please select at least one sector')</script>";
			}
			else
			{
				$sbstr1 = substr($employee_name,0,2);
				$username = strtolower($sbstr1.".".$employee_surname);
				
			

				$add_access = "	INSERT INTO user
								(employee_employee_id,username,password)
								VALUES ('$employee_id', '$username', '$password')";
				//Insert into user the employee ->new user						
				$add_access_result = $dbh->exec($add_access);
				$stmt = $dbh->query("SELECT LAST_INSERT_ID()");
				$lastId = $stmt->fetch(PDO::FETCH_NUM);
				$lastInsertId = $lastId[0];

				

				$add_level = "	INSERT INTO access_level
							(user_id,stock_control, staff_management, incidents, technical, employee, settings)
							VALUES ('$lastInsertId', '$stock', '$staff', '$incidents', '$technical', '$employees', '$settings') ";
					
			
				$add_level_result = $dbh->exec($add_level);
				echo '<script>alert("Access Granted!")</script>';
				echo '<script> window.opener.location.reload();</script>';
				echo '<script>self.close()</script>';
			}
		}

					
	}


	if (isset($_POST['remove_access']))
	{
		try{

				$delete = "	DELETE
							FROM user
							WHERE employee_employee_id = '$employee_id' ";
				$delete_result = $dbh->exec($delete);
				if ($delete_result)
				{
					echo '<script>alert("Access Removed")';
					echo '<script> window.opener.location.reload();</script>';
					echo '<script>self.close()</script>';										
				}
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
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
	
		 <link rel="stylesheet" href="../css/access.css">
		
		<script src="../js/function.js"></script>
        <title>Change Staff Access</title>		
    </head>
    <body>

	<div class="container">	
		<div class="board" align="right">
            <p align="left">Staff Access: <?php echo $employee_name." ".$employee_surname ?></p><br>
            <p>  <?php echo $status; ?></p><br>
            <form method="post" class="accessbox">
            <p>
                <input type="checkbox" name="stock">Stock Control<br>
                <input type="checkbox" name="staff">Staff Management<br>
                <input type="checkbox" name="employee">Employees<br>
                <input type="checkbox" name="technical">Technical<br>
                <input type="checkbox" name="incident">Incidents<br>
                <input type="checkbox" name="settings">Settings<br><br>
                <input type="submit" value="Save" name="save_button" class="btnG" onclick="return confirm('Change Access?');" >
                <button class="btnR" value="Cancel" onclick="self.close()">Cancel</button>
                <button type="submit" name = "remove_access" class ="sbtn" onclick="return confirm('Remove access for this person?')">Remove Access</button>
            </p>
            </form>

            <div id="access_box">
            	Username:<p id="details"><?php echo $username ?></p>
            	<br>
            	Password:<p id="details"><?php echo $password ?></p>
            	<br>
            	<p style="font-weight:1000; font-size:15px;"><?php if($first==1){echo 'NOTE: Please WRITE it down!';}?></p>
            </div>
		</div>	
	</div>     
    </body>
    <html>