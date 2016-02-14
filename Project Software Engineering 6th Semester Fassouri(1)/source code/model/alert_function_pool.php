<?php
	//DB Connection
	include 'connect.php';

	$curr_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " -1 year"));//Mtch year
	//$curr_date = date("Y-m-d");
	

	//Check If there is any Pool that needs Maintenance
	$date = "SELECT * FROM pools WHERE date_maintenanced ='$curr_date' ";
	// $date2="UPDATE pools SET checked=0 WHERE date_maintenanced=$date1";


	$date_result = $dbh->query($date);

	
	if($date_result->rowCount()>0)
	{
	$i=0;




	foreach($date_result as $row)
	{
		$pool_id = $row['pools_id'];//Get pool_id
		$pool_array[$i] = $pool_id;
		$i++;		
	}

		//$array[$counter] = $pool_id;
	session_start();
	$_SESSION['pool_id'] = $pool_array;//Save pool id
	$_SESSION['type']=1;
	header("Location:../maintenance_details_pool.php");

}
	






?>
