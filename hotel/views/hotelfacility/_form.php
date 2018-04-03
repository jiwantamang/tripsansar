<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelFacility */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-facility-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'facility')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hotel_hotel_id')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->getId()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
