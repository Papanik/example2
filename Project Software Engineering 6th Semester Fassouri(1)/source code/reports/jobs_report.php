<?php
include '../model/connect.php';
include '../model/machinery_functions.php';

$year = date("Y");//Current Year


$jobs="SELECT * FROM jobs WHERE year = '$year' ";

      $jobs_result=$dbh ->query($jobs);

        global $job_id;
        global $job_title;
        global $job_descr;
        global $job_date;
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
        <title>Fasouri Waterpark - Task List Report</title>
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
                <tbody>
                  <tr>
                    <td>Report Description : Task List for <b><?php echo $year ?></b></td>
                  </tr>
                </tbody>
              </table>
            </div>

          <div width="798" id="lezanta">
            <th> Print Date:<?php echo date("d/m/Y"); ?>&nbsp;<?php echo date("h:i:sa"); ?></th><br><br>
          </div>
          
          <div id="lezanta1"></div>                                                      
          <table width="800" id="pure-table pure-table-horizontal">
            <thead class="kentriko8">    
              <tr>
                <tr>
                  <th  id="kentriko_part" colspan="5">PART LIST</th>
                </tr>
              </tr>
            </thead>
            <thead class="kentriko9">    
              <tr>
                <td width="50">A/A</td>
                <td width="150">Name</td>
                <td width="150">Date</td>
                <td width="100">Check List</td>
                <td width="500">Description</td>
              </tr>

            
              <?php
                $i=1;
      
                foreach ($jobs_result as $stixeia1) 
                {
                  $job_id=$stixeia1['job_id'];
                  $job_title=$stixeia1['title'];
                  $job_descr=$stixeia1['description'];
                  $job_date=$stixeia1['date'];
              ?>
                               
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo  $job_title; ?></td>
                 <td><?php echo  $job_date; ?></td>
                <td>&#9744;</td>
                <td><?php echo $job_descr; ?></td>
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

  
  