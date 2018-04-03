<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelGallary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-gallary-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'hotel_hotel_id')->hiddenInput(['value'=>Yii::$app->user->identity->hotelid])->label(false); ?>
    
         <?= FileUploadUI::widget([
            'model' => $model,
            'attribute' => 'imageFile',
            'url' => ['hotelgallary/imageupload', 'id' => Yii::$app->user->identity->hotelid],
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


    <?php ActiveForm::end(); ?>

</div>
