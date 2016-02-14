<?php
	
    include '../../model/connect.php';


    session_start();

    $id = $_SESSION['machine_id'];
    $type = $_SESSION['type'];

    if($type == 1)//pump
    {
        $curr = " Pump  ";
        $query = "SELECT * FROM pumps WHERE pump_id = '$id'";
        $query_result = $dbh->query($query);
        foreach ($query_result as $data)
        {
            $name = $data['name'];
        }
    }
    else//game
    {        
        $curr = " Tourbine  ";
        $query = "SELECT * FROM tourbines WHERE tourbine_id = '$id'";
        $query_result = $dbh->query($query);
        foreach ($query_result as $data)
        {
            $name = $data['name'];
        }
    }
    
    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['name'],$_POST['section'],$_POST['pool']))        
            {
                include '../../model/connect.php';
                $name2 =  $dbh->quote($_POST['name']);                
                $section_id = $dbh->quote($_POST['section']);
                $type_id = $dbh->quote($_POST['pool']);
                
                $type2_id = $dbh->quote(substr($type_id,5));//pool-game(id)
                $type2=substr($type_id,1,4);//pool - game
               
                if($type2=='pool' && $type==1)//pool-pump
                {
                    $cond = 1; 
                    $query = "UPDATE pumps SET name=$name2,Sction_ID=$section_id,Pool_ID=$type2_id";
                }

                elseif ($type2=='pool' && $type==2)//pool-tour
                {
                    $cond = 2;                                             
                    $query = "UPDATE tourbines SET name=$name2,Section_ID=$section_id,Pool_ID=$type2_id";
                }
                
                elseif($type2 = 'game' && $type==1) //game-pump
                {
                    $cond = 1; 
                    $query = "UPDATE pumps SET name=$name2,Sction_ID=$section_id,Game_ID=$type2_id";
                
                }
                else//game-tour
                {
                    $cond = 2; 
                    $query = "UPDATE tourbines SET name=$name2,Section_ID=$section_id,Game_ID=$type2_id";
                   
                }
                                    
                $query_result =$dbh ->exec($query);  
                
                if($query_result)
                {
                    if($cond==1)
                    {
                        echo '<script> alert("Pump succesfull Submited");</script>';
                        echo '<script> window.opener.location.reload();</script>';
                        echo '<Script>self.close();</script>';                
                    }
                
                    else
                    {
                        echo '<script> alert("Tourbine succesfull Submited");</script>';
                         echo '<script> window.opener.location.reload();</script>';
                      
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
			Edit <?php echo $curr; ?><br><br>

            <p align="right">Current <?php echo $curr; ?>:<span style ="color:blue;"><?php echo $name; ?></span></p><br>


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
                            <option value=""selected>Pool/Game</option>                             

                        </select><br><br>

			Name: <input type="text" value="<?php echo $name ?>" name="name"> <br><br>
			<br>
			<input type="submit" class="btnG" name="insert" onclick="return confirm('Insert new Pool/Game?')" value="Insert">
			<button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>