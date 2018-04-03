<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlaceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'place_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'placetitle') ?>

    <?= $form->field($model, 'placeaddress') ?>

    <?= $form->field($model, 'placedescription') ?>

    <?php // echo $form->field($model, 'placeimages') ?>

    <?php // echo $form->field($model, 'placecatagory') ?>

    <?php // echo $form->field($model, 'placespeciality') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
