<?php
    include '../../model/connect.php';
    session_start();
if(isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'];
}
else
{
    header("Location:login_form.php");
}

$job_id = $_SESSION['task'];

    $jobs = "SELECT * FROM jobs WHERE job_id = '$job_id'";
    $jobs_result = $dbh->query($jobs);
    foreach ($jobs_result as $data)
    {
        $job_name = $data['title'];
        $job_descr = $data['description'];
        $job_date = $data['date'];
        
    }








try
    {
        if(isset ($_POST['save']))
        {
            if(isset ($_POST['name'],$_POST['descr'],$_POST['date']))
            {
                include '../../model/connect.php';
                $name = $_POST['name'];
                $descr = $_POST['descr'];
                $date1 = $_POST['date'];
                
                
               
                $sql = " UPDATE jobs SET title='$name',description='$descr',date='$date1' WHERE job_id = '$job_id' ";
               
               
                $sql_result =$dbh ->exec($sql);
                
                if($sql_result)
                {
                    
                     echo '<script>alert("Job succesfully Updated")</script>';
                    echo '<script> window.opener.location.reload();</script>';
                     echo "<script>location.reload;</script>";
                     

                }

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
        <link rel="stylesheet" href="../js/jqueryUI/jquery-ui.min.css">
        <script src="../js/jqueryUI/jquery-ui.min.js"></script>
		<script src="../js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/function.css">
        <link rel="stylesheet" href="../css/jobs.css">
		
		<script src="../js/function.js"></script>
        <title>Edit Task </title>
    </head>
    <body>

	<div class="container" style="text-align: right">
    <form method="post">
		<br>
        <p align="left">Edit Task : <span style ="color:blue;"><?php echo $job_name; ?></span></p><br>
        
    <div class="board">
		
        <p id="my_id">Task Name:<br> <input name="name" value="<?php echo $job_name; ?>" type="text"></p><br><br>
           Date: <br><input type="text" id="date" name="date" value="<?php echo $job_date; ?>"  placeholder="Date "  ><br><br>

                

                Task Description:<br><textarea rows="2" name="descr" cols="50" placeholder="Type a description"><?php echo $job_descr; ?></textarea>
                <br><br>            	
	</div>
        
        
    <div class="row" align="right">
        
            <br><br>
            <button type="submit" onclick="return confirm('Update Task?')" name="save" class="btnG">Update</button>
            <button class="btnR"  onclick="self.close()">Cancel</button>
            <br><br>
        
    </div>
        </form>
    </div>
        
	
      
        
    
    </body>