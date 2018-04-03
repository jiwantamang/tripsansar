<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Placecatagory */

$this->title = $model->placecatagory_id;
$this->params['breadcrumbs'][] = ['label' => 'Placecatagories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="placecatagory-view">

          <h1><?= Html::encode($this->title) ?></h1>

          <p>
              <?= Html::a('Update', ['update', 'id' => $model->placecatagory_id], ['class' => 'btn btn-primary']) ?>
              <?= Html::a('Delete', ['delete', 'id' => $model->placecatagory_id], [
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
                  'placecatagory_id',
                  'placecatagory',
              ],
          ]) ?>

      </div>

    </section>
</section>
