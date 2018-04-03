<?php
use yii\grid\GridView;
use yii\helpers\Html;
    
$dataProvider = new yii\data\ActiveDataProvider([
   'query'=> hotel\models\HotelGallary::find()->where(['hotel_hotel_id'=>Yii::$app->user->identity->hotelid]),
    'pagination' => [
        'pageSize' => 10,
    ],
]);

?>

<section id="main-content">
    <section class="wrapper site-min-height">
        

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'=>[
        [
            'class'=>'yii\grid\SerialColumn'
        ],
        [
            'header'=>'Image',
            'format'=>'html',
            'value'=> function($model, $key, $index, $column){
                return Html::img('https://hotel.tripsansar.com/upload/hotel_gallary/hotel_gallary_thumbnail/'.$model->image_name,['width'=>100]);
            }
            ],
       
         [
            'class' => 'yii\grid\ActionColumn',
             'template' => '{delete}'
            // you may configure additional properties here
        ],
    ],
]);

?>

    </section>
</section>