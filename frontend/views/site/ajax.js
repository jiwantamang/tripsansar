$(document).ready(function(){
   $("#btnBookNow").click(function(){
                $('.progress').css("display","block");
                
                $('#book_process').modal('show');
                
//                $.ajax({
//                    type:'POST',
//                    url:'index.php?r=site/getbookdetails',
//                    data:{bid:calEvent.id},
//                    success:function(response){
//                        // show modal                                                
//                        $('.progress').css("display","none");
//                        $('#modal-body').html(response);
//                        
//                    },
//                    error:function(reg,err){
//                        $('.progress').css("display","none");
//                        alert("can not load the event");
//                    }
//                });
   });
});