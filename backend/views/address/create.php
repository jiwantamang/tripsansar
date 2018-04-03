<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Addresses */

$this->title = 'Create Addresses';
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="addresses-create">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>


    </section>
</section>
