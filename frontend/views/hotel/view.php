
<?php


  use kartik\date\DatePicker;
  use rmrevin\yii\fontawesome\FA;
  use backend\models\Hotel;
  use hotel\models\HotelProfile;
  use yii\helpers\Url;
  use yii\helpers\Html;
  use yii\widgets\Pjax;



$this->title = "Hotel Name";

  // get hotel details
  $hotel = \hotel\models\Hotel::findOne($id);
  $hotel_profile = \hotel\models\HotelProfile::find()->where(['hotel_hotel_id'=>$id])->one();
  

?>
<div class="site-index">
    <div class="row no-margin">
        <div class="col-md-8">

            <!--  Image Gallary started -->

          <div class="row">
            <div class="col-md-12 custom-div">
              <h1 class="hotel-name"><?= $hotel->hotelname ?></h1>
              <span class="small-margin"><?= $hotel_profile['address']?></span>

              <div class="row small-margin">
                <b>Hotol Photos</b>
                <?php
                //$hotel_images = Place::find()->limit(9)->all();
                $hotel_images = \hotel\models\HotelGallary::find()->where(['hotel_hotel_id'=>$id])->all();

                
                $slides = array();
                $thumbnails = array();

               ?>

                  <?php
                       foreach($hotel_images as $hotel_img){


                        //echo Html::img('/'.Yii::$app->name.'/hotel/upload/hotel_gallary/hotel_gallary_thumbnail/'.$hotel_img['image_name'])


//                           $slides [] =
//                               new Slide([
//                                   'items' => [
//                                       new Image(['src' => '/'.Yii::$app->name.'/hotel/upload/hotel_gallary/'.$hotel_img['image_name']]),
//                                       //new Layer(['tag' => 'h3', 'content' => substr($hotel_img['image_description'],0,300).'<a href="#">Read more</a>' , 'htmlOptions' => ['class' => 'sp-black', 'data-position' => "bottomLeft", 'data-horizontal' => "10%", 'data-show-transition' => "left", 'data-show-delay' => "300", 'data-hide-transition' => "right"]]),
//                                       //new Layer(['tag' => 'p', 'content' => $hotel_img['image_description'], 'htmlOptions' => ['class' => 'sp-white sp-padding', 'data-width' => "200", 'data-horizontal' => "center", 'data-vertical' => "40%", 'data-show-transition' => "down", 'data-hide-transition' => "up"]]),
//                                       //new Layer(['tag' => 'div', 'content' => $hotel_img['image_description'], 'htmlOptions' => ['class' => 'sp-static']]),
//                                   ],
//                               ]);
//
//                           $thumbnails [] = new \edofre\sliderpro\models\Thumbnail(['tag' => 'img', 'htmlOptions' => ['src' => Url::to(['images/everest.jpg']), 'data-src' => '/'.Yii::$app->name.'/hotel/upload/hotel_gallary/hotel_gallary_thumbnail/'.$hotel_img['image_name']]]);

                           $slides[] = [
                                   'img'=>Yii::$app->urlManagerHotel->baseUrl.'/upload/hotel_gallary/'.$hotel_img['image_name'],
                                   'caption' => 'Here Will Be Image Short Description',
                           ];

                       }

