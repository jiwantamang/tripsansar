<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use hotel\models\Room;
/* @var $this yii\web\View */
/* @var $model hotel\models\RoomImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>



    <?php
    echo $form->field($model, 'room_room_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Room::find()->all(),'room_id','room_number'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a room ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
