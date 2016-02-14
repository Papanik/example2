<?php
	include'../../model/machinery_functions.php';
    include '../../model/connect.php';
    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['name'],$_POST['machine_type'],$_POST['section'],$_POST['pool']))        
            {
                include '../../model/connect.php';
                $name =  $dbh->quote($_POST['name']);
                $machine_type =  $_POST['machine_type'];//tour or pump
                $section_id = $dbh->quote($_POST['section']);
                $type_id = $dbh->quote($_POST['pool']);
                $query = "INSERT INTO";

                $type=substr($type_id,1,4);//pool - game
                $old_id=substr($type_id,5);
                //$id = str_replace("'",'',$id); // Replaces ' with "".zx
                //$id = "'".$id."'";
                $id = preg_replace('/[^0-9.]+/', '', $old_id);
                

                if($type=='pool' && $machine_type==1)//pool
                {
                    $cond = 1; 
                    $query = "INSERT INTO tourbines (name,Section_ID,Pool_ID) VALUES ($name, $section_id, '$id')";
                }

                elseif ($type=='pool' && $machine_type==2)
                {
                    $cond = 2;                                             
                    $query = "INSERT INTO pumps (name,Sction_ID,Pool_ID) VALUES ($name, $section_id, '$id')";                
                }
                
                elseif($type = 'game' && $machine_type==1)  
                {
                    $cond = 1; 
                    $query = "INSERT INTO tourbines (name,Section_ID,Game_ID) VALUES ($name, $section_id, '$id')";
                }
                else
                {
                    $cond = 2; 
                    $query = "INSERT INTO pumps (name,Sction_ID,Game_ID) VALUES ($name, $section_id, '$id')";
                   
                }
                                    
                $query_result =$dbh ->exec($query);  
                
                if($query_result)
                {
                    if($cond==1)
                    {
                        echo '<script> alert("Tourbine succesfull Submited");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                        echo '<Script>self.close();</script>';                
                    }
                
                    else
                    {
                        echo '<script> alert("Pump succesfull Submited");</script>';
                        echo '<Script>self.close();</script>';                
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
        <title>New Pool/Game</title>
    </head>
    <body>

	<div class="container">
	
		<div class="board" align="right">
		<form method="post">
			Insert New Pool/Game<br><br>


Select Section 
           
            <select name="section" class="section" required style="width:130px;">
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


                        Select Type
                             <select required name="pool" class="pool" style="width:130px";>
                            <option selected value="">Type</option>                             

                        </select><br><br>

Select Machine Type 
        <select style="width:130px;" required name = "machine_type">
      
      <option value="">Machine  Type</option>      
      <option value="1">Turbine</option>
      <option value="2">Pump</option>
        </select>
<br>
<br>
			Name: <input type="text" name="name"> <br><br>
			<br>
			<input type="submit" class="btnG" name="insert" onclick="return confirm('Insert new Pool/Game?')" value="Insert">
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>