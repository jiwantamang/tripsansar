<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Sign up";
?>

<div class="site-index" id="signupbg">
  <div class="container">
      <br><br>
    
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
                  <div class="row" >


              <div class="col-md-5 col-sm-5 hidden-xs">

                <div class="signup-info font-algreya">

                  <div class="alert" role="alert">
                      <h3 class="alert-heading"><b style="font-size: 2em;">TripSansar</b></h3>
                    <hr>
                    <section>
                        <p class="list-font"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Travel with us </p>
                        <p class="list-font"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Share your experience. </p>
                        <p class="list-font"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Traveling is the best the part of life. </p>
                        <p class="list-font"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Traveling is the best the part of life.</p>
                      
                    </section>

                  </div>

              </div>

            </div>

              <div class="col-md-5 col-md-offset-1 col-sm-7">

                 


                       <div class="signup-div" style="border-radius:10px"><!--this include the signup code -->

                         <div class="itnry_head_wrap">

                             <span class="days_box">SIGN UP </span> <span class="itnry_heading"> Let Us Explore You</span>

                         </div>



                           <br>


                          <br>
                           <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                           <?= $form->field($model, 'username'); ?>

                           <?= $form->field($model, 'email') ?>

                           <?= $form->field($model, 'password')->passwordInput() ?>

                           <div class="form-group">
                               <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                           </div>

                           <?php ActiveForm::end(); ?>
                  </div>
          

                  <br>

              </div>
          </div>
          </div>
      

      </div>
       
  </div>

