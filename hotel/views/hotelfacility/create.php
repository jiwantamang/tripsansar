<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model hotel\models\HotelFacility */

$this->title = 'Create Hotel Facility';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="hotel-facility-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

