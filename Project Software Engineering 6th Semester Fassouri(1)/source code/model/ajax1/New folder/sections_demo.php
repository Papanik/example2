<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">

//--------------------------section-----------

$(document).ready(function()
{
$(".section").change(function()
{
var id=$(this).val();
var dataString = 'id='+id;

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


//---------------------------------type----------------

$(document).ready(function()
{
$(".pool").change(function()
{
var id_pool=$(this).val();
var dataString = 'id_pool='+ id_pool;

$.ajax
({
type: "POST",
url: "ajax_pumps.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pumps").html(html);

} 
});

});

});

//----------------------------part----------------------------------------------

$(document).ready(function()
{
$(".pumps").change(function()
{
var id_machine=$(this).val();
var dataString = 'id_machine='+ id_machine;

$.ajax
({
type: "POST",
url: "ajax_part.php",
data: dataString,
cache: false,
success: function(html)
{
$(".part").html(html);

} 
});

});

});
</script>


