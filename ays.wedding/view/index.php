<?php
session_start();
//if(!isset($_SESSION['user_id'])){
 //   header('Location:login.php');
//}
?>

<!doctype html>
<html >
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/facebook.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.icon-large.min.css">
     <!--link rel="stylesheet" type="text/css" href="css/bootstrap-angual.css"-->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!--link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" /-->
   

   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   
 
    <script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
    <script type="text/javascript" src="js/bootstrap.js"></script>
     <script type="text/javascript" src="js/run_prettify.js"></script>
    <script type="text/javascript" src="js/jquery.facebook.multifriend.select.js"></script>
    <script type="text/javascript" src="js/friend-select.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>

 
     
    <script type="text/javascript" src="js/friends_array.js"></script>
     <script type="text/javascript" src="js/javascript_function.js"></script>
  
    <script type="text/javascript" src="js/bootstrap-table.js"></script>
    <script type="text/javascript" src="js/bootstrap-table.min.js"></script>
    <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script> <!--facebook connect -->
    <script type="text/javascript" src="js/gmail_login.js"></script><!-- Login with gmail -->
    <script src="https://apis.google.com/js/client.js"></script>
  
    <!--script type="text/javascript" src="js/gmail_tabledata.js"></script><!-- get data from base  -->

    <script type="text/javascript" src="js/loading_bootstrap.js"></script>
    <script type="text/javascript" src="js/javascript_function.js"></script>
    <script type="text/javascript" src="js/table.js"></script>

    
    

    
    <!--script type="text/javascript" src="js/gmailjavascript.js"></script><!--
    
    

   
    <!--script type="text/javascript" src="js/facebook-login.js"></script--> 
    <!--script src="https://code.jquery.com/jquery-1.9.1.min.js"></script-->
   
    
   

    

    <!--script src="js/classie.js"></script>
    <script src="js/modalEffects.js"></script-->
   
</head>
<body>
<p id="<?php echo $_SESSION['user_id'] ?>"></p>
<!--/////////////////////////////////
////// Kirio meros
/////////////////////////////////-->
                         
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown("toggle");
});
</script>

  <!--div class="container"-->
   <header>
  
    <div class="container">



  
</div>
        <nav class="navbar navbar-default">
        <div class="container-fluid">


        <!--top bar-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <nav class="top-bar hide-for-small" style="" data-topbar="">
                <ul class="title-area" style="z-index: 1">


               
                    

                </ul>

                
           
                    
                
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
              <!-- <li><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <!-- <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>-->

                </ul>
              </li>
            </ul>
            <!--form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <!-- <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li> -->
                </ul>
              </li>
            </ul>
            </nav>




          </div><!-- /.navbar-collapse -->
          
          
          



        </div><!-- /.container-fluid -->
      </nav>

      </header>
  
  
    <div class="row">           <!-- Navigation bar -->
       
    </div>
    
    <div class="row">
      <div class="formTitle">Wedding</div><br><br>
    </div>
    
    <div class="row">                 
      <div class="col-xs-3" align="center">
      <form  method="post">
      <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Actions</div>

                  <table>
                    <tbody>
                    <tr>
                      <td>
                            <div class="dropdown">
                            <img src="img/add.png" alt="Import" style="width:30px;height:30px">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add Guests</a>

                          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a  class="gmail_login "role="menuitem" tabindex="-1" >Import From Gmail</a</li>
                            <li role="presentation"><a  class="fblogin" role="menuitem" tabindex="-1" href="#"  >Import From Facebook </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Import From Excel</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Guest Manually</a></li>    
                          </ul>
                          </div>
                        
                          <br>

                          <!--START  ORGANIZE   LIST    -->
                            <img src="img/Organize.png" alt="Import" style="width:30px;height:30px">
                           <a onclick="Organize" class="dropdown-toggle" data-toggle="dropdown" href="#">Organize Guest List</a>

                           <br><br>


                           <!--END ORGANIZE LIST-->


                           


                           <!--START  COLLECT MAILIN      -->
                            <img src="img/collect.png" alt="Import" style="width:30px;height:30px">
                           <a onclick="Collect" class="dropdown-toggle" data-toggle="dropdown" href="#">Collect Mailing Addresses</a>

                           <br><br>


                           <!--END COLLECT MAILING -->





                           <!--START  CREATE SEATING CHART  -->
                          <img src="img/create.png" alt="Import" style="width:30px;height:30px">
                           <a onclick="window.open('seatingChart.html','_blank');"  class="dropdown-toggle" data-toggle="dropdown" href="#">Create Seating Chart</a>


                           <!--END CREATE SEATING CHART-->
                           </td>
                      
                    </tr>
                      
                    </tbody>
                  </table>
            
                

                    <button onclick='window.open("functions/new_machinery_section.php", "newwindow", "width=500, height=500");' id="shortcutbutton" class="btn"  title="Shortcut to Maintenance date">...</button>

                    <br><br><br>


                
                    <br><br>
                     <br><br>  
        



        
                  <!-- Default panel contents -->
                    <div class="panel-heading"></div>

                     

            </div>  
          
                </form>     
            </div>

   <!-- --------------------------------------------END ACTION ------------------------------------------------------------------ -->




   <!-- ----------------------------------------GUEST ------------------------------------------------- -->


      <div class="col-xs-9">
