
//TIME PICKER
$(document).ready(function()
{   
    $(".timePicker").timepicker({
        timeFormat: 'h:mm:ss p',
       //showButtonPanel: true,
/*
         onClose: function(timeText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM-yy', new Date(month,year, 1)));
        }*/
        
    });

    
});


//MONTH PICKER
$(document).ready(function()
{   
    $(".datePicker").datepicker({
        dateFormat: 'MM-yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM-yy', new Date(month,year, 1)));
        }
    });

    $(".datePicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});



//REPORT
//MONTH PICKER
$(document).ready(function()
{   
    $(".monthPicker").datepicker({
        dateFormat: 'MM',
        changeMonth: true,
        //changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            //var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM', new Date("",month, 1)));
        }
    });

    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});

//YEAR PICKER

$(document).ready(function()
{   
    $(".yearPicker").datepicker({
        dateFormat: 'yy',
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            //var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('yy', new Date(year, 1)));
        }
    });

    $(".yearPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});