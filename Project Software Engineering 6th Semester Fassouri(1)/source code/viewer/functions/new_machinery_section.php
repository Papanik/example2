<?php
	include'../../model/machinery_functions.php';



try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['sectionName']))        
            {
                include '../../model/connect.php';
                $sectionName =  $dbh->quote($_POST['sectionName']);
                
                $section = " INSERT INTO section (section_name) VALUES ($sectionName)";
                $section_result =$dbh ->exec($section);  
            
                if($section_result)
                {
                     echo '<script> alert("Section succesfull Submited");</script>';
                     echo '<script> window.opener.location.reload();</script>';
                     echo '<Script>self.close();</script>';
                
                }
                else
                {
                     echo '<script> alert("Section NOT Submited. An error occured");</script>';
                        
                }

            }
            else
            {
                echo '<script> alert("Please fill all fields");</script>';
            }
        }

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    } 
//END


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
			<input type="submit" class="btnG" name="insert" name="insert" onclick="return confirm('Insert new section?')" value="Insert">
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>