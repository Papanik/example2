 $("#baseDiv").click(function(e) {
    $("#popUpDiv").show();
 });

 
 $("#popupSelect").change(function(e) {
    $("#baseDiv").html($("#popupSelect").val());
    $("#popUpDiv").hide();
 });​