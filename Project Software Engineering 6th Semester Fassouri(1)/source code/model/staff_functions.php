<?php
		
		//Employee Search

		function employee()
		{
			include 'connect.php';
			try 
			{	
				$name = $_GET['name'];
				$surname = $_GET['surname'];
				$position = $_GET['position'];
				$town = $_GET['town'];
				if (isset($_GET['show_active']))
				{
					$active = 0;
				}
				else
				{
					$active = 1;
				}

				$employees = "	SELECT *
								FROM employee,employee_details 							
								WHERE employee_details.employee_employee_id = employee.employee_id
								AND active = $active
								AND employee.name LIKE '%{$name}%'
								AND employee.surname LIKE '%{$surname}%'
								AND employee.position LIKE '%{$position}%'
								AND employee_details.town LIKE '%{$town}%' ";
								
						
				$employees_result = $dbh->query($employees);				
				

				if ($employees_result->rowCount()>0)
				{	
						
					foreach ($employees_result as $employee)
					{
						$employee_id = $employee['employee_id'];
						$employee_name = $employee['name'];
						$employee_surname = $employee['surname'];
						$employee_position = $employee['position'];
						$employee_town = $employee['town'];
						echo '<option value ="'.$employee_id.'">'.$employee_name."&nbsp;&nbsp;".$employee_surname."&nbsp;&nbsp;".$employee_position."&nbsp;&nbsp;".$employee_town.'</option>';																	
					}
				}
				else
				{
					echo '<option>Nothing found!</option>';				
				}
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}	

		}//END

		




		//Print sections list
		function section()
		{

			include 'connect.php';
			$sections = "SELECT * FROM employee_section ORDER BY section_id";
			$sections_result= $dbh->query($sections);
			foreach($sections_result as $section)
			{
				$section_id = $section['section_id'];
				$section_name = $section['employee_section_name'];			
				echo '<option value="'.$section_id.'">'.$section_name.'</option>';				
			}
			

		}//END - OK


		

		//Print employees list - section constraints
		function employee_section()
		{
			include 'connect.php';
			
			
			if (isset($_GET['section_selection']))
			{		
				$section_id = $_GET['section_selection'];
			

				$section_employee = "	SELECT *
										FROM employee,employee_section
										WHERE employee.employee_section = '$section_id' AND employee_section.section_id = $section_id";
				$section_employee_result = $dbh->query($section_employee);

				foreach($section_employee_result as $row)
				{
					
					$employee_id = $row['employee_id'];
					$employee_name = $row['name'];
					$section_name = $row['employee_section_name'];
					$employee_surname = $row['surname'];


					echo '<option value="'.$employee_id.'">'.$employee_name.' '.$employee_surname.' '.$section_name.'</option>';
				}
			}
			else
			{
				echo '<script>alert("Select a Section from the list!")</script>';
			}
		}//END - OK


		
//Delete Section - Update Staff
if (isset($_GET['delete_section'], $_GET['section_selection']))
{
	include 'connect.php';
	$section_id = $_GET['section_selection'];
	if($section_id==0)
	{
		echo '<script>alert("Section Cannot be deleted!")</script>';
		echo "<script>window.location.href='../viewer/staff.php';</script>";
	}
	else
	{	
		$update = "UPDATE employee SET employee_section=0 WHERE employee_section='$section_id' ";
		$delete = "DELETE FROM employee_section WHERE section_id = '$section_id' ";
		$update_result = $dbh->exec($update);
		$delete_result = $dbh->exec($delete);
		if($update_result)
		{
			echo '<script>alert("Staff in this section is now unassigned!")</script>';
		}
		if ($delete_result)
		{
			echo '<script>alert("Section deleted successfully!")</script>';
			echo "<script>window.location.href='../viewer/staff.php';</script>";
		}
		
	}
}//END - OK




//------------------//------------------//------------------//------------------//------------------
//												ACCESS 										////////

//FUNCTION ACCESS - POPUP
if (isset($_GET['employee_list'],$_GET['access_button']))
{	
	session_start();
	include 'connect.php';	
   	$employee_id = $_GET['employee_list'];
   	$_SESSION['employee_id'] = $employee_id;
   	$_SESSION['password'] = substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) , 0 , 5);
   	echo '<script>window.open("http://localhost/dropbox/projects/fasuri/viewer/functions/staff_access.php", "newwindow", "width=500, height=500");</script>';
	echo "<script>window.location.href='../viewer/staff.php';</script>";
   	
}//END




//Edit Staff Section
if (isset($_GET['section_selection']))
{

           

	if(isset($_GET['edit_section']))
		{	
			session_start();
			include 'connect.php';	
		   	$section_id = $_GET['section_selection'];

		   	$_SESSION['section_id'] = $section_id;
		   	echo '<script>window.open("../viewer/functions/edit_staff_section.php", "newwindow", "width=500, height=300");</script>';
			echo "<script>window.location.href='../viewer/staff.php';</script>";
   	
		}
		

}

//END


//Edit Staff
if (isset($_GET['employee_list']))
{

	if(isset($_GET['edit_staff']))
		{	
			session_start();
			include 'connect.php';	
		   	$employee_id = $_GET['employee_list'];

		   	$_SESSION['employee_id'] = $employee_id;
		   	echo '<script>window.open("../viewer/functions/edit_staff.php", "newwindow", "width=500, height=500");</script>';
			echo "<script>window.location.href='../viewer/staff.php';</script>";
		   	
		}

}
		//END

if (isset($_GET['delete_button']))
{

	if(isset($_GET['employee_list']))
		{	
			
			include 'connect.php';

		   	$employee_id = $_GET['employee_list'];

		   	if($dbh->exec("UPDATE employee SET employee_section=0 WHERE employee_id='$employee_id'"))
		   	{



		   	echo '<script>alert("Selected employee is now Un-Assigned!")</script>';

		  
		  	echo "<script>window.location.href='../viewer/staff.php';</script>";
		   	}


		}


}



		
?>



