<?php 
         
if(isset($_POST['report']))
      { 


        if(isset($_POST['section']) && isset( $_POST['pool']) && isset( $_POST['pumps']))
        
        {                
            session_start();
           
            $_SESSION['section_id'] = $_POST['section'];
            $_SESSION['type_id'] =$_POST['pool'];
            $_SESSION['machine_id'] = $_POST['pumps'];
           
          
            echo '<script>  window.open("../reports/machinery_report.php" , "_blank");</script>';

      echo "<script>window.location.href='../viewer/machinery.php';</script>";
           }

            else
            {
              echo "<script>
                            alert('Please select Section ,Type and Machine!');
                             window.location.href='../viewer/machinery.php';
                 </script>";
           }

      
    }






  


//DELETE SECTION - TYPE -MACHINE - PART
    //SECTION
        //Delete Section Function
        if(isset($_POST['delete_section']))
        {
            if(isset($_POST['section']))        
            {
                include 'connect.php';
                $id = $_POST['section'];
                $delete = "DELETE FROM section WHERE Section_ID='$id'";
                $delete_result = $dbh->exec($delete);
                if($delete_result)
                {
                    echo '<script>alert("Section Deleted.\n All items in this section are deleted ");</script>';
                    echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
            }
            else
            {
                echo '<script>alert("Please select Section!");</script>';
            }
        }//END


    //TYPE
        //Delete Type Function
        if(isset($_POST['delete_type']))
        {
            if(isset($_POST['section'],$_POST['pool']))        
            {
                include 'connect.php';
                $section_id = $_POST['section'];
                $type_id = $_POST['pool'];

                $type=substr($type_id,0,4);//pool - game
                $id=substr($type_id,4);//pool - game(id) 
             

                if($type =='pool')
                {   
                    $delete = "DELETE FROM pools WHERE pools_id = '$id' ";
                    $delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM pools_chemicals_backup WHERE poolspool_id = '$id' ";
                    $delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM pool_description WHERE id = '$id' AND type = 1 ";
                    $delete_result = $dbh->exec($delete);
                    $cond=1;
                }
                if($type=='game')
                {
                    $delete = "DELETE FROM games WHERE game_id = '$id' ";
                    $delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM pool_description WHERE id = '$id' AND type =2";
                    $delete_result = $dbh->exec($delete);
                    $cond=2;
                }
                
                if($cond==1)
                {
                 
                   echo '<script>alert("Pool Deleted.\n All details about this pool are deleted ");</script>';
                   echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
                if($cond==2)
                {
                    echo '<script>alert("Game Deleted.\n All details about this game are deleted ");</script>';
                    echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
            }
            else
            {
                echo '<script>alert("Please Select Section and Pool/Game");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }        
        }//END

    //MACHINE
        //Delete Machine Function
        if(isset($_POST['delete_machine']))
        {
            if(isset($_POST['section'],$_POST['pool'],$_POST['pumps']))        
            {
                include 'connect.php';
                //$section_id = $_POST['section'];
                $type_id = $_POST['pumps'];

                $type=substr($type_id,0,4);//pump-tour
                $id=substr($type_id,4);//pumpt-tour(id) 
                

                if($type =='tour')
                {  
                    $delete = "DELETE FROM tourbines WHERE tourbine_id = '$id' ";
                    /*$delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM tourbines WHERE poolspool_id = '$id' ";
                    $delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM pool_description WHERE id = '$id' AND type = 1 ";
                    $delete_result = $dbh->exec($delete);*/
                    $cond=1;

                }
                if($type=='pump')
                {
                    $delete = "DELETE FROM pumps WHERE pump_id = '$id' ";
                    /*$delete_result = $dbh->exec($delete);
                    $delete = "DELETE FROM pool_description WHERE id = '$id' AND type =2";
                    $delete_result = $dbh->exec($delete);*/
                    $cond=2;
                }
                
                $delete_result = $dbh->exec($delete);
                if($cond==1)
                {
                 
                   echo '<script>alert("Tourbine Deleted.\n All details about this tourbine are deleted ");</script>';
                   echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
                if($cond==2)
                {
                    echo '<script>alert("Pump Deleted.\n All details about this pump are deleted ");</script>';
                    echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
            }
            else
            {
                echo '<script>alert("Please Select Section and Pump/Tourbine");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }        
        }//END


    //PART
        //Delete Part Function
        if(isset($_POST['delete_part']))
        {
            if(isset($_POST['section'],$_POST['pool'],$_POST['pumps'],$_POST['part']))        
            {
                include 'connect.php';
                foreach($_POST['part'] as $id)
                {                
                    $delete = "DELETE FROM parts WHERE part_id = '$id'";
                    $delete_result = $dbh->exec($delete);
                }                                        
                echo '<script>alert("Selected Part(s) Succesfully Deleted");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            
            }
            else
            {
                echo '<script>alert("Please Select Section type machine and part");</script>';
              
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }        
        }//END




//FUNCTION EDIT SECTION - TYPE - MACHINE - PART (POP UP)
        //Edit Section    
        if(isset($_POST['edit_section']))
        {
            if(isset($_POST['section']))    
            {
                session_start();
                include 'connect.php';
                $id = $_POST['section'];
                $_SESSION['section_id'] = $id;
                echo '<script>window.open("../viewer/functions/edit_machinery_section.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }
            else
            {
                echo '<script>alert("Please Select Generator and Section");</script>';
            }
        }//END


        //Edit Type
        if(isset($_POST['edit_type']))
        {
            if(isset($_POST['section'],$_POST['pool']))
            {
                session_start();
                include 'connect.php';
                
                
                $type=substr($_POST['pool'],0,4);//pool - game
                $id=substr($_POST['pool'],4);//pool - game(id) 

                if($type=='pool')                    
                {                                    
                    $_SESSION['type'] = 1;//pool
                   
                }
                else
                {                                        
                    $_SESSION['type'] = 2;//game                
                }  
                $_SESSION['id'] = $id;
                 
                echo '<script>window.open("../viewer/functions/edit_type.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }           
        }//END





        //Edit Machine
        if(isset($_POST['edit_machine']))
        {
            if(isset($_POST['section'],$_POST['pool'],$_POST['pumps']))        
            {
                session_start();
                include 'connect.php';
                $type_id = $_POST['pumps'];
                $type=substr($type_id,0,4);//pump-tour
                $id=substr($type_id,4);//pump-tour(id) 

                if($type=='pump')                    
                {                                    
                    $_SESSION['type'] = 1;//pump                   
                }
                else
                {                                        
                    $_SESSION['type'] = 2;//tour                
                }    

                $_SESSION['machine_id'] = $id;

                echo '<script>window.open("../viewer/functions/edit_machine.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
            }
            else
            {
                echo '<script>alert("Please Select Section, Type and Machine");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>";   
            }

        }//END



        //Edit Part
         if(isset($_POST['edit_part']))
        {
            
            if(isset($_POST['section'],$_POST['pool'],$_POST['pumps'],$_POST['part']))        
            {
                if(count($_POST['part'])==1)
                {
                    session_start();
                    include 'connect.php';
                    $_SESSION['part_id'] = $_POST['part'];
                    echo '<script>window.open("../viewer/functions/edit_part.php", "newwindow", "width=500, height=500");</script>';
                    echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
                else
                {
                    echo '<script>alert("Please select only ONE Part!");</script>';
                    echo "<script>window.location.href='../viewer/machinery.php';</script>"; 
                }
            }
            else
            {
                echo '<script>alert("Please Select Section, Type and Machine");</script>';
                echo "<script>window.location.href='../viewer/machinery.php';</script>";   
            }

        }//END


?>

