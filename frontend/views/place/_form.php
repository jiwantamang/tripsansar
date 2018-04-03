<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Placecatagory;

/* @var $this yii\web\View */
/* @var $model frontend\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">

<div class="place-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'placetitle')->textInput() ?>

    <?= $form->field($model, 'placeaddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placedescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'placeimages')->fileInput(['maxlength' => true]) ?>

            <?= $form ->field($model , 'placecatagory')->dropDownList(
                ArrayHelper::map(Placecatagory::find()->all(), 'placecatagory_id','placecatagory'),
                    ['prompt'=>'select catagory']
           
           
           )?>
            
            
    
    

    <?= $form->field($model, 'placespeciality')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
