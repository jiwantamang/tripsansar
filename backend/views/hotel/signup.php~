<?php

use yii\helpers\Html;
use frontend\models\Usersignup;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Hotel;
?>

<div class="site-index">
  <div class="container">
      <br><br>
      <br><br>
      <div class="row" style="padding-left:10%;">
          <div class="row" >


              <div class="col-md-7 col-sm-7">

                  <div class="col-md-2 col-sm-2"> <!--this is just for the gap befor form -->

                  </div>
                   <div class="col-md-8 col-sm-8"><!--this is where form  contained -->



                       <div class="signup-div" style="border-radius:10px"><!--this include the signup code -->

                         <div class="itnry_head_wrap">

                             <span class="days_box">SIGN UP </span> <span class="itnry_heading"> Create User For Hotel</span>

                         </div>

                           <br>


                          <br>
                           <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                           <?php
     								   echo $form->field($model, 'hotelid')->widget(Select2::classname(), [
        								'data' => ArrayHelper::map(Hotel::find()->all(),'hotel_id','hotelname'),
        								'language' => 'en',
        								'options' => ['placeholder' => 'Select a Hotel ...'],
        								'pluginOptions' => [
            						'allowClear' => true
        									],
      									]);
      							?>

                           <?= $form->field($model, 'username'); ?>

                           <?= $form->field($model, 'email') ?>

                           <?= $form->field($model, 'password')->passwordInput() ?>

                           <div class="form-group">
                               <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                           </div>

                           <?php ActiveForm::end(); ?>
                  </div>
              </div>
                    <div class="col-md-2 col-sm-2">
                <!--this is left part after the signup  col -->
                  </div>

                  <br>

              </div>
          </div>

      </div>
       <div class="footerrow"  style="padding-left:25%"><!--this is the footer part -->
           <h5>BY clicking on 'signup' above,you conformed that you acceopt the <a>Terms of use</a>.</h5>
          </div>
  </div>
</div>
