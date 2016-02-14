<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".section").change(function()
{
var id=$(this).val();
var dataString =  id;

$.ajax
({
type: "POST",
url: "ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pool").html(html);
} 
});

});

});
</script>
//HTML Code
Country :
<select name="section" class="section">
<option selected="selected">--Select Section--</option>
<?php
include '../connect.php';
$sql=$dbh->query("select * from section");
foreach($sql as $row)
{
$id=$row['Section_ID'];
$data=$row['section_name'];
echo '<option value="'.$id.'">'.$data.'</option>';
} ?>
</select> <br/><br/>

City :
<select name="pool" class="pool">
<option selected="selected">--Select pool--</option>
</select>