 <?php 
   include '../../model/pool_functions.php';
   include '../../model/maintenance_function.php';
   include '../../model/alert_function_pool.php';
  
    
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
       
       

         <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/function.css">
        
        <script src="../js/script_incident.js"></script>
        <script src="../js/incident.js"></script>
    
	
        <title>Report New Incident</title>
    </head>
    <body>
 
	<div class="container">
		<p>Maintenance Pool</p>
        
        <div class="col-md-12">
       <form method="get">
        
        <br>


             <div class="col-md-3" align="center">
       
             <div class="panel panel-default">
                  <!-- Default panel contents -->
                <div class="panel-heading">Pools</div>
                 <br>

                <select required name="pools" style="width:50%"; id="pools">
                <option selected value="" >Pools</option>
                       <?php pool(); ?>
                   
                 </select>
                 <br><br>
              </div>
                 <br>
                <div class="panel panel-default">
               <div class="panel-heading">Date</div>
               <br>

                <input type="text" id="date" name="date"  placeholder="Date " style="width:50%;" ><br><br>
              </div>
                <br>
                <br>
                <br>
               
                <input type="submit" onclick="return confirm('Insert new Maintenance date?');" name="submit" type="submit" class="btnG" value="Submit">
                <input type="button"  class="btnR" value="Cancel" onclick="self.close()">
                
             
        </div>        
    </div>            
 </form>
    </body>
    </html>
    
<script>
$(document).ready(function(){
   $('#textbox').mask('0000-00-00',{'translation': {0: {pattern: /[0-9*]/}}});
});
    </script>