<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use backend\models\Place;
    use backend\models\PlaceImage;
    use yii\db\Expression;
    use yii\web\View;
    use kartik\alert\Alert;

    

    $this->title = "TripSansar";


    // get sum random slide images

    $slide_places = Place::find()->select(['place_id','placetitle','placedescription'])->orderBy(new Expression('rand()'))->limit(6)->all();

    // get single images

?>




<div class="site-index">
    
    <?php
                
                if(Yii::$app->session->hasFlash("book-success")){
                    echo Alert::widget([
                        'type' => Alert::TYPE_SUCCESS,
                        'title' => 'Congratulation',
                        'titleOptions' => ['icon' => 'info-sign'],
                        'body' => 'Your package is secured, check your email for further instruction'
                ]);                  
                  Yii::$app->session->removeFlash("book-success");
                }
            
            ?>
    
    
  <!-- Content Row -->
<div class="row my-4">
  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
      <div class="itnry_head_wrap" style="margin-top: 1%;">                   
            <div class="gradient-heading">
                Single Long Trip
            </div>
      </div>

      <?php
      
        // get the package details
      
      $packages = \backend\models\Package::find()->select(['id','package_name','minimum_team_no','start_date','total_days','amount'])->all();
      
      
      ?>
      
      
<?php
    \wokster\owlcarousel\OwlWidget::begin([
           'theme'=>'green', //can be "green","default", false (false by default)
           'plaginOptions'=>[
               'loop' => true,
               'margin' => 10,
               'center'=>true,
               'autoplay'=>true,
               'responsiveClass' => true,
               'animateOut'=> 'slideOutDown',
               'animateIn'=> 'flipInX',
               'merge'=>true,
               'responsive' => [
                 0 => ['items'=>1,'nav'=>true],
                 600 => ['items'=>3,'nav'=>true],
                 1000 => ['items'=>5,'nav'=>true],
               ],
           ]
       ]);?>


        <?php
            
            foreach($packages as $package){
                
                ?>
                
                    <div class="card h-100  card-min-height">
                        <div class="card-body">
                            <h4 class="card-title text-primary"><?= $package['package_name'];?></h4>
                            <?php
                                    // get the images 
                                    $image = \backend\models\PackageImage::findOne(['package_id'=>$package->id])['image_name'];
                            ?>
                          <img class="img-fluid mb-3 img-thumbnail img-responsive" height="100px" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/upload/package_gallary/package_gallary_thumbnail/'.$image?>" alt="">
                          
                          <p class="card-text">

                             <table>
                                 
                               <tr>
                                 <td> Start Date : </td>
                                 <td> <strong> <?= Yii::$app->formatter->asDate($package['start_date']); ?> </strong> </td>
                               </tr>
                               
                               <tr>
                                 <td> Minimum Team : </td>
                                 <td> <strong><?= $package['minimum_team_no']; ?> persons </strong></td>
                               </tr>
                               
                               <tr>
                                 <td> Total Days  : </td>
                                 <td> <strong><?= $package['total_days']; ?> days</strong> </td>
                               </tr>
                               
                             </table>

                          </p>
                        </div>
                        <div class="card-footer">
                          <?= Html::a('More Info',['site/package','id'=>$package['id']],['class'=>'btn btn-sm btn-primary pull-left'])?>
                          <?= Html::a('Book Now',['bookpackage','id'=>$package['id']],['class'=>'btn btn-sm btn-success pull-right'])?>
                          
                        </div>
                      </div>

      
                <?php
            }
        
        ?>

           
         
       <?php \wokster\owlcarousel\OwlWidget::end()?>

  </div>
</div>

