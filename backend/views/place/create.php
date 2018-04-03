<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Place */

$this->title = 'Create Place';
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <div class="place-create">

              <h1><?= Html::encode($this->title) ?></h1>

              <?= $this->render('_form', [
                  'model' => $model,
              ]) ?>

          </div>

        </div>
      </div>

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
