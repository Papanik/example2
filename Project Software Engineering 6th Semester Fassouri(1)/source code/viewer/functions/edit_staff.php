<?php 
	include '../../model/connect.php';
	include '../../model/staff_functions.php';
	session_start();

   	global $employee_id;
	$employee_id = $_SESSION['employee_id'];

	$employee = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
	$employee_result = $dbh->query($employee);
	foreach ($employee_result as $data)
	{
		$employee_name = $data['name'];
		$section_id = $data['employee_section'];
	}
	$section_name = "SELECT * FROM employee_section WHERE section_id='$section_id' ";
	$section_name_result = $dbh->query($section_name);
	foreach ($section_name_result as $data)
	{
		$section_name = $data['employee_section_name'];
	}


try
{
	if(isset ($_POST['save']))
	{
        if(isset ($_POST['position'],$_POST['section']))
        {
            include '../../model/connect.php';
            $name = $_POST['position'];
            $id_section = $_POST['section'];
            $update = " UPDATE  employee SET pos_description = '$name', employee_section = '$id_section' WHERE employee_id='$employee_id' ";
            $update_result =$dbh ->exec($update);          
            if($update_result)
            {
            
                 echo '<script>alert("Staff succesfull Update")</script>';
                 echo '<script> window.opener.location.reload();</script>';
                 echo '<script>self.close()</script>';

            }

        }
        else
        {
        	echo '<script>alert("Please fill all fields!")</script>';
        }
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
} //END

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
        <title>Edit Staff</title>
		
		
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
		<form method="post";>
            <p align="left">Edit Staff position:<span style="color:blue;"><?php echo $employee_name ?></span></p>
            <p>Current Section: <span style="color:blue;"><?php echo $section_name; ?></span></p>
            <br>
            Section: <select  required name="section"><option selected disabled>Select Section</option>
            <?php section(); ?>
            </select><br><br>
            Position Name: <input  placeholder="Type a description" type="text" name="position"> <br><br>
            
            
			<button name = "save" type="submit" onclick="return confirm('Change Staff section?')" class="btnG">Save</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
			
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>