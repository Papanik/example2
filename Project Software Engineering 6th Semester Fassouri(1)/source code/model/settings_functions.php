<?php

	//GET CURRENT DATA
	$user = "	SELECT * 
				FROM employee,user
				WHERE user_id = '$user_id'
				AND user.employee_employee_id = employee.employee_id";
	global $curr_pass;
	$user_result = $dbh->query($user);
	foreach ($user_result as $user_data)
	{
		$username = $user_data['username'];
		$curr_pass = $user_data['password'];
		$name = $user_data['name'];
		$surname = $user_data['surname'];
	}//END

	//UPDATE DATA
	if(isset($_POST['save']))
	{
		if( (!empty($_POST['old_pass'])) && (!empty($_POST['new_pass'])) && (!empty($_POST['new_pass_conf'])) )
		{
			$old_pass = $_POST['old_pass'];
			$new_pass = $_POST['new_pass'];
			$new_pass_conf = $_POST['new_pass_conf'];

			if($old_pass != $curr_pass)
			{
				echo '<script>alert("Incorrect current Password")</script>';
				echo "<script>window.location.href='../viewer/settings.php';</script>";
			}
			else
			if ($new_pass != $new_pass_conf)
			{
				echo '<script>alert("New Password and Password confirmation do not match")</script>';
				echo "<script>window.location.href='../viewer/settings.php';</script>";
			}
			else
			{
				$update_pass = "	UPDATE user
									SET password = '$new_pass'
									WHERE user_id = '$user_id'";
				$update_pass_result = $dbh->exec($update_pass);
				if($update_pass_result)
				{
					echo '<script>alert("Password Successfully Updated")</script>';
					echo "<script>window.location.href='../viewer/settings.php';</script>";
				}

			}

		}
		
		if(!empty($_POST['username']))		
		{
			$usrname = $_POST['username'];
			$update_user = "	UPDATE user
								SET username = '$usrname'
								WHERE user_id = '$user_id'";
				$update_user_result = $dbh->exec($update_user);
				if($update_user_result)
				{
					echo '<script>alert("Username Successfully Updated")</script>';
					echo "<script>window.location.href='../viewer/settings.php';</script>";
				}
		}
		else
		{
			echo '<script>alert("No changes were made")</script>';
			echo "<script>window.location.href='../viewer/settings.php';</script>";
		}

	}






?>