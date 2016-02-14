<?php
try {
	 
include '../../model/connect.php';
//include '../ajaximageupload/ajaximage.php';

		/*Basic Information*/
       
		
		//echo "Basic - reding - OK";echo "<br>";

		$select ="SELECT name,surname FROM gmail ";
		$select_result = $dbh->query($select);
		$rows = $select_result->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($rows);

		//$name =  $dbh->quote($_GET['name']);
		//$surname = $dbh->quote($_GET['surname']);
        
		/*
		if($select_result->rowCount()==0)
		{
		$basic_details = "INSERT INTO  gmail (name,surname,email) VALUES ($name,$surname,$email)";
		$basic_result = $dbh->exec($basic_details);
		}
		//echo "Basic - query - exec - OK";echo "<br>";*/
		
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
