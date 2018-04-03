<?php


use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */

?>


<?php $this->beginPage() ?>

<?php 

//$logoLink =  Yii::getAlias('@common/mail/images/logo.png');
//$logoLink = Url::to('@frontend/web/images/logo.png',true);
$logoLink = Yii::$app->request->baseUrl . "/images/logo.png";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="panel panel-success">
        <div class="panel-heading" style="height:30px;background-color: #4CAF50;line-height: 2;padding-left: 10px;">
            <b style="color: white;">TripSansar.com</b>
        </div>
            <div class="panel-body" style="background-color: #E8F5E9;padding:4%;">


                <?= Html::img($logoLink,['alt'=>'TRIPSANSAR LOGO']); ?>
                <?= $content ?>

            </div>

    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
