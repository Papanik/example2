<?php
  //include '../model/maintenance_function.php';
  include '../model/maintenance_function.php';
  include '../model/maintenance_function_report.php';
  include '../model/connect.php';
   include '../model/check_maintenance.php';
?>

<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>
    
    <head>
    <script type="text/javascript" src="js/jquery_maintenance/1.4.2/jquery.min.js"></script>

<script type="text/javascript">

//--------------------------pools-----------

$(document).ready(function()
{
          $(".section1").change(function()
          {        
          var id_pool=$(this).val();
          var dataString = 'id_pool='+id_pool;
          $.ajax
          ({
          type: "POST",
          url: "../model/ajax/ajax_maintenance_pool.php", 
          data: dataString,
          cache: false,
          success: function(html)
          {
          $(".pools").html(html);

          } 
          });

          });

});


//--------------------games
$(document).ready(function()
{
          $(".section2").change(function()
          {
          var id_game=$(this).val();
          var dataString = 'id_game='+id_game;

          $.ajax
          ({
          type: "POST",
          url: "../model/ajax/ajax_maintenance_pool.php",
          data: dataString,
          cache: false,
          success: function(html)
          {
          $(".games").html(html);

          } 
          });

          });

});


//-----------------------generator
$(document).ready(function()
{
          $(".section3").change(function()
          {
          var id_generator=$(this).val();
          var dataString = 'id_generator='+id_generator;

          $.ajax
          ({
          type: "POST",
          url: "../model/ajax/ajax_maintenance_pool.php",
          data: dataString,
          cache: false,
          success: function(html)
          {
          $(".generator").html(html);

          } 
          });

          });

});

