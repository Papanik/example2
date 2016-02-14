<!--
//HTML Code
Section :
<select name="section" class="section">
<option selected="selected">--Select Section--</option>

<?php
//include('../connect.php');
$sql=$dbh->query(//"select * from section ");

foreach ($sql as $row) 
{
	
$id=$row[//'Section_ID'];
$data=$row[//'section_name'];

//echo '<option value="'.$id.'">'.$data.'</option>';
} 

//? <!-->
</select> <br/><br/>

TYPE :
<select name="pool" class="pool">
<option selected="selected">--Select Pool/Game--</option>
</select>

</select> <br/><br/>

Machine :
<select name="pumps" class="pumps">
<option selected="selected">--Select Pumps/Tourbine--</option>
</select>


Part :
<select name="part" class="part">
<option selected="selected">--Select Pumps/Tourbine--</option>
</select>-->