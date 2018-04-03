<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hotel */

$this->title = $model->hotel_id;
$this->params['breadcrumbs'][] = ['label' => 'Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
      <div class="hotel-view">

          <h1><?= Html::encode($this->title) ?></h1>

          <p>
              <?= Html::a('Update', ['update', 'id' => $model->hotel_id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Delete', ['delete', 'id' => $model->hotel_id], [
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
                  'hotel_id',
                  'hotelname',
                  'owner',
                  'establish_date',
                  'hotel_catagory',
                  'hotel_type',
                  'active',
              ],
          ]) ?>

      </div>

    </section>
</section>
