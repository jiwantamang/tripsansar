<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PlaceGallary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Place Gallaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
      <div class="place-gallary-view">

          <h1><?= Html::encode($this->title) ?></h1>

          <p>
              <?= Html::a('Update', ['update', 'id' => $model->id, 'place_id' => $model->place_id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Delete', ['delete', 'id' => $model->id, 'place_id' => $model->place_id], [
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
                  'id',
                  'image_name',
                  'image_description',
                  'image_caption',
                  'place_id',
              ],
          ]) ?>

      </div>

    </section>
</section>
