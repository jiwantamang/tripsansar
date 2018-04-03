<?php

    $this->title = "Booking Process";
    use hotel\models\RoomType;
    use hotel\models\Room;
 ?>

<div class="site-index">

  <?php

  // get all the room type of this hotel
  $rooms = Room::find()->where(['hotel_id'=>$model->hotel_id])->all();



$step1 =   '<div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="hotel-name">Select Rooms</h2>
              <table class="table">';
                    foreach($rooms as $room){
                        $img = \hotel\models\RoomImage::find()->select('image')->where(['room_room_id'=>$room->room_id])->one();
                        $roomtype = RoomType::findOne($room->room_type_id);

                        $step1 = $step1.' <tr>
                            <td>
                            <img src="/'.Yii::$app->name.'/hotel/upload/room_image/room_image_thumbnail/'.$img['image'].'" alt="image"/></td>
                            <td>
                            <ul>
                                <li> Room Type :'.$roomtype->room_type.'</li>
                                <li> Floor : '.$room->floor.'</li>                               
                                <li> Description : '.$room->available_from.'</li>                               
                            </ul>                            
                            </td>
                            <td>
                                
                               <ul>
                                     <li> Room Number : '.$room->room_number.'</li>
                                     <li> Has Conditioner : '.
                                        ($room->has_conditioner == 0 ? "Yes":"No").'                                
                                    </li>
                                    <li> Has T.V. : '.$room->has_tv.'</li> 
                               </ul>
                                
                            </td>
                            <td>
                            <ul>
                                
                                <li> Phone : '.$room->has_phone.'</li>
                                <li> Available From : '.$room->available_from.'</li>
                                <li> Price Starts From : '.$room->price_per_day.'</li>                                
                            </ul>
                            </td>
                            <td><input type="checkbox"/></td>
                            </tr>';
                        }



              $step1 = $step1 .'</table></div></div>';



  $step2 = '<form class="form-horizontal">
        <fieldset>
        
        <!-- Form Name -->
        <h2 class="hotel-name">Personel Information</h2>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">First Name</label>
          <div class="col-md-4">
          <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
        
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Last Name</label>
          <div class="col-md-4">
          <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
        
          </div>
        </div>
        
        <!-- Multiple Radios (inline) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="radios">Gender</label>
          <div class="col-md-4">
            <label class="radio-inline" for="radios-0">
              <input type="radio" name="radios" id="radios-0" value="Male" checked="checked">
              Male
            </label>
            <label class="radio-inline" for="radios-1">
              <input type="radio" name="radios" id="radios-1" value="Female">
              Female
            </label>
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Nationality</label>
          <div class="col-md-4">
            <select id="selectbasic" name="selectbasic" class="form-control">
              <option value="1">Option one</option>
              <option value="2">Option two</option>
            </select>
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Place of birth</label>
          <div class="col-md-4">
            <select id="selectbasic" name="selectbasic" class="form-control">
              <option value="1">Option one</option>
              <option value="2">Option two</option>
            </select>
          </div>
        </div>
        
        
        <!-- Select Basic -->
        <div class="form-group">
            <label class="control-label col-md-4" for="registration-date">Date of birth:</label>
            <div class="col-md-4">
                <div class="input-group registration-date-time">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                    <input class="form-control" name="registration_date" id="registration-date" type="date">
                </div>
            </div>
        </div>
        
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">City of birth</label>
          <div class="col-md-4">
          <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
        
          </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textarea">Contact address</label>
          <div class="col-md-4">
            <textarea class="form-control" id="textarea" name="textarea"></textarea>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Telephone</label>
          <div class="col-md-4">
          <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
        
          </div>
        </div>
        
        <!-- Text input-->
       
        
        </fieldset>
        </form>
        ';

        $step3= '
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Payment Details
                            </h3>
        
                        </div>
                        <div class="panel-body">
                            <form role="form">
                            <div class="form-group">
                                <label for="cardNumber">
                                    CARD NUMBER</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                        required autofocus />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="expityMonth">
                                            EXPIRY DATE</label>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                        </div>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cvCode">
                                            CV CODE</label>
                                        <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span> Final Payment</a>
                        </li>
                    </ul>
                    <br/>
                    <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
                </div>
            </div>
        </div>
        ';

    $wizard_config = [
    	'id' => 'stepwizard',
    	'steps' => [
    		1 => [
    			'title' => 'Step 1',
    			'icon' => 'glyphicon glyphicon-hand-down ',
    			'content' => $step1,
    			'buttons' => [
    				'next' => [
    					'title' => 'Forward',
    					 'options' => [
    					// 	'class' => 'disabled'

    					 ],
    				 ],
    			 ],
    		],
    		2 => [
    			'title' => 'Step 2',
    			'icon' => 'glyphicon glyphicon-list-alt',
    			'content' => $step2,
    			'skippable' => false,
    		],
    		3 => [
    			'title' => 'Step 3',
    			'icon' => 'glyphicon glyphicon-credit-card',
    			'content' => $step3,
    		],
    	],
    	'complete_content' => "You are done!", // Optional final screen
    	'start_step' => 1, // Optional, start with a specific step
    ];
    ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
