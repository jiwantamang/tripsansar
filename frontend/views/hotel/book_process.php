<?php

    $this->title = "Booking Process";
    use hotel\models\RoomType;
    use hotel\models\Room;
 ?>

<div class="site-index">

  <?php

  // get all the room type of this hotel
  $rooms = Room::find()->where(['hotel_id'=>$model->hotel_id])->all();
 
 ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div id="contentdiv">
                
                  <div class="panel panel-danger small-margin">
                    <div class="panel-heading">
                      <h3 class="panel-title">Select Rooms</h3>
                    </div>
                    <div class="panel-body">
                      
                    <table class="table">
                        <?php
                        foreach($rooms as $room){
                            
                            $img = \hotel\models\RoomImage::find()->select('image')->where(['room_room_id'=>$room->room_id])->one();
                            $roomtype = RoomType::findOne($room->room_type_id);
                            ?>
                        <tr class="bg-important">
                                <td>
                                    <img src="<?= Yii::$app->urlManagerHotel->baseUrl ?>/upload/room_image/room_image_thumbnail/<?= $img['image'] ?>" alt="image"/>
                                </td>
                                <td>
                                    <div class="row" style="border-left: 2px dotted gray">
                                        <div class="col-md-4">
                                            <ul>
                                                <li> <b class="text-primary">Room Type :</b> <span class="text-success"><?= $roomtype->room_type ?></span></li>
                                                <li> <b class="text-primary"> Floor : </b><span class="text-success"><?= $room->floor ?></span></li>
                                                <li> <b class="text-primary">Description : </b><span class="text-success"><?= $room->description ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul>
                                                <li> <b class="text-primary"> Room Number : </b><span class="text-success"> <?= $room->room_number ?></span></li>
                                                <li> <b class="text-primary"> Has Conditioner : </b><span class="text-success">'.
                                                <?= $room->has_conditioner == 0 ? "Yes":"No" ?>
                                                </span></li>
                                                <li><b class="text-primary"> Has T.V. :</b><span class="text-success"> <?= $room->has_tv == 1 ? "Yes":"No";  ?></span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            
                                            
                                                <ul>

                                                    <li> <b class="text-primary">Phone Available :</b> <span class="text-success"> <?= $room->has_phone == 1 ? "Yes":"No";?></span></li>  
                                                    <li>  <b class="text-primary">Available From :</b> <span class="text-success"><?= $room->available_from ?></span></li>
                                                    <li> <b class="text-primary">Price Starts From :</b> <span class="text-success"> <?= $room->price_per_day ?></span></li>
                                                </ul>
                                        </div>
                                </td>
                                                                                                           
                                <td><input style="height: 3em;width:3em;" type="checkbox" value="<?= $room->room_id; ?>"/></td>
                            </tr>
                            <?php
                        }

                        ?>
                            
                            

                    </table>
                        <div class="progress" style="display:none">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                              <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                        <button class="btn btn-success pull-right"  id="btn-next" onclick="ajaxHotelRoom()">Next</button>
                    </div>
                  </div>
                

                    



                <input type="hidden" id="hotel_id" value="<?= $model->hotel_id; ?>"/>
                <input type="hidden" id="user_id" value="<?= Yii::$app->user->getId(); ?>"/>
                <input type="hidden" id="check_in" value="<?= $model->check_in; ?>"/>
                <input type="hidden" id="check_out" value="<?= $model->check_out; ?>"/>

                


            </div>
        </div>


    </div>

  <?php
    $this->registerJs($this->render('ajax.js'), yii\web\View::POS_END);

  ?>