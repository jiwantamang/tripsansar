<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Addresses */

$this->title = 'Update Addresses: ' . $model->adress_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->adress_id, 'url' => ['view', 'adress_id' => $model->adress_id, 'cities_city_id' => $model->cities_city_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper site-min-height">


      <div class="addresses-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>


    </section>
</section>
