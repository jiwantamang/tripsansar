<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Place */

$this->title = $model->place_id;
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <h1><?= Html::encode($model->placetitle) ?></h1>

          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'place_id',
                  'user_id',
                  'placetitle',
                  'placeaddress',
                  'placedescription',
                  'placeimages',
                  'placecatagory',
                  'placespeciality',
              ],
          ]) ?>

        </div>
      </div>

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
