<?php
	
    include '../../model/connect.php';


    session_start();

    $id = $_SESSION['id'];
    $type = $_SESSION['type'];
    



   

    if($type == 1)//pool
    {
        $curr = " Pool  ";
        $query = "SELECT * FROM pools WHERE pools_id = '$id'";
        $query_result = $dbh->query($query);
        foreach ($query_result as $data)
        {
            $name = $data['pool_name'];
        }
    }
    else//game
    {
        
        $curr = " Game  ";
        $query = "SELECT * FROM games WHERE game_id = '$id'";
        $query_result = $dbh->query($query);
        foreach ($query_result as $data)
        {
            $name = $data['name'];
        }
    }





    try
    {
        if(isset($_POST['insert']))
        {
            if(isset($_POST['name'],$_POST['section']))        
            {
                include '../../model/connect.php';
                $name2 =  $dbh->quote($_POST['name']);
                
                $section_id = $dbh->quote($_POST['section']);

                if($type==1)
                {                     
                     $query = " UPDATE  pools SET pool_name=$name2,section_id=$section_id  ";
                }
                elseif ($type==2)                
                {
                    $query = " UPDATE  games SET name=$name2,Section_ID=$section_id ";
                }
                
                $query_result =$dbh ->exec($query);  
                if($query_result)
                {
                    if($type==1)
                    {
                        echo '<script> alert("Pool succesfull Updated");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                        echo '<Script>self.close();</script>';                
                    }
                
                    else
                    {
                        echo '<script> alert("Game succesfull Updated");</script>';
                        echo '<Script>self.close();</script>';                
                    }
                    session_destroy();
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
        <title>Edit <?php echo $curr; ?></title>
    </head>
    <body>

	<div class="container">
	
		<div class="board" align="right">
		<form method="post">
			<span style="font-size: 20px;">Edit <?php echo $curr; ?></span><br><br>
            
            <p align="right">Current <?php echo $curr; ?>:<span style ="color:blue;"><?php echo $name; ?></span></p><br>


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
                            
<br>
<br>
			Name: <input type="text" value="<?php echo $name; ?>" name="name"> <br><br>
			<br>
			<button type="submit" class="btnG" name="insert" onclick="return confirm('Update Pool/Game?')" >Update</button>
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>