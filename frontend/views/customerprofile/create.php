<?php 

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


$this->title = 'Create Customer Profile';
$this->params['breadcrumbs'][] = ['label' => 'Customer Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-profile-create">
     
     <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <b>Profile Details</b>
        </div>
        <div class="panel-body">
            
            <?php $form = ActiveForm::begin([
                    'id' => 'form-order-article', 'enableClientValidation' => true, 'enableAjaxValidation' => false,
                    'action' => ['/customerprofile/create']                 
                ]); ?>
                    <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
                    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

                  
            
                    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender')->dropDownList(['male'=>'Male','female'=>'Female'],['prompt'=>'Select Gender ..']); ?>
            
                    <?= $form->field($model, 'dob')->input('date');?>
                    <?= $form->field($model, 'nationality')->dropDownList([
                        'nepal'=>'Nepal',
                        'india'=>'India',
                        'china'=>'China',
                        'pakistan'=>'Pakistan',
                        'bangladesh'=>'Bangladesh',
                        'us'=>'United States',
                        'uk'=>'United Kingdom'
                        
                    ]); ?>
                    <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'customer_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false); ?>
            
            <input type="button" class="btn btn-success" value="Save" onclick="submitProfileForm()"/>
            
            <?php ActiveForm::end(); ?>

        </div>       
      </div>
</div>