</script>

		<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
        <link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
        <script src="js/jqueryUI/jquery-ui.min.js"></script>
		<script src="js/script.js"></script>
        <script src="js/maintenance.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/maintenance.css">
		
        <title>Fasouri Waterpark - Technical - Maintenance</title>
    </head>
    <body>

	<div class="container">
  
		<div class="row">						<!-- Navigation bar -->
			<div class="col-xs-12">

				<div class="nav" align="right">
				<ul>
                    <li><a href="technical.php"><button type="button" class="btnY" title="Return to Technical Menu"><img src="img/icons/back.png" alt="Back" style="width:20px;height:20px">Back</button></a></li>
					<li><a href="menu.php"><button type="button" class="btnH" title="Return to Main Menu"><img src="img/icons/home.png" alt="Home" style="width:20px;height:20px">Menu</button></a></li>
					<li><a href="../model/logout.php"><button type="button" class="btnR"title="Log out">Log Out</button></a></li>
				</ul>
				
				
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="formTitle">Maintenance</div><br><br>
		</div>
		
		<div class="row">									
			<div class="col-xs-3" align="center">
      <form  method="post">
      <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Pools</div>
            
                
                    <select name="section1" class="section1" style="width:70%";>
                      <?php
              
                        $sql=$dbh->query("select * from section ");
                          echo '<option >-- Section--</option>';
                        foreach ($sql as $row) 
                        {
                          
                        $id_pool=$row['Section_ID'];
                        $section_name=$row['section_name'];

                        echo '<option value="'.$id_pool.'">'.$section_name.'</option>';
                        } 

                        ?>

                    </select>
                    <button onclick='window.open("functions/new_machinery_section.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Maintenance date">...</button>

                    <br><br><br>


                    <select required name="pools" class="pools" style="width:70%";>

                      <option value="" selected>--Pool--</option>   

                    </select>
                    <button onclick='window.open("functions/new_type.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Machinery/Pools">...</button>
                    
                    <br><br>
                    <input type="text" name="text1" autofocus style="height:50px; width:90%"; placeholder="Write Description">  <br><br>  
        



        
                  <!-- Default panel contents -->
                    <div class="panel-heading"></div>

                      <button style="<?php echo $style1; ?>" onclick='window.open("functions/maintenance_date_alert_pool.php", "newwindow", "width=500, height=500");' id="shortcutbutton1" class="btn12"  title="Shortcut to Insert Maintenance date">...</button>
                     <button  type="submit" value="Submit" class="btnCheck" name="Pool_Checked" title="Pool Checked"><img src="img/checked.png" alt="New" style="width:50px;height:50px"> <br>Checked</button>
                     <button type="submit" name="report" class="sbtnY"  title="Print a report on Parts of this machine"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px"><br>Report</button>
                            

        </div>           
        
          
                <br><br><br>
          
            </form>     
			 </div>

          			<div class="col-xs-3" align="center">
                <form method="post">
          			<div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Games</div>
            
                          
                    <select name="section2" class="section2" style="width:70%";>
                      <?php
              
                        $sql=$dbh->query("select * from section ");
                          echo '<option >--Section--</option>';
                        foreach ($sql as $row) 
                        {
                          
                        $id_game=$row['Section_ID'];
                        $section_name=$row['section_name'];

                        echo '<option value="'.$id_game.'">'.$section_name.'</option>';
                        } 

                        ?>
                    </select>
                    <button onclick='window.open("functions/new_machinery_section.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Maintenance date">...</button>

                    <br><br><br>
                    <select required name="games" class="games" style="width:70%";>

                       <option value="" selected>--Game--</option>  

                    </select>
                     <button onclick='window.open("functions/new_type.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Machinery/Pools">...</button>
                   
                    <br><br>
                    <input type="text" name="text2" autofocus style="height:50px; width:90%"; placeholder="Write Description">  <br><br> 
                

          

                <div class="panel-heading"></div>

                <button style="<?php echo $style2; ?>" onclick='window.open("functions/maintenance_date_alert_game.php", "newwindow", "width=500, height=500");' id="shortcutbutton2" class="btn1"  title="Shortcut to Insert Maintenance date">  ...</button></span>
    
                <button  type="submit" value="Submit" class="btnCheck" name="Game_Checked" title="Game Checked"><img src="img/checked.png" alt="New" style="width:50px;height:50px">                    <br>Checked</button>
                <button type="submit" name="report" class="sbtnY"  title="Print a report on Parts of this machine"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px"><br>Report</button>
                     
           </div>     
                
                </form>
                
			</div>
			
			
            
            <div class="col-xs-3" align="center">
            <form method="post">
			       <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Generator</div>
            
                
                    <select name="section3" class="section3" style="width:90%";>
                      <?php
              
                        $sql=$dbh->query("select * from section ");
                          echo '<option >--Section--</option>';
                        foreach ($sql as $row) 
                        {
                          
                        $id_generator=$row['Section_ID'];
                        $section_name=$row['section_name'];

                        echo '<option value="'.$id_generator.'">'.$section_name.'</option>';
                        } 

                        ?>
                    </select><br><br><br>
                    <select required name="generator" class="generator" style="width:90%";>

                      <option value="" selected>--Generator--</option>  

                    </select>
                    <br><br>
                    <input type="text" name="text3" autofocus style="height:50px; width:90%"; placeholder="Write Description">  <br><br> 
 
                    

            

                <div class="panel-heading"></div>     

                     <button style="<?php echo $style3; ?>" onclick='window.open("functions/maintenance_date_alert_generator.php", "newwindow", "width=500, height=500");' id="shortcutbutton3" class="btn3"  title="Shortcut to Insert Maintenance date">...</button>
                        
                    <button type="submit" value="Submit"class="btnCheck" name="Generator_Checked" title="Generator Checked"><img src="img/checked.png" alt="New" style="width:50px;height:50px"> <br>Checked</button>                  
                     <button type="submit" name="report" class="sbtnY"  title="Print a report on Parts of this machine"><img src="img/icons/chart.png" alt="Report" style="width:30px;height:30px"><br>Report</button>
               
                   </div> 
            
          
                 <div class="gene_list">
					<ul>
						<li><a href="functions/new_gen.php"  onclick="window.open('functions/new_gen.php', 'newwindow', 'width=350, height=230'); return false;"><button type="button" class="sbtnG" title="Insert new Part"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>New</button></a></li>
						<li><button type="submit" name="edit_generator" class="sbtn" title="Edit selected Part"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
						<li><button type="submit" class="sbtnR" name="delete_generator" onclick="return confirm('Delete Genereator?')" title="Delete selected"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li>
					</ul>
          </div>
          </div>
				
            </form>    
                
               
		
            
            <div class="col-xs-3" align="center">

            
               <div class="panel panel-default">

                  <!-- Default panel contents -->
                  <div class="panel-heading">Tasks List<br><?php echo date("Y"); ?></div>
               <form method="post"> 
                        <select required name="tasks" size="4" style="width:90%;">
                        <option selected disabled value="">JOBS</option>
                        <?php
                        
              
                        $sql=$dbh->query("select * from jobs ");
                          
                        foreach ($sql as $row) 
                        {
                          
                        $job_id = $row['job_id'];
                        $job_title=$row['title'];
                        $job_description = $row['description'];
                        $job_date = $row['date'];

                        echo '<option value="'.$job_id.'">'.$job_title.'  ,  '.$job_date.'</option>';
                        } 

                        

                         ?>
                        </select>
                
                         <div class="task_list">
                					<ul>

                						<li><a href="functions/add_list.php"  onclick="window.open('functions/add_list.php', 'newwindow', 'width=400, height=450'); return false;"><button type="button" class="sbtnG" title="Insert new Part"><img src="img/icons/new.png" alt="New" style="width:30px;height:30px"><br>Add</button></a></li>
                						 
                   
                            <li><button   class="sbtnY" title="View Report" onclick='window.open("../reports/jobs_report.php","_blanc" );'><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Print</button></li><br>
                            <li><button type="submit" name="edit_job" class="sbtn" title="Edit selected Part"><img src="img/icons/edit.png" alt="Edit" style="width:30px;height:30px"><br>Edit</button></li>
                            <li><button type="submit" class="sbtnR" name="delete_job" onclick="return confirm('Delete Job?')" title="Delete selected"><img src="img/icons/bin.png" alt="Delete" style="width:30px;height:30px"><br>Delete</button></li><br>
                				    </ul>
                				</div>
               
              </form>
			           </div>
                 
      </div>
			
              
            
		</div>
		
		
		
		
	
		
	
	
	</div>
  
        
	
       <div class="footer">
			<div class="row">
				<div class="col-xs-2"><div id="logoFas"></div></div>
                <div class="col-xs-8" align="center">Fasouri Watermania Waterpark -  Management Software<br> Cyprus University of Technology Software Development Team 2015<br>© 2015. <a href="disclaimer.pdf" target="_blank" title="Click to read Disclaimer" >View Disclaimer </a></div>
                <div class="col-xs-2"><a href="../helpfile/Maintenance.html" target="_blank" title="Help"><div id="helpIcon"></div></a></div>
			</div>
		</div>
    
    </body>
