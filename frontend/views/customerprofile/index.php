<?php

use yii\helpers\Html;
use kartik\alert\Alert;
use yii\bootstrap\Modal;
$profile_details = frontend\models\CustomerProfile::find()->where(['customer_id'=>Yii::$app->user->id])->one();
?>

<div class="site-index">

    <div class="col-md-2 col-sm-2 col-xs-2" style=" background-color: whitesmoke">
        <div class="profile-img-div">

            
            <?php 
            $img="";
            if($profile_details['image'] == "" ? $img= '../images/profile.png' : $img = '../../upload/'.$profile_details['image']);
                
            ?>
            
            
            
             <div class="profile-pic img-responsive" style="background-image: url('<?= $img ?>')" onclick="changePic(this.id)" id="<?= Yii::$app->user->id;?>">

                    <span class="glyphicon glyphicon-camera"></span>
                    <span>Change Image</span>

            </div>
              
            
              
            <a class="profile-link" id="<?= Yii::$app->user->id;?>" onclick="getProfileDetails(this.id)">Edit Profile</a>
        </div>
        
      
    </div>
    <div class="col-md-10 col-sm-10 col-xs-10" style=" background-color: silver">
        <div class="row" id="data-div">
            
            <div class="col-md-12">
            
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b> Your Bookings</b></h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="panel panel-info">
                                <div class="panel-heading"><b>CURRENT BOOKING</b> </div>
                                <div class="panel-body">
                                  
                                    <?php
                                        
                                        // get the bookings information
                                        //
                                        $current_reservation = hotel\models\Reservation::find()->where(['customer_id'=>Yii::$app->user->id])->andWhere(['or',
                                                                                                                                             ['status'=>'paid-book'],
                                                                                                                                             ['status'=>'unpaid-book']]
                                                                                                                                            )->all();
                                        if(count($current_reservation) > 0){
                                        ?>    
                                            <table class="table table-bordered">

                                              <tr>
                                                  <th>Booking Date</th>
                                                  <th>Hotel Name</th>
                                                  <th>Amount</th>
                                                  <th>Status</th>
                                              </tr>
                                              <?php
                                              foreach($current_reservation as $reservation){
                                                  
                                                  $hotelname = \hotel\models\Hotel::findOne($reservation->hotelid);
                                                  echo "<tr>";
                                                    echo "<td>".$reservation->reservation_date."</td>";
                                                    echo "<td>".$hotelname->hotelname."</td>";
                                                    echo "<td>".Yii::$app->formatter->asCurrency($reservation->price_per_day,'USD')."</td>";
                                                    echo "<td>".$reservation->status."</td>";                                                    
                                                  echo "</tr>";
                                              }
                                              
                                              ?>
                                          </table>
                                    <?php
                                        }else{
                                            ?>
                                                
                                    <div class="message">
                                       There is no current booking available, may be you haven't booked yet
                                    </div>
                                    <?php
                                        }
                                        
                                    
                                    ?>
                                    

                                </div>
                            </div>
                            
                            <div class="panel panel-success">
                                <div class="panel-heading"><b> BOOKING HISTORY </b> </div>
                                <div class="panel-body">
                                  
                                <?php
                                        
                                        // get the bookings information
                                        //
                                        $history_reservation = hotel\models\Reservation::find()->where(['customer_id'=>Yii::$app->user->id])->andWhere(['and',['status'=>'checkout-book']])->all();
                                        if(count($current_reservation) > 0){
                                        ?>    
                                            <table class="table table-bordered">

                                              <tr>
                                                  <th>Booking Date</th>
                                                  <th>Hotel Name</th>
                                                  <th>Amount</th>
                                                  <th>Status</th>
                                              </tr>
                                              <?php
                                              foreach($history_reservation as $reservation){                                                  
                                                  $hotelname = \hotel\models\Hotel::findOne($reservation->hotelid);
                                                    echo "<tr>";
                                                      echo "<td>".$reservation->reservation_date."</td>";
                                                      echo "<td>".$hotelname->hotelname."</td>";
                                                      echo "<td>".Yii::$app->formatter->asCurrency($reservation->price_per_day,'USD')."</td>";
                                                      echo "<td>".$reservation->status."</td>";                                                    
                                                    echo "</tr>";
                                              }
                                              
                                              ?>
                                          </table>
                                    <?php
                                        }else{
                                            ?>
                                                
                                    <div class="message">
                                       There is no history is available, may be you haven't booked yet
                                    </div>
                                    <?php
                                        }
                                        
                                    
                                    ?>
                                    </table>

                                </div>
                            </div>
                              
                            
                                
                            
                            
                            


                            
                        </div>
                  </div>
            
            </div>
<!--            <div class="col-md-3 col-sm-12 col-xs-3" style=" background-color: whitesmoke">
                <div style="background-color: #fcfeea">
                    <H4 style="margin-left: 1em">FOLLOWING PLACE</H4>

                    <div style=" background-color: whitesmoke">
                        <ul class="nav">
                            <?php
                            for ($x = 0; $x <= 10; $x++) {
                                ?>
                                <li role="presentation" class="active-hover" style="color:blue"><?= Html::a('Maulakalika', ['profiledash/profiledash'], ['class' => 'profile-link']) ?></li>
                                    <?php
                                }
                                ?>
                        </ul>
                    </div>
                </div><br>
            </div>-->


        </div>

    </div>
    <div class="profile-div">
    </div>
<?php
    Modal::begin([
        'id' => 'profile_details',
        'header' => '<h4 style="color:black;margin:0px">Booking Details</h4>',
        'options'=>[
                'tabindex' => false,
                'class'=>'modal'

            ],
        'footer'=>'<div class="progress" style="display:none">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"/>
          </div>',
        'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],
    ]);
    ?>
    <div id="modal-body">
          
    </div>
    <?php
    Modal::end();
    ?>
</div>
    
    <div class="profile-pic">
        <?php
    Modal::begin([
        'id' => 'profile-modal',
        'header' => '<h4 style="color:black;margin:0px">Booking Details</h4>',
        'options'=>[
                'tabindex' => false,
                'class'=>'modal'

            ],
        'size'=>'modal-sm',
        'footer'=>'<div class="progress" style="display:none">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"/>
          </div>',
        'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],
    ]);
    ?>
    <div id="modal-body1">
          
    </div>
    <?php
    Modal::end();
    ?>
    </div>
</div>
    <?php
    $this->registerJs($this->render('ajax.js'), yii\web\View::POS_END);
    ?>