//                                  echo     \edofre\sliderpro\SliderPro::widget([
//                                          'id'            => 'my-slider',
//                                          'slides'        => $slides,
//                                          'thumbnails'    => $thumbnails,
//                                          'sliderOptions' => [
//                                              'width'  => '100%',
//                                              'height' => 400,
//                                              'arrows' => true,
//                                              'init'   => new \yii\web\JsExpression("
//                            function() {
//                              console.log('slider is initialized');
//                            }
//                          "),
//                      ],
//                  ]);


                            echo \metalguardian\fotorama\Fotorama::widget(
                                [
                                    'items' => $slides,
                                    'useHtmlData' => false,
                                    'htmlOptions' => [
                                        'class' => 'custom-class',
                                        'id' => 'custom-id',
                                    ],

                                    'options' => [
                                        'nav' => 'thumbs',
                                        'loop' => true,
                                        'hash' => true,
                                        'ratio'=>800/400,
                                        'autoplay'=>true,
                                        'transition'=>'crossfade',
                                        'margin'=>0,
                                        'fit'=>'cover',
                                        'allowfullscreen'=>true,
                                        'width'=>'100%',
                                    ]
                                ]
                            );




                  ?>
              </div>
            </div>
          </div>
            <!--  Image Gallary Ended -->
            <div class="row">
                <div class="col-md-12">
                    <?= $hotel_profile['description']; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3><u>Why <?= $hotel->hotelname; ?></u></h3>
                    <table class="table">
                        <?php

                            // get all the speciality
                            $specialities = \hotel\models\HotelSpeciality::find()->all();
                            $i=0;
                            //print_r($specialities);
                            foreach($specialities as $speciality){
                                ++$i;
                                if($i == 1) {
                                    echo '<tr><td>';
                                    echo FA::icon('check-circle', ['class' => 'color-blue'])->size(FA::SIZE_2X) . $speciality->speciality;
                                    echo '<p class="spel-description"><span>'.$speciality->description.'</span></p>';
                                    echo '</td>';
                                    $i = $i+1;
                                }else{
                                    echo '<td>';
                                    echo FA::icon('check-circle', ['class' => 'color-blue'])->size(FA::SIZE_2X) . $speciality->speciality;
                                    echo '<p class="spel-description"><span>'.$speciality->description.'</span></p>';
                                    echo '</td></tr>';
                                    $i= 0;
                                }

                        }

                        ?>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3><u>Facilities</u></h3>
                    <table class="table">

                        <?php

                        // get all the speciality
                        $facilities = \hotel\models\HotelFacility::find()->where(['hotel_hotel_id'=>$id])->all();
                        $i=0;
                        //print_r($specialities);
                        foreach($facilities as $facility){
                            ++$i;
                            if($i == 1) {
                                echo '<tr><td>';
                                echo FA::icon('check', ['class' => 'color-blue'])->size(FA::SIZE_2X) . $facility->facility;
                                echo '<p class="spel-description"><span>'.$facility->description.'</span></p>';
                                echo '</td>';
                                $i = $i+1;
                            }else if($i==2){
                                echo '<td>';
                                echo FA::icon('check', ['class' => 'color-blue'])->size(FA::SIZE_2X) . $facility->facility;
                                echo '<p class="spel-description"><span>'.$facility->description.'</span></p>';
                                echo '</td>';
                                $i= $i+1;
                            }else{
                                echo '<td>';
                                echo FA::icon('check', ['class' => 'color-blue'])->size(FA::SIZE_2X) . $facility->facility;
                                echo '<p class="spel-description"><span>'.$facility->description.'</span></p>';
                                echo '</td></tr>';
                                $i= 0;
                            }

                        }

                        ?>

                    </table>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="row no-margin">
            <div class="col-md-12 custom-div small-padding gold">
                <h3 class="heading-title">BOOKING</h3>
                <div class="booking-form">
                    <b>What we offers</b>
                    <ul>
                        <li> Secure Transaction</li>
                        <li> Reliable Resources</li>
                        <li> Customer Support</li>
                        <li> Heavy Discount</li>

                    </ul>
                  <?= yii\helpers\Html::beginForm('book','get') ?>
                    <div style="margin:1em auto;">
                    <?php

                        echo '<label class="control-label">Please Choose Check In and Check Out Date</label>';
                        echo DatePicker::widget([
                          'name' => 'from_date',
                          'value' => date("Y-m-d"),
                          'type' => DatePicker::TYPE_RANGE,
                          'name2' => 'to_date',
                          'value2' => date("Y-m-d"),
                          'pluginOptions' => [
                              'autoclose'=>true,
                              'format' => 'yyyy-mm-dd',
                          ]
                        ]);




                     ?>

                        <input type="hidden" value="<?= $id?>" name="hotel_id"/>
                        

                   </div>
                     <input type="submit" value="Proceed Booking" class="btn btn-primary form-control"/>
                  <?= \yii\helpers\Html::endForm() ?>
                </div>
            </div>
          </div>

            <!-- Map sections started -->
            <div class="row no-margin">

            <?php

            echo yii2mod\google\maps\markers\GoogleMaps::widget([
                'userLocations' => [
                    [
                        'location' => [
                            'city'=> $hotel->hotelname,
                            'address' => $hotel_profile['address'],
                            'country' => 'Nepal',
                        ],
                        'htmlContent' => '<h1>Nepal</h1>',
                    ],

                ],
                'googleMapsUrlOptions' => [
                    'key' => 'AIzaSyDfagmG6zJeUzLgaCtkE9_F-yiDeEJVUBU',
                    'language' => 'id',
                    'version' => '3.1.18',
                ],
                'googleMapsOptions' => [
                    'mapTypeId' => 'roadmap',
                    'tilt' => 45,
                    'zoom' => 20                                                                ,
                ],
            ]);

            ?>

            </div>
            <! --  Map Sections Ended-->

            <div class="row no-margin ds">

                <!--COMPLETED ACTIONS DONUTS CHART-->
<!--                <h3>NOTIFICATIONS</h3>-->

                <!-- First Action -->
