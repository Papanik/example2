<?php
include '../model/connect.php';

include '../model/machinery_functions.php';


session_start();


$section_id=$_SESSION['section_id'];
$type_id=$_SESSION['type_id'];

$machine_id=$_SESSION['machine_id']; 


//-------------------------section-----------------

$section=$dbh->query("select * from section  where Section_ID ='$section_id' ");
foreach ($section as $section_data) 
{

  $section_id=$section_data['Section_ID'];
  $section_name=$section_data['section_name'];

}


//----------------type---------------------------

 $type=substr($type_id,0,4);
 $type_id1=substr($type_id,4);      


if($type =='pool')
{
  $pools=$dbh->query("select * from pools  where pools_id ='$type_id1' ");

  foreach($pools as $row)

  {

  $id_pool=$row['pools_id'];
  $pool_name=$row['pool_name'];
   $id_game='N/A';
  $game_name='N/A';
  }
}

if($type=='game')
{
  $games=$dbh->query("select * from games  where game_id ='$type_id1'");

  foreach($games as $row1)

  {

  $id_game=$row1['game_id'];
  $game_name=$row1['name'];
  $id_pool='N/A';
  $pool_name='N/A';
  }
  
}


//-----------------------------------part-pump



 
      //tto einai to katharo ID t type diladi mono o arithmos
$type=substr($machine_id,0,4);
$machine_id1=substr($machine_id,4);


if($type=="pump")
{


$sql=$dbh->query("select * from pumps  where pump_id='$machine_id1'");
$part="select * from parts  where pump_id='$machine_id1'";
foreach($sql as $row2)

{

$id_pumps=$row2['pump_id'];
$pumps_name=$row2['name'];

$tourbine_name='N/A';
$id_tourbine='N/A';

}
}

//--------------------------------part-tourbine
if($type=="tour")
{

$sql=$dbh->query("select * from tourbines  where tourbine_id='$machine_id1'");

$part="select * from parts  where tourbine_id='$machine_id1'";

foreach($sql as $row3)

{

$id_tourbine=$row3['tourbine_id'];
$tourbine_name=$row3['name'];

$id_pumps='N/A';
$pumps_name='N/A';

}

}

$part_result=$dbh->query($part);


?>




<!DOCTYPE html>



<link rel="stylesheet" href="style.css">
<html>
    
    <head>

    <script src="js/jquery-1.11.1.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        
   


 
        <title>Fasouri Waterpark - Machinery Report</title>
        
    </head>

 <button class="btn" onclick="window.print()" > Print Report </button>

    <body align="center " style="align:center;">


<div class="col-xs-12" align="center">
      <div id="logoFas"></div><br>
    </div>
    
 <div class="row">
<div class="col-xs-12">
    
  <div class="box">
<main id="center">   
       
        
        <div id="epikefalida">
    <table height="60px" width="796px">
        <tbody><tr><td>Report Description : ANALYTICAL RESULTS SUMMARY</td>
        </tr>
    </tbody>
        </table>
     </div>

     <div width="798" id="lezanta">
      <th> Print Date:
              <?php echo date("d/m/Y"); ?>&nbsp;<?php echo date("h:i:sa"); ?>
              </th><br><br>
      </div>
        
          
            <div id="lezanta1">

             
              </div>

      
           <table width="800" id="pure-table pure-table-horizontal">
            <thead id="kentriko" >
           <tr><th id="kentriko_section" colspan="4">SECTION</th></tr>
          </thead>
          
        <thead class="kentriko1" >
         
         <tr>
         <th width="400" colspan="2">Name Section</th>
           <th width="400" colspan="2">ID Section</th>
            

         </tr>
         
         </thead>
   


          <thead class="kentriko2">
         <tr>
        <td colspan="2"><?php echo  $section_name; ?></td>
        <td colspan="2"><?php echo  $section_id;?></td>

        
      </tr>
      </thead>

        <thead id="kentriko21">
         <tr>
         <tr><th id="kentriko_type" colspan="4">TYPE</th></tr>

         </tr>
         </thead>

      <thead class="kentriko3">    
      <tr >
            <th width="200">Pool Name</th>
            <th width="150">Pool ID</th>
            <th width="200">Game Name</th>
            <th width="150">Game ID</th>
           
        </tr>
          
      </thead>



        <thead class="kentriko4">    
        <tr>
         <td><?php echo  $pool_name; ?></td>
        <td><?php echo  $id_pool; ?></td>
        <td><?php echo $game_name; ?></td>
        <td><?php echo  $id_game; ?></td>
        </tr>
        </thead>



          <thead class="kentriko5">    
          <tr >
           <tr><th id="kentriko_machine" colspan="4">MACHINE</th></tr>
          
            </tr>
          </thead>

         <thead class="kentriko6">    
          <tr>
            <th width="200">Pumps Name</th>
            <th width="150">Pumps ID</th>
            <th width="200">Tourbine Name</th>
            <th width="150">Tourbine ID</th>
          </tr>
          </thead>

         <thead class="kentriko7">    
          <tr>
          <td><?php echo  $pumps_name; ?></td>
          <td><?php echo  $id_pumps; ?></td>
          <td><?php echo  $tourbine_name; ?></td>
          <td><?php echo  $id_tourbine; ?></td>
          </tr>
         </thead>

         
          </table>

<table width="800" id="pure-table pure-table-horizontal">

            <thead class="kentriko8">    
          <tr>
          <tr><th  id="kentriko_part" colspan="4">PART LIST</th></tr>
          </tr>
          </thead>


          <thead class="kentriko9">    
            <tr> <td width="50">A/A</td> <td width="150">Name</td> <td width="100">Check List</td> <td width="500">Details </td> </tr>

            <?php $i=1;
            foreach ($part_result as $parts) 
            {
              $name_part=$parts['name'];



            ?>
                       
            <tr>
            <td><?php echo $i++; ?></td>
           <td><?php echo  $name_part; ?></td>
           <td>&#9744;</td>
           <td></td>
           </tr>
          

    <?php
  }
  ?>
  </thead>
      </table>
      
      <br>
          <br>
          <br>




</main>
</div>
</div>
</div>


    
    </body>
  </html>

  
  