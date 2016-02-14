window.fbAsyncInit = function() {
    FB.init({
        appId: '1469360673372624',
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true, // parse XFBML
        oauth: true,
    });




};




//login.html
function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Good to see you, ' + response.name + '.');
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

            if (response.status === 'connected') {
                login();
                console.log(response.id);
                session_data(response.id);

                //location.href="index.php";

            } else if (response.status === 'not_authorized') {
                login();

            }

            //if(response.status !='connected')
            else {
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


    });
});