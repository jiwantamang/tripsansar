<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cities;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Addresses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addresses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->widget(Select2::classname(), [
        			'data' => ArrayHelper::map(backend\models\Countries::find()->asArray()->all(),'country_id','country_name'),
        			'language' => 'en',
        			'options' => ['placeholder' => 'Select a Country ...'],
        			'pluginOptions' => [
                                'allowClear' => true
        					],
      				]);
    
    ?>
        
    <?= $form->field($model, 'cities_city_id')->widget(Select2::classname(), [
        			'data' => ArrayHelper::map(Cities::find()->asArray()->all(),'city_id','city_name'),
        			'language' => 'en',
        			'options' => ['placeholder' => 'Select a Country ...'],
        			'pluginOptions' => [
                                'allowClear' => true
        					],
      				]);
    
    ?>
    

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_postalcode')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
