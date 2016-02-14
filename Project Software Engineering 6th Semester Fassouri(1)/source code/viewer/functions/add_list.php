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
                
                
               $year=substr($date1,6);

                $sql = " INSERT INTO jobs (title,description,date,year) VALUES ('$name', '$descr','$date1','$year')";
               
               
                $sql_result =$dbh ->exec($sql);
                
                if($sql_result)
                {
                    
                     echo '<script>alert("Job succesfully added")</script>';
                      echo '<script> window.opener.location.reload();</script>';
                     echo "<script>location.reload;</script>";
                     

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



        <script>


$("#shiptonick").change(function(){

    var id = $(this).val(); //the selected id from shiptonick

    $.ajax({
             type: 'POST',
             url: 'the php page that returns address based on id',
             data: {ID: id},
             success: function(data){
                 if(data != null)
                    $("#shipto").val(data);
             }
           });    

});
</script>
        <title>New Task List</title>
    </head>
    <body>

	<div class="container" style="text-align: right">
    <form method="post">
		<br>
        <p id="my_id">Task Name:<br> <input name="name" type="text"></p>
        
    <div class="board">
		
        
           Date: <br><input type="text" id="date" name="date"  placeholder="Date "  ><br><br>

                

                Task Description:<br><textarea rows="2" name="descr" cols="50" placeholder="Type a description"></textarea>
                <br><br>
               
        
           
                Tasks:<br>
                <select disabled size="3" name="tasks" style="width:250px;">
                    <?php
                        
              
                        $sql=$dbh->query("select * from jobs ");
                          
                        foreach ($sql as $row) 
                        {
                          
                        $job_id = $row['job_id'];
                        $job_title=$row['title'];
                        $job_description = $row['description'];
                        $job_date = $row['date'];

                        echo '<option value="'.$job_id.'">'.$job_title.'  ,  '.$job_date.'</option>';
                        } 

                        

                         ?>
                </select>

         

    
		
        
        
	
		
	
	
	</div>
        
        
    <div class="row" align="right">
        
            <br><br>
            <button type="submit" onclick="return confirm('Insert new Task?')" name="save" class="btnG">Insert</button>
            <button class="btnR"  onclick="self.close()">Cancel</button>
            <br><br>
        
    </div>
        </form>
    </div>
        
	
      
        
    
    </body>