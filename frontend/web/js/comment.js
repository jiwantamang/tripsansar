$(document).ready(function(){
   $("#cmtBtn").on('click',function(){
        var cmt = $("#cmt").val();
        var hotelid = $("#hotelid").val();
        var userid = $("#userid").val();


           $.ajax({
               type: "POST",
               url: "comment",
               data: {cmt: cmt,hotelid:hotelid,userid:userid},
               success: function (test) {

                   if(test != 0){
                       alert(1);
                       var data='';
                       data += $('<div class="desc"><div class="thumb"><img class="img-circle" src="../images/profile.jpg" width="35px" height="35px" align=""></div><div class="details"><p><a href="#">DJ SHERMAN</a><br><muted>\'+test+\'</muted></p> </div> </div>');

                       //$('.ds > div:eq(0)').after(data);
                       //$(".desc").insertBefore(".ds div:eq(0)");
                       data.insertBefore(".ds div:lt(1)");


                    }else{
                       alert(test);
                   }

               },
               error: function (exception) {
                   alert(exception);
               }
           });
   });
});