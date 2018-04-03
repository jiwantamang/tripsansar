<?php
 use yii\helpers\Html;
 use yii\helpers\Url;
 use frontend\models\Place;
 use frontend\models\placecatagory;
 use dosamigos\gallery\Gallery;
 use backend\models\PlaceImage;
 use backend\models\PlaceGallary;
 use backend\models\Testimonial;
 use backend\models\PlaceHotel;
 use backend\models\Hotel;
 use yii\web\View;
 $data = Place::findOne($id);
 
 $this->title = $data->placetitle;
 

?>

<div class="site-index">
  <div class="placeimage">

    <?php

  $slides = array();
  $thumbnails = array();

  ?>

    <?php
    $images = PlaceImage::find()->where(['place_id'=>$id])->all();

    foreach($images as $image){
    // get place image
    
      $slides[] = [
          'img'=>Yii::$app->urlManagerBackend->baseUrl.'/upload/image/'.$image['image_name'],
          //'caption' =>substr($place['placedescription'],0,300).'<a href="#">Read more</a>',
          'zIndex'=>0,
    
          ];
  }



    
?>


    <?php

echo \metalguardian\fotorama\Fotorama::widget(
    [
        'items' => $slides,
        'useHtmlData' => false,

        'htmlOptions' => [
            'class' => 'custom-class',
            'id' => 'custom-id',
            'zIndex'=>100,
        ],

        'options' => [
          //  'nav' => 'thumbs',
            'loop' => true,
            'hash' => true,
            'ratio'=>800/300,
            'autoplay'=>true,
            'transition'=>'crossfade',
            'margin'=>0,
            'fit'=>'cover',
            'allowfullscreen'=>true,
            'width'=>'100%',
            'arrows'=>true,
            'click'=>true,


        ]
    ]
);



