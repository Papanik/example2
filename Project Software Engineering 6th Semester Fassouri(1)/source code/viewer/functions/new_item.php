<?php
	include '../../model/stock_functions.php'
?>

<!DOCTYPE html>
<html>
    
    <head>
		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="../js/script.js"></script>
		<script src="../js/stock.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/function.css">
		
		<script src="../js/function.js"></script>
        <title>New Item</title>
    </head>
    <body>

	<div class="container">
		<form method="post">
		
		<div class="board" align="right">
		<div class="panel panel-default">
		<div class="panel-heading">Insert New Item</div>
		
		Section
						<select required name="section" class="section" size="1" style="width:200px;">
						<option value=""> Selectet Section </option>
                        <?php
                       include '../../model/connect.php';
							
							$sql=$dbh->query("select * from item_section ");
								echo '<option >-- Please Select Section--</option>';
							foreach ($sql as $row) 
							{
								
							$id=$row['section_id'];
							$data=$row['name'];

							echo '<option value="'.$id.'">'.$data.'</option>';
							} 

							?>
                    </select>
		<br>
		<br>
			
			
			Name: <input required type="text" name="itemname">
			<br><br>
			
				Quantity:
			<input id="item_qty" type="number" name="quantity" class='numeric' value="0"/>
			<br><br>
			</div>
			<button type="submit" name="Insert" class="btnG" onclick="return confirm('Insert new Item?')">Insert</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
					</div>
		

		
	</form>
		
	
	
	</div>
        
	
      
        
    
    </body>
    </html>


