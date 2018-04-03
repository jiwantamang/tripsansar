<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
?>
<div class="site-index">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary small-margin">
                <div class="panel-heading">

                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="panel-body">

                    <div class="site-request-password-reset">

                        <p>Please fill out your email. A link to reset password will be sent there.</p>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                                    <div class="form-group">
                                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                                    </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
 