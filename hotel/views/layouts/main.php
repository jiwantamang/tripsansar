<?php



use hotel\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Hotel;

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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
	
	$hotel = Hotel::find()->where(['hotel_id'=>Yii::$app->user->identity->hotelid])->one();

?>
<section id="container">

  <header class="header black-bg">
          <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>
        <!--logo start-->
        <a href="index.php?r=site/index" class="logo"><b><?= $hotel->hotelname ?></b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-theme">4</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">You have 4 pending tasks</p>
                        </li>
                        <li>
                            <a href="index.html#">
                                <div class="task-info">
                                    <div class="desc">DashGum Admin Panel</div>
                                    <div class="percent">40%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <div class="task-info">
                                    <div class="desc">Database Update</div>
                                    <div class="percent">60%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <div class="task-info">
                                    <div class="desc">Product Development</div>
                                    <div class="percent">80%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <div class="task-info">
                                    <div class="desc">Payments Sent</div>
                                    <div class="percent">70%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        <span class="sr-only">70% Complete (Important)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-theme">5</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">You have 5 new messages</p>
                        </li>
                        <li>
                            <a href="index.html#">
                                <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                <span class="subject">
                                <span class="from">Zac Snider</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hi mate, how is everything?
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                <span class="subject">
                                <span class="from">Divya Manian</span>
                                <span class="time">40 mins.</span>
                                </span>
                                <span class="message">
                                 Hi, I need your help with this.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                <span class="subject">
                                <span class="from">Dan Rogers</span>
                                <span class="time">2 hrs.</span>
                                </span>
                                <span class="message">
                                    Love your new Dashboard.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">
                                <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                <span class="subject">
                                <span class="from">Dj Sherman</span>
                                <span class="time">4 hrs.</span>
                                </span>
                                <span class="message">
                                    Please, answer asap.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.html#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
                <li>

                  <?=

                  Html::beginForm(['/site/logout'], 'post')
                  . Html::submitButton(
                      strtoupper('Logout (' . Yii::$app->user->identity->username . ')'),
                      ['class' => 'btn-link link-login logout']
                  )
                  . Html::endForm()

                  ?>


                </li>
          </ul>
        </div>
    </header>

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">


                <li class="mt">
                    <a class="active" href="index.php?r=site/index">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>Rooms</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="index.php?r=room/index">List All Rooms</a></li>
                        <li><a  href="index.php?r=room/search">Search Room</a></li>
                        <li><a  href="index.php?r=room/create">Add Rooms</a></li>
                        <li><a  href="index.php?r=roomimage/index">Rooms Image</a></li>
                        <li><a  href="index.php?r=roomtype/index">Rooms Type</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-cogs"></i>
                        <span>Bookings</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="index.php?r=reservation/reserve">Reserve Booking</a></li>
                        <li><a  href="index.php?r=reservation/paid">Paid Booking</a></li>
                        <li><a  href="index.php?r=reservation/index">All Booking</a></li>
                        <li><a  href="index.php?r=reservation/bookingcalendar">Booking Calendar</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Manage Profile</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="index.php?r=hotelprofile/create">Create Profile</a></li>
                        <li><a  href="index.php?r=hotelfacility/index">Hotel Facility</a></li>
                        <li><a  href="index.php?r=hotelspeciality/index">Hotel Speciality</a></li>
                        <li><a  href="index.php?r=hotelprofile/view">View Profiles</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-tasks"></i>
                        <span>Manage Gallary</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="index.php?r=hotelgallary/create">Add New Images</a></li>
                        <li><a  href="index.php?r=hotelgallary/viewgallary">Gallary</a></li>
                        <li><a  href="index.php?r=hotelgallary/editgallary">Edit Gallary</a></li>
                    </ul>
                </li>



            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
