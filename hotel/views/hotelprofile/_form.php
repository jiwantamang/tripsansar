<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\fileupload\FileUploadUI;


/* @var $this yii\web\View */
/* @var $model hotel\models\HotelProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'minimum_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note4')->textInput(['maxlength' => true]) ?>
    
           <?= FileUploadUI::widget([
            'model' => $model,
            'attribute' => 'file',
            'url' => ['hotelprofile/imageupload', 'id' => Yii::$app->user->identity->hotelid],
            'gallery' => false,
            'fieldOptions' => [
                'accept' => 'image/*',
                'multiple'=>false
            ],
            'clientOptions' => [
                'maxFileSize' => 2000000
            ],
            // ...
            'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                                        console.log(e);
                                        console.log(data);
                                    }',
                'fileuploadfail' => 'function(e, data) {
                                        console.log(e);
                                        console.log(data);
                                    }',
            ],
        ]); ?>

       


    <?= $form->field($model, 'hotel_hotel_id')->hiddenInput(['value'=>Yii::$app->user->identity->hotelid])->label(false); ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
