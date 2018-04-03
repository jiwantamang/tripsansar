<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Placecatagory */

$this->title = 'Create Placecatagory';
$this->params['breadcrumbs'][] = ['label' => 'Placecatagories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

      <div class="placecatagory-create">

          <h1><?= Html::encode($this->title) ?></h1>

          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </section>
</section>
