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
                                <p class="pull-right">For supports, please whatsapp or call <b style="color:blue;font-weight:blue;margin-left:10px;">  +9779869458050</b></p>
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
              <td><b>Mobile No :</b></td>
              <td> +9779869458050</td>
            </tr>
            <tr>
              <td><b>Email :</b></td>
              <td> cs.tripsansar@gmail.com</td>
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
                            <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/tripsansarsupport">
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
        
        <style>.fb-livechat,.fb-widget{display:none}.ctrlq.fb-button,.ctrlq.fb-close{position:fixed;right:24px;cursor:pointer}.ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}.fb-widget{background:#fff;z-index:2;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}.fb-credit{text-align:center;margin-top:8px}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:400}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}.ctrlq.fb-close{z-index:4;padding:0 6px;background:#365899;font-weight:700;font-size:11px;color:#fff;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'x';font-family:sans-serif}</style>

<div class="fb-livechat">
<div class="ctrlq fb-overlay"></div>
<div class="fb-widget">
<div class="ctrlq fb-close"></div>
<div class="fb-page" data-href="https://www.facebook.com/tripsansarsupport/" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false">
<blockquote cite="https://www.facebook.com/tripsansarsupport/" class="fb-xfbml-parse-ignore"> </blockquote>
</div>

<div id="fb-root"></div>
</div>
<a href="https://m.me/sarmadgardezi" title="Send us a message on Facebook" class="ctrlq fb-button"></a>
</div>

<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script>$(document).ready(function(){var t={delay:125,overlay:$(".fb-overlay"),widget:$(".fb-widget"),button:$(".fb-button")};setTimeout(function(){$("div.fb-livechat").fadeIn()},8*t.delay),$(".ctrlq").on("click",function(e){e.preventDefault(),t.overlay.is(":visible")?(t.overlay.fadeOut(t.delay),t.widget.stop().animate({bottom:0,opacity:0},2*t.delay,function(){$(this).hide("slow"),t.button.show()})):

t.button.fadeOut("medium",function(){t.widget.stop().show().animate({bottom:"30px",opacity:1},2*t.delay),t.overlay.fadeIn(t.delay)})})});</script>
        
</body>
</html>
<?php $this->endPage() ?>