<div class="site-places">
    
        <div class="row" style="margin-right:2.5em">
          <div class="col-md-8 col-sm-8">
            <div class="row">
              <div class="col-md-12">
                <div class="itnry_head_wrap">

                    <?php
                      //////////// HIKING PLACES DATA //////////////////
                      ///          LOAD DATA FROM DB  /////////////////
                      /////////////////////////////////////////////////

                      $hiking_places = Place::find()->select(['place_id','placetitle','placedescription'])->orderBy(new Expression('rand()'))->limit(6)->all();

                     ?>


                    <div class="gradient-heading">
                        <span>Popular Hiking </span>
                    </div>




                </div>

                <div class="row">
                  <div class="col-md-12" style="padding:0.5em 0 0 1.5em;">

                    <?php

                        foreach($hiking_places as $place){
                          $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$place->place_id])->one();
                          ?>


                          <div class="row row_divider">
                            <div class="col-md-9">

                              <div class="hiking-view" style="padding:auto 1% ">
                                  <div class="hiking-img">
                                      <img src="<?= Yii::$app->urlManagerBackend->baseUrl; ?>/upload/thumbnail_widget/<?= $image['image_name']?>" class="img-responsive img-thumbnail"/>
                                  </div>
                                  <?php
                                      $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'],0,150).' ...' : $place['placedescription'];
                                      $description = strip_tags($description);
                                      $title = strtoupper($place['placetitle']);
                                      $catagory = $place['placecatagory'];
                                      echo Html::a("<div class='hiking-description'>
                                        <b>$title</b> <span>$catagory</span>
                                        <p class='small-margin'>$description </p>

                                      </div>",['place/placedescription?place='.Yii::$app->encrypt->encode($place['place_id'])]);

                                   ?>

                              </div>

                            </div>

                          </div>

                          <hr>
                          <?php
                        }
                     ?>
                  </div>
                </div>

              </div>

            
                </div>

                </div>
          
          

        <div class="col-md-4 col-sm-4">
          <div class="row">
            <div class="col-md-12">
              <section   style="background-color: wheat">
                <div class="gradient-heading">

                    <span >WATER FALLS </span>
                </div>
                    <?php
                    // find the id of the water fall
                    $waterfall_id = \backend\models\Placecatagory::find()->where(['placecatagory'=>'Falls'])->one();
                    $falls = Place::find()->where(['placecatagory'=>$waterfall_id->placecatagory_id])->all();
                    foreach($falls as $place){
                        $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$place->place_id])->one();
                        ?>


                        <div class="row no-margin">
                            <div class="col-md-3 small-padding">

                                <div class="falls-img">
                                    <img src="<?= Yii::$app->urlManagerBackend->baseUrl?>/upload/thumbnail_widget/<?= $image['image_name']?>" class="img-responsive" alt="images"/>
                                </div>
                            </div>
                            <div class="col-md-9 small-padding">
                                <?php
                                //$description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'],0,150).' ...' : $place['placedescription'];
                                //$description = strip_tags($description);
                                $title = strtoupper($place['placetitle']);
                                //$catagory = $place['placecatagory'];
                                echo Html::a("<div class='hiking-description'>
                                        <b>$title</b>
                                      </div>",['place/placedescription?place='.Yii::$app->encrypt->encode($place['place_id'])]);

                                ?>

                            </div>

                        </div>

                        <hr class="no-margin" style="border-color:white">
                        <?php
                    }
                    ?>


              </section>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <section   style="background-color: wheat">
                    <div class="gradient-heading">

                        <span>CAVE </span>
                    </div>
                    <?php
                    $cave_id = \backend\models\Placecatagory::find()->where(['placecatagory'=>'cave'])->one();
                    $falls = Place::find()->where(['placecatagory'=>$cave_id->placecatagory_id])->all();
                    foreach($falls as $place){
                        $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$place->place_id])->one();
                        ?>


                        <div class="row no-margin">
                            <div class="col-md-3 small-padding">

                                <div class="falls-img">
                                    <img src="<?= Yii::$app->urlManagerBackend->baseUrl;?>/upload/thumbnail_widget/<?= $image['image_name']?>" class="img-responsive"/>
                                </div>
                            </div>
                            <div class="col-md-9 small-padding">
                                <?php
                                $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'],0,150).' ...' : $place['placedescription'];
                                $description = strip_tags($description);
                                $title = strtoupper($place['placetitle']);
                                $catagory = $place['placecatagory'];
                                echo Html::a("<div class='hiking-description'>
                                        <b>$title</b>
                                      </div>",['place/placedescription?place='.Yii::$app->encrypt->encode($place['place_id'])]);

                                ?>

                            </div>

                        </div>

                        <hr class="no-margin" style="border-color:white">
                        <?php
                    }
                    ?>


                </section>
            </div>
          </div>

            <?php
                  $himalays_id = \backend\models\Placecatagory::find()->where(['placecatagory'=>'himalays'])->one();
                  if(!empty($himalays_id)){
            ?>
          <div class="row">
            <div class="col-md-12">
                <section   style="background-color: wheat">
                       <div class="gradient-heading">

                        <span>HIMALAYS TRIP </span>
                    </div>
                    <?php



                         $falls = Place::find()->where(['placecatagory'=>$himalays_id->placecatagory_id])->all();
                    foreach($falls as $place){
                        $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$place->place_id])->one();
                        ?>

                        <div class="row no-margin">
                            <div class="col-md-3 small-padding">

                                <div class="falls-img">
                                    <img src="/backend/upload/thumbnail_widget/<?= $image['image_name']?>" class="img-responsive"/>
                                </div>
                            </div>
                            <div class="col-md-9 small-padding">
                                <?php
                                $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'],0,150).' ...' : $place['placedescription'];
                                $description = strip_tags($description);
                                $title = strtoupper($place['placetitle']);
                                $catagory = $place['placecatagory'];
                                echo Html::a("<div class='hiking-description'>
                                        <b>$title</b>
                                      </div>",['place/placedescription?place='.Yii::$app->encrypt->encode($place['place_id'])]);

                                ?>

                            </div>

                        </div>

                        <hr class="no-margin" style="border-color:white">

                        <?php
                    }

                    ?>

                        </section>
            </div>
          </div>

                        <?php

                    }

                    ?>





            <div class="row">
                <div class="col-md-12">
                    <section   style="background-color: wheat">
                         <div class="gradient-heading">

                            <span>NATIONAL PARK </span>
                        </div>
                        <?php
                        $nationalpark_id = \backend\models\Placecatagory::find()->where(['placecatagory'=>'national park'])->one();
                        $falls = Place::find()->where(['placecatagory'=>$nationalpark_id->placecatagory_id])->all();
                        foreach($falls as $place){
                            $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$place->place_id])->one();
                            ?>

                            <div class="row no-margin">
                                <div class="col-md-3 small-padding">

                                    <div class="falls-img">
                                        <img src="<?= Yii::$app->urlManagerBackend->baseUrl;?>/upload/thumbnail_widget/<?= $image['image_name']?>" class="img-responsive"/>
                                    </div>
                                </div>
                                <div class="col-md-9 small-padding">
                                    <?php
                                    $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'],0,150).' ...' : $place['placedescription'];
                                    $description = strip_tags($description);
                                    $title = strtoupper($place['placetitle']);
                                    $catagory = $place['placecatagory'];
                                    echo Html::a("<div class='hiking-description'>
                                        <b>$title</b>
                                      </div>",['place/placedescription?place='.Yii::$app->encrypt->encode($place['place_id'])]);

                                    ?>

                                </div>

                            </div>

                            <hr class="no-margin" style="border-color:white">
                            <?php
                        }
                        ?>


                    </section>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    <iframe width="100%" height="480" src="https://www.youtube.com/embed/wXZVbaTZiWA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                </div>
            </div>

        </div>
 
        
        </div>

<div class="row">
      <div class="col-lg-12">

                     <div class="gradient-heading">

                      <span>PLACES YOU MAY LIKE </span>
                    </div>

                  <?php

                    ///////////////////// LOAD THE PLACES YOU MAKE LIKE //////////////////////

                    // LATER DIFFERENT ALGORITHM SHOULD MAINTAIN TO SEARCH THE RESULT ////////

                    //////////////////////////////////////////////////////////////////////////

                    $place_you_make_like = Place::find()->select(['place_id','placetitle'])->where(['is_adventure'=>0])->orderBy(new Expression('rand()'))->limit(6)->all();


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
                            $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$lplace->place_id])->one();
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
    

<div id="message-model" class="modal">

    <div class="modal-dialog">

        <div class="modal-content" style="border-radius: 0px;">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title text-info">Notice</h4>
                
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <?= Html::img("@web/images/construction.png",['class'=>'text-center']);?>
                    <h3> This site is in under construction.</h3>
                    </div>
                </div>
                                
            </div>

        </div>

    </div>

</div>

<?php


$this->registerJs(
        '$(function(){

    $(".sticky_column").stick_in_parent();
    //$("#message-model").modal("show");            
});
        ', View::POS_READY, 'my-button-handler'
);

?>
