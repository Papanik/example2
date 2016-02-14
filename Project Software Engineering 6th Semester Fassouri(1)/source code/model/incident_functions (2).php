<?php

          


        







        //------------------------------------------//

    if(isset($_GET['report']))
      {
        if(isset($_GET['inciList']))
          {
            session_start();
           
            $_SESSION['Incidents_ID'] = $_GET['inciList'];
           /* $_SESSION['Item_ID'] = $_GET['items'];
            $_SESSION['year'] = $_GET['year'];*/
            
            //header("Location:../reports/incident_report.php");
            echo '<script>  window.open("../reports/incident_report.php" , "_blank"); 
          </script>';


      echo "<script>window.location.href='../viewer/incident.php';</script>";
              }
           
           }

      


?>