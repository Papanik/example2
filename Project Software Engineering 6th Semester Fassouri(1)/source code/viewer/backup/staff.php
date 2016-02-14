<?php
    include '../model/connect.php';
    include '../model/staff_functions.php';
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
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.table-sort.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
		<script src="../controler/show_employee.js"></script>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/staff.css">
		
        <title>Fasouri Waterpark - Staff Management</title>
    </head>

    <body>

	<div class="container">
	<form method="get">
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
			<div class="formTitle">Staff Management</div>
		</div>
		
		<div class="row">									
			<div class="col-xs-6">
			Section
			
				<div class="sele_list">
				
				
				Select a Section From the List<br>
					<select name ="section_selection" style="width:50%;">
					<option selected disabled>Select Section</option>


						<?php 
						section();
						?>


					</select>
<input type = "submit" name="section_button" value="Update"  class="btnG">

</div>

			
				<div class="tool_menu">
					<ul>
						<li><button type="submit" onclick="window.open('functions/new_staff_section.php', 'newwindow', 'width=300, height=155')" class="sbtnG" title="Insert new Section"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>New</button></li>
						<li><button type ="submit" name = "edit_section" class="sbtn" title="Edit selected Section"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></a></li>
						<li><button type="submit" name="delete_section" onclick="return confirm('Delete Section?\nAll Staff in this section will be UN-ASSIGNED!!!')" class="sbtnR" title="Delete selected Section"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
						
						
					</ul>
				</div>
			</div>
			<div class="col-xs-6">
		
                <div class="col-xs-12">
                
                Search employee<br>
                <input placeholder = "Type name" type="text" name="name">
                <input placeholder = "Type surname" type="text" name="surname">                
                <input placeholder = "Type position" type="text" name="position">
                <input placeholder = "Type town" type="text" name="town">            
                <input type="submit" name="search_button" class="btnG"value="Search">
                
                </form>
                </div>
                
				<div class="sele_list">

				Select an amployee from the list below<br>
				(hold Ctrl to select multiple[for reports]):
				<br>Name 
<select id = "employee_select"style="width:90%" size="7" multiple name="employee_list" >
					
<option disabled selected >Hit Search to view Staff</option>
<?php	 					
					
					if(isset($_GET['section_button']))
					{
						employee_section();
					}
					
					if(isset($_GET['search_button']))
					{
						employee();
					}
					
					
?>

</select>



				</div>
				<div class="tool_menu">
					<ul>
					
						
						<li><button type = "submit" name = "edit_staff" class="sbtn" title="Edit selected Staff position"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></a></li>
						<li><button type="submit" name = "access_button"  class="sbtnY" title="Change access rights for selected staff position"><img src="img/icons/access.png" alt="Access" style="width:30px;height:30px"><br>Access</button></li>
						<li><button type = "submit" button name = "delete_button" class="sbtnR" title="Delete selected" onclick="delete();"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
						
						
					</ul>
				</div>
				</form>
			</div>
			
		</div>
		
		
		
		
	
		
	</form>
	
	</div>
        
	
        <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Developed by: TEPAK Software Technology Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="help.pdf" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>
</html>

<script >

$(document).ready(function(){

  var url = $('employee_select').val($(this).find(":selected").text());
  $('edit_button').click(function(){
  window.open('url', 'window name', 'window settings');
  return false;
});

</script>