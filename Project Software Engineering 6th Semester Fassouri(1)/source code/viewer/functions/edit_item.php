<?php 



include'../../model/connect.php';
   	session_start();
   	global $item_id;
	$item_id = $_SESSION['item_id'];
	

	$item = "SELECT * FROM items WHERE item_id = '$item_id'";
	$item_result = $dbh->query($item);
	foreach ($item_result as $data)
	{
		$item_name = $data['Name'];
		$available = $data['Available'];
		$loaned = $data['Loaned'];
		$maintenance = $data['Maintenance'];
		$broken = $data['Broken'];
		$name = $data['Name'];

	}


	try
  {
        if(isset ($_POST['save']))
        {
        	if( (!empty($_POST['maintenance'])) || (!empty($_POST['loaned'])) || (!empty($_POST['damaged'])) || (!empty($_POST['available'])) || (!empty($_POST['itemname'])))        
        	{
	            include '../../model/connect.php';
	           
				$available=$_POST['available'];
				$loaned = $_POST['loaned'];
				$maintenance = $_POST['maintenance'];
				$broken = $_POST['damaged'];
				$item_name = $_POST['itemname'];
				if($loaned + $maintenance + $broken > $available) 
				{
					echo '<script>alert("Sum of Maintenance plus Loaned plus Broken must not be greater than Available Items")</script>';
				}
				elseif ($loaned<0 || $maintenance<0 || $broken<0)
				{
					echo '<script>alert(" No negative values allow")</script>';
				}
				else
				{	
					$available = $available - $loaned - $maintenance - $broken;
		            $item = " UPDATE  items SET Name='$item_name', Loaned = '$loaned',Maintenance = '$maintenance',Broken = '$broken',Available = '$available'  WHERE item_id = '$item_id' ";
		            $item_result =$dbh ->exec($item);          
		            if($item_result)
		            {
		            
		                 echo '<script>alert("Item succesfull Update")</script>';
		                  echo '<script> window.opener.location.reload();</script>';
		                 echo '<script>self.close()</script>';

		            }
		            /*else
		            {
		            	echo '<script>alert("Error")</script>';
		            }*/		        
		        }

	        }
	        else
            {
            	echo '<script>alert("Please fill all fields")</script>';
            }
	    }
	}
    catch(Exception $e)
    {
        echo $e->getMessage();
    } 



?>

<!DOCTYPE html>




<html>
    
    <head>
		<script src="../js/jquery-1.11.1.js" type="text/javascript"></script>
		<script src="../js/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/function.css">
		
		<script src="../js/function.js"></script>
        <title>Edit Item</title>
		
		
    </head>
    <body>

	<div class="container">
		
		
		<div class="board" align="right">
			Edit Item: <span style ="color:blue;"><?php echo $item_name; ?></span><br><br>
		<form method="post">
		Name:<input type="text" value="<?php echo $name; ?>" name = "itemname"><br><br>
			<label for="item_ok"></label>Available: <input id="item_qty" name="available" type="number"  value="<?php echo $available; ?>"/><br><br>
			<label for="item_maint"></label>Maintenance: <input id="item_maint" name="maintenance"  type="number" value="<?php echo $maintenance; ?>"/><br><br>
			<label for="item_loan"></label>Loaned: <input id="item_loan" type="number" name="loaned" value="<?php echo $loaned; ?>"/><br><br>
			<label for="item_dmg"></label>Damaged: <input id="item_dmg" type="number" name="damaged" value="<?php echo $broken; ?>"/><br><br>
			<br><br>
			<button type="submit" name="save" onclick="return confirm('Change these items?')" class="btnG">Save</button>
			<input type="button" class="btnR" value="Cancel" onclick="self.close()">
			</form>
		</div>
		

		
	
		
	
	
	</div>
        
	
      
        
    
    </body>