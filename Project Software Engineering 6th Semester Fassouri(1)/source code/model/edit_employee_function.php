<?php

include 'connect.php';


foreach($_SESSION['employee_id'] as $employee_id )
{
	try
	{
		if(isset($_POST['new_employee']))
		{
	    if(isset($_POST['name'],$_POST['surname'],$_POST['position'],$_POST['address'],$_POST['town'],$_POST['birth_date'],$_POST['birth_place'],
		$_POST['sin'],$_POST['telephone'],$_POST['idnum'],$_POST['r_surname'],$_POST['r_name'],$_POST['work_telephone'],$_POST['home_telephone'],
		$_POST['mobile_telephone'],$_POST['health'],$_POST['grLan'],$_POST['enLan'],$_POST['frLan'],$_POST['ruLan']))
	    {
			/*Basic Information*/
	        $name =  $dbh->quote($_POST['name']);
	        $surname = $dbh->quote($_POST['surname']);
	        $position = $dbh->quote($_POST['position']);
	        $active = $dbh->quote ($_POST['active_list']);
			include '../ajaximageupload/ajaximageupdate.php';

			//photo1($employee_id);

           






			
			$basic_details =" 	UPDATE employee 
								SET name=$name, surname=$surname, position=$position, active=$active
								WHERE employee_id = '$employee_id' ";
			
			
			
			/*General Information*/
	        $address = $dbh->quote($_POST['address']);
	        $town = $dbh->quote($_POST['town']);
	        $birth_date = $dbh->quote($_POST['birth_date']);
	        $sin = $dbh->quote($_POST['sin']);
			$telephone =  $dbh->quote($_POST['telephone']);
	        $birth_place = $dbh->quote($_POST['birth_place']);
	        $idnum = $dbh->quote($_POST['idnum']);
			$hire_date = $dbh->quote(date("Y/m/d"));
			$num_of_hires = -1;
			/*if(isset($_POST['active_list']))
			{
				if($_POST['active_list'] == 0)
				{
					
				}
			

			}*/
			
			

			
				

				$general_details = "UPDATE employee_details
								SET address=$address, town=$town, telephone=$telephone, date_of_birth=$birth_date, place_of_birth=$birth_place, SIN=$sin, 
								id_card=$idnum, hire_date=$hire_date, num_of_hires=$num_of_hires+1
								WHERE employee_employee_id = '$employee_id' ";
			

			
			/*Contact Person*/
	        $r_surname = $dbh->quote($_POST['r_surname']);
	        $r_name = $dbh->quote($_POST['r_name']);
	        $work_telephone = $dbh->quote($_POST['work_telephone']);
	        $home_telephone = $dbh->quote($_POST['home_telephone']);
	        $mobile_telephone =  $dbh->quote($_POST['mobile_telephone']);

			
			$contact_details = "UPDATE employee_relative
								SET R_surname=$r_surname, R_name=r_name, R_home_tel=$home_telephone, R_work_tel=$work_telephone, R_mobile_tel=$mobile_telephone
								WHERE employee_employee_id = '$employee_id' ";
			photo1($employee_id);
			
			
			/*Health*/
			if(isset($_POST['health']))
			{
				$health = $dbh->quote($_POST['health']);
			}
			else
			{
	        	$health = $dbh->quote('0');
	    	}	
			
	        if(isset($_POST['skin']))
			{
				$skin = $dbh->quote($_POST['skin']);
			}

			else
			{
				$skin = $dbh->quote('0');
			}

			
			if(isset($_POST['diabetes']))
			{
				$diabetes = $dbh->quote($_POST['diabetes']);
			}
			else
			{
				$diabetes = $dbh->quote('0');
			}

			
			if(isset($_POST['breath']))
			{
				$breath = $dbh->quote($_POST['breath']);
			}
			else
			{
				$breath = $dbh->quote('0');
			}

			
			if(isset($_POST['epilipsey']))
			{
				$epilipsey = $dbh->quote($_POST['epilipsey']);
			}

			else
			{
				$epilipsey = $dbh->quote('0');
			}
			
			
			
			$health_details = "	UPDATE employee_health
								SET disabilities=$health,skin=$skin,diabetes=$diabetes,breathing=$breath,epilipsey=$epilipsey
								WHERE employee_employee_id = '$employee_id' ";
			
			
			/*Skills*/
			
			if(isset($_POST['langOther1']))
			{
				$langOther1 = $dbh->quote($_POST['langOther1']);
			}
			else
			{
				$langOther1 = $dbh->quote($_POST['0']);	
			}

			
			if(isset($_POST['langOther2']))
			{
				$langOther2 =  $dbh->quote($_POST['langOther2']);
			}
			else
			{
				$langOther2 =  $dbh->quote('0');
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
				$o2Lan = $dbh->quote('0');
			}

			
			if(isset($_POST['diploma']))
			{
				$diploma = $dbh->quote($_POST['diploma']);
			}

			else
			{
				$diploma = $dbh->quote('');
			}
			
			$skills_details = "	UPDATE employee_skills
								SET greek=$grLan, english=$enLan, french=$frLan, russian=$ruLan, 
								other_1_stat=$o1Lan, other_2_stat=$o2Lan, other_1_name=$langOther1, other_2_name=$langOther2, diplomas=$diploma
								WHERE employee_employee_id = '$employee_id' ";
		
			try
			{

				$basic_details_result = $dbh ->exec($basic_details);
				$general_details_result = $dbh->exec($general_details);		
				$contact_details_result = $dbh->exec($contact_details);			
				$health_details_result = $dbh->exec($health_details);		
				$skills_details_result = $dbh->exec($skills_details);

				//Show message	
				echo "<script>
				alert('Employee Successfully Updated!');
				self.close();

				</script>";
			}
			catch(Exception $e)
			{
				echo "<script>alert('Employee Successfully Updated!');</script>";
				echo $e->getMessage();
			}
			

				
		
			
		}
		
		else
		{
			echo "	<script>
					alert('Please Fill all fields');
					
					</script>";
		}
		}	



	}
	catch(Exception $e)
	{
	    echo $e->getMessage();
	}
}
?>
