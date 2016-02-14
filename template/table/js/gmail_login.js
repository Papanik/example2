       
        //<script type="text/javascript">
       var clientId = '276566624751-uq4dgt76411r0d8emc6aq1hd7839quc0.apps.googleusercontent.com';

      var scopes = ['https://www.googleapis.com/auth/contacts.readonly'];
       var apiKey = 'AIzaSyA_DVcqBwLuIgAiEpWUk5_G3YCpxJ1Lvtg';

        


      //$(document).ready(function(){
        //      $('#gmail_login').bind().click(function(){
      $(document).on("click",".gmail_login", function(){

            //nclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);"
            gapi.client.setApiKey(apiKey);
            window.setTimeout(authorize);
            
            
            });
        //});



      function authorize() {
            gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
          }



      
      function handleAuthorization(authorizationResult) {
            if (authorizationResult && !authorizationResult.error) {
              //https://www.google.com/m8/feeds/contacts/default/full?v=3.0&alt=json&max-results=@{limit|1000}&start-index=@{start|1}
              //$.get(https://www.google.com/m8/feeds/contacts/default/full?v=3.0&alt=json&max-results=@{limit|1000}&start-index=@{start|1)
              $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",

                function(response){

                  //process the response here
                  //console.log('gia ka8e xristi',response);
                  waitingDialog.show();setTimeout(function() 
                    {
                      waitingDialog.hide();
                      gmail_gontacts(response);
                      //gmail_gontacts(response);
                    });
                 
                });
            }
          }
             
               
          


    function gmail_gontacts(response) {
      var data=[];
      data = response.feed.entry;
      //console.log("dedomena",data);
      
      $.each(data, function(i, item) {
        if(data[i].hasOwnProperty("gd$email")){
          var a=0;
          var email=data[i].gd$email[a].address;
          var id=data[i].id.$t;
          a++;

          //console.log('ta email',email);
          //console.log('ta id',id);

        }
          

          /*$.get("https://www.google.com/m8/feeds/photos/media/"+email+"/full/"+id, 
              function(response){
                  conlose.log('ta dedomena tou photo0',response);
              });*/
          
          if(data[i].hasOwnProperty("gd$name")){
           
              var name=data[i].gd$name.gd$fullName.$t;
              var name_surname= name.split(' ');
              //if(name_surname[0])
              $('#table').bootstrapTable('append', {"photo": "...........", "firstname": name_surname[0], "lastname": name_surname[1], "email": email});
              pushgmaildata(name_surname[0],name_surname[1],email);
              //console.log('name',name);
          }

          else {
                data[i]++;
          }



      });
  }




