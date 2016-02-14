<?php
	
	session_start();
	include '../model/connect.php';
	include '../model/edit_employee_function.php';
	//include '../ajaximageupload/ajaimage_update.php';
	foreach ($_SESSION['employee_id'] as $employee_id)
	{
		try
		{
			
			//$employee_id = $_SESSION['employee_id'];
		
			$employee_data = "	SELECT *
								FROM 	employee, employee_details, employee_relative, employee_health, employee_skills
								WHERE 	employee.employee_id = '$employee_id'
								
								AND 	employee_details.employee_employee_id = '$employee_id'
								AND 	employee_relative.employee_employee_id = '$employee_id'
								AND 	employee_health.employee_employee_id = '$employee_id'
								AND 	employee_skills.employee_employee_id = '$employee_id'";
						
			$employee_data_result =	$dbh->query($employee_data);					
			
			//Fetch Data
			foreach($employee_data_result as $row)
			{
				$active = $row['active'];
				//General
				$employee_name = $row['name'];				
				$employee_surname = $row['surname'];
				$employee_position = $row['position'];
				$employee_address = $row['address'];
				$employee_town = $row['town'];
				$employee_telephone = $row['telephone'];
				$employee_date_of_birth = $row['date_of_birth'];
				$employee_place_of_birth = $row['place_of_birth'];
				$employee_sin = $row['SIN'];
				$employee_id_card = $row['id_card'];
				$photo = $row['photo'];

				//Relative
				$employee_rel_surname = $row['R_surname'];
				$employee_rel_name = $row['R_name'];
				$employee_rel_home_tel = $row['R_home_tel'];
				$employee_rel_work_tel = $row['R_work_tel'];
				$employee_rel_mobile_tel = $row['R_mobile_tel'];
				
				//Disabilities

				$employee_disabilities = $row['disabilities'];
				$employee_skin = $row['skin'];
				$employee_diabetes=$row['diabetes'];
				$employee_breathing=$row['breathing'];
				$employee_epilepsey=$row['epilipsey'];

				//Skills


				$greek = $row['greek'];
				$english = $row['english'];
				$french = $row['french'];
				$russian = $row['russian'];
				$stat1 = $row['other_1_stat'];
				$stat2 = $row['other_2_stat'];
				$name1 = $row['other_1_name'];
				$name2 = $row['other_2_name'];
				$diploma = $row['diplomas'];						
			}

		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
?>
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>
    
    <head>


<script type="text/javascript" src="../new/1.8.3/jquery.min1.js"></script >

		    <script language="javascript" type="text/javascript">
		        $(function () {
		            $("#fileupload1").change(function () {

		                if (typeof (FileReader) != "undefined") {
		                    var dvPreview = $("#dvPreview");
		                    dvPreview.html('');
		                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
		                    $($(this)[0].files).each(function () {
		                        var file = $(this);
		                        if (regex.test(file[0].name.toLowerCase())) {
		                            var reader = new FileReader();
		                            reader.onload = function (e) {
		                                var img = $("<img />");
		                                img.attr("style", "height:100px;width: 100px");
		                                img.attr("src", e.target.result);
		                                dvPreview.append(img);

		                               
		                            }
		                            reader.readAsDataURL(file[0]);
		                        } else {
		                            alert(file[0].name + " is not a valid image file.");
		                            dvPreview.html("");
		                            return false;
		                        }
		                    });
		                } else {
		                    alert("This browser does not support HTML5 FileReader.");
		                }
		            });
		        });

</script>

				
				<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
				<script src="js/script.js"></script>
				<link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
				<script src="js/jqueryUI/jquery-ui.min.js"></script>	
			
			<script src="js/jqueryUI/jquery-ui.min.js"></script>
			<script src="js/jqueryUI/jquery-ui.min.js"></script>
	        <script src="js/jquery.timepicker.js"></script>
			<script src="js/script.js"></script>
	        <script src="js/pools.js"></script>
	        <script src="js/jquery.numeric.js"></script>
	        <script src="js/pools.js"></script>


<script type="text/javascript">



  $(document).ready(function () {

		$('#textbox').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});

  $(document).ready(function () {

		$('#textbox1').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg1").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});

 $(document).ready(function () {

		$('#textbox2').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg2").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});

 $(document).ready(function () {

		$('#textbox3').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg3").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});



    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox4").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg4").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

    

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox5").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg5").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});



$(document).ready(function () {

		$('#textbox6').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg6").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});


    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox7").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg7").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

  
$(document).ready(function () {

		$('#textbox8').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg8").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});


$(document).ready(function () {

		$('#textbox9').keydown(function (e) 
		{
		if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();

			} 
		else 
			{
		var key = e.keyCode;

		if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) 
			{
				e.preventDefault();
		        $("#errmsg9").html("Letter Only").show().fadeOut("slow");
               return false;
		}
		}
		});
		});

  $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox10").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg10").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox11").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg11").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});

      $(document).ready(function () {
  //called when key is pressed in textbox
  $("#textbox12").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //display error message
        $("#errmsg12").html("Numbers Only").show().fadeOut("slow");
               return false;
    }
   });
});


