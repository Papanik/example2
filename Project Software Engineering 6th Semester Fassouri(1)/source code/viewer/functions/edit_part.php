<?php
	
	include '../../model/connect.php';


    session_start();

    
    foreach ($_SESSION['part_id'] as $id ) {

    $sql = $dbh->query("SELECT * FROM parts WHERE part_id = '$id'");

    foreach ($sql as $row)
    {    	   
    	$part_name = $row['name'];
    }
}
		
    //Main Program

	


    
    
    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['name']))
            {
                include '../../model/connect.php';
				$name2 = $dbh->quote($_POST['name']);                			
                $query = "UPDATE parts SET name=$name2 WHERE part_id = '$id'";    	           
                $query_result =$dbh ->exec($query);  
                
                if($query_result)
                {
                   
                	echo '<script> alert("Part succesfull Updated");</script>';
                    echo '<script> window.opener.location.reload();</script>';
                    echo '<Script>self.close();</script>';                
               	}
          	}
          	else
          	{
          		echo "wromg";
          	}         
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    } 
//END


?>







<!DOCTYPE html>




<html>
    
    <head>

    	<!-- ------------------------section--------- -->
<script type="text/javascript" src="../js/jquery/1.4.2/jquery.min.js"></script>
<script>
$(document).ready(function()
{
$(".section").change(function()
{
var id=$(this).val();
var dataString = 'id='+id;

$.ajax
({
type: "POST",
url: "../../model/ajax/ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pool").html(html);

} 
});

});

});


<!-- ---------------------------------type-------------- -->

$(document).ready(function()
{
$(".pool").change(function()
{
var id_pool=$(this).val();
var dataString = 'id_pool='+ id_pool;

$.ajax
({
type: "POST",
url: "../../model/ajax/ajax_pumps.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pumps").html(html);

} 
});

});

});

<!-- ----------------------------part---------------------------------------------- -->

$(document).ready(function()
{
$(".pumps").change(function()
{
var id_machine=$(this).val();
var dataString = 'id_machine='+ id_machine;

$.ajax
({
type: "POST",
url: "../../model/ajax/ajax_part.php",
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

















		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="../js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/function.css">
		
		<script src="../js/function.js"></script>
        <title>New Part</title>
    </head>
    <body>

	<div class="container">
		<form method="post">
		
		<div class="board" align="right">
		
			<p align="right">Edit Part : <span style ="color:blue;"><?php echo $part_name; ?></span></p><br>
			
            
            
            New Part Name: <input type="text" value="<?php echo $part_name; ?>" name="name"> <br><br>
			<br><br>
			<button type="submit" name = "insert" onclick="return confirm('Update this Part?')" class="btnG">Update</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
		</div>
		
		</form>

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>