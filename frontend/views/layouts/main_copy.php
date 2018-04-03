<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\widgets\ActiveForm;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body style="background-color:#f1f1d1">


<div class="container">
    <?php $this->beginBody() ?>

    <div class="header" style="background-color:wheat">

                <div class="row">
                <div class="col-md-2 hidden-xs">

                    <img src="<?php echo Yii::$app->urlManagerFrontend->baseUrl.'/images/logo.png'?>" class="logo"/>

                </div>
                    <div class="col-md-10 col-xs-12 text-right" style="padding-top: 0.5em">


                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">For supports, please contact <b style="color:blue;font-weight:blue;margin-left:10px;">  +9779869458050</b></p>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <form class="navbar-form" role="search" method="get" id="search-form" action="<?= Url::to(['place/search']);?>">

                                    <div class="input-group">
                                        <div class="input-group-btn search-panel">
                                             <select id="searchdropdown" name="type" class="form-control  h-mainNavSearchFormSelect " required="">
                                                  <option value="place">Place</option>
                                                  <option value="hotel">Hotel</option>
            <!--                                      <option value="cottage">Cottage</option>-->
                                                  <!--     <option value="offer">Offers</option> -->
                                              </select>
                                        </div>
                                        <input type="hidden" name="search_param" value="all" id="search_param">
                                        <input type="text" class="form-control" name="query" id="autocomplete" required="" placeholder="Enter spot or place name ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" value="Search" id="searchsubmit"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                    </div>

                                </form>
                            </div>
                        </div>







                </div>
            </div>

        </div>

    </div>

        <!-- Navbar started -->
        <div class="container">
          <div class="navbar" style="border:0px;">

              <?php

                NavBar::begin([
                    'brandLabel' => 'TripSansar',
                     'options' => [
                            'class' => 'green',
                          'role'=>'navigation'
                        ],

                    ]);

                if(!Yii::$app->user->isGuest){
                    // check if use has image or not
                    $mod = \frontend\models\CustomerProfile::find()->where(['customer_id'=>Yii::$app->user->id])->one();
                    $a ='<img src="' . Url::to(Yii::$app->urlManagerFrontend->baseUrl.'/upload/thumbnail/No_image.jpg').'" height="50px" width="50px"  class="img-circle"/>';
                    if(!(empty($mod))){
                        if($mod->image == NULL)
                            $mod->image = "No_image.jpg";
                        $a ='<img src="' . Yii::$app->urlManagerFrontend->baseUrl.'/upload/thumbnail/' . $mod->image .'" height="50px" width="50px"  class="img-circle" onerror="this.src=' . Url::to(Yii::$app->urlManagerFrontend->baseUrl.'/upload/thumbnail/No_image.jpg').'" />';
                    }




                }
                echo Nav::widget([
                    'encodeLabels'=>false,
                     'options' => [
                            'class' => 'small-margin',
                        ],
                    'items' => [
                        ['label' => 'Home', 'url' => ['site/index']],
                        ['label' => 'Adventure', 'url' => ['place/adventure']],
                        ['label' => 'About Us', 'url' => ['/site/about']],
                        Yii::$app->user->isGuest ?
                            ['label' => 'Sign In','url'=>['/site/login']] :
                            ['label' => $a, 'items' => [

                                ['label' => 'Account Settings'],
                                ['label' => 'Profile', 'url' => ['/customerprofile/index']],
                                ['label' => 'Change Password', 'url' => ['site/changepassword']],

                                [ 'label' => 'Logout',
                                    'url' => ['/site/logout'],
                                    'linkOptions' => ['data-method' => 'post']],
                                    ]]
                    ],
                    'options' => ['class' => 'navbar-nav pull-right'],
                ]);
                NavBar::end();

              ?>


              <?php

                // check if the user is logged in or not
              if(!(Yii::$app->user->isGuest)){
                  if(Yii::$app->user->identity->user_activation_key != "activated"){


                  ?>
              <div class="info-div">
                      Your account is not activated. Please check your email and activate your account. Thank you.
              </div>
              <?php
                    }
              }

              ?>



    <!-- Navbar end -->

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
      </div>
</div>

<footer class="footer" style="background-color:black;color:gray;">

  <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span><b style="font-size:2em;color:white;">Contact Details</b></span>
          <table>
            <tr>
              <td><b>Landline No :</b></td>
              <td> +9779821596583</td>
            </tr>
            <tr>
              <td><b>Landline No :</b></td>
              <td> +9779821596583</td>
            </tr>
            <tr>
              <td><b>Mobile No :</b></td>
              <td> +9779821596583</td>
            </tr>
            <tr>
              <td><b>Email :</b></td>
              <td> jiwan.tamang255@gmail.com</td>
            </tr>

          </table>
        </div>
        <div class="col-md-4">
            <span><b style="font-size:2em;color:white;">Follo Us</b></span>

            <table>
                <tr>
              <td colspan="2">
                  <table style="margin-top:1em;">
                    <tr>
                        <td>
                            <a class="btn btn-social-icon btn-twitter" href="https://www.facebook.com/softparkgrp/">
                                <span class="fa fa-twitter" style="height: 1em;"></span>
                          </a>
                        </td>

                        <td>
                            <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/softparkgrp/">
                            <span class="fa fa-facebook"></span>
                          </a>
                        </td>

                        <td>
                          <a class="btn btn-social-icon btn-pinterest" href="https://www.facebook.com/softparkgrp/">
                            <span class="fa fa-pinterest "></span>
                          </a>
                        </td>

                        <td>
                            <a class="btn btn-social-icon btn-instagram" href="https://www.facebook.com/softparkgrp/">
                            <span class="fa fa-instagram"></span>
                          </a>
                        </td>
                    </tr>
                  </table>

              </td>
            </tr>
            </table>
        </div>
        <div class="col-md-4">
            <span><b style="font-size:2em;color:white;">Site Index</b></span>
            <table>
                <tr>
                    <td><b>Home</b></td>
                </tr>
                <tr>
                    <td><b>About Us</b></td>

                </tr>

                <tr>

                    <td><b>Login</b></td>

                </tr>

                <tr>
                    <td><b>Sign Up</b></td>

                </tr>


                </table>
        </div>
      </div>
  </div>

</footer>

<?php


$this->registerJs(
        "$('#autocomplete').autocomplete({
            serviceUrl:'".Url::to(['site/suggest'])."',
            onSelect: function (suggestion) {

            }
        });
        ");

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
