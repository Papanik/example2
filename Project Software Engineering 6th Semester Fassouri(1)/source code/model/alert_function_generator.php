<?php
	//DB Connection
	include 'connect.php';

	$curr_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " - 1 year"));//Mtch year
	
	
	
	$date = "SELECT * FROM generator WHERE date_maintenanced =  '$curr_date'";
	$date_result = $dbh->query($date);

	if($date_result->rowCount()>0)
	{
		$i=0;

		foreach($date_result as $row)
		{
			$generator_id = $row['generator_id'];//Get gen id
			$gen_array[$i] = $generator_id;
			$i++;		
		}	
		

		session_start();

			$_SESSION['generator_id'] = $gen_array;//Save gen id
			$_SESSION['type']=3;
			print_r($_SESSION['generator_id']);
			header("Location:../maintenance_details_generator.php");

		}
?>
