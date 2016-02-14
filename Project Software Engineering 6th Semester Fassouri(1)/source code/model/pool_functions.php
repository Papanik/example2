<?php 
//Print sections list
    function pool()
    {
        include 'connect.php';
        
        $section = "SELECT * FROM section";
        
        $section_result=$dbh->query($section);

        foreach($section_result as $stixeia1)
        {
             $section_id=$stixeia1["Section_ID"];
             $name_section=$stixeia1['section_name'];
            
             echo '<option disabled value="'.$section_id.'">'.$name_section.'</option>';
             $pool = "SELECT * FROM pools WHERE section_id = '$section_id'";
             $pool_result= $dbh->query($pool);
            
            foreach($pool_result as $stixeia)
            {
            $pools_id=$stixeia['pools_id'];
           
            $name_pool=$stixeia["pool_name"];
            $last_entry=$stixeia['last_entry'];
            $descriptio_pool=$stixeia['description_pool'];

            echo '<option value="'.$pools_id.'">'.$name_pool.'</option>';
            }
        
        }
        
      }//END

//edit pool pop up

       if(isset($_GET['edit_pool'],$_GET['pools']))
    {


        session_start();
        include 'connect.php';  
       
        $_SESSION['pool_id'] =  $_GET['pools'];
        echo '<script>window.open("../viewer/functions/edit_pool.php", "newwindow", "width=500, height=300");</script>';
      //echo '<script> window.opener.location.reload();</script>';
        echo "<script>window.location.href='../viewer/pools.php';</script>";
    }















    //REPORT
if(isset($_GET['report']))
      {
        if  ((!empty($_GET['month'])) && ( !empty($_GET['pools'])) && (!empty($_GET['year'] )))
          {

 
                  include 'connect.php';

                  $month_num = $_GET['month'];
                  $year_num =$_GET['year'];

                  $month = array("January", "February", "March","April","May","June","July","August","September","October","November","December");
                  
                  for($i=0; $i<=count($month)-1; $i++)
                  {
                    
                    if ($month[$i] == $month_num)
                    {

                          
                         $month_number = $i+1;
                         
                    }

                    

                  }
                  

                  $chemical_month= "SELECT * FROM pools_chemicals_backup WHERE month = '$month_number' AND year = '$year_num'";


                  $chemical_month_result = $dbh->query($chemical_month);

                   if($chemical_month_result -> rowCount()==0)
                   {
                    echo "<script>  alert('No measurements for this Month/Year');
                                window.location.href='../viewer/pools.php';
                    </script>";
                   }

                  else 
                  {

                    session_start();
           
                     $_SESSION['pool_id'] = $_GET['pools'];
                      $_SESSION['month'] = $month_number;
                      $_SESSION['year'] = $year_num;
            
                     echo '<script>  window.open("../reports/pools_report.php" , "_blank"); 
          </script>';

      echo "<script>window.location.href='../viewer/pools.php';</script>";
                  }

                  

            }
             


           else
            {
              echo "<script>
                            alert('Please select Month and Year!');
                             window.location.href='../viewer/pools.php';
          
                 </script>";
           }

      }//END






if(isset($_GET['delete_pool']))
{
  if(isset($_GET['pools']))
  {
    include 'connect.php';
    $pool_id = $_GET['pools'];

    $delete1="DELETE  FROM pools WHERE pools_id='$pool_id'";
    $delete2="DELETE FROM pools_chemicals_backup WHERE poolspool_id='$pool_id'";
    $delete1_result= $dbh->exec($delete1);
    $delete2_result= $dbh->exec($delete2);
    if($delete1_result)
    {
       echo "<script>
                            alert('Pool Successfully Deleted');
                             window.location.href='../viewer/pools.php';
          
                 </script>";
    }
    else
    {
      echo "<script>alert('An error occured...');window.location.href='../viewer/pools.php';</script>";
    }
  }
  else
 {
    echo "<script>alert('Please select a pool');window.location.href='../viewer/pools.php';</script>";
  } 




}




?>