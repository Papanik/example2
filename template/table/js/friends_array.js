/////////////////////login facebook/////////////////////////////////////////////     
window.fbAsyncInit = function() {
    FB.init({
        appId: '1469360673372624',
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true, // parse XFBML
        oauth: true,
    });




};
// Load the SDK Asynchronously
(function(d) {
    var js, id = 'facebook-jssdk',
        ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));


function Login() {
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Good to see you, ' + response.name + '.');
            });
            location.href="index.php";
        } 
        else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {
        scope: 'email,user_photos,publish_actions,user_friends'
    });
}



$(document).ready(function() {
    $('.fblogin').unbind().click(function(e) {
       e.preventDefault();
        //var pent=$(this).
        //load image

        FB.getLoginStatus(function(response) {


            if (response.status === 'connected') {



                swal({  
                 title: "Ajax request example",  
                  text: "Submit to run ajax request",  
                  type: "info",
                  
                  showCancelButton: false,   
                  closeOnConfirm: false,   
                  showLoaderOnConfirm: true, }, 
                  function()
                  {   
                    
                   
                    Friends();
                     swal({ 
                      title: "Auto close alert!",   
                      text: "I will close in 2 seconds.",   
                      timer: 2000, 
                      

                  });
                 
                   

                 });


                /*waitingDialog.show();
                setTimeout(function() {
                    waitingDialog.hide();
                    Friends();
                    //gmail_gontacts(response);
                });*/
                //Friends();
                //getFriends();
                //console.log("click2");  
            } else {
                Login();
                Friends();
                //getFriends();

            }

        });

        //console.log("click");

        //$( "#dialog" ).dialog( "open" );
        //$('#friends_popup').modal('show')

    });


});
       


/*

             function init() 
             {
                FB.api('/me', function(response) {
                      $("#username").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>");


                    
                      $("#jfmfs-container").jfmfs({ 
                          max_selected: 15, 
                          max_selected_message: "{0} of {1} selected",
                          friend_fields: "id,name,last_name",
                          pre_selected_friends: [1014025367],
                          exclude_friends: [1211122344, 610526078],
                          sorter: function(a, b) {
                            var x = a.last_name.toLowerCase();
                            var y = b.last_name.toLowerCase();
                            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                          }
                      });
                      $("#jfmfs-container").bind("jfmfs.friendload.finished", function() { 
                          window.console && console.log("finished loading!"); 
                      });
                      $("#jfmfs-container").bind("jfmfs.selection.changed", function(e, data) { 
                          window.console && console.log("changed", data);
                      });                     
                      
                      $("#logged-out-status").hide();
                      $("#show-friends").show();
  
                  });


                    }

                         $("#show-friends").live("click", function() {
                    var friendSelector = $("#jfmfs-container").data('jfmfs');             
                    $("#selected-friends").html(friendSelector.getSelectedIds().join(', ')); 
                });    
*/
/*
     function getFriends() 

     {
       FB.api('/me/mutualfriends', function(response) {
       friendCount = response.data;
       $("h2").append(friendCount+ ' friends');
       if(response.data) {
         $.each(response.data,function(index,friend) {
           //console.log('ta prwta dedomena',response.data);
             FB.api('/me/mutualfriends/'+friend.id, function(mutualfriends) {
            // $("#results").append('<ul><li>' + friend.name + ' has id:' + friend.id + ' has mutual friends: ' + mutualfriends.data.length + '</li></ul>');
             //$("#results").append('<img src="http://graph.facebook.com/' + friend.id + '/picture" />');
             console.log('mutualfriends',mutualfriends);
             });

         });
     } else {
         console.log("Error!");
     }
     });
     }*/

      function Friends() {


          var id = 0;

          function getRows() {
              var rows = [];
              for (var i = 0; i < 10; i++) {
                  rows.push({
                      id: id,
                      name: 'test' + id,
                      price: '$' + id
                  });
                  id++;
              }
              return rows;
          }
          //             nit table use data


          $('#get-selections').click(function() {
              //alert();
              alert('Selected values: ' + JSON.stringify($table.bootstrapTable('getSelections')));
              alert($table.bootstrapTable('data-total-rows'))
          });



          FB.api("/me/taggable_friends", function(response) {
              if (response && !response.error) {

              }
              //console.log('me/friends',response);
          });

          FB.api('/me?field=id,name,email', function(response) {
              //console.log(userInfo.name + ': ' + userInfo.email);
                console.log('costas',response);
          });


          FB.api('/me/taggable_friends?limit=10?field=id,name,email', function(response) {

              if (response.data) {
                console.log('data',response);

                   $.each(response.data, function() {

                      var name = this.name;
                      var name_surname = name.split(' ');
                      pushfacebookdata(this.picture.data.url, name_surname[0], name_surname[1],this.id); //apostoli dedomenon sto pushfacebookdata
                      //pushtable(name_surname[0],name_surname[1]);


                      $table = $('#table').bootstrapTable({
                          data: getRows()
                      });
                      //console.log('ola ta dedomena',this.picture.data.url,this.id);
                        //echo'1';
                  });


                      getfacebookdata();



              } else {
                  console.log("Error!");
              }
          });

          /* make the API call */


          FB.api('/me/mutualfriends',

              {
                  "fields": "context.fields(all_mutual_friends.limit(1000))"
              },

              function(response) {
                  console.log('dame', this);
                  if (response && !response.error) {

                      alert("Id: " + $(this).attr("fields"));
                  }
              });
        }


//login.html
function logindata() {
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Good to see youuuuu, ' + response.name + '.');
                var name = response.name;
                var name_surname = name.split(' ');
                //name_surname[0],name_surname[1],


                //dwse email
                if (!response.hasOwnProperty('email')) {
                    swal({
                            title: "Insert your email!",
                            //text: "Insert your email:",  
                            type: "input",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            animation: "slide-from-top",
                            inputPlaceholder: "Write something"
                        },

                        function(inputValue) {
                            if (inputValue == "") {

                                swal.showInputError("You need to write something!");
                                return false;
                            } else {

                                if (inputValue.indexOf("@gmail.com") > -1)

                                {
                                    email = inputValue;
                                    swal("Nice!", "You wrote: " + inputValue, "success");
                                    //swal("Good job!:" + inputValue,  "You clicked the button!","success");
                                    location.href = "index.php";

                                    //swal("Nice!", "You wrote: " + inputValue, "success");

                                    save_fbuser(response.id, name_surname[0], name_surname[1], email);
                                }
                                /*
                                setTimeout(function()
                                {
                                  location.href="index.php";
                                },2000);  */
                                else {
                                    swal.showInputError("You need to write a valid email!");
                                    return false
                                }

                            }
                            console.log(email);

                        });
                    //location.href="index.php";
                } else {
                    email = response.email;
                    location.href = "index.php";
                }


            });



        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {
        scope: 'email,user_photos,publish_actions,user_friends'
    });
}




$(document).ready(function() {
    $('#loginpage').bind().click(function() {
        FB.getLoginStatus(function(response) {

            if (response.status === 'connected') 
            {
               FB.api('/me', function(response) {
                console.log('costas',response);
                session_data(response.id);

                location.href="index.php";

              });
                

            } else if (response.status === 'not_authorized') {
                logindata();
                

            }

            //if(response.status !='connected')
            else {
              //Login();
                //location.href="index.php";
                /*
                         Login(response);
                         console.log('enter');
                         if (response.status == 'connected') 
                         {
                          console.log('enter1');
                          location.href="index.php"
                        } */

            }

        });


    });
});









