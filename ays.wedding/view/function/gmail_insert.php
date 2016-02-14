<?php
try {

	 session_start();
include '../../model/connect.php';
//include '../ajaximageupload/ajaximage.php';

		/*Basic Information*/
        $name =  $dbh->quote($_POST['name']);
        $surname = $dbh->quote($_POST['surname']);
        $email = $dbh->quote($_POST['email']);

        $friend_with=$_SESSION['user_id'];//to id to user sti vasi
		
		//echo "Basic - reding - OK";echo "<br>";
		$select ="SELECT email FROM gmail WHERE email=$email";
		$select_result = $dbh->query($select);

		if($select_result->rowCount()==0)
		{
		$basic_details = "INSERT INTO  gmail (name,surname,email) VALUES ($name,$surname,$email)";
		$basic_result = $dbh->exec($basic_details);
		}

		//echo "Basic - query - exec - OK";echo "<br>";



		$get_data ="SELECT photo,name,surname,friend_id FROM facebook WHERE friend_with='$friend_with'";
		$get_data_result = $dbh->query($select);
		echo json_encode($get_data_result->fetchAll(PDO::FETCH_ASSOC));

		
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
