<?php

use yii\helpers\Html;
use hotel\models\HotelGallary;
 use dosamigos\gallery\Gallery;


/* @var $this yii\web\View */
/* @var $model hotel\models\HotelGallary */

$this->title = 'Create Hotel Gallary';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Gallaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        
        

        <div class="hotel-gallary-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

