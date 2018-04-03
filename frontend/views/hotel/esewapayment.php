<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;

//$form = ActiveForm::begin([
//    'action'=>['http://dev.esewa.com.np/epay/main'],
//    'id' => 'login-form',
//    'options' => ['class' => 'form-horizontal'],
//]) ?>
<!--<form action=" http://esewa.f1dev.com/epay/main" method="post">
   <input value="100" name="tAmt" type=" hidden"/>
    <input value="90" name="amt" type="hidden"/>
    <input value="10" name="txAmt" type="hidden"/>
    <input value="0" name="psc" type="hidden"/>
    <input value="0" name="pdc" type="hidden"/>
    <input value="testmerchant" name="scd" type="hidden"/>
    <input value="121234" name="pid" type=" hidden"/>
    <input value="http://merchantsite.com/success" type="hidden" name="su"/>
    <input value="http://merchantsite.com/failure" type="hidden" name="fu"/>
    
       <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
          
        </div>
    </div>
</form>-->

<form>
    <button class="btn btn-success pull-right" id="<?= $id ?>" onclick="ajaxPaymentMethod(this.id)">Next</button>    
</form>





    