<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PlaceGallary */

$this->title = 'Create Place Gallary';
$this->params['breadcrumbs'][] = ['label' => 'Place Gallaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
      <div class="place-gallary-create">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
