<h2>Thank you for signing up for an account !!</h2>
<p> Welcome to TripSansar </p>
<p> Your username is <?= $model->username; ?></p>

<p>Please click on following link to activate your account in tripsansar.com </p>

<?php 

// create url 
$link = Yii::$app->urlManager->createAbsoluteUrl(['site/asu', 'email' => $model->email,'val'=>$model->user_activation_key]);
?>
<a href="<?= $link ?>"><?= $link?></a></br><div></div>
