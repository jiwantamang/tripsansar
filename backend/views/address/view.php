<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Addresses */

$this->title = $model->adress_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">


      <div class="addresses-view">

          <h1><?= Html::encode($this->title) ?></h1>

          <p>
              <?= Html::a('Update', ['update', 'adress_id' => $model->adress_id, 'cities_city_id' => $model->cities_city_id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Delete', ['delete', 'adress_id' => $model->adress_id, 'cities_city_id' => $model->cities_city_id], [
                  'class' => 'btn btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                  ],
              ]) ?>
          </p>

          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'adress_id',
                  'address',
                  'address_region',
                  'address_postalcode',
                  'cities_city_id',
                  'country_id',
                  'place_id',
              ],
          ]) ?>

      </div>


    </section>
</section>