?>

  </div>


 

    <div class="row small-margin">
        <div class="container" style="margin-left: -2%;margin-right: -2%">
            <div class="col-md-8 sticky_column">
                   <div class="row no-margin">
                      <div class="col-md-12">
                            <div class="gradient-heading-height">

                                <span> INTRODUCTION </span> <span class="itnry_heading"> <?= strtoupper($data['placetitle']); ?></span>
                            </div>
                        

                        <section class="placedescription">
                          <?= $data['placedescription']?>
                        </section>
                      </div>


                    </div>
                 <div class="row no-margin">
                   <div class="col-md-12">
                       <?php 
                          if($data['festivals'] != null)
                              echo ' <h4 class="heading-title">  FESTIVALS</h4>';
                             echo '<section class="placedescription">';
                                echo $data['festivals'];
                             echo '</section>';
                       ?>


                  </div>
              </div>
                 <div class="row no-margin">
                   <div class="col-md-12">
                       <?php 

                          if($data['trip_summary'] !=null){
                              echo '<h4 class="heading-title">  TRIP SUMMARY</h4>';
                              echo '<section class="placedescription">';
                              echo $data['trip_summary'];
                              echo '</section>';
                          }

                       ?>


                  </div>
                 </div>

                 <div class="row no-margin">
                   <div class="col-md-12">
                       <?php 
                              if($data['placespeciality'] !=null){
                                  echo ' <h4 class="heading-title">  SPECIALITY</h4>';
                                  echo '<section class="placedescription">';
                                  echo $data['placespeciality'];
                                  echo '</section>';
                              }
                       ?>



                  </div>
                </div>

                 <div class="row no-margin">
                   <div class="col-md-12">
                       <?php
                          if($data['contact'] != null){
                              echo '<h4 class="heading-title">  CONTACT</h4>';
                              echo '<section class="placedescription">';
                              echo $data['contact'];
                              echo '</section>';
                          }
                       ?>



                  </div>
                 </div>






                        <!--  Photo Gallery Started -->

                        <?php
                            $gallary_images = PlaceGallary::find()->where(['place_id'=>$id])->all();
                            if(count($gallary_images) > 0){

                         ?>
                        
                        
                         <div class="gradient-heading-height">
                            <span> PHOTO GALLERY </span> <span class="itnry_heading"></span>
                        </div>

                        
                        

                        <section class="small-margin">

                          <?php

                            // get gallary of this place

                            $items = array();
                            foreach($gallary_images as $gallary){
                              $img1 = Yii::$app->urlManagerBackend->baseUrl.'/upload/place_gallary/place_gallary_thumbnail/'.$gallary->image_name;
                              $img2 = Yii::$app->urlManagerBackend->baseUrl.'/upload/place_gallary/'.$gallary->image_name;


                                $items[] = [
                                      'url' => $img2,

                                      'src' => $img1,
                                      'options' => array('title' => $gallary->image_caption)
                                ];
                            }



                          ?>

                         <?= Gallery::widget(['items' => $items]); ?>


                        </section>

                        <?php

                      }

                        ?>
                        <!--  Photo Gallery Ended -->




                    <?php
                    $testimonials=Testimonial::find()->where(['place_place_id'=>$id])->all();
                    if(count($testimonials) > 0){

                                    ?>
                                    <div class="row no-margin">
                                      <div class="itnry_head_wrap">

                                          <span class="days_box">WHAT PEOPLE ARE SAYING ABOUT THIS PLACES </span> <span class="itnry_heading"></span>



                                      </div>

                                        <div class="content">
                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                          <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                            </ol> <!-- Wrapper for slides --> <div class="carousel-inner">
                                              <?php
                                                // get all the testimonials related with this place

                                                $i =0;
                                                foreach($testimonials as $testimonial){
                                                  $img = $testimonial['image'];
                                                  if($i==1){

                                                    ?>

                                                      <div class="item active">
                                                        <div class="row">
                                                          <div class="col-xs-12">
                                                             <div class="thumbnail adjust1">
                                                               <div class="col-md-3 col-sm-3 col-xs-12">
                                                                 <img class="media-object img-circle img-responsive" src="<?= '/'.Yii::$app->name.'/backend/upload/testimonial/'.$img?>">
                                                               </div>
                                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <div class="caption">
                                                                  <p class="text-info lead adjust2"><?= $testimonial['heading']; ?></p>
                                                                  <p><span class="glyphicon glyphicon-thumbs-up"></span> <?= $testimonial['description'];?></p>
                                                                  <blockquote class="adjust2"> <p><?= $testimonial['fullname']?></p> <small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i><?= $testimonial['designation']?></cite></small> </blockquote>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <?php
                                                    }else{

                                                      ?>

                                                      <div class="item">
                                                        <div class="row">
                                                          <div class="col-xs-12">
                                                             <div class="thumbnail adjust1">
                                                               <div class="col-md-3 col-sm-3 col-xs-12">
                                                                 <img class="media-object img-circle img-responsive" src="<?= '/'.Yii::$app->name.'/backend/upload/testimonial/'.$img?>">
                                                               </div>
                                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <div class="caption">
                                                                  <p class="text-info lead adjust2"><?= $testimonial['heading']; ?></p>
                                                                  <p><span class="glyphicon glyphicon-thumbs-up"></span> <?= $testimonial['description'];?></p>
                                                                  <blockquote class="adjust2"> <p><?= $testimonial['fullname']?></p> <small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i><?= $testimonial['designation']?></cite></small> </blockquote>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <?php

                                                    }

                                                    $i++;
                                                }
                                              ?>

                                            <!-- <div class="item">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="thumbnail adjust1">
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                              <img class="media-object img-circle img-responsive" src="<?= '/'.Yii::$app->name.'/backend/upload/user/image/mithun.jpg'?>">
                                                            </div>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                              <div class="caption">
                                                                <p class="text-info lead adjust2">I can't wait to test this out.</p>
                                                                  <p>
                                                                    <span class="glyphicon glyphicon-thumbs-up"></span> This is a testimonial window. Feedback of user can be displayed here.</p>
                                                                    <blockquote class="adjust2">
                                                                      <p>Abhijit Goswami</p>
                                                                      <small><cite title="Source Title"><i class="glyphicon glyphicon-globe"></i> www.example2.com</cite></small>
                                                                    </blockquote>
                                                                  </div>
                                                                </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                            </div>
                                            <div class="item">
                                                   <div class="row">
                                                       <div class="col-xs-12">
                                                          <div class="thumbnail adjust1">
                                                              <div class="col-md-3 col-sm-3 col-xs-12">
                                                                <img class="media-object img-circle img-responsive" src="<?= '/'.Yii::$app->name.'/backend/upload/user/image/mithun.jpg'?>"> </div>
                                                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="caption">
                                                                      <p class="text-info lead adjust2">I can't wait to test this out.</p>
                                                                        <p><span class="glyphicon glyphicon-thumbs-up"></span> This is a testimonial window. Feedback of user can be displayed here.</p>
                                                                          <blockquote class="adjust2">
                                                                            <p>Abhijit Goswami</p> <small><cite title="Source Title">
                                                                              <i class="glyphicon glyphicon-globe"></i> www.example3.com</cite></small>
                                                                          </blockquote>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                          </div>
                                                    </div>
                                            </div> -->
                                          </div> <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                   <span class="glyphicon glyphicon-chevron-right">
                                                   </span>
                                                </a>
                                             </div>
                                          </div>
                                    </div>
                    <?php
                    }
                    ?>





            </div>

            <div class="col-md-4 left-border-dotted sticky_column">
              <div class="row no-margin">
                
                    
                    
                    <div class="gradient-heading-sm-height">
                            <span> ACCOMMODATION </span> <span class="itnry_heading"></span>
                    </div>

                    <table class="tbl-hotel">

                    <?php 

                    
                      // get all the hotel id related with this place from place_hotel juntion table
                      $hotels_id = PlaceHotel::find()->select('hotel_hotel_id')->where(['place_place_id'=>$id])->all();
                      if(count($hotels_id) <= 0){
                          echo '<div class="not-found-div">Not any hotels integrated yet on this place</div>';
                      }
                      foreach($hotels_id as $hotel_id){
                          // get details of this hotel
                          $hotel = Hotel::find()->select(['hotelname','hotel_type','hotel_catagory'])->where(['hotel_id'=>$hotel_id->hotel_hotel_id])->one();
                          //get hotel profile
                          $hotel_profile = \hotel\models\HotelProfile::find()->select(['rating','minimum_cost','note1','note2','note3','note4','image'])->where(['hotel_hotel_id'=>$hotel_id->hotel_hotel_id])->one();

                          ?>

                          <tr>
                              <td><img src="<?php echo Yii::$app->urlManagerHotel->baseUrl; ?>/upload/hotel_thumbnail/<?= $hotel_profile->image ?>" class="img-thumbnail hotel-img-thumbnail" ></td>
                              <td>
                                  <ul>
                                      <li><?= Html::a('<b>'.ucwords($hotel->hotelname).'</b>',['hotel/view','id'=>Yii::$app->encrypt->encode($hotel_id->hotel_hotel_id)]); ?></li>
                                      <li>
                                          <?php 
                                          
                                            for($i=0; $i < $hotel->hotel_catagory; $i++){
                                                echo '<span class="glyphicon glyphicon-star blue" aria-hidden="true"></span>';
                                                
                                            }
                                          
                                          ?>
                                      </li>
                                      <li> <p style="color:green;font-size:0.8em"><?= $hotel_profile->note1 ?><p></li>
                                      <li>
                                          <?= Html::a('Book Now',['hotel/view','id'=>Yii::$app->encrypt->encode($hotel_id->hotel_hotel_id)],['class'=>'btn btn-xs btn-primary']); ?>                                          
                                      </li>
                                      
                                  </ul>

                              </td>
                          </tr>



                          <?php

                      }


                    ?>

                    </table>

            
              </div>

