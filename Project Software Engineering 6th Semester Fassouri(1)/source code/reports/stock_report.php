<?php
include '../model/connect.php';

include '../model/stock_functions.php';

session_start();
$id = $_SESSION['section_id'];



$items="SELECT * FROM items,item_section WHERE items.Section_ID =  '$id' AND item_section.section_id = '$id' ";

if($items_result=$dbh->query($items))
{

$items_counter=$items_result->rowCount();

$i=1;
$counter= 1;
}

?>




<!DOCTYPE html>




<html>
    
    <head>
    <link rel="stylesheet" href="style1.css">
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
    
 	<div class="box">
<main id="center">       
        
        <div id="epikefalida">
    <table height="60px" width="798px">
        <tbody><tr><td>Report Description : Stock</td>
        </tr>
    </tbody>
        </table>
</div>
        

          <div id="lezanta">
      <th> Print Date:
              <?php echo date("d/m/Y"); ?>&nbsp;<?php echo date("h:i:sa"); ?>
              </th><br><br>
        
              <th> Measure: <?php  echo $items_counter; ?>
              
              </th>
              
      </div>
    
    <?php 

   foreach($items_result as $stixeia)
    {


    

     $Item_id=$stixeia['Item_ID'];
     $item_name=$stixeia['Name'];
    $Available=$stixeia['Available'];
    $Loaned=$stixeia['Loaned'];
    $Maintenance=$stixeia['Maintenance'];
    $Broken=$stixeia['Broken'];
    $Section_id=$stixeia['Section_ID'];
   
    
   //-- pools chemicals -->
        
    $item_section_name=$stixeia["name"];
  
        


      ?>

    

  <table width="800" id="pure-table pure-table-horizontal">

          

    <thead class="kentriko">
        

      <tr>
        <th width="20">No.</th>
        <th width="300">Name Section</th>
        <th width="250">ID Section</th>
        <th width="200">Item Name</th>
        <th width="150">Item ID</th>
        <th width="150">Available</th>
        <th width="120">Loaned</th>
        <th width="120">Maintenance</th>
        <th width="120">Broken</th>
      </tr>

       
    </thead>


   
    <thead class="kentriko1">
      <tr>
        <td> <?php echo $counter++; ?></td>   
        <td><?php echo $item_section_name; ?></td>
        <td><?php echo $Section_id; ?></td>
        <td><?php echo $item_name; ?></td>
         <td><?php echo $Item_id; ?></td> 
        <td><?php echo $Available; ?></td>   
        <td><?php echo $Loaned; ?></td> 
        <td><?php echo $Maintenance; ?></td> 
        <td><?php echo $Broken; ?></td> 
   
      </tr>
      </thead>
           
  </table>

   <?php
       }
       
       ?>



</main>
</div>
</div>
</div>    
    </body>
	</html>
	<?php include '../model/login.php';?>