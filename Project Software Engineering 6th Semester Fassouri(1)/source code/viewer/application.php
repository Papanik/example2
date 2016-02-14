<?php
	include '../model/connect.php';
	include '../model/new_employee_function.php';

	

	session_start();


if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
}
else
{
	header("Location:login_form.php");
}

 ?> 
<!DOCTYPE html>



<link rel="stylesheet" href="viewer/css/style.css">
<html>


    <head>

    	

		
		
		<link rel="stylesheet" href="js/jqueryUI/jquery-ui.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/application.css">
        <title>Fasouri Waterpark - New Application </title>
		
   
		<script type="text/javascript" src="../new/1.8.3/jquery.min.js"></script >

		    <script language="javascript" type="text/javascript">
		        $(function () {
		            $("#fileupload").change(function () {
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

    </head>


    <body>
   

     <form method="post" enctype="multipart/form-data">
	<div class="container">

		<div class="row">Application <br><br><br>
			
			

				<div class="col-xs-6" align="right">	
					
						<span style="color:red;" id="errmsg"></span>
						<br>
						Name:
						<input type="text" required name="name" ID="textbox"  autofocus ><br>
						
						<span style="color:red;" id="errmsg1"></span>
						<br>					
						Surname:
						<input required type="text" name="surname" ID="textbox1">
						
						<br>
						<span  required style="color:red;" id="errmsg2"></span>
						<br>		
						Position:
						<input required type="text" name="position" ID="textbox2">						
					
				
				</div>


				<div class="col-xs-6" id="naProf" style="width:100px">	
				
				 <div>
			        <input id="fileupload" type="file" name="fileupload" multiple="multiple" />
			        <br />
			        <div id="dvPreview" style="width:100px;height:100px;">
					<img style="height:100px;width: 100px;"src="img/profDef.png">
			        </div>
    		</div>
				
				</div>
				
				
				
		</div>
		
	
		
		<div class="row"><br>General Information <span style="color:red;"> *Required </span>
			<div class="col-xs-12">	Home Address:<br>
				<textarea rows="2" cols="60" name="address" ></textarea><br><br>
			</div>
			
			<div class="col-xs-6">	

						Town:<span style="color:red;" id="errmsg3"></span>
						<br><input required type="text"  name="town" ID="textbox3" ><br>
						
						Date of Birth:
						<br><input required type="text" name="birth_date" id="date" placeholder="mm/dd/yyyy" ><br>
				
						Social Insurance Number:<span style="color:red;" id="errmsg4"></span>
						<br><input required type="text" name="sin" ID="textbox4">

			</div>
			
			<div class="col-xs-6">	
						Telephone Number:<span style="color:red;" id="errmsg5"></span>
						<br><input required type="text" name="telephone" ID="textbox5" ><br>

						Place of birth:<span style="color:red;" id="errmsg6"></span>
						<br><input required type="text" name="birth_place" ID="textbox6" ><br>

						I.D. card number:<span style="color:red;" id="errmsg7"></span>
						<br><input required type="text" name="idnum" ID="textbox7">
				
			</div>
			
		</div>
		
		
		
		<div class="row"><br>Contact person in case of emergency <span style="color:red;"> *Required </span>
			
			<div class="col-xs-12">
				<div class="col-xs-6">	
						Surname:<span style="color:red;" id="errmsg8"></span>
						<br><input required type="text" name="r_surname" ID="textbox8"><br>

						Name:<span style="color:red;" id="errmsg9"></span>
						<br><input required type="text" name="r_name" ID="textbox9">
						
						
						

				</div>
				
				<div class="col-xs-6">	
					Work Telephone Number:<span style="color:red;" id="errmsg10"></span>
					<br><input required type="text" name="work_telephone" ID="textbox10"><br>

					Home Telephone Number:<span style="color:red;" id="errmsg11"></span>
					<br><input required type="text" name="home_telephone" ID="textbox11"><br>

					Mobile Telephone Number:<span style="color:red;" id="errmsg12"></span>
					<br><input required type="text" name="mobile_telephone" ID="textbox12">
			
				</div>
			</div>
			
		</div>
		
		
		<div class="row"><br>Health Information <span style="color:red;"> *Required </span>
			
			<div class="col-xs-12">
				<div class="col-xs-12">	
					Health problems or disabilities 
					<br>
					
					<input type="radio" name="health" value="1">Yes
					<input type="radio" name="health" value="0">No&emsp;&emsp;<br>										
					<input type="checkbox" name="skin"  > Skin problems&emsp;
					<input type="checkbox" name="diabetes" > Diabetes &emsp;
					<input type="checkbox" name="breath" > Breathing problems&emsp;
					<input type="checkbox" name="epilipsey" > Epilepsy
					
		
				</div>
				
			</div>
		</div>
		
		
	<div class="row"><br>Foreign Languages <span style="color:red;"> *Required </span>
			
			<div class="col-xs-12">
				<div class="col-xs-4" align="right">	
					Greek: <br>
					English: <br>
					French: <br>
					Russian: <br>
					<input  type="text" style="width:100%;" placeholder="Other" name="langOther1"><br>
					<input type="text" style="width:100%;" placeholder="Other" name="langOther2"><br>
		
				</div>
				
				<div class="col-xs-8">
				
				<div>
					<input type="radio" name="grLan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="grLan" value="3">Good &emsp;&emsp;
					<input type="radio" name="grLan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="grLan" value="1">None
				</div>
					
				<div>
					<input type="radio" name="enLan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="enLan" value="3">Good &emsp;&emsp;
					<input type="radio" name="enLan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="enLan" value="1">None 
				</div>
					
				<div>
					<input type="radio" name="frLan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="frLan" value="3">Good &emsp;&emsp;
					<input type="radio" name="frLan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="frLan" value="1">None 
				</div>
					
				<div>
					<input type="radio" name="ruLan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="ruLan" value="3">Good &emsp;&emsp;
					<input type="radio" name="ruLan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="ruLan" value="1">None 
				</div>
					
				<div>
					<input type="radio" name="o1Lan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="o1Lan" value="3">Good &emsp;&emsp;
					<input type="radio" name="o1Lan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="o1Lan" value="1">None 
				</div>
					
				<div>
					<input type="radio" name="o2Lan" value="4">Very Good &emsp;&emsp;
					<input type="radio" name="o2Lan" value="3">Good &emsp;&emsp;
					<input type="radio" name="o2Lan" value="2">Fair &emsp;&emsp;
					<input type="radio" name="o2Lan" value="1">None 
				</div>
				
				</div>
			</div>
			
				
			
		</div>
		
		
		<div class="row"><br>Diplomas
				<div class="col-xs-12">
					<textarea rows="4" cols="80" name="diploma"></textarea>
				</div>
		</div>
		
		<div class="row" align="center">
				<br><br>
				<button name = "save" type="submit" value="Submit">Submit</button>&emsp;&emsp;&emsp;&emsp;
				<button name="access" type="submit" >Give Access</button>&emsp;&emsp;&emsp;&emsp;
				<button name="staff" type="submit" >Staff >></button>&emsp;&emsp;&emsp;&emsp;
				<button type="button" onclick="return confirm('Closing this Window\nwill cause nformation LOST',window.close())">Cancel</button>
				
				
		</div>
				
			</form>
	
		
		
			</div>
			
	
				
		

    </body>
	</html>
	
	<?php
	if(isset($_POST['new_employee']))
	{
		include '../model/new_employee_function.php';
	}
	?>