/*
 function CheckIsNumeric(objEvt) {
        var charCode = (objEvt.which) ? objEvt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            document.getElementById("txtNumber").style.backgroundColor = "#FFB2B2";
            return false;
        }
        else {
            document.getElementById("txtNumber").style.backgroundColor = "#B2D8B2";
            return true;
        }
    }*/


    </script>


		  


		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/application.css">
        <title>Fasouri Waterpark - New Application </title>
		
    </head>
    <body>
<form  method = "post" enctype="multipart/form-data">
	<div class="container">
	
		
		
		<div class="row">Application Form : <?php echo $employee_name." ".$employee_surname;?><br><br><br>
			
			
				<div class="col-xs-6" align="right">	
						Status : 
						<select name="active_list">
							<option value='1' style='color:blue' <?php if($active == 1){echo 'selected';}?>>Active</option>
							<option value='0' style='color:red' <?php if($active == 0){echo 'selected';}?> >Inactive</option>
						</select>
						
						
						
						<br>
						<span style="color:red;" id="errmsg"></span>
						
						<br>Name:
						<input required ID="textbox"  type="text" name="name" autofocus value="<?php echo $employee_name; ?>" ><br>

						<span style="color:red;" id="errmsg1"></span>
						<br>					
						Surname:
						<input  ID="textbox1"  type="text" name="surname" value="<?php echo $employee_surname; ?>" >
						<br>
						<span style="color:red;" id="errmsg2"></span>
						<br>		
						Position applied for:
						<input ID="textbox2"  type="text" name="position" value="<?php echo $employee_position; ?>" >						
					
				


				</div>				

				<div class="col-xs-6" id="naProf" style="width:100px">	
				
				 <div>
			        <input   id="fileupload1" type="file" name="fileupload" multiple="multiple" />
			        <br />
			        <div id="dvPreview" style="width:100px;height:100px;">
					<img style="height:100px;width: 100px;"src="../ajaximageupload/uploads/<?php echo $photo; ?>">
			        </div>
    		</div>
				
				</div>



				









				
			
                
				
			
			
			
			
					
			
			
			
			
		</div>
		
	
		
		<div class="row"><br>General Information
			<div class="col-xs-12">	Home Address:<br>
				<textarea rows="2" cols="80" name="address"><?php echo $employee_address; ?></textarea><br><br>
			</div>
			
			<div class="col-xs-6">	
				
				Town:<span style="color:red;" id="errmsg3"></span>
				<br><input ID="textbox3"  type="text" name="town" value="<?php echo $employee_town; ?>" >

				<br>
				
						Date of Birth
						<br><input   type="text" name="birth_date" id="date" placeholder="mm/dd/yyyy" value="<?php echo $employee_date_of_birth; ?>"><br>
				
					
					Social Insurance Number:<span style="color:red;" id="errmsg4"></span>
					<br><input ID="textbox4"  type="text" name="sin"  value="<?php echo $employee_sin; ?>">

			</div>
			
			<div class="col-xs-6">	
				Telephone Number:<span style="color:red;" id="errmsg5"></span>
				<br><input ID="textbox5"  type="text" name="telephone" value="<?php echo $employee_telephone; ?>"><br>
				Place of birth:<span style="color:red;" id="errmsg6"></span>
				<br><input ID="textbox6"  type="text" name="birth_place" value="<?php echo $employee_place_of_birth; ?>"><br>
				I.D. card number:<span style="color:red;" id="errmsg7"></span>
				<br><input ID="textbox7"  type="text" name="idnum" value="<?php echo $employee_id_card; ?>">
		
			</div>
			
		</div>
		
		
		
		<div class="row"><br>Contact person in case of emergency
			
			<div class="col-xs-12">
				<div class="col-xs-6">	
					Surname:<span style="color:red;" id="errmsg8"></span> 
					<br>
					<input ID="textbox8"  type="text" name="r_surname" value="<?php echo $employee_rel_surname; ?>"><br>
					
					Name:<span style="color:red;" id="errmsg9"></span> 
					<br><input ID="textbox9"  type="text" name="r_name" value="<?php echo $employee_rel_name; ?>">
						
						
						

				</div>
				
				<div class="col-xs-6">	
					Work Telephone Number:<span style="color:red;" id="errmsg10"></span>
					<br><input ID="textbox10"  type="text" name="work_telephone" value="<?php echo $employee_rel_work_tel; ?>"><br>
					Home Telephone Number:<span style="color:red;" id="errmsg11"></span>
					<br><input ID="textbox11"  type="text" name="home_telephone" value="<?php echo $employee_rel_home_tel; ?>"><br>
					Mobile Telephone Number:<span style="color:red;" id="errmsg12"></span>
					<br><input ID="textbox12"  type="text" name="mobile_telephone" value="<?php echo $employee_rel_mobile_tel; ?>">
			
				</div>
			</div>
			
		</div>
		
		
		<div class="row"><br>Health Information
			
			<div class="col-xs-12">
				<div class="col-xs-12">	
					Health problems or disabilities
					<br>
					
					<input type="radio" name="health" value="1" <?php if($employee_disabilities==1)echo 'checked'; ?>>Yes
					<input type="radio" name="health" value="0" <?php if ($employee_disabilities==0)echo 'checked'; ?>>No&emsp;&emsp;<br>										
					<input type="checkbox" name="skin" <?php echo $employee_skin; ?> > Skin problems&emsp;
					<input type="checkbox" name="diabetes" <?php echo $employee_diabetes; ?> > Diabetes &emsp;
					<input type="checkbox" name="breath" <?php echo $employee_breathing; ?> > Breathing problems&emsp;
					<input type="checkbox" name="epilipsey" <?php echo $employee_epilepsey; ?> > Epilepsy							
				</div>
				
			</div>
		</div>
		
		
	<div class="row"><br>Foreign Languages
			
			<div class="col-xs-12">
				<div class="col-xs-4" align="right">	
					Greek: <br>
					English: <br>
					French: <br>
					Russian: <br>
					<input type="text" style="width:100%;" placeholder="Other" name="langOther1" value="<?php echo $name1 ?>"><br>
					<input type="text" style="width:100%;" placeholder="Other" name="langOther2" value="<?php echo $name2; ?>"><br>
		
				</div>
				
				<div class="col-xs-8">
				
				<div>
					<input type="radio" name="grLan" value="4" <?php if($greek==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="grLan" value="3" <?php if($greek==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="grLan" value="2" <?php if($greek==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="grLan" value="1" <?php if($greek==1){echo 'checked';}?> >None 
				</div>
					
				<div>
					<input type="radio" name="enLan" value="4" <?php if($english==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="enLan" value="3" <?php if($english==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="enLan" value="2" <?php if($english==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="enLan" value="1" <?php if($english==1){echo 'checked';}?> >None 
				</div>
					
				<div>
					<input type="radio" name="frLan" value="4" <?php if($french==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="frLan" value="3" <?php if($french==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="frLan" value="2" <?php if($french==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="frLan" value="1" <?php if($french==1){echo 'checked';}?> >None 
				</div>
					
				<div>
					<input type="radio" name="ruLan" value="4" <?php if($russian==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="ruLan" value="3" <?php if($russian==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="ruLan" value="2" <?php if($russian==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="ruLan" value="1" <?php if($russian==1){echo 'checked';}?> >None 
				</div>
					
				<div>
					<input type="radio" name="o1Lan" value="4" <?php if($stat1==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="o1Lan" value="3" <?php if($stat1==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="o1Lan" value="2" <?php if($stat1==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="o1Lan" value="1" <?php if($stat1==1){echo 'checked';}?> >None 
				</div>
					
				<div>
					<input type="radio" name="o2Lan" value="4" <?php if($stat2==4){echo 'checked';}?> >Very Good &emsp;&emsp;
					<input type="radio" name="o2Lan" value="3" <?php if($stat2==3){echo 'checked';}?> >Good &emsp;&emsp;
					<input type="radio" name="o2Lan" value="2" <?php if($stat2==2){echo 'checked';}?> >Fair &emsp;&emsp;
					<input type="radio" name="o2Lan" value="1" <?php if($stat2==1){echo 'checked';}?> >None 
				</div>
				
				</div>
			</div>
			
			
			
		</div>
		
		
		<div class="row"><br>Diplomas
				<div class="col-xs-12">
					<textarea rows="4" cols="80" name="diploma"><?php echo $diploma; ?></textarea>
				</div>
		</div>
		
		<div class="row" align="center">
				<br><br>
				<input name = "new_employee" type="submit" onclick="return confirm('Update Selected employee?');" value="Submit">&emsp;&emsp;&emsp;&emsp;
				</form>
				<button type="button" onclick="self.close()">Cancel</button>
				
			
		</div>
		
			</div>
			
		
	
		

    </body>
	</html>
	
	
		<?php
	if(isset($_POST['new_employee']))
	{
		include '../model/edit_employee_function.php';
	}
	?>