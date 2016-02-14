<?php 

include '../../model/connect.php';



session_start();
$Pool_id=$_SESSION["pool_id"];


$pool_name = "SELECT * FROM pools WHERE pools_id = '$Pool_id'";

	$pool_name_result = $dbh->query($pool_name);

	foreach ($pool_name_result as $data)
	{
		$name = $data['pool_name'];

	}

if(isset($_POST['save']))


{
	

	if(isset($_POST['section'],$_POST['poolName'])) 		
	{

     
		$newPool=$_POST["poolName"];

			$updateP="UPDATE pools SET pool_name='$newPool' WHERE pools_id='$Pool_id'";

			$update_result=$dbh->query($updateP);

			if($update_result)
            {
            
                 echo '<script>alert("Pool succesfull Update")</script>';
                 echo '<script> window.opener.location.reload();</script>';
                 echo "<script>self.close();</script>";

            }

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
        <title>Edit Pool</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
		<form method="post">
			<p align="left">Edit Pool : <span style ="color:blue;"><?php echo $name; ?></span></p><br><br>
         
			
            Section: 
                <select  required name="section" style="width:130px;">
                  <option value="" disabled>Section</option>

                  	<?php

							$sql=$dbh->query("select * from section ");
								
							foreach ($sql as $row) 
							{
								
							$id=$row['Section_ID'];
							$data=$row['section_name'];

							echo '<option value="'.$id.'">'.$data.'</option>';
							} 

							?>

                </select><br><br>
        
            
            Pool Name: <input required type="text" name="poolName" value=" <?php echo $name; ?>" ><br><br>
			<br><br>
			<button name="save" type="submit" class="btnG">Save</button>
			<button type="button" class="btnR"  onclick="self.close()" >Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>