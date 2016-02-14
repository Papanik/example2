<?php 	
		
		include '../model/employee_functions.php';
		include('../model/connect.php');

		session_start();
if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
}
else
{
	header("Location:login_form.php");
}
 ?>
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>
    <head>
		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/employees.css">
		
        <title>Fasouri Waterpark - Employees</title>


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
document.getElementById("employee_list").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';

      }
    }
	var url="../ajax-search-basic/ajax-search-demock.php";
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
	<div class="container">
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">
				<div class="nav" align="right">
				<ul>
						<li><a href="menu.php"><button type="button" class="btn" title="Return to Main Menu"><img src="img/icons/home.png" alt="Home" style="width:20px;height:20px">Menu</button></a></li>
						<li><a href="../model/logout.php"><button type="button" class="btnR">Log Out</button></a></li>
				</ul>
				
				
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="formTitle">Employees</div>
		</div>
		
		<div class="row">
		<form method = "get">
			<div class="col-xs-8">

				<div class="panel panel-default">
				<div class="panel-heading" align="center">Search for Employee:</div>
                <br>

                <input placeholder = "Type name" type="text" name="name">
                <input placeholder = "Type surname" type="text" name="surname">
                <input class="sbtn" type="submit" name="search_button" value="Search">
                 <button onclick='window.open("staff.php", "_blank");' id="shortcutbutton"  class="btn"  title="Shortcut to Staff">...</button>
                   
                <br>
                <input placeholder = "Type position" type="text" name="position">
                <input placeholder = "Type town" type="text" name="town">
                <input type="checkbox" name="show_active"> Show Inactive Employees&emsp;
                <br><br>
                
                </form>
               				<!--searhc -->
               	<form method="get">
							<input  type="text"onkeyup="ajaxFunction(this.value);" name="username" placeholder="Search" size="19" /> 
							<img id="img" src="img/search.png" size="20px" width="20px" height="20px" >
							<br><br>
				

				
				<div class="panel-heading" align="center">Employees List
                <br>

                <select required size="10" style="width:100%; padding-bottom:5px;" multiple id="employee_list" name = "employee_list[]">
                <option selected disabled>Click Search to view Employees</option>
                <?php
					if(isset($_GET['search_button']))
					{
						employee();
						
					}
					
				?>
                </select>
                </div>
				
			</div>
		</div>

			<div class="col-xs-4">
			
				<div class="panel panel-default">
				<div class="panel-heading" align="center">Tools</div>
				<div class="tool_menu">
					<ul>
						<li><a href="application.php" target="_blank" ><button type="button" class="sbtnG" title="Register new employee"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>New</button></a></li>
						<li><button type="submit" name = "edit_button" class="sbtn"  title="Edit selected employee"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
						<li><button type="submit" name="delete_button" class="sbtnR" title="Archive selected"  onclick="return confirm('Archive Selected employee?');"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Archive</button></li>
						<li><button type ="submit" name="report" class="sbtnY" title="Print a report on Employees"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px"><br>Report</button></li>
					</ul>
				</div>
			</div>
		</div>	
			</form>
			
		</div>
		
		
		
		
	
		
	
	
	</div>
        
	
        <<div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Employees.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>
	<html>


	
