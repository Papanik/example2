


        window.fbAsyncInit = function() {
                FB.init({
                appId      : '457175741133821',
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : true  // parse XFBML
            });
}



                // Additional initialization code here
                FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    Friends();
                }
  
            });

                
            $(document).ready(function(){
              $('#fb-login').click(function(){
                console.log("click");
                //$("#dialog").dialog("open");
                //$('#myModal').modal('show');

                   FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    var friends_data = Friends();
                    console.log("click2"); 
                insert_data(friends_data);
                }
                else{
                  console.log("non connect");
                }

                           
                });
                //$( "#dialog" ).dialog( "open" );
               //$('#friends_popup').modal('show')
                

              });


            });
            

/*
          $(document).ready(function(){
              $('#complexConfirm').click(function(){
                console.log("click");
                FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    Friends();
                }
                else{
                  console.log("non connect");
                }


              });
                });

             $("#complexConfirm").confirm({  
                title:"Friends",
                text: "This is very dangerous, you shouldn't do it! Are you really really sure?",
                confirm: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                    alert("You just confirmed.");
                },
                cancel: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                    alert("You aborted the operation.");
                    console.log("cklic");
                },
                checkButton :"ChekAll",
                confirmButton: "Chek",
                cancelButton: "Cancel"
            });


              
            });*/

/*
              $(function() {
                $( "#dialog" ).dialog({
                  autoOpen: false,
                  show: {
                    effect: "blind",
                    duration: 2000
                  },
                  hide: {
                    effect: "explode",
                    duration: 2000
                  }
                });
             
                
                
                
              });*/
 
           


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
                    function getFriends() 

    {
      FB.api('/me/friends', function(response) {
      friendCount = response.data.length;
      $("h2").append(friendCount+ ' friends');
      if(response.data) {
        $.each(response.data,function(index,friend) {
          console.log('ta prwta dedomena',response);
            FB.api('/me/mutualfriends/'+friend.id, function(mutualfriends) {
            $("#results").append('<ul><li>' + friend.name + ' has id:' + friend.id + ' has mutual friends: ' + mutualfriends.data.length + '</li></ul>');
            $("#results").append('<img src="http://graph.facebook.com/' + friend.id + '/picture" />');
            });

        });
    } else {
        console.log("Error!");
    }
    });
    }

            function Friends() {
             

               FB.api('/me', function(response) {
                      $("#username").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>" );});



                FB.api('/me/taggable_friends?limit=5000' , function(response) {  //****limit=orio stous filous
                    if(response.data) {
                      return response.data;
                       
                        //$('.dialog').load('dialog.html', function() {
                            var $friends = $('#friends');
                            // Load all friends
                           /* $.each(response.data, function() {

                                var name = this.name.replace(/ /, '<br />');

                                console.log('ta data sto each',this);

                                $friends.append('<li data-id="'+this.id+'" data-name="'+this.name+'" ><img src="'+this.picture.data.url+'" > "'+this.name+'' +'"<input class="cb1-element" type="checkbox" id="'+this.id+'" name_friend="'+this.name+'"   ></p></li>');

                                //$(":checkbox").attr("name_friend");



                                  /*
                                      FB.api('/'+this.id+'/family', function(costas) 
                                      {                   
                                      
                                      console.log('ikogeneia',costas);                       
                                      });
                                      */



                            });
                          //});

   
                            }

                            else 
                            {
                                 alert("Error!");
                                  }
                                });

                /* make the API call */

                FB.api( '/me/mutualfriends' ,

                        {
                            "fields": "context.fields(all_mutual_friends.limit(100))"
                        },

                        function (response) {
                            console.log('dame',this);
                            if (response && !response.error)
                            {

                                alert("Id: " + $(this).attr("fields") );
                            }
                        });


            }
            
              
            // Load the SDK Asynchronously
            (function(d){
                var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                ref.parentNode.insertBefore(js, ref);
            }(document));
        


