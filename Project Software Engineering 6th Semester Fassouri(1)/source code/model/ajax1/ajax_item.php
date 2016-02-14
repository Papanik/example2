<?php
include('../connect.php');

if($_POST['id'])
{


$id=$_POST['id'];
$items=$dbh->query("select * from items  where Section_ID ='$id' ");
echo '<option selected disabled>--Items-- </option>';

foreach($items as $row)

{

$id_item=$row['Item_ID'];
$item_data=$row['Name'];
$available =$row['Available'];

echo '<option value="'.$id_item.'">'.$item_data.'</option>';
}



}



?>