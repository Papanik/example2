<?php
//Check if there are any pools,games,gens that need maintenace - MAINTENANCE

$curr_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " - 1 year"));//Decrease curr date by one year
//$curr_date = date("Y-m-d");

$date1 = "SELECT * FROM pools WHERE date_maintenanced =  '$curr_date'";//Pools
$date2 = "SELECT * FROM games WHERE date_maintenanced =  '$curr_date'";//Games
$date3 = "SELECT * FROM generator WHERE date_maintenanced =  '$curr_date'";//Generators



$date_result1 = $dbh->query($date1);
$date_result2 = $dbh->query($date2);
$date_result3 = $dbh->query($date3);

	$style1='visibility:visible;';
	if($date_result1->rowCount()>0)//Pools
	{
		$style1="visibility:visible;background-color: red;";
		

	}
	$style2='visibility:visible;';
	if($date_result2->rowCount()>0)//Games
	{
		$style2="visibility:visible;background-color: red;";
		

	}
	$style3='visibility:visible;';
	if($date_result3->rowCount()>0)//Generators
	{
		$style3="visibility:visible;background-color: red;";
	}

?>