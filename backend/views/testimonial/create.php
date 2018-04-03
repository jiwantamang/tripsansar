<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Testimonial */

$this->title = 'Create Testimonial';
$this->params['breadcrumbs'][] = ['label' => 'Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">

      <div class="testimonial-create">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
