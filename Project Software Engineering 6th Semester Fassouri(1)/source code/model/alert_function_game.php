<?php
	//DB Connection
	include 'connect.php';

	$curr_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " -1 year"));///Mtch year
	
	
	
	$date = "SELECT * FROM games WHERE date_maintenanced =  '$curr_date' ";
	$date_result = $dbh->query($date);

	if($date_result->rowCount()>0)
	{

		$i=0;	
		foreach($date_result as $row)
		{
			$game_id = $row['game_id'];//Get game_id
			$game_array[$i] = $game_id;
			$i++;		
		}

			session_start();

			$_SESSION['game_id'] = $game_array;//Save game id
			$_SESSION['type']=2;
			print_r($_SESSION['game_id']);
			header("Location:../maintenance_details_game.php");
	}
?>
