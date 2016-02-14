<?php
	
//include '../model/connect.php';
//$username = $_SESSION['username'];
/*global $curr_ans1,$curr_ans2;
$user_id ="	SELECT *
			FROM user
			WHERE username = '$username'";
$user_id_result =  $dbh->query($user_id);
foreach ($user_id_result as $data)
{
	$username = $data['username'];
	$password = $data['password'];
	$curr_ans1 = $data['ans1'];
	$curr_ans2 = $data['ans2'];
}
//echo $username;*/
	function show_pass()
	{
		include '../model/connect.php';	
		if(isset($_POST['save']))
		{
			//Read From user
			$username = $_POST['username'];

			if (!empty($_POST['answer1']))
			{
				$new_ans1 = $_POST['answer1'];
			}
			elseif(!empty($_POST['answer2']))
			{
				$new_ans2 = $_POST['answer2'];
			}														
			else
			{
				echo "<script>alert('Provide at least one Answer');</script>";
				echo "<script>window.location.href='forgot_password.php'</script>";
				
			}

			//Fetch from DB
			$user_id ="	SELECT *
			FROM user
			WHERE username = '$username'";
			$user_id_result =  $dbh->query($user_id);
			if($user_id_result->rowCount()== 0)//Check if exists
			{
				echo "<script>alert('Incorrect Username');</script>";
			}
			else//Exists -> Proceed
			{
				foreach ($user_id_result as $data)//Get Current Data
				{					
					$password = $data['password'];
					$curr_ans1 = $data['ans1'];
					$curr_ans2 = $data['ans2'];
				}		
				if( empty($new_ans1))
				{
					$new_ans1 = "";					
				}
				if( empty($new_ans2))
				{
					$new_ans2 = "";					
				}

				if( ($curr_ans1 == $new_ans1) || ($curr_ans2 == $new_ans2) )//Right Answers
				{
					
					?>
						<li><strong>Current Username : <?php echo $username; ?></strong></li><br>
						<li><strong>Current Password : <?php echo $password;?></strong></li>
					<?php				
				}
				else//Wrong Answers
				{
					echo "<script>alert('Incorrect Answer(s)');</script>";			
				}																	
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

        <title>Fasouri Waterpark - Password Recovery</title>
    </head>
    <body>

	<div class="row">						<!-- Company Logo -->
		<div class="col-xs-12" align="center">
			<div id="logoFas"></div><br>
		</div>
	</div>	
	
	<div class="container">
			
		
			
			
		<div class="row">									<!-- 1st row contains Login form -->
		
			<h3>Management Software - Password Recovery</h3>
			<h5><span style="color:red;">*NOTE: </span>Please answer one of  the following questions to recover your password</h5>
			<form method="post">
            <div class="question" align="center">
			<br>
				<ul style="list-style-type:none; text-align:left;">
				<li>Type your username</li>
				<li><input type="text" name="username" name="username" placeholder="Username" required autofocus></li>
				<br>                
                <li>Question 1: What is the name of your school ?</li>
                <li><input type="text" name="answer1"  placeholder="Type your answer" ></li>
				<br>				
                    <li>Question 2: What is the name of the street on which you grew up ?</li>
                    <li><input type="area" name="answer2" placeholder="Type your answer" ></li>
                    <br>
                    <?php show_pass(); ?>
				</ul>
		
        
		
			</div>
			
			<br>
			
			<div class="col-xs-12">
                <button type="submit" name="save"class="btnG" >Show Password</button>
                <button type="button" name="cancel" class="btnR" onclick="self.close();">Cancel</button>
                
                </div>
                
            </form>
		</div>

		
	
	
	</div>
        
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Developed by: TEPAK Software Technology Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/ForgotUsernamePassword.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
		</body>
		</html>
        
