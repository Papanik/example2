
//SESSION_DATA.....ELENXOS SPO TO LOGIN 
//SAVE_FBUSER....PERNI TA DEOMENA APO TON XRISTI POU KANI LOGIN ME TO KOUMPI FACEBOOKLOGIN
//PUSHFACEBOOKDATA...PERNI TA DEDOMENA TON XRISTON APO TO GUEST LIST KAI TA STELNI STI VASI
//PUSHGMAILDATA......PERNI TA DEDOMENA APO TON XRISTI P KANI LOGIN APO TO GMAIL KAI TA KATAXORI STI VASI
//PUSHTABLE....PERNI TA KATAXORIMENA DEDOMENA TON XRISTON TOU GMAIL APO TIN VASI KAI TA EPISTREFI STO PINAKA




function  save_fbuser(id,name,surname,email){
  $.ajax({
        type: "POST",
        url: "function/facebook_insert.php",
        data: {
            id:id,
            name:name,
            surname:surname,
            email:email,
            choice: 0   
        },
        cache: false,
        success: function (data) {
     console.log(data);

     //Kame oti thelis dame
        }

    });

   /**/}


function pushfacebookdata(photo,name,surname,id){
  $.ajax({
        type: "POST",
        url: "function/facebook_insert.php",
        data: {
            photo:photo,
            name:name,
            surname:surname,
            id:id,
            choice: 1   
        },
        cache: false,
        success: function (data) {
        console.log(typeof data);
        
      }

    });

   /**/}



function session_data(session_id){
  $.ajax({
        type: "POST",
        url: "function/facebook_insert.php",
        data: {
            session_id:session_id,
            choice: 2   
        },
        cache: false,
        success: function (data) {
          console.log(data);

     //Kame oti thelis dame
      }

    });

   /**/}




//gamil function login
function pushgmaildata(name,surname,email){
  $.ajax({
        type: "POST",
        url: "function/gmail_insert.php",
        data: {
            name: name,
            surname:surname,
            email: email,
            choice: 0
        },
        cache: false,
        success: function (data) {
     //console.log(data);

     //Kame oti thelis dame
        }

    });

   /**/}



   //gmail push data in database
   function pushtable(){
   var result;

  $.ajax({
        type: "POST",
        url: "function/gmail_getinfo.php",
        success: function(data) {
           
        //return(data); 
            console.log(data);
         // result = data;


        }
    
    });
   return result;

   /**/}
   //var result = pushtable();





function getfacebookdata(photo,name,surname,id){
  $.ajax({
        type: "POST",
        url: "function/facebook_insert.php",
        data: {
            choice: 3   
        },
        cache: false,
        success: function (data) {
        console.log( data);
        var obj = JSON.parse(data);
        

        $.each(obj, function(i,item)
        {
          console.log(i.name);

          var img = $('<img />', 
          { 
          id: '',
          src: item.photo,
          alt: 'MyAlt'
          });

          $('#table').bootstrapTable('append', {
                    "photo": '<img src="'+item.photo+'" >', 
                    "firstname": item.name,
                    "lastname": item.surname,
                    "email": "email"
          });


     //Kame oti thelis dame
        });

      }

    });

   /**/}



   function  insert_new_user(sex,name,surname,email){
  $.ajax({
        type: "POST",
        url: "function/_insert.php",
        data: {
            sex:sex,
            name:name,
            surname:surname,
            email:email,
            choice: 0   
        },
        cache: false,
        success: function (data) {
     console.log(data);

     //Kame oti thelis dame
        }

    });

   /**/}








