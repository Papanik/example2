<?php
function pool_chemicals()
{
	if (((!empty($_GET['poolPh'])) || (!empty($_GET['poolCh'])) || (!empty($_GET['poolAc']))) && (!empty($_GET['time'])) && (!empty($_GET['date']))   )
	{	
      

		include '../model/connect.php';
		$pools_id = $_GET['pools'];
		$ph = $_GET['poolPh'];
		$acid = $_GET['poolCh'];
		$chlorine = $_GET['poolAc'];
		$time =$_GET['time'];
		$date = $_GET['date'];
		
		$day = substr($date,3,6);
 		$month = substr($date,0,2);
		$year = substr($date,-4);
		
		$pool_chemicals = "INSERT INTO pools_chemicals_backup (poolspool_id,acid,chlorine,ph,day,month,year,time) VALUES ('$pools_id','$acid','$chlorine','$ph','$day','$month','$year','$time')";
		$pools_chemicals_result = $dbh->exec($pool_chemicals);
		if($pools_chemicals_result)
		{
			echo "<script>alert('Pool Chemicals updated Successfully!');window.location.href='../viewer/pools.php';</script>";
		}
		
	}
	else
	{
		echo "<script>alert('Please Fill all fields!');window.location.href='../viewer/pools.php';</script>";
	}
	

}
?>