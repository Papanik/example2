<?php
	include '../../model/connect.php';
    session_start();
    $section_id = $_SESSION['section_id'];
    



    $section = "SELECT * FROM section WHERE Section_ID = '$section_id'";
    $section_result = $dbh->query($section);
    foreach ($section_result as $data)
    {
        $section_name = $data['section_name'];

    }
    

    //---------------------


    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['sectionName']))        
            {
                include '../../model/connect.php';
                $sectionName =  $dbh->quote($_POST['sectionName']);            
                $section = " UPDATE section SET section_name = $sectionName WHERE section_id = '$section_id' ";
                $section_result =$dbh ->exec($section);  
            
                if($section_result)
                {
                     echo '<script> alert("Section succesfull Updated");</script>';
                     echo '<script> window.opener.location.reload();</script>';
                     echo '<Script>self.close();</script>';                
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
        <title>Edit Section</title>
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
        <p align="left">Edit Section : <span style ="color:blue;"><?php echo $section_name; ?></span></p><br><br>
		<form method="post">
			Edit Section<br><br>
			Name: <input type="text" name="sectionName" value="<?php echo $section_name; ?>">  <br><br>
			<br>
			<input type="submit" class="btnG" name="insert" name="insert" onclick="return confirm('Update current section?')" value="Insert">
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>