<?php

use yii\helpers\Url;
use yii\web\JsExpression;
use yii2fullcalendar\models\Event;
use yii\bootstrap\Modal;
use frontend\models\CustomerProfile;

//$sql = "select count(id) from reservation where status='reserved' || status='paid'";

$paidbooking = \hotel\models\Reservation::find()->where(['status'=>'paid'])->count();
$reservedbooking = \hotel\models\Reservation::find()->where(['status'=>'reserved'])->count();
$totalbooking = \hotel\models\Reservation::find()->count();



?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <h1>

                  DASHBOARD
              </h1>
              <div class="row">


                  <div class="col-md-8 col-sm-8 mb col-md-offset-2">
                      <div class="darkblue-panel">
                          <div class="darkblue-header">
                              <h5>BOOKING</h5>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="darkblue-header">
                                      <h6>PAID</h6>
                                      <h1><?php
                                          echo $c = count($paidbooking) > 0 ? $paidbooking: 0;
                                          ?></h1>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="darkblue-header">
                                      <h6>RESERVED</h6>
                                      <h1><?php
                                          echo $c = count($reservedbooking) > 0 ? $reservedbooking : 0;
                                          ?></h1>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <p>TOTAL BOOKING</p>
                                  <h1> <?php echo $totalbooking; ?></h1>
                              </div>
                          </div>


                      </div><!-- -- /darkblue panel ---->
                  </div><!-- /col-md-4 -->


              </div>
              
              <div class="row" style="margin:5%;">
                  
     <?php
//    $events = [
//        new Event([
//            'title' => 'Appointment #' . rand(1, 999),
//            'start' => '2016-03-18T14:00:00',
//        ]),
//        // Everything editable
//        new Event([
//            'id'               => uniqid(),
//            'title'            => 'Appointment #' . rand(1, 999),
//            'start'            => '2016-03-17T12:30:00',
//            'end'              => '2016-03-17T13:30:00',
//            'editable'         => true,
//            'startEditable'    => true,
//            'durationEditable' => true,
//        ]),
//        // No overlap
//        new Event([
//            'id'               => uniqid(),
//            'title'            => 'Appointment #' . rand(1, 999),
//            'start'            => '2016-03-17T15:30:00',
//            'end'              => '2016-03-17T19:30:00',
//            //'overlap'          => false, // Overlap is default true
//            'editable'         => true,
//            'startEditable'    => true,
//            'durationEditable' => true,
//        ]),
//        // Only duration editable
//        new Event([
//            'id'               => uniqid(),
//            'title'            => 'Appointment #' . rand(1, 999),
//            'start'            => '2016-03-16T11:00:00',
//            'end'              => '2016-03-16T11:30:00',
//            'startEditable'    => false,
//            'durationEditable' => true,
//        ]),
//        // Only start editable
//        new Event([
//            'id'               => uniqid(),
//            'title'            => 'Appointment #' . rand(1, 999),
//            'start'            => '2016-03-15T14:00:00',
//            'end'              => '2016-03-15T15:30:00',
//            'startEditable'    => true,
//            'durationEditable' => false,
//        ]),
//    ];
     
     // get bookings from reservation table related with this hotel
     
    $booked_rooms = \hotel\models\Reservation::find()->where(['hotelid'=>Yii::$app->user->identity->hotelid])->all();
    $books = [];
    foreach($booked_rooms as $book)
    {
                
        
        $db = CustomerProfile::find()->where(['customer_id'=>$book->customer_id])->one();
        $event = new Event();
        $event->id = $book->id;
        $event->title = $db->firstName.' '.$db->middleName.' '.$db->lastName.' &nbsp &nbsp('.$book->status.')';
        $event->start = $book->date_from;
        $event->end = $book->date_to;
        $event->color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        $books[] = $event;
    }
    
    
    
?>
                  
    <?php
                  
        
            $JSEventClick = <<<EOF
            function(calEvent, jsEvent, view) {
                //alert('Event: ' + calEvent.title + '  start'+calEvent.start+' end'+calEvent.end);                
                $('.progress').css("display","block");
                $('#modal-body').html("");
                $('#event_details').modal('show');
                
                $.ajax({
                    type:'POST',
                    url:'index.php?r=site/getbookdetails',
                    data:{bid:calEvent.id},
                    success:function(response){
                        // show modal                                                
                        $('.progress').css("display","none");
                        $('#modal-body').html(response);
                        
                    },
                    error:function(reg,err){
                        $('.progress').css("display","none");
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

 <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $books,
     'header'=>[
       'right'=>'month'  
     ],
      'clientOptions' => [
                    'selectable' => true,
                    'selectHelper' => true,
                    'droppable' => true,
                    'editable' => true,

                    //'select' => new JsExpression($JSCode),
                    'eventClick' => new JsExpression($JSEventClick),
                    'defaultDate' => date('Y-m-d')
                ],
        ));

 ?>
                  
   <?php
    Modal::begin([
        'id' => 'event_details',
        'header' => '<h4 style="color:black;margin:0px">Booking Details</h4>',
        'options'=>[
                'tabindex' => false,
                'class'=>'modal'

            ],
        'footer'=>'<div class="progress" style="display:none">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"/>
          </div>',
        'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],
    ]);
    ?>
    <div id="modal-body">
          
    </div>
    <?php
    Modal::end();
    ?>
                
                  
              </div>
          </section>

      </section>




	<script type="application/javascript">

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
