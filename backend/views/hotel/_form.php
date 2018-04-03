<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotelname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'establish_date')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'dd-MM-yyyy',
    'options'=>[
      'class'=>'form-control'
    ]

    ]) ?>



    <?= $form->field($model,'hotel_catagory')->dropDownList([
        '1'=>'One Star',
        '2'=>'Two Star',
        '3'=>'Three Star',
        '4'=>'Four Star',
        '5'=>'Five Star'
    ]);

    ?>

    <?= $form->field($model,'hotel_type')->dropDownList([
      '1'=>'One Star',
      '2'=>'Two Star',
      '3'=>'Three Star',
      '4'=>'Four Star',
      '5'=>'Five Star'
    ]);
    ?>

    <?= $form->field($model,'active')->dropDownList([
        'active'=>'active',
        'deactive'=>'de-active',

    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
