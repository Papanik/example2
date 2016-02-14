
<?php
include '../../model/connect.php';
try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['name'],$_POST['section'],$_POST['pool'],$_POST['pumps']))        
            {
                include '../../model/connect.php';
                $name =  $dbh->quote($_POST['name']);
                $machine_id =$dbh->quote($_POST['pumps']);//tour or pump
                $section_id = $dbh->quote($_POST['section']);
                $type_id = $dbh->quote($_POST['pool']);
                $type=substr($type_id,1,4);//pool - game
                $old_id=substr($type_id,5);//pool - game(id) 

                $machine = substr($machine_id,1,4);//pump - tour
                $machine_id = substr($machine_id,5);//pump - tour(id) 
                
                $machine_id = preg_replace('/[^0-9.]+/', '', $machine_id);
               
                
                if($machine=='tour')//tourbine
                {
                	$cond = 1;
                	$query = "INSERT INTO parts (name,sectionsection_id,tourbine_id) VALUES ($name,$section_id,$machine_id)";
                	//echo '<script> alert("0");</script>';
                }
                else//pump                
                {
                	$cond = 2;
                	$query = "INSERT INTO parts (name,sectionsection_id,pump_id) VALUES ($name,$section_id,$machine_id)";
                	//echo '<script> alert("1");</script>';
                }                                                                  
                $query_result =$dbh ->exec($query);  
                
                if($query_result)
                {
                    if($cond==1)
                    {
                        echo '<script> alert("Part added succesfully added into Tourbines");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                    }
                
                    else
                    {
                        echo '<script> alert("Part added succesfully added into Pumps");</script>'; 
                        echo '<script> window.opener.location.reload();</script>';                       
                    }
                }
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
		
		
		<div class="board" align="right">
			<form method="post">
				<p>Insert New Part</p>
				
	            Section: 
	                 <select name="section" class="section" required style="width:135px;">
	            <option value="" >Select Section</option>             
	                          <?php
	                            
	                            $sql=$dbh->query("select * from section ");
	                            
	                            foreach ($sql as $row) 
	                            {
	                                
	                            $id=$row['Section_ID'];
	                            $data=$row['section_name'];

	                            echo '<option value="'.$id.'">'.$data.'</option>';
	                            } 

	                            ?>
	                            </select>
	                <br><br>
	            Type: 
	                <select required name="pool" class="pool" style="width:135px";>
	                            <option selected value="">Type</option>                             

	                        </select><br><br>
	            Machine: 
	                <select  name="pumps" required  class="pumps" style="width:135px";>
	                          <option value="" selected>Pumps/Tourbines</option>


	                          
	                        </select><br><br>
	            
	            Part Name: <input type="text" required name="name"> <br><br>
				<br><br>
				<button type="submit" name="insert" onclick="return confirm('Insert new Part?')" class="btnG">Insert</button>
				<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>