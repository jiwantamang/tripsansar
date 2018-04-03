function ajaxHotelRoom() {
    // get all the checked rooms
    var rooms = $('input[type="checkbox"]:checked');
    if(rooms.length === 0){
        alert("Please select at least one room");
        return;
    }
    $(".progress").css("display","block");
    $("#btn-next").addClass("disabled");
    
    var hotel_id = $('#hotel_id').val();
    var user_id = $('#user_id').val();
    var check_in = $('#check_in').val();
    var check_out = $('#check_out').val();
    
    var roomstr="";
    

    rooms.each(function () {
        roomstr += $(this).val()+" ";
    });
    roomstr.trim();
    console.log(roomstr);

    $.ajax({
        type: 'GET',
        url: 'getrooms?val=' + roomstr + '&val1=' + hotel_id + '&val2='+user_id +'&val3='+check_in+'&val4='+check_out,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
            $("#contentdiv").html(response);
            $("#btn-next").removeClass("disabled");
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            $(".progress").css("display","none");
            $("#btn-next").removeClass("disabled");
            console.log('Error: ' + err);
        }
    });
}

function ajaxPayment(id){

    var value = id;
    $.ajax({
        type: 'GET',
        url: 'payment?val=' + value,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
        console.log(response);
            $("#contentdiv").html(response);
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            console.log('Error: ' + err);
        }
    });
}

function ajaxPaymentProfile(id)
{
    
    var value = id;
    
    
    $(".progress").css("display","block");
    
//    $.ajax({
//        type: 'GET',
//        url: 'paymentprofile?val=' + value,
//        dataType: 'html',
//        success: function (response) {
//            //$("#dynaentry").html().clean();
//            //$("#dynaEntry").html();
//        console.log(response);
//            $("#contentdiv").html(response);
//            //$('#abc').html(response);
//        },
//        error: function (reg, err) {
//            console.log('Error: ' + err);
//        }
//    });
    
    
   // var title = $("#tasktable-task_title").val();
    
    $.ajax({
        type: 'POST',
        url: 'paymentprofile?val=' + value,
        data: $("#profileForm").serialize(),
        dataType:'html',
        success: function (response) {

            $("#contentdiv").html(response);

        },
        error: function (reg, err) {
            console.log('Error: ' + err + reg);
            $(".progress").css("display","none");
        }
    });
    console.log($("#profileForm").serialize());
    
}

function ajaxPaymentMethod(id){

    $(".progress").css("display","block");
    var value = id;
    var paymentMethod = $('input[name=options]:checked').val();
        
    $.ajax({
        type: 'GET',
        url: 'paymentmethod?val=' + value +"&type="+paymentMethod,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
        console.log(response);
            $("#contentdiv").html(response);
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            $(".progress").css("display","none");
            console.log('Error: ' + err);
        }
    });
}





