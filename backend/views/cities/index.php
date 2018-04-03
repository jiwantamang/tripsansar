<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchCities */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="cities-index">

          <h1><?= Html::encode($this->title) ?></h1>
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Create Cities', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'city_id',
                  'city_name',
                  'countries_country_id',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

    </section>
</section>
