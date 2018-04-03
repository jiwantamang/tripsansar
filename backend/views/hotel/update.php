<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hotel */

$this->title = 'Update Hotel: ' . $model->hotel_id;
$this->params['breadcrumbs'][] = ['label' => 'Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hotel_id, 'url' => ['view', 'id' => $model->hotel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper">
      <div class="hotel-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
