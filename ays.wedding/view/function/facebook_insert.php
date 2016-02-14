<?php

switch ($_POST['choice']) 
{
    case 0:
    	echo "string";
        facebook_insertuser();
        break;
    case 1:
        facebook_insertfriends();
        break;

    case 2:
    	session_data();
    	break;

    case 3:
    	get_data();
    	break;


    case 4:
    	insert_new_user();
    	break;
 
     
}


function facebook_insertuser()
{

	

		try {
			 
		include '../../model/connect.php';
		//include '../ajaximageupload/ajaximage.php';

				/*Basic Information*/
				//$photo =  $dbh->quote($_POST['photo']);
		        $name =  $dbh->quote($_POST['name']);
		        $surname = $dbh->quote($_POST['surname']);
		        $user_id = $dbh->quote($_POST['id']);
		        $email = $dbh->quote($_POST['email']);

				
				//echo "Basic - reding - OK";echo "<br>";
				//$select ="SELECT photo FROM facebook WHERE photo=$photo";
				//$select_result = $dbh->query($select);
				$select ="SELECT user_id FROM user WHERE user_id=$user_id";
				$select_result = $dbh->query($select);

				if($select_result->rowCount()==0)
				{
				
				$basic_details = "INSERT INTO  user (name,surname,user_id,email) VALUES ($name,$surname,$user_id,$email)";
				$basic_result = $dbh->exec($basic_details);
				}
				
				session_start();
				$_SESSION['id']=$dbh->lastInsertId();
				echo $_SESSION['id'];
				//echo "Basic - query - exec - OK";echo "<br>";*/
				
		}
		catch(Exception $e)
		{
		    echo $e->getMessage();
		}	

}


function facebook_insertfriends()
{
	session_start();

	$id=$_SESSION['id'];


			try {
				

			include '../../model/connect.php';
			//include '../ajaximageupload/ajaximage.php';

					/*Basic Information*/
					$photo =  $dbh->quote($_POST['photo']);
			        $name =  $dbh->quote($_POST['name']);
			        $surname = $dbh->quote($_POST['surname']);
			        $friend_id = $dbh->quote($_POST['id']);
			        //$email=$dbh->quote($_POST['email']);
			      
			        $friend_with=$id;

					
					//echo "Basic - reding - OK";echo "<br>";
					$select ="SELECT photo FROM facebook WHERE photo=$photo";
					$select_result = $dbh->query($select);

					if($select_result->rowCount()==0)
					{
					$basic_details = "INSERT INTO  facebook (photo,name,surname,friend_id,friend_with) VALUES ($photo,$name,$surname,$friend_id,'$friend_with')";
					$basic_result = $dbh->exec($basic_details);
					}

			}
			catch(Exception $e)
			{
			    echo $e->getMessage();
			}
}



function session_data()
{
	include '../../model/connect.php';
	session_start();
    $id=$_POST['session_id'];
    $get_data ="SELECT id FROM user WHERE user_id='$id'";
    $get_data_result = $dbh->query($get_data);
    foreach ($get_data_result as $key) 
    {
    	$_SESSION['id']=$key['id'];
    }
   
    
}

function get_data()
{
	include '../../model/connect.php';


	session_start();

	$id=$_SESSION['id'];
	$friend_with=$id;

	$get_data ="SELECT photo,name,surname FROM facebook WHERE friend_with='$friend_with'";
	$get_data_result = $dbh->query($get_data);
	echo json_encode($get_data_result->fetchAll(PDO::FETCH_ASSOC));

}



function insert_new_user()
{

	session_start();

	$id=$_SESSION['id'];

			try {
				

			include '../../model/connect.php';
			//include '../ajaximageupload/ajaximage.php';

					/*Basic Information*/
					$sex =  $dbh->quote($_POST['sex']);
			        $name =  $dbh->quote($_POST['name']);
			        $surname = $dbh->quote($_POST['surname']);
			        $email = $dbh->quote($_POST['email']);
			        //$email=$dbh->quote($_POST['email']);
			      
			        $friend_with=$id;

					
					//echo "Basic - reding - OK";echo "<br>";
					$select ="SELECT photo FROM facebook WHERE photo=$photo";
					$select_result = $dbh->query($select);

					if($select_result->rowCount()==0)
					{
					$basic_details = "INSERT INTO  facebook (photo,name,surname,friend_id,friend_with) VALUES ($photo,$name,$surname,$friend_id,'$friend_with')";
					$basic_result = $dbh->exec($basic_details);
					}

			}
			catch(Exception $e)
			{
			    echo $e->getMessage();
			}

}





?>

