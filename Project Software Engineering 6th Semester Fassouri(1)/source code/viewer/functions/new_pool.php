<?php
	include '../../model/connect.php';
	include '../../model/pool_functions.php';


	if(isset($_POST['save']))


{
	

	if(isset($_POST['section'],$_POST['poolName'])) 		
	{

        $section_id=$_POST['section'];
		$newPool=$_POST["poolName"];

			$updateP="INSERT INTO pools  (pool_name,section_id) VALUES ('$newPool','$section_id')";

			$update_result=$dbh->query($updateP);

			if($update_result)
            {
            
                 echo '<script>alert("Pool succesfull Submited")</script>';
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
        <title>New Pool</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
			<p>Insert New Pool</p>
			<form method="post">
            Section: 
                <select required name="section" style="width:90%";>
                <option value="">Select Section</option>
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
         
            
            Pool Name: <input required type="text" name="poolName"> <br><br>
			<br><br>
			<button type="submit" name = "save" class="btnG">Insert</button>

			<button type="button" class="btnR"  onclick="self.close()">Cancel </button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>