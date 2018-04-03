<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
      <div class="hotel-index">

          <h1><?= Html::encode($this->title) ?></h1>
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Create Hotel', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'hotel_id',
                  'hotelname',
                  'owner',
                  'establish_date',
                  'hotel_catagory',
                  // 'hotel_type',
                  // 'active',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

    </section>
</section>
