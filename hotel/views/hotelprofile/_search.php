<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'rating') ?>

    <?= $form->field($model, 'minimum_cost') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'note1') ?>

    <?php // echo $form->field($model, 'note2') ?>

    <?php // echo $form->field($model, 'note3') ?>

    <?php // echo $form->field($model, 'note4') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'hotel_hotel_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
