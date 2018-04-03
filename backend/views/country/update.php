<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Countries */

$this->title = 'Update Countries: ' . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_id, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="countries-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
