<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestimonialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonials';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">

      <div class="testimonial-index">

          <h1><?= Html::encode($this->title) ?></h1>
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Create Testimonial', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'id',
                  'heading',
                  'description:ntext',
                  'fullname',
                  'designation',
                  // 'place_place_id',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

    </section>
</section>
