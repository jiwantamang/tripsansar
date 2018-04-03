<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Placecatagory */

$this->title = 'Update Placecatagory: ' . $model->placecatagory_id;
$this->params['breadcrumbs'][] = ['label' => 'Placecatagories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->placecatagory_id, 'url' => ['view', 'id' => $model->placecatagory_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="placecatagory-update">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
