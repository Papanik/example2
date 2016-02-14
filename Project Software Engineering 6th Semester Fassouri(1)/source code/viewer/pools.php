<?php
	include '../model/pool_functions.php';
	require_once '../model/pool_chemicals.php';


//session_start();
/*if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
}
else
{
	header("Location:login_form.php");
}
*/
?>
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">

<html>
    
    <head>
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/jquery.timepicker.css">
        <link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
        <script src="js/jqueryUI/jquery-ui.min.js"></script>
        <script src="js/jquery.timepicker.js"></script>
		    <script src="js/script.js"></script>
        <script src="js/pools.js"></script>
        <script src="js/jquery.numeric.js"></script>
        <script src="js/pools.js"></script>
        
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/pools.css">
		
        <title>Fasouri Waterpark - Technical - Pools</title>


<!-- numeric
<script src="js/jquery-1.7.2.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>-->
        <script type="text/javascript">

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox1").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg1").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox2").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg2").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});
    </script>
<!-- end numeric-->
    </head>
    <body>


	<div class="container">
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">
				<div class="nav" align="right">
				<ul>
                    <li><a href="technical.php"><button type="button" class="btnY" title="Return to Technical Menu"><img src="img/icons/back.png" alt="Back" style="width:20px;height:20px">Back</button></a></li>
					<li><a href="menu.php"><button type="button" class="btnH" title="Return to Main Menu"><img src="img/icons/home.png" alt="Home" style="width:20px;height:20px">Menu</button></a></li>
					<li><a href="../model/logout.php"><button type="button" class="btnR"title="Log out">Log Out</button></a></li>
				</ul>
				
				
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="formTitle">Pools</div>
		</div>



		
		<div class="row">	

      			 <form method="get"> 				
			 <div class="col-md-3" align="center">
       
             <div class="panel panel-default">
                  <!-- Default panel contents -->
                <div class="panel-heading">Pools</div>
                 <br>

              <select required name="pools" style="width:70%"; id="pools">
               <option selected value="" >Pools</option>
                       <?php pool(); ?>
                   
               </select>
               <button onclick='window.open("functions/new_machinery_section.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Section">...</button>

                
        <div class="panel-heading"></div>
          <div class="pool_menu">

  					<ul>
  					<li><a href="functions/new_pool.php"  onclick="window.open('functions/new_pool.php', 'newwindow', 'width=350, height=235'); return false;"><button type="button" class="sbtnG" title="Insert new Staff position"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>New</button></a></li>
                    <li><button name="edit_pool" type="submit" class="sbtn" title="Edit selected pool"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
                    <li><button type="submit" name="delete_pool" onclick="return(confirm('Delete Pool?\nAll pool details including chemicals and maintenance will be Deleted.\nProceed?'))" class="sbtnR" title="Delete selected"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
                   </ul>
				</div>
             
			</div>
      
    </div>
    
			


     
			<div class="col-md-4" align="center">
          <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading" >Details</div>

				
				<div class="pool_chem">
					<ul>
  						<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph:<input type="text" size="9" name="poolPh" id="textbox" class="numeric" ><span style="color:red;" id="errmsg"></span><br></li><br>
              <li>Chlorine:<input type="text" size="9" name="poolCh" id="textbox1" class="numeric" ><span style="color:red;"id="errmsg1"></span><br></li><br>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acid:<input type="text" size="8" name="poolAc" id="textbox2" class="numeric" ><span style="color:red;" id="errmsg2"></span><br></li>   <br>                   
              <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time:<input  type="text" size="9" id="time" name="time" class="timePicker"><br></li><br> 
              <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:<input type="text" size="9"id="date" name="date" class="datethPicker"><br></li>                     
              <br>                         
            </ul>               			 
				</div>
                <br>
                
                 <input type="submit" name="chemicals" class="btn" title="Update Pool Status" value ="Submit" onclick="return confirm('Are you sure for this measurement?');">
                <br><br>
                
			 </div>
			</div>

     

            

           <div class="col-md-4" align="center">
           
              
             <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Reports</div>
                  <br> 
				            
                <label required for="month">Month: </label>
                <input type="text" id="month" name="month" class="monthPicker" />
                <br><br>
                 <label for="year">&nbsp;&nbsp;&nbsp;&nbsp;Year: </label>
                <input type="text" id="year" name="year" class="yearPicker" />
                
                <div class="panel-heading"></div>
                <br>
                <button type="submit" name = "report"class="btnP" title="View Report"><img src="img/icons/chart.png" alt="New" style="width:50px;height:50px"><br>View Report</button>                               
		            <br><br>

  
			     </div>
            
       </div> 

		</div>
		
		
		
		</form>
	
	
	
	</div>
        
	
         <div class="footer">
			       <div class="row">
				        <div class="col-xs-2"><div id="logoFas"></div></div>
                <div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015.  <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/PoolsPending.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			         </div>
		      </div>
        
    
    </body>

 
    
    </html>
    <?php 
    if (isset($_GET['chemicals']))
    {
     pool_chemicals(); 
    }
    ?>
<script>
$(document).ready(function(){
   $('#textbox').mask('0000-00-00',{'translation': {0: {pattern: /[0-9*]/}}});
});
    </script>

