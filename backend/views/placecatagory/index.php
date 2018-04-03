<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlacecatagorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Placecatagories';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="placecatagory-index">

          <h1><?= Html::encode($this->title) ?></h1>
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Create Placecatagory', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'placecatagory_id',
                  'placecatagory',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
      </div>

    </section>
</section>
