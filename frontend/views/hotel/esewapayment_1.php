<?php 
    use hotel\models\TempBook;
    use hotel\models\TempBookRoom;
    use hotel\models\Reservation;  
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;


?>
<?php
          $temp_book = TempBook::findOne($id);
          $temp_book_rooms = TempBookRoom::find()->where(['temp_book_id'=>$id])->all();

          // make a reservation
          $reservation = new Reservation();
          $reservation->hotelid = $temp_book->hotel_id;
          $reservation->date_from = $temp_book->check_in;
          $reservation->date_to = $temp_book->check_out;
          $reservation->transaction_id = $temp_book->transaction_id;
          $reservation->status = "reserved";
          $reservation->customer_id = $temp_book->user_id;
          $reservation->room_id = count($temp_book_rooms);
          
          ?>


<?php 

$model = new \frontend\models\EsewaTbl();

$form = ActiveForm::begin([
    'action'=>['hotel/esewapay'],
    'id' => 'esewa-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'tAmt')->textInput(['value'=>100]); ?>
    <?= $form->field($model, 'amt')->textInput(['value'=>90]); ?>
    <?= $form->field($model, 'txAmt')->textInput(['value'=>5]); ?>
    <?= $form->field($model, 'psc')->textInput(['value'=>2]); ?>
    <?= $form->field($model, 'pdc')->textInput(['value'=>3]); ?>
    <?= $form->field($model, 'scd')->textInput(['value'=>'testmerchant']); ?>
    <?= $form->field($model, 'pid')->textInput(['value'=>"XYZ-1234"]); ?>
    <?= $form->field($model, 'su')->textInput(['value'=>"http://abc.com/success.html?q=su"]); ?>
    <?= $form->field($model, 'fu')->textInput(['value'=>"http://abc.com/failure.html?q=fu"]); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>

<!--<form action = “http://dev.esewa.com.np/epay/main” method=”POST”>-->


<!--    <input value=”100” name=”tAmt” type=”hidden”/>
    <input value=”90” name=”amt” type=”hidden”/>
    <input value=”5” name=”txAmt” type=”hidden”/>
    <input value=”2” name=”psc” type=”hidden”/>
    <input value=”3” name=”pdc” type=”hidden”/>
    <input value=”testmerchant” name=”scd” type=”hidden”/>
    <input value=”XYZ-1234” name=”pid” type=”hidden”/>
    <input value=”http://abc.com/success.html?q=su” type=”hidden” name=”su”/>
    <input value=”http://abc.com/failure.html?q=fu” type=”hidden” name=”fu”/>
    <input value=”Submit” type=”submit”/>
    
</form>-->


    