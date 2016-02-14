<?php
include('../connect.php');

if($_POST['id_pool'])
{

		$id=$_POST['id_pool'];
		$pools=$dbh->query("select  * from pools  where section_id ='$id'  ");
		echo '<option selected disabled>--Pools-- </option>';

		foreach($pools as $row)

		{

		$id_pool=$row['pools_id'];
		$pool_data=$row['pool_name'];

		echo '<option value="'.$id_pool.'">'.$pool_data.'</option>';
		}


}

 if($_POST['id_game'])
{

        $id=$_POST['id_game'];
		$games=$dbh->query("select * from games  where Section_ID ='$id' ");
		echo '<option selected disabled>--Games-- </option>';

		foreach($games as $row1)

		{

		$id_game=$row1['game_id'];
		$game_data=$row1['name'];

		echo '<option value="'.$id_game.'">'.$game_data.'</option>';
		}



}

if($_POST['id_generator'])
{
 
        $id=$_POST['id_generator'];
		$games=$dbh->query("select * from generator  where generator.Section_ID ='$id'  ");
		echo '<option selected disabled>--Generator-- </option>';

		foreach($games as $row2)

		{

		$id_generator=$row2['generator_id'];
		$generator_data=$row2['name'];

		echo '<option value="'.$id_generator.'">'.$generator_data.'</option>';
		}



}

 

?>