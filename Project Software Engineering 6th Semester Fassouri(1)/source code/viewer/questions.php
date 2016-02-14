<?php
include '../model/connect.php';


	session_start();
	session_unset();
	unset($_SESSION['user_id']);

if(isset($_POST['save']))
{
	if (isset($_POST['ans1'],$_POST['ans2']))
	{
		
		$user_id = $_SESSION['user_id'];
		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$update = "UPDATE user SET ans1 = '$ans1', ans2='$ans2', verified = 1";
		$update_result = $dbh->exec($update);
		if($update_result)
		{
			session_destroy();
			
			echo "<script>
				alert('Questions successfully submited!');
				window.location.href='login_form.php';
			</script>";
			
			
		}
	}
}




?>
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>
    
    <head>
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/questions.css">

        <title>Fasouri Waterpark - Questions</title>
    </head>
    <body>

	<div class="row">						<!-- Company Logo -->
		<div class="col-xs-12" align="center">
			<div id="logoFas"></div><br>
		</div>
	</div>	
	
	<div class="container">
			
		
			
			
		<div class="row">									<!-- 1st row contains Login form -->
		
			<h3>Management Software - Security Questions</h3>
			<h5><span style="color:red;">*NOTE: </span>Please answer the following questions to recover your password in case you lose it</h5>
			<form method="post">
            <div class="question" align="center">
			<br>
				<ul style="list-style-type:none; text-align:left;">
                    <li>Question 1: What is the name of your school ?</li>
                    <li><input type="text" name="ans1" placeholder="Type your answer" required></li>
					<br>
					
                    <li>Question 2: What is the name of the street on which you grew up ?</li>
                    <li><input type="area" name="ans2" placeholder="Type your answer" required></li>
				</ul>
		
        
		
			</div>
			
			<br>
			
			<div class="col-xs-12">
                <input type="submit" name="save"class="btnG" value="Save">
                <button type="" name="cancel"class="btnR" onclick="window.location.href='login_form.php';">Cancel</button>
                
                </div>
                
            </form>
		</div>

		
	
	
	</div>
        
        
        
