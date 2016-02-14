<?php 
	include '../../model/connect.php';		
	try
	{
		if(isset ($_POST['save']))
		{
		    if(isset ($_POST['name'],$_POST['section']))
		    {
		        include '../../model/connect.php';
		        $name = $_POST['name'];
		        $id_section = $_POST['section'];
		        
		        echo $id_section;
		        echo $name;
		        $sql = " INSERT INTO generator (name,section_id) VALUES ('$name', '$id_section')";
		       
		       
		        $sql_result =$dbh ->exec($sql);
		        echo "hello";
		        if($sql_result)
		        {
		        	echo $id_section;
		             echo '<script>alert("Generator succesfull Submited")</script>';
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
        <title>New Generator</title>
    </head>
    <body>

	<div class="container">
		
		<form method="post">
		<div class="board" align="right">
			<p>Insert New Generator</p>
			
            Select Section: 
                <select required name="section" class="section" style="width:130px;">
                        <option value="" >Select Section</option>
                          <?php
							
							$sql=$dbh->query("select * from section ");
								
							foreach ($sql as $row) 
							{
								
							$id=$row['Section_ID'];
							$data=$row['section_name'];

							echo '<option value="'.$id.'">'.$data.'</option>';
							} 

							?>
							</select>
							<br><br>
         
            
            Generator Name: <input type="text" placeholder="Type name" name="name"> <br><br>
			<br><br>
			<button type="submit" name="save" onclick="return confirm('Insert new Generator?')" class="btnG">Insert</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
		</div>
		</form>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>