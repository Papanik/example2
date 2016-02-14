<?php
include '../model/connect.php';

include '../model/pool_functions.php';

session_start();
$id = $_SESSION['pool_id'] ;
$month_number=$_SESSION['month'];
 $year_num=$_SESSION['year'];

$pools="SELECT * FROM section,pools WHERE pools.section_id = section.Section_ID AND pools.pools_id = '$id' ";

      $pools_result=$dbh ->query($pools);

 global $pools_id;
        global $name_pool;
        global $section_id;
        global $name_section;
        global  $descriptio_pool;

foreach ($pools_result as $stixeia1) 
{
   

         $pools_id=$stixeia1['pools_id'];
         $name_pool=$stixeia1["pool_name"];
         $section_id=$stixeia1["section_id"];
         $name_section=$stixeia1['section_name'];
         $descriptio_pool=$stixeia1['description_pool'];

}
        

?>




<!DOCTYPE html>



<html>
    
    <head>
    <link rel="stylesheet" href="pool.css">
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
        <tbody><tr><td>Report Description : ANALYTICAL RESULTS SUMMARY</td>
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


      $pools_chemical="SELECT DISTINCT(day) FROM pools_chemicals_backup WHERE poolspool_id= '$id' AND month = '$month_number' 
      AND year = '$year_num' ORDER BY day ";

      $pools_chemical_result=$dbh ->query($pools_chemical);

      foreach ($pools_chemical_result as $stixeia) 
      {
        $i=1;

          $day_number= $stixeia['day']; 

          $day=" SELECT DISTINCT * FROM pools_chemicals_backup WHERE day = '$day_number' ";

         $day_result =$dbh->query($day);

         
         $day_counter = $day_result->rowCount();

          $ph_sum=0;
          $acid_sum=0;
          $chlorine_sum=0;

         global $ph_sum;
         global $acid_sum;
         global $chlorine_sum;
         global $day_counter;
         global $month_number;
         global $day_number;
          global $year_num;

            


         
        foreach ($day_result as $stixeia) 
        {
        
           
         

           //ximika
          $ph=$stixeia["ph"];
          $acid=$stixeia['acid'];
          $chlorine=$stixeia['chlorine'];



          $ph_sum += $ph;
          $acid_sum += $acid;
          $chlorine_sum += $chlorine;

          
        
          $year_number= $stixeia['year'];
          $month_number= $stixeia['month'];
          $time_number = $stixeia['time'];


          ?>

          <?php
            if($i==1)
            {
              $i=0;
              ?>

            <div id="lezanta1">

               <th> Date:<?php echo $month_number.'/'.$day_number.'/'.$year_num; ?>
              
              </th>
              
            <th ><br> Measurements rates for this day:
              <?php echo $day_counter; ?>
              </th>
              </div>

      
           <table width="800" id="pure-table pure-table-horizontal">

            <thead class="kentriko">
           <tr>
             <th width="200">Name Section</th>
           <th width="120">ID Section</th>
            <th width="200">Pool Name</th>
            <th width="150">Pool ID</th>
        
           </tr>
          </thead>
        <thead class="kentriko1">
         <tr>
        <td><?php echo  $name_section; ?></td>
        <td><?php echo  $section_id; ?></td>
        <td><?php echo  $name_pool; ?></td>
        <td><?php echo  $pools_id; ?></td>
        
         </tr>
         </thead>

           <?php
       }
       ?>




          <thead class="kentriko2">
         <tr>

        <td>Sample Parameter:</td>
        <td>Rates:</td>
        <td>Analysis Time:</td>
        <td>Units</td>
        
      </tr>
      </thead>

      <thead class="ph-acid-chlorine">    
      <tr >


        <td>PH:</td>
        <td><?php echo $ph; ?></td>
        <td><?php echo "$month_number / $day_number / $year_number $time_number"; ?></td>
        <td>pH Units</td>
        <tr><td>Acid:</td>
        <td><?php echo $acid; ?></td>
        <td><?php echo  "$month_number / $day_number / $year_number $time_number";?></td>
        <td>Acid Units</td></tr>
        
        <td>Chlorine:</td>
        <td><?php echo $chlorine; ?></td>
        <td><?php echo "$month_number / $day_number / $year_number $time_number";?></td>
        <td>ORP</td>
          </tr>
          
      </thead>

  <?php 

  }
?>

 <thead class="average">    
      <tr>
        <td>Average for:</td>
          
      
      </thead>
      <thead class="average-ph-acid-chlorine">    
      <tr >
        <td>PH:</td>
          <td><?php echo $ph_sum/$day_counter; ?></td>
          <tr><td>Acid:</td>
         <td><?php echo $acid_sum/$day_counter; ?></td>
        </tr>
        
        <td>Chlorine:</td>
        <td><?php echo $chlorine_sum/$day_counter; ?></td>
          </tr>
          
          
      </thead>
      </table>
      

<?php

}
  ?>

<?php
       
       
       ?>
</main>
</div>
</div>
</div

    
    </body>
	</html>
	