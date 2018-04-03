<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use hotel\models\RoomType;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model hotel\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php

    $conditionar=[
        '1'=>'Yes',
        '0'=>'No',
        '2'=>'Under Process'
    ];

    $tv=[
        '1'=>'yes',
        '0'=>'No'
    ];

    $phone = [
        '1'=>'Yes',
        '0'=>'No',
        '2'=>'Under Process'
    ];
    $floor = [
        '0'=>'Ground Floor',
        '1'=>'First Floor',
        '2'=>'Second Floor',
        '3'=>'Third Floor',
        '4'=>'Fourth Floor',
        '5'=>'Fifth Floor',
        '6'=>'Sixth Floor',
        '7'=>'Seventh Floor'
    ];

    ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'room_type_id')->dropDownList(ArrayHelper::map(\hotel\models\RoomType::find()->all(),'id','room_type')); ?>

    <?= $form->field($model, 'floor')->dropDownList($floor) ?>

    <?= $form->field($model, 'room_number')->textInput() ?>

    <?= $form->field($model, 'has_conditioner')->dropDownList($conditionar) ?>

    <?= $form->field($model, 'has_tv')->dropDownList($tv) ?>

    <?= $form->field($model, 'has_phone')->dropDownList($phone) ?>

    <label>Available From</label>
    <?=

    DatePicker::widget([
        'model' => $model,
        'attribute' => 'available_from',
        'options'=>[
            'class'=>'form-control'
        ],
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]);

    ?>


    <?= $form->field($model, 'price_per_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hotel_id')->hiddenInput(['value'=>Yii::$app->user->identity->hotelid]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
