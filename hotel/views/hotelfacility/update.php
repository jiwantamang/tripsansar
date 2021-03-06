<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelFacility */

$this->title = 'Update Hotel Facility: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="hotel-facility-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

