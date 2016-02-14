<?php
	include '../model/incident_functions.php';
	include '../model/connect.php';
?>


<!DOCTYPE html>


<html>
    
    <head>
    <script src="js/jquery-1.11.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="viewer/css/style.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    	<link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
    	<script src="js/jqueryUI/jquery-ui.min.js"></script>
    	
    	<script src="js/script_incident.js"></script>
		<script src="js/incident.js"></script>
		
	
		
        



		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/incident.css">
		<link rel="stylesheet" href="css/menu.css">
		
        <title>Fasouri Waterpark - Incidents</title>


        <script type="text/javascript">
function ajaxFunction(str)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
function stateChanged() 
    {
    if(httpxml.readyState==4)
      {
document.getElementById("inciList").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';

      }
    }
	var url="../incident_search/ajax-search-demock.php";
url=url+"?txt="+str;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';

  }
</script>
    </head>
    <body>

    <form method="get">
	<div class="container">
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">
				<div class="nav" align="right">
				<ul>
					<li><a href="menu.php"><button type="button" class="btn"><img src="img/icons/home.png" alt="Home" style="width:20px;height:20px">Menu</button></a></li>
					<li><a href="../model/logout.php"><button type="button" class="btnR">Log Out</button></a></li>
				</ul>
				
				
				</div>
			</div>
		</div>


		
		<div class="row">
			<div class="formTitle">Incidents</div>
		</div>


		<!--search  -->
		
             




		<div class="row">

		  <div class="col-md-4">

		  	     
          
			
					<div class="panel panel-default">

						<div class="panel-heading">Section</div>

							

								<div class="sele_list">
								 
			                        <select name="section"  class="section" style="width:100%;">			                        			                         
                					<option value="">Select section </option>
                					<?php

			                          	include 'connect.php';                       
			                        	$sql=$dbh->query("select * from section_incidents ");//_incidents    -      mesa sto section query dame
			                         	
			                        	foreach ($sql as $row) 
			                            {			                                                    			                            
			                            	$id=$row['section_id'];
			                             	$data=$row['section_name'];
			                            	echo '<option value="'.$id.'">'.$data.'</option>';
			                            }			                                           
			                		?>

			                        </select>

			                       </div>
			         
			         


	                     
	                       	<div class="tool_menu">
                        
		                        <ul>
								<a href="functions/new_incident_section.php"  onclick="window.open('functions/new_incident_section.php', 'newwindow', 'width=500, height=500'); return false;"><button id="incident_new" name="new_sectin" type="button" class="sbtnG" title="Insert new Section">New</button></a>
		                		<button id="incident_edit" type="submit" name="edit_section" class="sbtn" title="edit Section">Edit</button>
		                		<button id="incident_delete" onclick="return confirm('Delete Section?\nAll Incidents in this section will be deletet');" name="delete_section" type="submit" class="sbtnR" title="Delete">Delete</button></a>
		                		</ul>

                			</div>
             
                	</div>
            
                

 			

          		
                
                        

							<input  type="text"onkeyup="ajaxFunction(this.value);" name="username" placeholder="Search" size="19" /> 
							<img src="img/search.png" size="20px" width="20px" height="20px" >
					        <br><br>
				
						<select id="inciList" size="10" name="inciList[]" multiple style="width:100%;">
		                   <?php if(isset($_GET['date_button']))
							{
								incidents_name();
							} ?>

		                </select>

		                 
		                
</div>
		

            
             
                	
            
       <div class="col-md-4">         
   
			<div class="panel panel-default">

				<div class="panel-heading">Date Range</div>

             <input type="text" id="date" name="date" placeholder="Date From " style="width:90%;" >
             <br><br>
             <input type="text" id="date1" name="date1" placeholder="Date To" style="width:90%;">
             <br>
             <br>
             <button type="submit"  name = "date_button"class="sbtnG" title="Update List"><img src="img/icons/update.png" alt="New" style="width:30px;height:30px">  Update</button>  
					
             </div>


      </div>
            
            

 			


			<div class="col-md-4">
				<div class="panel panel-default">

				<div class="panel-heading">Incident Operation</div>

				<div class="inci_list">
					
						<ul>
						<li><button type = "button" class = "sbtnG"onclick="window.open('functions/new_incident.php', 'newwindow', 'width=500, height=500'); return false;"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"> New </button></li>
                        <br><li><button type="submit" name = "edit_button" class="sbtn"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"> Edit </button></li>						
						<br><li><button type="submit" onclick="return confirm('Delete Incident?');" name="delete_button" class="sbtnR"><img src="img/icons/bin.png" alt="Archive" style="width:30px;height:30px">Archive</button></li>
						
						<br><li><button type="submit" name = "report"class="sbtnY" title="Report"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px">Report</button></li>
					</ul>
				</div>
				</div>
			</div>
			
     
	</div>
	</div>
        
</form>


	
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br>Cyprus University of Technology Software Development Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Incident.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>