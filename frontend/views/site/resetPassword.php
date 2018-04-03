<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary small-margin">
                <div class="panel-heading">

                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="panel-body">
                    
                    
                    <div class="site-reset-password">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>Please choose your new password:</p>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                                    <div class="form-group">
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                                    </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
