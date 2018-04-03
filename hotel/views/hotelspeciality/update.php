<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelSpeciality */

$this->title = 'Update Hotel Speciality: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Specialities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="hotel-speciality-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
