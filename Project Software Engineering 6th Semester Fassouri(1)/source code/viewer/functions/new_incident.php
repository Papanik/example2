 <?php 
    include '../../model/incident_functions.php';
    
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
		<p>New Incident</p>
        
        <div class="col-md-12">
       <form method="get">
        Section:
        
        <br>
        <select required name="section" style="width:200px;">
            <option  selected value="">Select Section</option>
            <?php

                                        include '../../model/connect.php';                       
                                        $sql=$dbh->query("select * from section_incidents ");//_incidents    -      mesa sto section query dame
                                        
                                        foreach ($sql as $row) 
                                        {                                                                                                       
                                            $id=$row['section_id'];
                                            $data=$row['section_name'];
                                            echo '<option value="'.$id.'">'.$data.'</option>';
                                        }                                                      
                                    ?>

        </select>
        <br>
        <br>
        Title<br><input type="text" name="title" required placeholder = "Type a title">
        <br><br>
        Date<br>
        <input type="text" id="date" name="date"  placeholder="Date " style="width:90%;" ><br><br>
        Description
        <br>
        <textarea placeholder="Write a description" rows="4" cols="50" name="description" required></textarea> 
                <br>
                <br>
                <br>
                <br>
                <input type="submit" onclick="return confirm('Report new Incident?');" name="submit" type="submit" class="btnG" value="Submit">
                <input type="button"  class="btnR" value="Cancel" onclick="self.close()">
                </form>
             
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