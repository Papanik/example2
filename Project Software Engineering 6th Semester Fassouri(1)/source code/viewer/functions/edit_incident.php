<?php 
    include '../../model/connect.php';
    include '../../model/incident_functions.php' ;
    session_start();

    foreach ($_SESSION['incident_id'] as $incident_id)
     {
      
   
    
    $incident_data = "SELECT * FROM incidents WHERE  Incidents_ID = '$incident_id' ";
    $result = $dbh->query($incident_data);
    foreach ($result as $row1)
    {
        $date = $row1['Date_happened'];
        $descr = $row1['Description'];
        $title = $row1['Title'];
    }
}
    if(isset($_POST['save']))
    {            
        if(isset ($_POST['section'], $_POST['date'],$_POST['description'],$_POST['title']))
       {
            
            $section =  $dbh->quote($_POST['section']);
            $date =  $dbh->quote($_POST['date']);
            $description =  $dbh->quote($_POST['description']);
            $title = $dbh->quote($_POST['title']);
            
            $incident = "   UPDATE incidents 
                            SET Date_happened=$date, Description=$description, Section_ID=$section,Title=$title 
                            WHERE Incidents_ID = '$incident_id'";
            $result_incident =$dbh->exec($incident);  
            if($result_incident)
            {                                
                echo'<script>alert("Incident succesfull Updated");</script>';
                echo '<script> window.opener.location.reload();</script>';
                echo "<script>location.reload;</script>";
            }
    }
}
    


?>

<!DOCTYPE html>
<html>
    
    <head>
		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../js/jqueryUI/jquery-ui.min.css">
        <script src="../js/jqueryUI/jquery-ui.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/jquery.mask.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/function.css">
        <script src="../js/function.js"></script>
        <script src="../js/incident.js"></script>		            
        <link rel="stylesheet" href="../css/jquery.timepicker.css">    
        <script src="../js/script_incident.js"></script>
       
		
        <title>Edit Incident</title>
    </head>

        <body>
	       <div class="container">
		      <p>Edit Incident</p>        
                <div class="col-md-12">
                    <form method="post">
                        Section:                
                        <select required name="section" style="width:200px;">
                            <option value="" selected disabled>Select Section</option>
                            <?php section(); ?> 
                        </select>
                        <br>
                        <br>
                            Title : <input required type="text" name="title" value="<?php echo $title;?>"  placeholder = "Type a title">
                            <br><br>
                            Date: <input type="text" id="date" name="date" value="<?php echo $date; ?>"  placeholder="Date"  >
                        <br>
                        <br>
                            Description:
                        <br>
                            <textarea required placeholder="Write a description" rows="4"  cols="50" name="description"><?php echo $descr; ?></textarea> 
                        <br>
                        <br>
                        <br>
                        <br>
                            <button type="submit" onclick="return(confirm('Update Incident Details?'));" name="save" class="btnG">Submit</button>
                            <button type="button"  class="btnR"  onclick="self.close()">Cancel</button>
                    </form>             
                </div>        
            </div>            

        </body>
    </html>

<script>
    $(document).ready(function(){
        $('#textbox').mask('0000-00-00',{'translation': {0: {pattern: /[0-9*]/}}});
    });
</script>