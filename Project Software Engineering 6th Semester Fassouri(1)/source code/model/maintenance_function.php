<?php

include 'connect.php';


//pool check description
try{

	

	if (isset($_POST['Pool_Checked'])) 
	{
		if(isset($_POST['pools'])) 
		{
			$id=$dbh->quote($_POST['pools']);
			
			if(isset($_POST['text1']))

		    {
		    	
			$text=$dbh->quote($_POST['text1']);

		    }
		    else
		    {

		    	$text=' ';
						 
		    }

		         	
					   $type=1;
					   $date=date("Y-m-d H:i:s");
					   $year=date("Y");

					$pool_description = "INSERT INTO  pool_description(id,description,type,date_id,year) VALUES ($id,$text,'$type','$date','$year')";

			       // $description = "UPDATE pool_description SET description = '$description_pool' AND type = '1' WHERE id = '$id_pool' ";	
					
					$description_result = $dbh->exec($pool_description);

				    echo "<script>

			                 alert('Succesful!');
			                 window.location.href='../viewer/maintenance.php';
			          
			             </script>";
		         

    }


	    else
            {
				echo "<script>
                            alert('Please Select Pool and Section!');
                             window.location.href='../viewer/maintenance.php';
          
                 </script>";
           

            } 
        }

}

catch(Exception $e)
{
    echo $e->getMessage();
}//END




//Game Check
try{

        if (isset($_POST['Game_Checked'])) 
	    {
		if(isset($_POST['games'])) 
		{
			$id=$dbh->quote($_POST['games']);
			
			if(isset($_POST['text2']))

		    {
		    	
			$text=$dbh->quote($_POST['text2']);

		    }
		    else
		    {

		    	$text=' ';
						 
		    }

		         	
					   $type=2;
					   $date=date("Y-m-d H:i:s");
					    $year=date("Y");

					$pool_description = "INSERT INTO  pool_description(id,description,type,date_id,year) VALUES ($id,$text,'$type','$date','$year')";

			       // $description = "UPDATE pool_description SET description = '$description_pool' AND type = '1' WHERE id = '$id_pool' ";	
					
					$description_result = $dbh->exec($pool_description);

				    echo "<script>

			                 alert('Succesful!');
			                 window.location.href='../viewer/maintenance.php';
			          
			             </script>";
		         

    }


	    else
            {
				echo "<script>
                            alert('Please Select Pool and Section!');
                             window.location.href='../viewer/maintenance.php';
          
                 </script>";
           

            } 
        }
 
 
}

catch(Exception $e)
{
    echo $e->getMessage();
}//END




//Generator Check
try{

        if (isset($_POST['Generator_Checked'])) 
	    {
		if(isset($_POST['generator'])) 
		{
			$id=$dbh->quote($_POST['generator']);
			
			if(isset($_POST['text3']))

		    {
		    	
			$text=$dbh->quote($_POST['text3']);

		    }
		    else
		    {

		    	$text=' ';
						 
		    }

		         	
					   $type=3;
					   $date=date("Y-m-d H:i:s");
					   $year=date("Y");

					$pool_description = "INSERT INTO  pool_description(id,description,type,date_id,year) VALUES ($id,$text,'$type','$date','$year')";

			       // $description = "UPDATE pool_description SET description = '$description_pool' AND type = '1' WHERE id = '$id_pool' ";	
					
					$description_result = $dbh->exec($pool_description);

				    echo "<script>

			                 alert('Succesful!');
			                 window.location.href='../viewer/maintenance.php';
			          
			             </script>";
		         

    }


	    else
            {
				echo "<script>
                            alert('Please Select Pool and Section!');
                             window.location.href='../viewer/maintenance.php';
          
                 </script>";
           

            } 
        }
 
 
}


catch(Exception $e)
{
    echo $e->getMessage();
}//END




//GENERATORS

//Edit POPUP


 if(isset($_POST['edit_generator']))
        {
            if(isset($_POST['generator']))    
            {
                session_start();
                include 'connect.php';
                $id = $_POST['generator'];
                $_SESSION['generator'] = $id;
                echo '<script>window.open("../viewer/functions/edit_gen.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
            }
            else
            {
                echo '<script>alert("Please Select Generator");</script>';
                 echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
            }
        }//END

