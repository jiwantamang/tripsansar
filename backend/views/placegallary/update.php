<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PlaceGallary */

$this->title = 'Update Place Gallary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Place Gallaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'place_id' => $model->place_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper">
      <div class="place-gallary-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
