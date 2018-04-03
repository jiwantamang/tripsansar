<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlaceGallarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Place Gallaries';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
      <div class="place-gallary-index">

          <h1><?= Html::encode($this->title) ?></h1>
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Create Place Gallary', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'id',
                  'image_name',
                  'image_description',
                  'image_caption',
                  'place_id',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

    </section>
</section>
