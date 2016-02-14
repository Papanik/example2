<?php
	include'../../model/connect.php';
	include'../../model/incident_functions.php';

   	session_start();

   	global $section_id;
	$section_id = $_SESSION['section_id'];

	$section = "SELECT * FROM section_incidents WHERE section_id = '$section_id'";
	$section_result = $dbh->query($section);
	foreach ($section_result as $data)
	{
		$section_name = $data['section_name'];

	}


	try
  {
        if(isset ($_POST['save'],$_POST['name']))
        {
            include '../../model/connect.php';
            $name = $_POST['name'];
            $incident_section = " UPDATE  section_incidents SET section_name = '$name'  WHERE section_id = '$section_id' ";
            $incident_section_result =$dbh ->exec($incident_section);          
            if($incident_section_result)
            {
            
                 echo '<script>alert("Section succesfull Update")</script>';
 				echo '<script> window.opener.location.reload();</script>';
                     echo "<script>self.close();</script>";

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
        <title>Edit Section</title>
		
		
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
          <p align="left">Edit Section : <span style ="color:blue;"><?php echo $section_name; ?></span></p><br><br>
          <form method="post">

            Section Name: <input type="text" placeholder = "Type new name" name="name" value='<?php echo $section_name; ?>' > <br><br>
            
			<input type="submit" class="btnG" name="save"value="Save" onClick="window.location.reload('../incident.php')" >
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		
	</div> 
    </body>

