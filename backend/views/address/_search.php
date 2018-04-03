<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addresses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'adress_id') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'address_region') ?>

    <?= $form->field($model, 'address_postalcode') ?>

    <?= $form->field($model, 'cities_city_id') ?>

    <?php // echo $form->field($model, 'hotel_id') ?>

    <?php // echo $form->field($model, 'place_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
