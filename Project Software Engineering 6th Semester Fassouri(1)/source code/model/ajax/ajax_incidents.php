<?php
include('../connect.php');


if($_POST['inciSearch'])
{


$id=$_POST['inciSearch'];
$items=$dbh->query("select * from incidents  where 
Title LIKE '%{$id}%'
OR 
Description LIKE '%{$id}%' ");
echo '<option selected disabled>--Incidents-- </option>';

foreach($items as $row)

{

$id_incident=$row['incidents_ID'];
$incident_data=$row['Title'];
$description =$row['Description'];

echo '<option value="'.$id_incident.'"> '.$incident_data.' '.$description.'</option>';
}



}



?>