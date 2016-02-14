<?php
include('../connect.php');

$type_id=$_POST['id_pool'];

$type=substr($type_id,0,4);
$id=substr($type_id,4);

//--------------------------------pool
if($type =='pool')
{

$pumps_name=$dbh->query("select * from pumps  where pumps.Pool_ID ='$id' GROUP BY Pool_ID");

$tourbines_name=$dbh->query("select *from tourbines where tourbines.Pool_ID ='$id' GROUP BY Pool_ID");

echo '<option selected disabled>--Pumps-- </option>';
foreach($pumps_name as $pumps_data)

{

$id_pumps='pump'.$pumps_data['pump_id'];
$data=$pumps_data['name'];

echo '<option value="'.$id_pumps.'">'.$data.'</option>';
}


echo '<option selected disabled>--Tourbine-- </option>';
foreach($tourbines_name as $tourbines_data)

{

$id_tourbines='tour'.$tourbines_data['tourbine_id'];
$tourbines_name=$tourbines_data['name'];

echo '<option value="'.$id_tourbines.'">'.$tourbines_name.'</option>';
}

}

//---------------------------------tourbine
else
{

$pumps_name=$dbh->query("select * from pumps  where pumps.Game_ID ='$id' GROUP BY Game_ID");

$tourbines_name=$dbh->query("select *from tourbines where tourbines.Game_ID ='$id' GROUP BY Game_ID");

echo '<option selected disabled>--Pumps-- </option>';
foreach($pumps_name as $pumps_data)

{

$id_pumps='pump'.$pumps_data['pump_id'];
$data=$pumps_data['name'];

echo '<option value="'.$id_pumps.'">'.$data.'</option>';
}

echo '<option selected disabled>--Tourbine-- </option>';
foreach($tourbines_name as $tourbines_data)

{

$id_tourbines='tour'.$tourbines_data['tourbine_id'];
$tourbines_name=$tourbines_data['name'];

echo '<option value="'.$id_tourbines.'">'.$tourbines_name.'</option>';
}

}

?>