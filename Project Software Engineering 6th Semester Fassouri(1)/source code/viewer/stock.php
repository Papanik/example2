<?php
	
        include'../model/stock_functions.php';
        include '../model/connect.php';



?> 

<!DOCTYPE html>
<link rel="stylesheet" href="viewer/css/style.css">
<html>
    
    <head>

<!--SECTION AJAX-->
<script type="text/javascript" src="js/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".section").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+id;
		$.ajax
		({
			type: "POST",
			url: "../model/ajax/ajax_item.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".item").html(html);

			} 
		});

	});	

});
</script>






<!--SECTION AJAX-->



		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<script src="js/pop_up.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/menu.css">
		
        <title>Fasouri Waterpark - Stock Control</title>
    </head>
    <body>

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
			<div class="formTitle">Stock Control</div>
		</div>
		
		<div class="row">									
			<div class="col-xs-6">
			<form method="get">
			<div class="panel panel-default">
				<div class="panel-heading">Section</div>

				<div class="sele_list">
					
					
						<select required name="section" class="section" size="10" style="width:100%;">
	                        <?php
								
								$sql=$dbh->query("select * from item_section ");
									echo '<option >-- Section--</option>';
								foreach ($sql as $row) 
								{
									
								$id=$row['section_id'];
								$data=$row['name'];

								echo '<option value="'.$id.'">'.$data.'</option>';
								} 

								?>
	                    </select>		
				</div>

				
				
				<div class="panel-heading"></div>
					<div class="tool_menu">
						<ul>
							<li><button type="button" class="sbtnG"><img src="img/icons/new.png" alt="New" onclick="window.open('functions/new_item_section.php', 'newwindow', 'width=500, height=500')" style="width:30px;height:30px"><br>Insert</button></li>
							<li><button type="submit" name="edit_section" class="sbtn"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
							<li><button type="submit" name="delete_section" onclick="return confirm('Delete Section?\nIt will REMOVE ALL ITEMS in this section also!!!')" class="sbtnR"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
							<button type="submit" name = "report"class="sbtnY" title="View Report"><img src="img/icons/chart.png" alt="New" style="width:30px;height:30px"><br>Report</button>
							
						</ul>
					</div>
				
				</form>
			</div>
			</div>


			<form method="get">

			<div align="left" class="col-xs-6">
			
			<div class="panel panel-default">
                
                  <div class="panel-heading">Items</div>
			<!--<input type="text" placeholder="Enter keyword" name="keyword" >
			<button type="submit" class ="btnG"name="search_button" style="height:25px;" >Search</button>-->


				<div class="sele_list">
					<select required id="item" name="item" class="item" style="width:100%" size="10" ;>
								<option  selected disabled>-- Items--</option>                        	 

	                 </select>
				</div>

				
			
				 <div class="panel-heading"></div>
					<div class="tool_menu">
						<ul>
							<li><a href="functions/new_item.php"  onclick="window.open('functions/new_item.php', 'newwindow', 'width=500, height=500'); return false;"><button type="button" class="sbtnG"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>Insert</button></a></li>
							<li><button type="submit" name = "edit_item" class="sbtn"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></a></li>
							<li><button type="submit" name = "delete_item" class="sbtnR" onclick="return confirm('Delete Item?')" ><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
							
						</ul>
					</div>
				</div>

	
			</div>
			
		</div>
		
		
		
		
	
		
	
	</div>
	</div>
        
	
        <<div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
				<div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015. 
				<a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/StockControl.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
        
    
    </body>
    </form>