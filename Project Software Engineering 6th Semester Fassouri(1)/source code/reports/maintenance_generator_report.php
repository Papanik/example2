<?php
include '../model/connect.php';

include '../model/maintenance_function.php';


session_start();


$section_id=$_SESSION['section_id'];
$generator_id=$_SESSION['generator_id'];

 


//-------------------------section-----------------

$section=$dbh->query("select * from section  where Section_ID ='$section_id' ");
foreach ($section as $section_data) 
{

  $section_id=$section_data['Section_ID'];
  $section_name=$section_data['section_name'];

}


//----------------pool---------------------------


  $pools=$dbh->query("select * from generator  where generator_id ='$generator_id' ");

  foreach($pools as $row)

  {

  $id_generator=$row['generator_id'];
  $generator_name=$row['name'];
  
  }


  $pool_description=$dbh->query("select * from pool_description  where id ='$generator_id' AND type='3'");

  foreach($pool_description as $row)

  {

  $description=$row['description'];
  $date=$row['date_id'];
  
  }


?>



<!DOCTYPE html>



<html>
    
    <head>
    <link rel="stylesheet" href="maintenance_report.css">
    <script src="js/jquery-1.11.1.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
       
        <title>Fasouri Waterpark - Report</title>
        
    </head>
    <body>

    <button class="btn" onclick="window.print()" > Print Report </button>

<div class="col-xs-12" align="center">
      <div id="logoFas"></div><br>
    </div>
    
  <div class="row">
    <div class="col-xs-12">
     <div id="box">
      <main id="center">       
        
        <div id="epikefalida">
    <table height="60px" width="798px">
        <tbody><tr><td>Report Description : MAINTENANCE</td>
        </tr>
    </tbody>
        </table>
     </div>

     <div id="lezanta">
      <th> Print Date:
              <?php echo date("d/m/Y"); ?>&nbsp;<?php echo date("h:i:sa"); ?>
              </th><br><br>
      </div>
        



<?php

global $date;
$now_date=date("Y");







$pool_description=$dbh->query("select * from pool_description  where id ='$id_generator' AND type='3' AND year='$now_date' ");

 foreach($pool_description as $row)

  {

  $description=$row['description'];
  $date=$row['date_id'];


       
  
    ?>


            <br>
            <div id="lezanta1">

               <th> Date Maintenance:<?php echo $date ?>
              
              </th>
              
            
              </div>

      
           <table width="800" id="pure-table pure-table-horizontal">

            <thead class="kentriko">
           <tr>
             <th width="200">Name Section</th>
           <th width="120">ID Section</th>
            <th width="200">Generator Name</th>
            <th width="150">Generator ID</th>
        
           </tr>
          </thead>
        <thead class="kentriko1">
         <tr>
        <td><?php echo  $section_name; ?></td>
        <td><?php echo  $section_id; ?></td>
        <td><?php echo  $generator_name; ?></td>
        <td><?php echo  $id_generator; ?></td>
        
         </tr>
         </thead>






          <thead class="kentriko2">
         <tr>

        <td>Description:</td>
     
        
      </tr>
      </thead>

      <thead class="ph-acid-chlorine">    
      <tr >


        
        <th colspan="4"  id="kentriko_section" ><?php echo $description; ?></th>
        
       
          </tr>
          
      </thead>


 
      </table>


      <?php
    }
  

      ?>
     

</main>
</div>
</div>
</div

    
    </body>
  </html>