<!--              <div class="row no-margin">
                <section class="advertisement-box">

                </section>
              </div>-->

                  <!-- Map sections started -->
              <div class="row no-margin">

                  <?php

                  echo yii2mod\google\maps\markers\GoogleMaps::widget([
                      'userLocations' => [
      //                    [
      //                        'location' => [
      //                            'address' => 'Nepal  Central Region  Narayani Zone  Chitwan District  Sauraha',
      //                            'country' => 'Nepal',
      //                        ],
      //                        'htmlContent' => '<h1>Nepal</h1>',
      //                    ],
                          [
                              'location' => [
                                  'city' => $data['placetitle'],
                                  'country' => 'Nepal',
                              ],
                              'htmlContent' => '<h1>New York</h1>',
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



            </div>
        </div>

    </div>

    <div class="row no-margin">

      
        <div class="col-lg-12">

              <div class="gradient-heading-he">

                    <span>NEARBY PLACES </span>
                </div>
         

          <?php

            ///////////////////// LOAD THE PLACES YOU MAKE LIKE //////////////////////

            // LATER DIFFERENT ALGORITHM SHOULD MAINTAIN TO SEARCH THE RESULT ////////

            //////////////////////////////////////////////////////////////////////////

            $place_you_make_like = Place::find()->select(['place_id','placetitle','placedescription'])->limit(6)->all();


            echo '<div class="row">';
            echo '<div class="col-md-12">';



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
                  foreach($place_you_make_like as $lplace){
                    $image= PlaceImage::find()->select('image_name')->where(['place_id'=>$lplace->place_id])->one();
                    echo '<div class="place_info_div">';
                    echo '<a href="'.Url::to(['place/placedescription?place='.Yii::$app->encrypt->encode($lplace['place_id'])]).'">';


                    echo Html::img(Yii::$app->urlManagerBackend->baseUrl.'/upload/thumbnail_widget/'.$image['image_name'],['class'=>'img-thumbnail']);
                    echo '<div class="place_info">';
                      ?>

                        <table class="place_info_table">
                            <tr>
                                <th> Name : </th>
                                <td><?= $lplace['placetitle'] ?> </td>
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

          </div>
    </div>

 </div>

    <?php


$this->registerJs(
        '$(function(){
  
        $(".sticky_column").stick_in_parent();
    });
        ', View::POS_READY, 'my-button-handler'
);

?>