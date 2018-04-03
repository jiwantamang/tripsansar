<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="package-image-form">

    

    

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?php
        echo $form->field($model, 'package_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\backend\models\Package::find()->all(),'id','package_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Place ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
      ]);

      ?>
    
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
