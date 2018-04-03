<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel hotel\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservations';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="reservation-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Reservation', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

               //     'id',
               //     'price_per_day',
                    [
                      'attribute'=>'Customer',
                      'value'=>function($data){
                        // get name
                          return $name = \common\models\Customer::findOne($data->customer_id)['username'];
                      },
                        'options'=>[
                            'style'=>'width:15%'
                        ]
                    ],
                   // 'customer_id',
                    'date_from',
                    'date_to',
                    'reservation_date',
                    [
                        'header'=>"No. Of Rooms",
                        'value'=>function($data){
                            return $data->room_id.' Rooms';
                        },
                    ],
                   // 'room_id',

                    // 'transaction_id',
                     'status',
                    // 'hotelid',

                    [
                            'class' => 'yii\grid\ActionColumn',
                            'options'=>[
                                    'style'=>'width:8%'
                            ]
                    ],
                ],
            ]); ?>
        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

