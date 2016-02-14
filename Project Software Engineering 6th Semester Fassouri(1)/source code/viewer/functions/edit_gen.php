<?php 
	include '../../model/connect.php';

	session_start();

   	
	$generator_id = $_SESSION['generator'];

	$generator = "SELECT * FROM generator WHERE generator_id = '$generator_id'";
	$generator_result = $dbh->query($generator);
	foreach ($generator_result as $data)
	{
		$generator_name = $data['name'];
		
	}

	

try
{
	if(isset ($_POST['save']))
	{
        if(isset ($_POST['name'],$_POST['section']))
        {
            include '../../model/connect.php';
            $name = $_POST['name'];
            $id_section = $_POST['section'];
            $update = " UPDATE  generator SET name = '$name', section_id = '$id_section' WHERE generator_id='$generator_id' ";
            $update_result =$dbh ->exec($update);          
            if($update_result)
            {
            
                 echo '<script>alert("Generator succesfull Update")</script>';
                 echo '<script> window.opener.location.reload();</script>';
                 echo "<script>self.close();</script>";

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
        <title>Edit Generator</title>
    </head>
    <body>

	<div class="container">
		<form method="post">
		
		<div class="board" align="right">
			<p align="left">Edit Generator : <span style ="color:blue;"><?php echo $generator_name; ?></span></p><br>
			
            Section: 
                 <select required name="section" class="section" style="width:130px;">
                        <option value="" >--Section--</option>
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
        
            
            Generator Name: <input type="text" value="<?php echo $generator_name; ?>" name="name"> <br><br>
			<br><br>
			<button type="submit" name="save" onclick="return confirm('Update Generator?')" class="btnG">Save</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
		</div>
	</form>
	</div>        	
    </body>
    </html>
