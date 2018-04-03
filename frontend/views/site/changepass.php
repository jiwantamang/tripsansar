<?php
use frontend\models\Passchange;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;

?>

<div class="site-index">
    
<?php

$model = new Passchange();
?>
<?php $form = ActiveForm::begin([
    'id'=>'password-form',
    'action'=>['site/changepassword']
]);

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php

            if(Yii::$app->session->hasFlash('wrong-password')){
                echo Alert::widget([
                    'options' => ['class' => 'alert-info'],
                    'body' => Yii::$app->session->getFlash('wrong-password'),
                ]);
            }

        if(Yii::$app->session->hasFlash('password-changed')){
            echo Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('password-changed'),
            ]);
        }

        ?>
        <div class="minishadow" style="padding: 2%;">
            <?= $form->field($model,'oldPassword')->passwordInput(['placeholder'=>'Old Password']); ?>
            <?= $form->field($model,'newPassword')->passwordInput(['placeholder'=>'New password']); ?>
            <?= $form->field($model,'passwordConfirm')->passwordInput(['placeholder'=>'Confirm Password']); ?>

            <div class="form-group">
                <?=
                Html::submitButton('Save Changes',['class'=>'btn btn-primary']);
                ?>
            </div>
        </div>

    </div>
</div>


<?php ActiveForm::end(); ?>