<!--button id="gmail_login"  >Get my contacts</button-->
 
                <div class="col-xs-4" align="center">
                  <form method="post">
                   <div class="panel panel-default">
                   <br>
                    <p class="dashboard-box">number</p> <!--ari8mos kalesmenon -->
                    <!-- Default panel contents -->
                      <div class="dashboard-box-number">Total Guests</div>
                    
                    <div class="btn" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Guest
                      <span class="caret"></span></a>

                          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a class="gmail_login"  role="menuitem" tabindex="-1" href="#">Import From Gmail</a></li>
                            <li role="presentation"><a  class="fblogin" role="menuitem" tabindex="-1" href="#"  >Import From Facebook </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Import From Excel</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Guest Manually</a></li>    
                          </ul>


                              <!-- pop up gia filous-->

                    </div>


                 

               <!-- -------------------------  pop up -------------------------------------------------- >


                            <!--dialog.html   Qjuery     -->
                            <!--div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <!--div class="modal-header">
                                  <!--div class="modal fade" id="myModal" >
                                  <!--div class="modal-dialog" -->
                                    <!--div class="friends-title">Friends</div-->
                                      <!--div class="friends-container">
                                        <div class="friends-header">
                                        <input type="text" class="find form-control" placeholder="Username" aria-describedby="basic-addon1"
                                             value="Search all friends" onfocus="if (this.value==this.defaultValue) this.value = ''"onblur="if (this.value=='') this.value = this.defaultValue"/>
                                        </div>
                                          <div class="friends">
                                            <ul id="friends"></ul>            
                                          </div>
                                            <div class="friends-bottom">
                                              <input type="submit" class="cancel" value="Cancel"/>
                                              <button  class="submit" id="button1" >chek </button>
                                              <input type="button" class="btn-primary btn-mini" id="check1" value="Check All"/>
                                              <input type="button" class="btn-primary btn-mini" id="uncheck1" value="Unchek All"/>
                                            </div>
                                        </div>                     
                                   <!--/div-->
                                </div>
                              </div>
                             <!--/div>


                        


                   <!-- -------------------------End  pop up -------------------------------------------------- >






    
                      <br><br>
  
     
                      <div class="panel-heading"></div>

                
                     
                    </div>     
                
                  </form>
                
                




   <!-- ---------------------------------------- END GUEST ------------------------------------------------- -->
      
      

   

   <!-- ----------------------------------------GUEST MAIL ------------------------------------------------- -->
            
                <div class="col-xs-4" align="center">
                  <form method="post">
                     <div class="panel panel-default">

                      <!-- Default panel contents -->
                      <div id="maling-addresses-box" class="dashboard-box">
                        <p class="dashboard-box-number">number</p>
                        <p>Mailing Addresses
                        <br>
                        Collected</p>
                        <div class="guestlist-button guestlist-button-small">
                          <a href="#" onclick=""></a>
                        </div>
                      </div>
                
                    
                       <br><br>
     
      
                      <div class="panel-heading"></div>     

                         
                   
                    </div> 
                
              
                     <div class="gene_list">
                      <ul>
                        
                      </ul>
                     </div>
                     </form> 
                  </div>
            
               
                
    <!-- ----------------------------------------END GUEST MAIL ------------------------------------------------- -->


    





    <!-- ----------------------------------------GENERATOR ------------------------------------------------- -->
            
                    <div class="col-xs-4" align="center">

                       <form method="post"> 
                        <div class="panel panel-default">
                         <!-- Default panel contents -->
                        <div class="panel-heading">Generator</div>
                  
                      
                         <br><br>
       
        
                          <div class="panel-heading"></div>     

                           
                     
                      </div> 

                            <div class="task_list">
                                <ul>

                                      
                                </ul>
                            </div>
                         
                        </form>
                       
                         
                    </div>





            </div>


                  <div id="rsvp-box">
                  <div class=" panel-default">
                    <h2>RSVPs</h2>
                    <div id="gl-rsvp-progress">
                      <div id="rsvp-invites">Out of guest</div>
                      <div id="rsvp-base-bar"></div>
                      <div id="rsvp-accept-bar"></div>
                      <div id="rsvp-decline-bar"></div>
                      <div id="rsvp-stats"></div>
                       <span class="gl-accept"></span>
                        accepted
                        <span class="gl-decline"></span>
                        declined
                        <span>number</span>
                        unanswered
                    </div>
                    </div>
                  </div>


                <div id="datatable" class="tadatable" role="grid">
                  <div id="pull-right"></div>
                </div>
  </div>





        <div id="fb-root"></div>
        <div class="dialog"></div>
        <div id="username"></div> 

           <div class="btn-group">
              <button class="btn btn-default" id="get-selections">Get Selections</button>
              <button class="btn btn-default" id="insert-row">Insert Row</button>

              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Add </button>

              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                       
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                    <ul class="radio">

                    <li><input type="radio" name="delivery" id="male" value="male" /><label for="del1">Male</label></li> 
                    <li><input type="radio" name="delivery" id="female" value="female" /><label for="del2">Female</label></li> 
                     </ul>
                    <input type="text" name='name0' id="add_name"  placeholder='Name' class="form-control" value="" />
                       
                       <input type="text" name='name0' id="add_surname" placeholder='Surname' class="form-control" value="" />
                       <input type="text" name='name0' id="add_email" placeholder='Email' class="form-control" value="" />
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="inviteRequest">Save changes</button>
                    </div>
                  </div>
                  
                </div>
              </div>





                <button id='delete_row' class="pull-right btn btn-default">Delete Row</button> 
              
          </div>
           <script>


            $(function() {
                $('#inviteRequest').click(function(){
                  var sex;
                 if($('#male').is(':checked')) 
                 { 
                     sex='male';
                     photo= '<a > <span class="glyphicon glyphicon-user"></span>  </a>';


                  alert("it's checked"); 
                }
                else
                {
                  sex='female';
                  photo= '<a > <span class="glyphicon glyphicon-user"></span>  </a>';
                }

                  
                  var name=$('#add_name').val();
                  var surname=$('#add_surname').val();
                  var email=$('#add_email').val(); 
                

                $('#table').bootstrapTable('append', 
                {
                "photo": photo ,
                "firstname": name, 
                "lastname": surname, 
                "email": email 
                
              });


                    insert_new_user(sex,name,surname,email);//ajax


                });
            });



            $('#insert-row').click(function () {
              $('#table').bootstrapTable('append', 
                {
                "photo": 0, 
                "firstname": "<input class='panel-default' type='text'>", 
                "lastname": "<input class='panel-default' type='text'>", 
                "email": "<input class='panel-default' type='text'>" 
                
              });
          });
              </script>


                                          
              <table
               
                 id="table"
  	             data-toolbar="#toolbar"
  		           data-show-toggle="true"
  		        
  		           data-show-export="true"
  		           data-detail-view="true"
  		           data-detail-formatter="detailFormatter"


                 data-toggle="table"
                 data-click-to-select="true"
                 data-show-columns="true"
                 data-search="true"
                 data-pagination="true" 
                 data-page-list="[10, 25, 50, 100, ALL]">

                <thead>
     
                      <th data-field="state" data-checkbox="true"></th>
                      <th data-field="photo">Photo</th>
                      <th data-field="firstname">Firstname</th>
                      <th data-field="lastname">Lastname</th>
                      <th data-field="email">Email</th>

                </thead>

                <tbody>
                 <tr id='addr0'>
                      <td>
                        1
                      </td>
                        <td>
                        <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                        </td>
                        <td>
                        <input type="text" name='mail0' placeholder='Mail' class="form-control"/>
                        </td>
                        <td>
                        <input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>
                        </td>
                      </tr>
                    <tr id='addr1'></tr>
                  
                </tbody>
                                                          
              </table>

              
              
           
           




  <!--/div-->


</body>

</html>