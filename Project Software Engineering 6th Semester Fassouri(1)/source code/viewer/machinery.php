<?php

	include '../model/connect.php';
	include '../model/machinery_functions.php';
?>
<!DOCTYPE html>


<html>
    
    <head>
    <script type="text/javascript" src="js/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">

//--------------------------section-----------

$(document).ready(function()
{
$(".section").change(function()
{
var id=$(this).val();
var dataString = 'id='+id;

$.ajax
({
type: "POST",
url: "../model/ajax/ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pool").html(html);

} 
});

});

});


//---------------------------------type----------------

$(document).ready(function()
{
$(".pool").change(function()
{
var id_pool=$(this).val();
var dataString = 'id_pool='+ id_pool;

$.ajax
({
type: "POST",
url: "../model/ajax/ajax_pumps.php",
data: dataString,
cache: false,
success: function(html)
{
$(".pumps").html(html);

} 
});

});

});

//----------------------------part----------------------------------------------

$(document).ready(function()
{
$(".pumps").change(function()
{
var id_machine=$(this).val();
var dataString = 'id_machine='+ id_machine;

$.ajax
({
type: "POST",
url: "../model/ajax/ajax_part.php",
data: dataString,
cache: false,
success: function(html)
{
$(".part").html(html);

} 
});

});

});
</script>

    	<link rel="stylesheet" href="viewer/css/style.css">
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
        <link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
        <script src="js/jqueryUI/jquery-ui.min.js"></script>
		<script src="js/script.js"></script>

        
        
        
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/machinery.css">
		
        <title>Fasouri Waterpark - Technical - Machinery</title>



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

			<div class="formTitle">Machinery</div>
		</div>
		
		<div class="row">
		<form method="post">										
			<div class="col-md-4">

            <div class="panel panel-default">
                
                  <div class="panel-heading" align="center" font-weight>Area</div>

                    <div class="panel panel-default">
				    <div class="panel-heading"  >Section:</div>
                    
			        
                  
                        <select required name="section" class="section" style="width:100%;">
                        <option value="" >--Section--</option>
                          <?php
							
							$sql=$dbh->query("select * from section ");
								
							foreach ($sql as $row) 
							{
								
							$id=$row['Section_ID'];
							$data=$row['section_name'];

							echo '<option value="'.$id.'">'.$data.'</option>';
							} 

							?>

                        </select>
                        <a href="functions/new_section.php"  onclick="window.open('functions/new_machinery_section.php', 'newwindow', 'width=500, height=500'); return false;"><button type="button" class="sbtnG" title="Insert new Section">New</button></a>
                		<button type="submit" class="sbtn" name="edit_section" title="edit_section">Edit</button>
                		<button type="submit" class="sbtnR" name="delete_section" onclick="return confirm('Delete Section?\nAll pools, games, turbines, pumps and parts will be DELETED')" title="Delete">Delete</button>
                		<br>
                		
                	</div>
                
					<div class="panel panel-default">

                     	<div class="panel-heading">Type</div>
                    

                        <select required name="pool" class="pool" style="width:100%";>
							<option selected>-- Pool/Game--</option>                        	 

                        </select>
                          <a href="functions/new_type.php"  onclick="window.open('functions/new_type.php', 'newwindow', 'width=500, height=500'); return false;"><button type="button" class="sbtnG" title="Insert new Type">New</button></a>
          				  <button type="submit" class="sbtn" name = "edit_type" title="edit_type">Edit</button>
               			 <button type="submit" class="sbtnR" onclick="return confirm('Delete Pool/Game?\n All data of this Pool/Game will be DELETED');"  name="delete_type" title="Delete">Delete</button>
                        <br>
                        
				<div class="panel panel-default">
                    <div class="panel-heading">Machine</div>
			        
                        <select  name="pumps"  class="pumps" style="width:100%";>
                          <option value="" selected>-- Pumps/Tourbine--</option>


                          
                        </select>

                       	<a href="functions/new_machine.php"  onclick="window.open('functions/new_machine.php', 'newwindow', 'width=500, height=500'); return false;"><button type="button" class="sbtnG" title="Insert new Machine">New</button></a>
        				<button type="submit" class="sbtn" name="edit_machine" title="edit_machine">Edit</button>
                		<button type="submit" class="sbtnR" onclick="return confirm('Delete Pump/Tourbine?');" name="delete_machine" title="Delete">Delete</button>

                    <br>
                    </div>

				</div>
			</div>
			</div>

			
			
						<div class="col-md-4" align="left">
							<div class="panel panel-default">
                    			<div class="panel-heading" align="center">Parts</div>
                    		<div class="panel-heading" align="center"><br></div>
							
							<select required multiple size="10" name="part[]"  class="part" style="width:100%";>

			                   <option value="" selected>--Part--</option>

			                </select>
			                <br>
						</div>
					</div>

			
            
			            <div class="col-md-3">
			            	<div class="panel panel-default">
                    			<div class="panel-heading" align="center">Tools</div>
                    				<div class="panel-heading" align="center"><br></div>

			              <div class="nav" align="left">
						</form>
			            
			                
			                <div class="parts_list">
								<ul>
									<li><a href="functions/new_part.php"  onclick="window.open('functions/new_part.php', 'newwindow', 'width=350, height=350'); return false;"><button type="button" class="sbtnG" title="Insert new Part"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>New</button></a></li>
									<li><button type="submit" class="sbtn" name = "edit_part" title="Edit selected Part"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
									<li><button type="submit" class="sbtnR" name="delete_part" onclick="return confirm('Delete Part(s)');" title="Delete selected"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
									<li><button type="submit" name="report" class="sbtnY" onclick="return confirm('Did you selected Section,Type and Machine?');" title="Print a report on Parts of this machine"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px"><br>Report</button></li>
								</ul>
							</div>
                
                
		      
						</div>
            
           			 </div>
			          </form>     

				</div>
			</div>	
		
		
		
		
	
		
	
	
	</div>
        
	
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
                <div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015.  <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Machinery.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>