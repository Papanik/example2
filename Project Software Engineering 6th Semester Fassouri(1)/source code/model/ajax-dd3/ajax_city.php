<?php
include '../connect.php';
if($_POST['section'])
{
$id=$_POST['section'];

$sql=$dbh->query("select * from pools where pools.section_id='$id'");

foreach($sql as $row)
{
$id=$row['pools_id'];
$data=$row['pool_name'];

echo '<option value="'.$id.'">'.$data.'</option>';
}
}
?>