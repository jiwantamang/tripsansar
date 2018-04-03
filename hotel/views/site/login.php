<?php
		use yii\widgets\ActiveForm;
		use yii\helpers\Html;
 ?>


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <!-- <form class="form-login" action="index.html">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password">
		          <br><br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>



		        </div>


		      </form> -->

					<?php $form = ActiveForm::begin(['id' => 'login-form',
									'options'=>[
										'class'=>'form-login'
									]
						]); ?>

						<h2 class="form-login-heading">sign in now</h2>
						<div class="login-wrap">
							<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

							<?= $form->field($model, 'password')->passwordInput() ?>

							<?= $form->field($model, 'rememberMe')->checkbox() ?>

							<div style="color:#999;margin:1em 0">
									If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.

							</div>

							<div class="form-group">
									<?= Html::submitButton('Login', ['class' => 'btn black-bg btn-block', 'name' => 'login-button']) ?>
							</div>

							Not registered yet ? <a href="index.php?r=site/signup"> Register</a>

						</div>
					<?php ActiveForm::end(); ?>

	  	</div>
	  </div>
