<?php

//SEARCH
	   if (isset($_GET['search']))
	   {
		   search();
	   }
		function search()
		{
			include 'connect.php';	
			if((isset($_GET['keyword'])) && (!empty($_GET['keyword'])))
			{
				try
				{
					$keyword = $_GET['keyword'];
					$search = "SELECT * FROM employee_details WHERE name LIKE '%{$keyword}' AND surname LIKE '${keyword}' ";
						if($stmt1 = $dbh->query($service))
						{
							foreach ($stmt1 as $row)
							{
					
								$userid = $row['employee_id'];
					
								$user = "SELECT * FROM user WHERE userID = $userid ";
								$stmt2 = $dbh->query($user);
								foreach ($stmt2 as $users)
								{
									$user_name = $users['name'];
									$user_surname = $users['surname'];
									echo "Name : ".$user_name;
                                    echo "<br>";
									echo "Surname : ".$user_surname;
									echo "<br>";
								}
					
							}
						}
                        else
                        {
                            echo '<script>alert("Nothing Found!");</script>';
                        }
					}
					catch(Exception $e)
					{
						echo $e->getMessage();
					}					
					
				}					
				
			
			}
		
	   
		?>