<?php

use hotel\models\Reservation;
use hotel\models\Room;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<?php

$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/
$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });
});
EOF;
$this->registerJs($DragJS);

$JSCode = <<<EOF
    function(start, end) {
        //var title = prompt('Event Title:');
        start = start.format("YYYY-MM-DD HH:mm:ss");
        end = end.format("YYYY-MM-DD HH:mm:ss");
        //end = $.fullCalendar.formatDate(end, "YYYY-MM-dd HH:mm:ss");
        $('#calendar-starttime').val(start);
        $('#calendar-endtime').val(end);
        $('#myModal').modal('show');
        var eventData;
        if (title) {
            eventData = {
                title: title,
                start: start,
                end: end
            };
            $('#w0').fullCalendar('renderEvent', eventData, true);
        }
        $('#w0').fullCalendar('unselect');
    }
EOF;


$JSEventClick = <<<EOF
            function(calEvent, jsEvent, view) {
                //alert('Event: ' + calEvent.title + '  start'+calEvent.start+' end'+calEvent.end);
                
                $.ajax({
                    type:'POST',
                    url:'index.php?r=calendar/getevent',
                    data:{eid:calEvent.id},
                    success:function(response){
                        // show modal                                                
                        $('#event_details').modal('show');
                        $('#modal-body').html(response);
                        
                    },
                    error:function(reg,err){
                        alert("can not load the event");
                    }
                });
                
               // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
               // alert('View: ' + view.name);
                // change the border color just for fun
                $(this).css('border-color', 'red');
            }
EOF;

?>



?>



?>

<div class="site-index" style="background-color:white;">
  <br>
  <br>

  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height">
          <?= yii2fullcalendar\yii2fullcalendar::widget([
              'options' => [
                  'lang' => 'de',
                  //... more options to be defined here!
              ],
              'ajaxEvents' => Url::to(['/reservation/jsoncalendar'])
          ]);
          ?>
      </section><! --/wrapper -->


  </section><!-- /MAIN CONTENT -->

</div>
