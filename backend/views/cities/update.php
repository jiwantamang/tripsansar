<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cities */

$this->title = 'Update Cities: ' . $model->city_id;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city_id, 'url' => ['view', 'id' => $model->city_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="cities-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
