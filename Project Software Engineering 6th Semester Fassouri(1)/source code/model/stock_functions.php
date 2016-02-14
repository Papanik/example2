<?php



//Print sections list
/*
    function section()
    {
        include 'connect.php';
        $sections = "SELECT * FROM item_section";
        $sections_result= $dbh->query($sections);
        foreach($sections_result as $section)
        {
            $section_id = $section['section_id'];
            $section_name = $section['name'];

            echo '<option value="'.$section_id.'">'.$section_name.'</option>';
        }
    }
//END*/




//Insert Section Function
    try
    {
        if(isset ($_POST['insert']))
        {
            if(isset($_POST['sectionName']))        
            {
                include '../../model/connect.php';
                $sectionName =  $dbh->quote($_POST['sectionName']);
                
                $section = " INSERT INTO item_section (name) VALUES ($sectionName)";
                $section_result =$dbh ->exec($section);  
            
                if($section_result)
                {
                     echo '<script> alert("Section succesfull Submited");</script>';
                     echo '<script> window.opener.location.reload();</script>';
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
    if(isset($_GET['edit_section'],$_GET['section']))
    {
        session_start();
        include 'connect.php';  
        $section_id = $_GET['section'];
        $_SESSION['section_id'] = $section_id;
        echo '<script>window.open("../viewer/functions/edit_item_section.php", "newwindow", "width=500, height=300");</script>';
        
        echo "<script>window.location.href='../viewer/stock.php';</script>";
    }





    //Edit Item Function
    //POP UP
    if(isset($_GET['edit_item'],$_GET['item']))
    {
        session_start();
        include 'connect.php';  
        $item_id = $_GET['item'];
        $_SESSION['item_id'] = $item_id;
        echo '<script>window.open("../viewer/functions/edit_item.php", "newwindow", "width=500, height=500");</script>';
        echo "<script>window.location.href='../viewer/stock.php';</script>";
    }
  



//Insert item Function 
    try
    {
        if(isset ($_POST['Insert']))
        {            
            if( (!empty($_POST['itemname'])) && (!empty($_POST['quantity'])) && (!empty($_POST['section'])) )
            {                

                include '../../model/connect.php';


                $section_id =  $dbh->quote($_POST['section']);
                $itemName =  $dbh->quote($_POST['itemname']);
                $quantity =$_POST['quantity']; 

                if($quantity <=1)
                {

                    echo '<script>alert("Quantity must be greater or equal 1");</script>';
                }

                    else
                    {
                        $item = " INSERT INTO items (Name,Available,Section_ID) VALUES ($itemName,'$quantity',$section_id)";
                        $item_result =$dbh ->exec($item);  
                        
                        if($item_result)
                        {
                            echo '<script> alert("Item submited succesfull");</script>';
                            
                            echo '<script>self.close();</script>';            
                        }
                    }
                
            }
        
            else
            {
                echo '<script>alert("Please fill all fields");</script>';
            }

        }
    }   
    catch(Exception $e)
    {
        echo $e->getMessage();
    } 
//END


//Edit Item Function
    
/*if(isset($_GET['edit_button'],$_GET['section']))
{
    include '../../model/connect.php';
    $id = $_GET['section_list'];
    $_SESSION['section_id'] = $id;
    echo '<script>window.open("http://localhost/dropbox/projects/fasuri/viewer/functions/edit_employee_section.php", "newwindow", "width=300, height=155");</script>';

}*/




//Print item list
//By Section
/*
function items_list_section()
{
    if(isset($_GET['section_list']))
    {
        $section_id=$_GET['section_list'];    
        include 'connect.php';
        $item = "SELECT * 
                    FROM items,item_section
                    WHERE items.Section_ID = '$section_id' AND item_section.section_id ='$section_id'";        
        $item_result=$dbh->query($item);
        $i=0;//initialize counter
        //Section List
        foreach($item_result as $data)
        {

            $section_id=$data['section_id'];
            $name_section=$data['name'];
            if($i==0)//Only one time!
            {
                echo '<option disabled value="'.$section_id.'">'.$name_section.'</option>';
                $i+=1;
            }
            //Item list
            $item_id=$data['Item_ID'];        
            $item_name=$data["Name"];
            $available=$data['Available'];
                      
            echo '<option value="'.$item_id.'">'.$item_name.'  , '.$available.'  ,  '.$name_section.'</option>';
                  
        }        
    }
    else
    {
        echo '<script>alert(" Please Select a Section from the list")</script>'; 
    }
}*/


//By Keyword

       
        function search()
        {
            include 'connect.php';  
            if(isset($_GET['keyword']))
            {
                try
                {
                    $keyword = $_GET['keyword'];
                    $search = "SELECT * FROM items WHERE Name LIKE '%{$keyword}%' ";
                    $search_result = $dbh->query($search);
                        if($search_result->rowCount() >0)
                        {
                            foreach ($search_result as $row)
                            {                    
                                $item_id = $row['Item_ID'];
                                $item_name = $row['Name'];
                                $available = $row['Available'];
                                echo '<option value="'.$item_id.'">'.$item_name.'  , '.$available.'</option>';                                    
                            }                                                
                        }
                        else
                        {                           
                            echo '<option>Nothing Found for keyword   '.$keyword.'</option>';
                        }
                }
                catch(Exception $e)
                {
                    echo $e->getMessage();            
                }                   
                    
            }
            else 
            {
                echo '<option>Please enter a keyword</option>';
            }
        
        }
        //END



        //Delete Section Function
        if(isset($_GET['delete_section'],$_GET['section']))
        {
            include 'connect.php';
            $id = $_GET['section'];
            $delete = "DELETE FROM item_section WHERE section_id='$id'";
            $delete_result = $dbh->exec($delete);
            if($delete_result)
            {
             
               echo '<script>alert("Section Deleted.\n All items in this section are deleted ");</script>';
               echo "<script>window.location.href='../viewer/stock.php';</script>"; 
            }
            

        }//END





        //Delete Item Function
        if(isset($_GET['delete_item'],$_GET['item']))
        {
            include 'connect.php';
            $id = $_GET['item'];
            $delete = "DELETE FROM items WHERE Item_ID='$id'";
            $delete_result = $dbh->exec($delete);
            if($delete_result)
            {
             
               echo '<script>alert("Item Deleted succesfully!");</script>';
               echo '<script> window.opener.location.reload();</script>';
               echo "<script>window.location.href='../viewer/stock.php';</script>"; 
            }
            

        }//END





        //REPORT
        if(isset($_GET['report']))
        {
            if(isset($_GET['section']))
            {
                session_start();           
                $_SESSION['section_id'] = $_GET['section'];
            /* $_SESSION['Item_ID'] = $_GET['items'];
            $_SESSION['year'] = $_GET['year'];*/
            
                echo '<script>  window.open("../reports/stock_report.php" , "_blank");</script>';
                echo "<script>window.location.href='../viewer/stock.php';</script>";                
            }
            else
            {
                echo "<script>alert('Please select Section! ');
                        window.location.href='../viewer/stock.php';</script>";
            }

        }//END

?>