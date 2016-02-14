 <?php 
   

   //include '../../model/maintenance_function.php';
 include '../model/connect.php';

session_start();



    
?>
<!DOCTYPE html>
<html>
    
    <head>
		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../js/jqueryUI/jquery-ui.min.css">
        <script src="../js/jqueryUI/jquery-ui.min.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/function.css">
        
        <script src="js/jquery.timepicker.js"></script>
            <script src="js/script.js"></script>
        <script src="js/pools.js"></script>
        <script src="js/jquery.numeric.js"></script>
        <script src="js/pools.js"></script>
        <script src="../js/script_incident.js"></script>
        <script src="../js/incident.js"></script>
        <link rel="stylesheet" href="../reports/pool.css">
	
        <title>Maintenance</title>
    </head>
    <body>
 
	<div class="container">
		
        
        <div class="col-xs-3">
        <div class="panel panel-default" id="lezanta">
                  <!-- Default panel contents -->
                  <div id="epikefalida">
                  <div class="panel-heading"><h1>Maintenance - Pools</h1></div>
            </div>
                 <br>
                 <table>
                        <thead class="kentriko">
                            <th>Pool Name</th>
                            <th>Pool ID</th>
                        </thead>
<?php
             foreach ($_SESSION['pool_id'] as $id_pool) 
            {

                $date2="UPDATE pools SET checked=0 WHERE pools_id='$id_pool'";
                $pool = "SELECT * FROM pools WHERE pools_id = '$id_pool'";
                $date2_result=$dbh->exec($date2);
                $pool_result = $dbh->query($pool);
                foreach ($pool_result as $stixeia)
                {
                    $name=$stixeia['pool_name'];
                    ?>


                    <thead class="kentriko1">
                      <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $id_pool; ?></td>
                        </tr>

                    </thead>


                    <?php 
                }
            }

                    ?>
                </table>
                </div>

            </div>
    </div>
    </body>
    </html>