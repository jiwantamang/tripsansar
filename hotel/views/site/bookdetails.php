<?php
use kartik\detail\DetailView;
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
// DetailView Attributes Configuration

// get all booking details


$booked_rooms = hotel\models\ReservationRoom::find()->where(['transaction_id'=>$model->transaction_id])->all();

$r = "";
foreach($booked_rooms as $room){
    $r = $r.'<b>Room No = </b>&nbsp &nbsp &nbsp '.$room->room_no.", &nbsp &nbsp &nbsp &nbsp &nbsp &nbspRs :".$room->rate.'<br>';
}

foreach($booked_rooms as $room){
    $rooms [] =  [
        'columns' => [
            [
                'attribute'=>'room_no', 
                'label'=>'Room no',
                'value'=>$room->room_no,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
             [
                'attribute'=>'rate', 
                
                'value'=>$room->rate,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
           
        ],
    ];
}


$customer = frontend\models\CustomerProfile::find()->where(['customer_id'=>$model->customer_id])->one();

$attributes = [
    [
        'group'=>true,
        'label'=>'CUSTOMER INFORMATION',
        'rowOptions'=>['class'=>'danger']
    ],
    [
        'columns' => [
            [
                'attribute'=>'customer_id', 
                'label'=>'Customer Name',
                'value'=>$customer->firstName.' '.$customer->middleName.' '.$customer->lastName,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
            
              [
                'attribute'=>'reservation_date', 
                'label'=>'Reservation Date',                 
                'value'=>$model->reservation_date,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
           
        ],
    ],
   
                        
    [
        'group'=>true,
        'label'=>'BOOKING DETAILS',
        'rowOptions'=>['class'=>'danger']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'label'=>'Transaction Id',
                'value'=>$model->transaction_id,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
             [
                'attribute'=>'reservation_date', 
                'label'=>'Reservation Date',                 
                'value'=>$model->reservation_date,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
           
        ],
    ],
    
     [
        'columns' => [
            [
                'attribute'=>'date_from', 
                'label'=>'Start From',
                 'value'=>$model->date_from,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
             [
                'attribute'=>'date_to', 
                'label'=>'Date To',                 
                'value'=>$model->date_to,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
           
        ],
    ],
    
     
     [
        'columns' => [
            [
                'attribute'=>'rooms', 
                'label'=>'Total Rooms',
                 'value'=>count($booked_rooms),
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
            
           
        ],
    ],
    
    [
        'group'=>true,
        'label'=>'Reserved Rooms ',
        'rowOptions'=>['class'=>'success']
    ],
    
    [
        'columns' => [
            [
                'attribute'=>'id', 
                'format'=>'raw',
               'label'=>'',
                'value'=>$r,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:300px']
            ],
            
           
        ],
    ],
  
     
   
      
];


// View file rendering the widget
echo DetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'mode' => 'view',
    'bordered' => 'bordered',
    'striped' => 'striped',
    'condensed' => 'condensed',
    'responsive' => 'responsive',
    'hover' => 'hover',
    'hAlign'=>'hAlign',
    'vAlign'=>'vAlign',
    'fadeDelay'=>'fadeDelay',
  
    'container' => ['id'=>'kv-demo'],
   // 'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
]);

?>