<!--                <div class="desc">-->
<!--                    <div class="thumb">-->
<!--                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                    </div>-->
<!--                    <div class="details">-->
<!--                        <p><muted>2 Minutes Ago</muted><br>-->
<!--                            <a href="#">James Brown</a> subscribed to your newsletter.<br>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <!-- Second Action -->
<!--                <div class="desc">-->
<!--                    <div class="thumb">-->
<!--                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                    </div>-->
<!--                    <div class="details">-->
<!--                        <p><muted>3 Hours Ago</muted><br>-->
<!--                            <a href="#">Diana Kennedy</a> purchased a year subscription.<br>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <!-- Third Action -->
<!--                <div class="desc">-->
<!--                    <div class="thumb">-->
<!--                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                    </div>-->
<!--                    <div class="details">-->
<!--                        <p><muted>7 Hours Ago</muted><br>-->
<!--                            <a href="#">Brandon Page</a> purchased a year subscription.<br>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <!-- Fourth Action -->
<!--                <div class="desc">-->
<!--                    <div class="thumb">-->
<!--                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                    </div>-->
<!--                    <div class="details">-->
<!--                        <p><muted>11 Hours Ago</muted><br>-->
<!--                            <a href="#">Mark Twain</a> commented your post.<br>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <!-- Fifth Action -->
<!--                <div class="desc">-->
<!--                    <div class="thumb">-->
<!--                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                    </div>-->
<!--                    <div class="details">-->
<!--                        <p><muted>18 Hours Ago</muted><br>-->
<!--                            <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->

                <!-- USERS ONLINE SECTION -->
                <h3 id="heading">HOTEL REVIEW</h3>
                <!-- First Member -->


                <?php
                
                            Pjax::begin();

                    $comments = \backend\models\HotelComments::find()->where(['hotel_hotel_id'=>$id])->all();

                    foreach($comments as $comment){
                        // get customer image 
                        $c_image = \frontend\models\CustomerProfile::findOne(['customer_id'=>$comment->customer_id]);
                        //echo '<pre>'.$c_image.'</pre>';
                        ?>
                        <!-- Second Member -->
                        <div class="desc">
                            <div class="thumb">
                                
                                <img class="img-circle" src="<?= Yii::$app->urlManagerFrontend->baseUrl.'/upload/thumbnail/'.empty($c_image) ? "No_image.jpg" : $c_image->image ?>" width="35px" height="35px" align="" onerror="this.onerror=null;this.src='https://tripsansar.com/upload/thumbnail/No_image.jpg';" >
                            </div>
                            <div class="details">
                                <?php
                                $name = "";
                                if(!empty($c_image)){
                                    $name = $c_image->firstName.' '.$c_image->middleName.' '.$c_image->lastName;
                                }else{
                                    $name = \hotel\models\Customer::findOne($comment->customer_id)['username'];
                                }
                                                                        
                                ?>
                                <p><a href="#"><?= $name; ?></a><br>
                                    <muted><?= $comment->comments;?></muted>
                                </p>
                            </div>
                        </div>

                <?php

                    }

                ?>


                <?php

                if(Yii::$app->user->isGuest !=true){
                    ?>

                    <div class="desc">
                        <textarea type="text" id="cmt" class="form-control" placeholder="Enter Your Review"></textarea>
                        <input type="button" class="btn btn-sm pull-right btn-primary form-control" id="cmtBtn" value="Commit"/>
                        <input type="hidden" id="hotelid" value="<?php echo $id ?>"/>
                        <input type="hidden" id="userid" value="<?php echo Yii::$app->user->identity->getId(); ?>"/>


                    </div>



                    <?php
                }

                Pjax::end();

                ?>




            </div>

        </div>
    </div>

    <?php

    ///////////////////// LOAD THE PLACES YOU MAKE LIKE //////////////////////

    // LATER DIFFERENT ALGORITHM SHOULD MAINTAIN TO SEARCH THE RESULT ////////

    //////////////////////////////////////////////////////////////////////////

    $hotel_you_make_like = Hotel::find()->select(['hotel_id','hotelname'])->limit(10)->all();


    echo '<div class="row">';
    echo '<div class="col-md-12">';

    echo '<div class="itnry_head_wrap"><span class="days_box">RELATED HOTELS </span><span></span> </div>';




    \wokster\owlcarousel\OwlWidget::begin([
        'theme'=>'green', //can be "green","default", false (false by default)
        'plaginOptions'=>[
            'loop' => true,
            'margin' => 10,
            'autoplay'=>true,
            'responsiveClass' => true,
            'responsive' => [
                0 => ['items'=>1,'nav'=>true],
                600 => ['items'=>3,'nav'=>true],
                1000 => ['items'=>5,'nav'=>true],
            ],
        ]
    ]);?>


    <?php
    foreach($hotel_you_make_like as $hotel){
        $image= HotelProfile::find()->select('image')->where(['hotel_hotel_id'=>$hotel->hotel_id])->one();
        echo '<div class="place_info_div">';
        echo '<a href="'.Url::to(['hotel/view?id='.$hotel['hotel_id']]).'">';


        echo Html::img(Yii::$app->urlManagerHotel->baseUrl.'/upload/hotel_thumbnail/'.$image['image'],['class'=>'img-thumbnail']);
        echo '<div class="place_info">';
        ?>

        <table class="place_info_table">
            <tr>
                <th> Name : </th>
                <td><?= $hotel['hotelname'] ?> </td>
            </tr>
            <tr>
                <th> Ratting : </th>
                <td><span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
            </tr>
            <tr>
                <th> Comments : </th>
                <td>58 </td>
            </tr>

        </table>
        <?php
        echo '</div>';
        echo '</a></div>';

    } ?>

    <?php \wokster\owlcarousel\OwlWidget::end()?>


  <?=

  $this->registerJsFile(
      '@web/js/comment.js',
      ['depends' => [\yii\web\JqueryAsset::className()]]
  );

?>
