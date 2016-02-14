 function guest_list(){
   var result;

  $.ajax({
        type: "POST",
        url: "function/gmail_getinfo.php",
        success: function(data) {
          var obj = JSON.parse(data);
           
       console.log(obj);

          //$.each(obj,function(i, item) {
            
           myGuests.model = new go.GraphLinksModel(obj);
          //});
      }
    
    });
   
    // specify the contents of the Palette
    
  }
