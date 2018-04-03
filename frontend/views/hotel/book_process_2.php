<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// find customer details 

$model = frontend\models\CustomerProfile::find()->where(['customer_id'=>Yii::$app->user->id])->one();
?>

<div class="panel panel-danger small-margin" style="background-color:aliceblue">
  <!-- Default panel contents -->
  <div class="panel-heading">    <h2 class="no-margin">Personel Information</h2></div>
  <div class="panel-body">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <?php $form = ActiveForm::begin([
                    'id'=>'profileForm',

            ]); ?>
    
            <fieldset>
                <!-- Form Name -->
            

                <table>
                    <tr>
                        <td>

                            <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'gender')->dropDownList(['male'=>'Male','female'=>'Female'],['prompt'=>'Select Gender ..']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $form->field($model, 'dob')->input('date');?></td>
                        <td><?= $form->field($model, 'nationality')->dropDownList([
                                'nepal'=>'Nepal',
                                'india'=>'India',
                                'china'=>'China',
                                'pakistan'=>'Pakistan',
                                'bangladesh'=>'Bangladesh',
                                'us'=>'United States',
                                'uk'=>'United Kingdom'

                            ]); ?></td>
                    </tr>

                    <tr>
                        <td colspan="2"><?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?></td>
                        <td>
                            <?= $form->field($model, 'customer_id')->hiddenInput()->label(false); ?>
                        </td>
                    </tr>
                </table>
                            <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
                  <div class="progress" style="display:none">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                              <span class="sr-only">40% Complete (success)</span>
                            </div>
                  </div>

                <input type="button" value="next" class="btn btn-success pull-right" id="<?=$id?>" onclick="ajaxPaymentProfile(this.id)"/>
                <?php echo Html::a('Cancel', ['hotel/cancelbooking', 'id' => $hotel_id,'tid'=>$id], ['class' => 'btn btn-warning pull-right']); ?>    
            </fieldset>

        <?php 

        ActiveForm::end();
        ?>
  
          </div>
      </div>
       
      
  </div>

</div>

   

<?php
$this->registerJs($this->render('ajax.js'), yii\web\View::POS_END);

?>