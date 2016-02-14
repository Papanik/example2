<?php
	include'../../model/machinery_functions.php';
    include '../../model/connect.php';


    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['name'],$_POST['type'],$_POST['section']))        
            {
                include '../../model/connect.php';
                $name =  $dbh->quote($_POST['name']);
                $type =  $_POST['type'];
                $section_id = $dbh->quote($_POST['section']);

                if($type==1)
                {                     
                     $query = " INSERT INTO pools (pool_name,section_id) VALUES ($name,$section_id)";
                }
                elseif ($type==2)                
                {
                    $query = " INSERT INTO games (name,Section_ID) VALUES ($name,$section_id)";
                }
                
                $query_result =$dbh ->exec($query);  
                if($query_result)
                {
                    if($type==1)
                    {
                        echo '<script> alert("Pool succesfull Submited");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                        echo '<Script>self.close();</script>';                
                    }
                
                    else
                    {
                        echo '<script> alert("Game succesfull Submited");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                        echo '<Script>self.close();</script>';                
                    }
                }
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
        <title>New Pool/Game</title>
    </head>
    <body>

	<div class="container">
	
		<div class="board" align="right">
		<form method="post">
			Insert New Pool/Game<br><br>


Select Section 
           
            <select name="section" class="section" required style="width:130px;">
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

Select Type 
        <select style="width:130px;" reauired name = "type">
      
      <option value="">Type</option>      
      <option value="1">Pool</option>
      <option value="2">Game</option>
        </select>
<br>
<br>
			Name: <input type="text" name="name"> <br><br>
			<br>
			<input type="submit" class="btnG" name="insert" onclick="return confirm('Insert new Pool/Game?')" value="Insert">
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>