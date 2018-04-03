function getProfileDetails(id){
    $('#profile_details').modal('show');
    $('.progress').css("display","block");
    $('#modal-body').html("");
    var value = id;    
    $.ajax({
        type: 'GET',
        url: 'profile?id=' + value,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
            
            //console.log(response);
            //$("#data-div").html(response);
            $('.progress').css("display","none");
            $("#modal-body").html(response);
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            $('.progress').css("display","none");
            console.log('Error: ' + err);
        }
    });
    
}

function viewProfileDetails(id){
    var value = id;
    $.ajax({
        type: 'GET',
        url: 'view?id=' + value,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
        console.log(response);
            $("#data-div").html(response);
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            console.log('Error: ' + err);
        }
    });
    
}

function submitProfileForm(){
    var form = $("#form-order-article");
            var formData = form.serialize();
            $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: formData,
                success: function (data) {
                     $("#data-div").html(data);
                },
                error: function () {
                    alert("Something went wrong");
                }
            });
}
//$('#form-order-article').on('beforeSubmit', function(e) {
//            
//        }).on('submit', function(e){
//            e.preventDefault();
//        });
//        

function changePic(id){
        $('#profile-modal').modal('show');
        $('.progress').css("display","block");
      var value = id;
    $.ajax({
        type: 'GET',
        url: 'changepic?id=' + value,
        dataType: 'html',
        success: function (response) {
            //$("#dynaentry").html().clean();
            //$("#dynaEntry").html();
        //console.log(response);
           $("#data-div").html(response);
          $('.progress').css("display","none");
          $('#profile-modal').modal('hide');
            //$('#abc').html(response);
        },
        error: function (reg, err) {
            $('.progress').css("display","none");
            console.log('Error: ' + err);
        }
    });
}