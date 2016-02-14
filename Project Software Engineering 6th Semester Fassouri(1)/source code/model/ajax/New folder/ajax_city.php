<?php
include('../connect.php');

if($_POST['id'])
{

$id=$_POST['id'];
$pools=$dbh->query("select * from section,pools  where pools.section_id ='$id' GROUP BY pools_id ");
echo '<option selected disabled>--Pools-- </option>';

foreach($pools as $row)

{

$id_pool='pool'.$row['pools_id'];
$pool_data=$row['pool_name'];

echo '<option value="'.$id_pool.'">'.$pool_data.'</option>';
}


$games=$dbh->query("select * from section,games  where games.Section_ID ='$id' GROUP BY game_id ");
echo '<option selected disabled>--Games-- </option>';

foreach($games as $row1)

{

$id_game='game'.$row1['game_id'];
$game_data=$row1['name'];

echo '<option value="'.$id_game.'">'.$game_data.'</option>';
}



}



?>