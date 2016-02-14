<?php
		//Print employees list - search constraints
		//Print employees list - search constraints
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
						echo '<option value ="'.$employee_id.'">'.$employee_name."&nbsp;&nbsp;".$employee_surname."&nbsp;&nbsp;".$employee_position."&nbsp;&nbsp;".'</option>';																	
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




//Edit Function
    //Open Popup
if (isset($_GET['edit_button'],$_GET['employee_list']))
{	


	if(count($_GET['employee_list'])==1)
    {
		session_start();
		include 'connect.php';	
	   	
	   	$_SESSION['employee_id'] = $_GET['employee_list'];
	   	echo '<script>window.open("../viewer/edit_employee_details.php", "_blank");</script>';
		echo "<script>window.location.href='../viewer/employees.php';</script>";
	}
	else
    {
        echo '<script>alert("Please select only ONE Employee!");</script>';
        echo "<script>window.location.href='../viewer/employees.php';</script>";
    }
   	
}//END
	

//Delete Function
if (isset($_GET['delete_button'],$_GET['employee_list']))
{
	if(count($_GET['employee_list'])==1)
    {
		include 'connect.php';
		foreach ($_GET['employee_list'] as $employee_id)
		{
			$delete_employee = "UPDATE employee
							SET active = 0
							WHERE employee_id = '$employee_id'	";
			$delete_result = $dbh->exec($delete_employee);
			if($delete_result)
			{
				echo '<script>alert("Employee Succesfully Archived")</script>';
				echo "<script>window.location.href='../viewer/employees.php';</script>";
			}
		}
	}
	else
    {
        echo '<script>alert("Please select only ONE Employee!");</script>';
        echo "<script>window.location.href='../viewer/employees.php';</script>";
    }

}//END




		//Report
		if(isset($_GET['report']))
        {
           
            if(isset($_GET['employee_list']))
            {
         		$i=0;
           		foreach ($_GET['employee_list'] as $selectedOption)
           		{           	
            		$employee_array[$i]=$selectedOption;
            		$i++;
       		 	}
        		session_start();
     			$_SESSION['employee_id']=$employee_array;	
              	echo '<script>  window.open("../reports/employee_report.php" , "_blank");</script>';
                echo "<script>window.location.href='../viewer/employees.php';</script>";   
			}
			else
			{
				echo "<script>window.location.href='../viewer/incident.php';</script>";
				echo '<script> alert("Please select an Incindent");</script>';	
         	}
		}//End




?>