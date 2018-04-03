<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Place;
/* @var $this yii\web\View */
/* @var $model backend\models\PlaceGallary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-gallary-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?php
        echo $form->field($model, 'place_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Place::find()->all(),'place_id','placetitle'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Place ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
      ]);

      ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>


    <?= $form->field($model, 'image_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_caption')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
