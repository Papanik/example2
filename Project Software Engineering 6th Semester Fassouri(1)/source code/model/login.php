<?php
	
	include'connect.php';
	if(isset($_POST['username'],$_POST['password']))
	{		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username=$dbh->quote($username);		
		$password=$dbh->quote($password);
	
		$login = "SELECT * FROM user WHERE password=$password AND username=$username ";
		
		$login_result = $dbh->query($login);
		
		foreach($login_result as $row)
		{
            $verified = $row['verified'];
			$username = $row['username'];
		    $password = $row['password'];
			$user_id = $row['user_id'];
			$employee_employee_id = $row['employee_employee_id'];
			
		}
		if($login_result->rowCount() == 1)
		{		
			if ($verified == 1)
            {			
				$_SESSION['user_id'] = $user_id;
				$cookie_name = $username;
				$time = time() + 2592000;
				setcookie($cookie_name, $user_id, $time,"/");
               	header("Location: ../viewer/menu.php");				
			}
			else
			{		
				$_SESSION['user_id'] = $user_id;
				header("Location: ../viewer/questions.php");
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid Username/Password")';
			echo '</script>';									
		}
	
    }


?>