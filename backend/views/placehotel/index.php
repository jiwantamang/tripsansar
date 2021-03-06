<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlaceHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Place Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
		
<div class="place-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Place Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'place_place_id',
            'hotel_hotel_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    		
    </section>  
</section>

