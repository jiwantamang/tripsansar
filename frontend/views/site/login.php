<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="site-index" id="login_bg">

    <div class="row">
        <div class="col-lg-4 col-md-offset-4">
          <section class="small-margin login">

            <div class="itnry_head_wrap">

                <span class="days_box">Login </span> <span class="itnry_heading"> Explore More Inside</span>

            </div>

            <br><br>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.

                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                Not registered yet ? <?php echo Html::a('Register',['site/signup']);?>

            <?php ActiveForm::end(); ?>
          </section>
        </div>
    </div>

