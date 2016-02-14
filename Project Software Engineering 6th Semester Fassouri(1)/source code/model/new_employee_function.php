<?php

include 'connect.php';
include '../ajaximageupload/ajaximage.php';
if(isset($_POST['save']) || isset($_POST['access']) || isset($_POST['staff']) )
{
	try
	{
	
    if(isset($_POST['name'],$_POST['surname'],$_POST['position'],$_POST['address'],$_POST['town'],$_POST['birth_date'],$_POST['birth_place'],
	$_POST['sin'],$_POST['telephone'],$_POST['idnum'],$_POST['r_surname'],$_POST['r_name'],$_POST['work_telephone'],$_POST['home_telephone'],
	$_POST['mobile_telephone'],$_POST['health'],$_POST['grLan'],$_POST['enLan'],$_POST['frLan'],$_POST['ruLan']))
    {
		
		/*Basic Information*/
        $name =  $dbh->quote($_POST['name']);
        $surname = $dbh->quote($_POST['surname']);
        $position = $dbh->quote($_POST['position']);
		
		//echo "Basic - reding - OK";echo "<br>";
		
		$basic_details = "INSERT INTO  employee (name,surname,position) VALUES ($name,$surname,$position)";
		$basic_result = $dbh->exec($basic_details);
		
		//echo "Basic - query - exec - OK";echo "<br>";
		
		/*get last employee_id inserted*/
		$stmt = $dbh->query("SELECT LAST_INSERT_ID()");
		$lastId = $stmt->fetch(PDO::FETCH_NUM);
		$lastInsertId = $lastId[0];
		//echo $lastInsertId;
		//echo "<br>";
		 photo($lastInsertId);
		
//PHOTO

			
		/*$query ="UPDATE employee_details SET photo='".$_FILES['fileupload']['name']."' WHERE  employee_employee_id='$lastInsertId'";
		$result = $dbh->exec($query);				
		move_uploaded_file($_FILES['fileupload']['tmp_name'],"../viewer/uploads/".$_FILES['fileupload']['name']);*/

		echo $_FILES['fileupload']['name'];
//PHOTO END


		/*General Information*/
        $address = $dbh->quote($_POST['address']);
        $town = $dbh->quote($_POST['town']);
        $birth_date = $dbh->quote($_POST['birth_date']);
        $sin = $dbh->quote($_POST['sin']);
		$telephone =  $dbh->quote($_POST['telephone']);
        $birth_place = $dbh->quote($_POST['birth_place']);
        $idnum = $dbh->quote($_POST['idnum']); 
		$hire_date = date("Y-m-d");
		//echo "General - reding - OK";echo "<br>";
		
		//$general_details = "INSERT  INTO employee_details (employee_employee_id,address,town,telephone,date_of_birth,place_of_birth,SIN,id_card,hire_date)
		//VALUES ('$lastInsertId',$address,$town,$telephone,$birth_date,$birth_place,$sin,$idnum,'$hire_date')";
		$general_details = "UPDATE employee_details SET employee_employee_id=$lastInsertId,address=$address,town=$town,telephone=$telephone,
		date_of_birth=$birth_date,place_of_birth=$birth_place,SIN=$sin,
		id_card=$idnum,hire_date=$hire_date WHERE employee_employee_id='$lastInsertId'";
		//Photo - START
		
		

		
		//Photo - END
		$hires = "UPDATE employee_details SET num_of_hires = num_of_hires + 1 WHERE employee_employee_id = '$lastInsertId' "; //To know how many times hired
		
		/*Must check if employee already exists*/

		//echo "General - query - OK";
		echo "<br>";
		
		/*Contact Person*/
        $r_surname = $dbh->quote($_POST['r_surname']);
        $r_name = $dbh->quote($_POST['r_name']);
        $work_telephone = $dbh->quote($_POST['work_telephone']);
        $home_telephone = $dbh->quote($_POST['home_telephone']);
        $mobile_telephone =  $dbh->quote($_POST['mobile_telephone']);
		//echo "Contact - reding - OK";echo "<br>";
		
		$contact_details = "INSERT  INTO employee_relative (employee_employee_id,R_surname, R_name, R_home_tel, R_work_tel, R_mobile_tel)
		VALUES ('$lastInsertId',$r_surname,$r_name,$home_telephone,$work_telephone,$mobile_telephone)";
		
		//echo "Contact - query - OK";echo "<br>";
		
		/*Health*/
        $health = $dbh->quote($_POST['health']);
		
        if(isset($_POST['skin']))
		{
			$skin = $dbh->quote('1');
		}
		else
		{
			$skin = $dbh->quote('');
		}
		
		if(isset($_POST['diabetes']))
		{
			$diabetes = $dbh->quote('1');
		}
		else
		{
			$diabetes = $dbh->quote('');
		}

		
		if(isset($_POST['breath']))
		{
			$breath = $dbh->quote('1');
		}
		else
		{
			$breath = $dbh->quote('');
		}

		
		if(isset($_POST['epilipsey']))
		{
			$epilipsey = $dbh->quote('1');
		}
		else
		{
			$epilipsey = $dbh->quote('');
		}
		
		//echo "Health - reding - OK";echo "<br>";
		
		$health_details = "INSERT  INTO employee_health (disabilities,skin,diabetes,breathing,epilipsey, employee_employee_id)
		VALUES ($health,$skin,$diabetes,$breath,$epilipsey,'$lastInsertId')";
		
		//echo "Health - query - OK";echo "<br>";
		
		/*Skills*/
		
		if(isset($_POST['langOther1']))
		{
			$langOther1 = $dbh->quote($_POST['langOther1']);
		}
		else
		{
			$langOther1 = $dbh->quote($_POST['langOther1']);
		}

		
		if(isset($_POST['langOther2']))
		{
			$langOther2 =  $dbh->quote($_POST['langOther2']);
		}
		else
		{
			$langOther2 =  $dbh->quote($_POST['langOther2']);
		}

        $grLan = $dbh->quote($_POST['grLan']);
        $enLan = $dbh->quote($_POST['enLan']);
        $frLan = $dbh->quote($_POST['frLan']);
        $ruLan = $dbh->quote($_POST['ruLan']);

		
		if(isset($_POST['o1Lan']))
		{
			$o1Lan = $dbh->quote($_POST['o1Lan']);
		}
		else
		{
			$o1Lan = $dbh->quote('');
		}
		


		if(isset($_POST['o2Lan']))
		{
			$o2Lan = $dbh->quote($_POST['o2Lan']);
		}
		else
		{
			$o2Lan = $dbh->quote('');
		}

		$diploma = $dbh->quote($_POST['diploma']);
		if(isset($_POST['diploma']))
		{
			$diploma = $dbh->quote($_POST['diploma']);
		}
		
		//echo "Skills - reding - OK";echo "<br>";
		
		$skills_details = "INSERT INTO employee_skills (greek,english,french,russian,other_1_stat,other_2_stat,other_1_name,other_2_name,diplomas,employee_employee_id) VALUES ($grLan,$enLan,$frLan,$ruLan,$o1Lan,$o2Lan,$langOther1,$langOther2,$diploma,'$lastInsertId')";
		
		//echo "Skills - query - OK";echo "<br>";
		
		/*MySql Query*/
		
		
		
		$genera_details_result = $dbh->exec($general_details);
		//echo "General - execute - OK";echo "<br>";
		$contact_details_result = $dbh->exec($contact_details);
		//echo "Contact - execute - OK";echo "<br>";
		$health_details_result = $dbh->exec($health_details);
		//echo "Health - execute - OK";echo "<br>";
		$skills_details_result = $dbh->exec($skills_details);
		//echo "Skills - execute - OK";echo "<br>";
		
		if($skills_details_result && $health_details_result && $genera_details_result && $contact_details_result)
		{
			echo "<script>
			alert('Employee Successfully added!');</script>";
			if(isset($_POST['save']))
			{
				echo "<script>window.location.href='../viewer/application.php';</script>";
			}
			if(isset($_POST['access']))
			{
				session_start();
				$_SESSION['employee_id'] = $lastInsertId;
				echo '<script>window.open("../viewer/functions/staff_access.php", "newwindow", "width=300, height=155");</script>';
				echo "<script>window.location.href='../viewer/application.php';</script>";

			}
			if(isset($_POST['staff']))	
			{
				echo "<script>window.location.href='../viewer/staff.php';</script>";
			}
		}
		else
		{
			echo "wrong!";
		}
	}
	else
	{
		echo "	<script>
				alert('Please Fill all fields');
				window.location.href='../viewer/application.php';
				</script>";
	}
}
catch(Exception $e)
{
    echo $e->getMessage();
}
}
?>