//Delete
      	if(isset($_POST['delete_generator']))
		{
		    if(isset($_POST['generator']))    
            {
            	include 'connect.php';
            	$id = $_POST['generator'];
                $query= "DELETE FROM generator WHERE generator_id = '$id' ";
                $query_result = $dbh->exec($query);
                if($query_result)
                {
                	echo '<script>alert("Generator Succesfully Deleted");</script>';
					echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
                }                
            }
            else
            {
                echo '<script>alert("Please Select Generator");</script>';
            }
        }//END
    
        
        //JOBS
        //Edit Job
         if(isset($_POST['edit_job']))
        {
            if(isset($_POST['tasks']))    
            {
                session_start();
                include 'connect.php';
                $id = $_POST['tasks'];
                $_SESSION['task'] = $id;
                echo '<script>window.open("../viewer/functions/edit_list.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
            }
            else
            {
                echo '<script>alert("Please Select Task");</script>';
                echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
            }
        }//END

        //Delete Job
      	if(isset($_POST['delete_job']))
		{
		    if(isset($_POST['tasks']))    
            {
            	include 'connect.php';
            	$id = $_POST['tasks'];
                $query= "DELETE FROM jobs WHERE job_id = '$id' ";
                $query_result = $dbh->exec($query);
                if($query_result)
                {
                	echo '<script>alert("Job Succesfully Deleted");</script>';
					echo "<script>window.location.href='../viewer/maintenance.php';</script>"; 
                }                
            }
            else
            {
                echo '<script>alert("Please Select Task");</script>';
            }
        }


		
		
		
		



    //Insert new date_maintenace ppol
      try
        {
            if(isset ($_GET['submit'],$_GET['pools'], $_GET['date']))
            {

                include 'connect.php';

                $id_pool =  $dbh->quote($_GET['pools']);
                
                //echo '<br>';
                //$id_pool1=$dbh->quote($id_pool);
                $id_pool=preg_replace('/[^A-Za-z0-9\-]/', '', $id_pool); 
				


                $date =  $dbh->quote($_GET['date']);

                $date=preg_replace('/[^A-Za-z0-9\-]/', '', $date); 

                
               
                $pools = " UPDATE  pools SET date_maintenanced='$date', checked=1 WHERE pools_id='$id_pool' ";
                
                $result_pool_maintenance =$dbh ->exec($pools);  
             


                if($result_pool_maintenance)
                {
                     echo '<script> alert("Maintenance date succesfull Submited");</script>';
                     echo '<script> window.opener.location.reload();</script>';
                     echo '<script>self.close();</script>';
                }
            }
           
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }//END
		
		



		//Insert new date_maintenace games
      try
        {
            if(isset ($_GET['submit'],$_GET['pools'], $_GET['date']))
            {

                include 'connect.php';

                $id_pool =  $dbh->quote($_GET['pools']);
                
                //echo '<br>';
                //$id_pool1=$dbh->quote($id_pool);
                $id_pool=preg_replace('/[^A-Za-z0-9\-]/', '', $id_pool); 
				


                $date =  $dbh->quote($_GET['date']);

                $date=preg_replace('/[^A-Za-z0-9\-]/', '', $date); 

                
               
                $pools = " UPDATE  games SET date_maintenanced='$date',checked=1 WHERE game_id='$id_pool' ";
                $result_pool_maintenance =$dbh ->exec($pools);  
             


                if($result_pool_maintenance)
                {
                     echo '<script> alert("Maintenance date succesfull Submited");</script>';
                    echo '<script> window.opener.location.reload();</script>';
                     echo '<script>self.close();</script>';
                }
            }
           
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }//END
		


		
		//Insert new date_maintenace generator
      try
        {
            if(isset ($_GET['submit'],$_GET['pools'], $_GET['date']))
            {

                include 'connect.php';

                $id_pool =  $dbh->quote($_GET['pools']);
                
                //echo '<br>';
                //$id_pool1=$dbh->quote($id_pool);
                $id_pool=preg_replace('/[^A-Za-z0-9\-]/', '', $id_pool); 
				


                $date =  $dbh->quote($_GET['date']);

                $date=preg_replace('/[^A-Za-z0-9\-]/', '', $date); 

                
               
                $pools = " UPDATE  generator SET date_maintenanced='$date',checked=1 WHERE generator_id='$id_pool' ";

                $result_pool_maintenance =$dbh ->exec($pools);  
             


                if($result_pool_maintenance)
                {
                     echo '<script> alert("Maintenance date succesfull Submited");</script>';
                     echo '<script> window.opener.location.reload();</script>';
                     echo '<script>self.close();</script>';
                }
            }
           
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }//END
		
		

?>