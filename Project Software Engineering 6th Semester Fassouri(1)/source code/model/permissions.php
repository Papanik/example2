<?php

	
	$user_id = $_SESSION['user_id'];
	include 'connect.php';

	//Read user's access
	$permissions = "SELECT * FROM access_level WHERE user_id = '$user_id'";
	//Execute
	$permissions_result = $dbh->query($permissions);

	foreach($permissions_result as $row)
	{	
		$stock = $row['stock_control'];
		$staff = $row['staff_management'];
		$employees = $row['employee'];
		$technical = $row['technical'];
		$incidents = $row['incidents'];	
		$settings = $row['settings'];
	}

	//Check for each section
		
	if(isset($_POST['stock'])) //Stock
	{
		if($stock == 1)
		{
			header("Location: ../viewer/stock.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";
		}
	}
	
	else 
	if(isset($_POST['staff'])) //Staff
	{
		if($staff == 1)
		{
			header("Location: ../viewer/staff.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";

		}
	}
	
		
	else
	if(isset($_POST['employee'])) //Employees
	{
		if($employees == 1)
		{
			header("Location: ../viewer/employees.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";
		}
	}
	
	
	else
	if(isset($_POST['technical'])) //Technical
	{
		if($technical == 1)
		{
			header("Location: ../viewer/technical.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";
		}
	}
	
	else
	if(isset($_POST['incident'])) //Incidents
	{
		if($incidents == 1)
		{
			header("Location: ../viewer/incident.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";
		}
	}
	else	
	if(isset($_POST['settings'])) //Settings
	{
		if($settings == 1)
		{
			header("Location: ../viewer/settings.php");
		}
		else
		{
			echo '<script>alert("Access Denied")</script>';
			echo "<script>window.location.href='../viewer/menu.php';</script>";
		}
	}	
?>