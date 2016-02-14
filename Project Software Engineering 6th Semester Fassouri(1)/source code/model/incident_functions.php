

<?php
 include 'connect.php';

//Insert Section Function
    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['section']))        
            {
                include 'connect.php';

                $sectionName =  $dbh->quote($_POST['section']);
                
                $section = " INSERT INTO section_incidents (section_name) VALUES ($sectionName)";
                $section_result =$dbh ->exec($section);  
            
                if($section_result)
                {
                     echo '<script> alert("Section succesfull Submited");</script>';
                   
                     echo '<Script>self.close();</script>';

                
                }
                else
                {
                     echo '<script> alert("Section NOT Submited. An error occured");</script>';
                        
                }



            }
            else
            {
                echo '<script> alert("Please fill all fields");</script>';
            }
        }

    }


    catch(Exception $e)
    {
        echo $e->getMessage();
    } 
//END






    //Edit Section Function
    //POP UP
    if(isset($_GET['edit_section']))
    {

     if(!empty($_GET['section']))
    {
        session_start();
        include 'connect.php';  
        $section_id = $_GET['section'];
        $_SESSION['section_id'] = $section_id;
        echo '<script>window.open("../viewer/functions/edit_incident_section.php", "newwindow", "width=300, height=500");</script>';
        echo "<script>window.location.href='../viewer/incident.php';</script>";

       // header('Location:../viewer/incident.php');
    }

    else
    {

        echo '<script> alert("Please select section");</script>';
            echo "<script>window.location.href='../viewer/incident.php';</script>"; 
    }

}



 
      //Delete Section Function
        if(isset($_GET['delete_section']))
        {


            if(!empty($_GET['section']))
        {
            include 'connect.php';
            $id = $_GET['section'];
            $delete = "DELETE FROM section_incidents WHERE section_id='$id'";
            $delete_result = $dbh->exec($delete);
            if($delete_result)
            {
             
               echo '<script>alert("Section Deleted.\n All items in this section are deleted ");</script>';
               echo "<script>window.location.href='../viewer/incident.php';</script>"; 
            }

        }

        else
            {

                echo '<script> alert("Please select section");</script>';
                    echo "<script>window.location.href='../viewer/incident.php';</script>"; 
            }
                    

        }//END








//Edit INCIDENT Function
    //Open Popup
    if (isset($_GET['edit_button']))
    {   
        if( (!empty($_GET['inciList'])) && (count($_GET['inciList'])==1) )
        {
           session_start();
            foreach ($_GET['inciList'] as $id)
            {
              //  session_start();
                   
                    $_SESSION['incident_id'] = $id;
               
                echo '<script>window.open("http://localhost/dropbox/projects/fasuri/viewer/functions/edit_incident.php", "newwindow", "width=500, height=500");</script>';
                echo "<script>window.location.href='../viewer/incident.php';</script>";
            }
        }
        else
        {
            echo '<script> alert("Please select only ONE incident");</script>';
            echo "<script>window.location.href='../viewer/incident.php';</script>"; 
        }
    }//END


    //Insert new Incident
      try
        {
            if(isset ($_GET['submit'],$_GET['section'], $_GET['date'],$_GET['description'],$_GET['title']))
            {
                include '../../model/connect.php';
                $section =  $dbh->quote($_GET['section']);
                $date =  $dbh->quote($_GET['date']);
                $description =  $dbh->quote($_GET['description']);
                $title = $dbh->quote($_GET['title']);
                
                $incident = " INSERT INTO incidents (Date_happened, Description, Section_ID,title) VALUES ($date,$description,$section,$title)";
                $result_incident =$dbh ->exec($incident);  
            
                if($result_incident)
                {
                     echo '<script> alert("Incident succesfull Submited");</script>';

                     echo '<script>self.close();</script>';
                }
            }
           
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }//END






    //Delete Incident Function
        if(isset($_GET['delete_button']))
        {
            if( (!empty($_GET['inciList'])) && (count($_GET['inciList'])==1) )
        
            {
                include 'connect.php';
                foreach ($_GET['inciList'] as $id)
                {
                    
                    
                    $delete = "DELETE FROM incidents WHERE Incidents_ID='$id'";
                    $delete_result = $dbh->exec($delete);
                    if($delete_result)
                    {
                     
                       echo '<script>alert("Incident Deleted");</script>';
                       echo "<script>window.location.href='../viewer/incident.php';</script>"; 
                    }
                }
            }
            else
            {
                echo '<script> alert("Please select only ONE incident");</script>';
                echo "<script>window.location.href='../viewer/incident.php';</script>"; 

            }

                

    }//END
            







