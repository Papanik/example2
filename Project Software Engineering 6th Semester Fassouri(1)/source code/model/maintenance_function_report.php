<?php



if(isset($_POST['report']) && isset($_POST['section1']))
      { 

 
           if(isset( $_POST['pools']))
           {
            session_start();
           
            $_SESSION['section_id'] = $_POST['section1'];
            $_SESSION['pools_id'] =$_POST['pools'];
           
          
           echo '<script>  window.open("../reports/maintenance_pool_report.php" ,"_blank"); 
          </script>';

           echo "<script>window.location.href='../viewer/maintenance.php';</script>";
           }

            else
            {
              echo "<script>
                            alert('Please select Section ,Pool');
                             window.location.href='../viewer/maintenance.php';
                 </script>";
           }

      
    }



if(isset($_POST['report']) && isset($_POST['section2']))
      { 

 
           if(isset( $_POST['games']))
        {
         
            


            session_start();
           
            $_SESSION['section_id'] = $_POST['section2'];
            $_SESSION['games_id'] =$_POST['games'];
           
           
            
             echo '<script>  window.open("../reports/maintenance_game_report.php" , "_blank"); 
          </script>';

      echo "<script>window.location.href='../viewer/maintenance.php';</script>";
           }

            else
            {
              echo "<script>
                            alert('Please select Section ,Game');
                             window.location.href='../viewer/maintenance.php';
                 </script>";
           }

      
    }


if(isset($_POST['report']) && isset($_POST['section3']))
      { 

 
           if(isset( $_POST['generator']))
        {
         
            


            session_start();
           
            $_SESSION['section_id'] = $_POST['section3'];
            $_SESSION['generator_id'] =$_POST['generator'];
           
           
            
             echo '<script>  window.open("../reports/maintenance_generator_report.php" , "_blank"); 
          </script>';

      echo "<script>window.location.href='../viewer/maintenance.php';</script>";
           }

            else
            {
              echo "<script>
                            alert('Please select Section ,Generator');
                             window.location.href='../viewer/maintenance.php';
                 </script>";
           }

      
    }






    //JOB Report

    if(isset($_POST['print_job']))
      {                               
             
            echo '<script>  window.open("../reports/maintenance_generator_report.php" , "_blank");</script>';
            echo "<script>window.location.href='../viewer/maintenance.php';</script>";
      }

          

      
    








        


?>