//Print Report Function
    if(isset($_GET['report']))
    {
        if(isset($_GET['inciList']))
        {
            $i=0;
            foreach ($_GET['inciList'] as $selectedOption)
            {
                $incident_array[$i]=$selectedOption;
                $i++;
            }
                session_start();        
                $_SESSION['Incidents_ID'] = $incident_array;                    
                echo '<script>  window.open("../reports/incident_report.php" , "_blank");</script>';
                echo "<script>window.location.href='../viewer/incident.php';</script>";
        }
        else
        {
            echo '<script> alert("Please select an Incindent");</script>';
        }
           
    }//END

















 //Search by Date Range
    function incidents_name()
    {
        if((!empty($_GET['date'])) || (!empty($_GET['date1'])))
        {
            
            if((!empty($_GET['date'])) && (!empty($_GET['date1'])))
            {

                $from =$_GET['date'];
                $to = $_GET['date1'];

                if($from <= $to)
                {
                    include 'connect.php';          
                    $incidents = "SELECT * FROM incidents WHERE Date_happened<= '$to' AND Date_happened >= '$from' ";
                    $incidents_result=$dbh->query($incidents);

                    if($incidents_result->rowCount()!=0)
                    {
                        foreach($incidents_result as $stixeia1)
                        {
                            $incidents_id=$stixeia1["Incidents_ID"];
                            $incidents_name=$stixeia1['Title'];
                            $date=$stixeia1['Date_happened'];
                              
                            echo '<option value="'.$incidents_id.'">'.$incidents_name.'  '.$date.'</option>';
                        }
                    }
                    else
                    {
                        echo '<option>Nothing Found</option>';
                    }
                }


                    else
                    {
                        echo '<option>Wrong Dates</option>';
                    }
        
             }

                 if((!empty($_GET['date']))  &&   (empty($_GET['date1']))) 
                 {
                    $from = $_GET['date'];
                    $to = $_GET['date1'];

                    include 'connect.php';          
                    $incidents = "SELECT * FROM incidents WHERE Date_happened >= '$from' ";
                    $incidents_result=$dbh->query($incidents);

                    if($incidents_result->rowCount()!=0)
                    {
                        foreach($incidents_result as $stixeia1)
                        {
                            $incidents_id=$stixeia1["Incidents_ID"];
                            $incidents_name=$stixeia1['Title'];
                            $date=$stixeia1['Date_happened'];
                              
                            echo '<option value="'.$incidents_id.'">'.$incidents_name.'  '.$date.'</option>';
                        }
                    }

                  }


                 if((!empty($_GET['date1']))  &&   (empty($_GET['date']))) 
                     {
                        $from = $_GET['date'];
                        $to = $_GET['date1'];

                        include 'connect.php';          
                        $incidents = "SELECT * FROM incidents WHERE Date_happened <= '$to' ";
                        $incidents_result=$dbh->query($incidents);

                        if($incidents_result->rowCount()!=0)
                        {
                            foreach($incidents_result as $stixeia1)
                            {
                                $incidents_id=$stixeia1["Incidents_ID"];
                                $incidents_name=$stixeia1['Title'];
                                $date=$stixeia1['Date_happened'];
                                  
                                echo '<option value="'.$incidents_id.'">'.$incidents_name.'  '.$date.'</option>';
                            }
                        }

                      }


        }

        if((empty($_GET['date']))  &&   (empty($_GET['date1']))) 
                     {
                        $from = $_GET['date'];
                        $to = $_GET['date1'];

                        include 'connect.php';          
                        $incidents = "SELECT * FROM incidents ORDER BY Date_happened DESC";
                        $incidents_result=$dbh->query($incidents);

                        if($incidents_result->rowCount()!=0)
                        {
                            foreach($incidents_result as $stixeia1)
                            {
                                $incidents_id=$stixeia1["Incidents_ID"];
                                $incidents_name=$stixeia1['Title'];
                                $date=$stixeia1['Date_happened'];
                                  
                                echo '<option value="'.$incidents_id.'">'.$incidents_name.'  '.$date.'</option>';
                            }
                        }

                      }

             


       
            
       
    }

    //END




    
?> 