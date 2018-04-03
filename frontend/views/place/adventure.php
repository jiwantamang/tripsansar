<?php

use yii\web\View;
use frontend\models\Place;
use backend\models\PlaceImage;
use yii\helpers\Html;
use yii\db\Expression;

$this->title = "Adventure";
?>

<?php
$this->registerCss(".flip {
        height: 250px;
        width: 250px;
        margin: 0 auto;
    }
    .flip img {
        width: 250px;
        height: auto;
    }
    .flip .back {
        background: #2184cd;
        color: #fff;
        text-align: center;
    }");
?>


<div class="site-index">
    <div class="row no-margin">

        <div class="col-md-8 col-lg-8 col-sm-8" id="main_column">
            <div class="row no-margin">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="itnry_head_wrap small-margin">
                        <span class="small-margin heading-title">RAFTING</span>
                    </div>
                    <div class="row no-margin">
                        <?php
                        
                            $rafting_places = Place::find()->select(['place_id','placetitle','trip_summary'])->where(['is_adventure'=>1])->andWhere(['placecatagory'=>15])->orderBy(new Expression('rand()'))->limit(4)->all();
                            
                            
                            foreach($rafting_places as $rafting_place){
                                $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$rafting_place->place_id])->one();
                                
                                ?>
                        
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="flip">                         
                                        <div class="front"> 
                                            <?php
                                            $img1 = '/' . Yii::$app->name . '/backend/upload/thumbnail_widget/'.$image['image_name'];
                                            echo '<img src="' . $img1 . '" class="img-responsive" alt=""/>';
                                            ?>                                                                        
                                        </div> 
                                        <div class="back">
                                            <h3><b> <?= $rafting_place->placetitle; ?></b></h3>
                                            <p>
<!--                                                <input type="button" class="btn btn-success" value="See More"/>-->
                                                <?= Html::a('See More',['place/placedescription','place'=>Yii::$app->encrypt->encode($rafting_place->place_id)],['class'=>'btn btn-success']);?>
                                            </p>
                                            <p> <?= $rafting_place->trip_summary?></p>
                                        </div> 
                                    </div>
                                    <h4 style="margin-left: 10%;"><?= $rafting_place->placetitle?> </h4>
                                </div>
                        
                        
                        <?php
                            }
                            
                        ?>
                        
                        
                  
                    </div>            
                </div>
            </div>
            
             <div class="row no-margin">
                <div class="col-md-12">
                    <div class="itnry_head_wrap small-margin">
                        <span class="small-margin heading-title">Trekking </span>
                    </div>
                    <div class="row no-margin">
                    
                                <?php
                        
                            $rafting_places = Place::find()->select(['place_id','placetitle','trip_summary'])->where(['is_adventure'=>1])->andWhere(['placecatagory'=>10])->orderBy(new Expression('rand()'))->limit(4)->all();
                            
                            
                            foreach($rafting_places as $rafting_place){
                                $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$rafting_place->place_id])->one();
                                
                                ?>
                        
                                <div class="col-md-6">
                                    <div class="flip">                         
                                        <div class="front"> 
                                            <?php
                                            $img1 = '/' . Yii::$app->name . '/backend/upload/thumbnail_widget/'.$image['image_name'];
                                            echo '<img src="' . $img1 . '" alt=""/>';
                                            ?>                                                                        
                                        </div> 
                                        <div class="back">
                                            <h3><b> <?= $rafting_place->placetitle; ?></b></h3>
                                            <ul style="text-align: left;font-size: 15px">
                                                <li> Trip Package </li>
                                                <li> 3 Days </li>
                                                <li> 500 $USD for person </li>
                                                <li style="list-style: none;"> 
<!--                                                    <input type="button" class="btn btn-success" value="See More"/>-->
                                                    <?= Html::a('See More',['place/placedescription','place'=>Yii::$app->encrypt->encode($rafting_place->place_id)],['class'=>'btn btn-success']);?>
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                                    <h4 style="margin-left: 10%;"><?= $rafting_place->placetitle?> </h4>
                                </div>
                        
                        
                        <?php
                            }
                            
                        ?>
                    

                    </div>            
                </div>
            </div>
            
             <div class="row no-margin">
                <div class="col-md-12">
                    <div class="itnry_head_wrap small-margin">
                        <span class="small-margin heading-title">JUNGLE SAFARI</span>
                    </div>
                    <div class="row no-margin">
                            <?php
                        
                            $rafting_places = Place::find()->select(['place_id','placetitle','trip_summary'])->where(['is_adventure'=>1])->andWhere(['placecatagory'=>14])->orderBy(new Expression('rand()'))->limit(4)->all();
                            
                            
                            foreach($rafting_places as $rafting_place){
                                $image = PlaceImage::find()->select('image_name')->where(['place_id'=>$rafting_place->place_id])->one();
                                
                                ?>
                        
                                <div class="col-md-6">
                                    <div class="flip">                         
                                        <div class="front"> 
                                            <?php
                                            $img1 = '/' . Yii::$app->name . '/backend/upload/thumbnail_widget/'.$image['image_name'];
                                            echo '<img src="' . $img1 . '" alt=""/>';
                                            ?>                                                                        
                                        </div> 
                                        <div class="back">
                                            <h3><b> <?= $rafting_place->placetitle; ?></b></h3>
                                            <ul style="text-align: left;font-size: 15px">
                                                <li> Trip Package </li>
                                                <li> 3 Days </li>
                                                <li> 500 $USD for person </li>
                                                <li style="list-style: none;"> 
<!--                                                    <input type="button" class="btn btn-success" value="See More"/>-->
                                                    <?= Html::a('See More',['place/placedescription','place'=>Yii::$app->encrypt->encode($rafting_place->place_id)],['class'=>'btn btn-success']);?>
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                                    <h4 style="margin-left: 10%;"><?= $rafting_place->placetitle?> </h4>
                                </div>
                        
                        
                        <?php
                            }
                            
                        ?>
                        
                    </div>            
                </div>
            </div>



        </div>
        <div class="col-md-4 col-lg-4 col-sm-4" id="sidebar" style="border-left: 1px dotted black;margin-top: 1.3%;">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <section>
                        <div class="itnry_head_wrap">

                            <span>WATER FALLS </span>
                        </div>
                            <?php
                            $falls = Place::find()->where(['placecatagory' => '6'])->all();
                            foreach ($falls as $place) {
                                $image = PlaceImage::find()->select('image_name')->where(['place_id' => $place->place_id])->one();
                                ?>


                            <div class="row no-margin">
                                <div class="col-md-3 small-padding">

                                    <div class="falls-img">
                                        <img src="/<?php echo Yii::$app->name . '/backend/upload/thumbnail_widget/thumbnail_widget_small/' . $image['image_name'] ?>" class="img-responsive"/>
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
                                      </div>", ['place/placedescription?place=' . Yii::$app->encrypt->encode($place['place_id'])]);
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
                    <section>
                        <div class="itnry_head_wrap">

                            <span>CAVE </span>
                        </div>
                            <?php
                            $falls = Place::find()->where(['placecatagory' => '7'])->all();
                            foreach ($falls as $place) {
                                $image = PlaceImage::find()->select('image_name')->where(['place_id' => $place->place_id])->one();
                                ?>


                            <div class="row no-margin">
                                <div class="col-md-3 small-padding">

                                    <div class="falls-img">
                                        <img src="/<?php echo Yii::$app->name . '/backend/upload/thumbnail_widget/thumbnail_widget_small/' . $image['image_name'] ?>" class="img-responsive"/>
                                    </div>
                                </div>
                                <div class="col-md-9 small-padding">
                                    <?php
                                    $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'], 0, 150) . ' ...' : $place['placedescription'];
                                    $description = strip_tags($description);
                                    $title = strtoupper($place['placetitle']);
                                    $catagory = $place['placecatagory'];
                                    echo Html::a("<div class='hiking-description'>
                                                                        <b>$title</b> <span>$catagory</span>                                   
                                                                      </div>", ['place/placedescription?place=' . Yii::$app->encrypt->encode($place['place_id'])]);
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
                    <section>
                        <div class="itnry_head_wrap">

                            <span>HIMALAYS TRIP </span>
                        </div>
                            <?php
                            $falls = Place::find()->where(['placecatagory' => '10'])->all();
                            foreach ($falls as $place) {
                                $image = PlaceImage::find()->select('image_name')->where(['place_id' => $place->place_id])->one();
                                ?>

                            <div class="row no-margin">
                                <div class="col-md-3 small-padding">

                                    <div class="falls-img">
                                        <img src="/<?php echo Yii::$app->name . '/backend/upload/thumbnail_widget/' . $image['image_name'] ?>" class="img-responsive"/>
                                    </div>
                                </div>
                                <div class="col-md-9 small-padding">
                                    <?php
                                    $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'], 0, 150) . ' ...' : $place['placedescription'];
                                    $description = strip_tags($description);
                                    $title = strtoupper($place['placetitle']);
                                    $catagory = $place['placecatagory'];
                                    echo Html::a("<div class='hiking-description'>
                                                                        <b>$title</b> <span>$catagory</span>                                   
                                                                      </div>", ['place/placedescription?place=' . Yii::$app->encrypt->encode($place['place_id'])]);
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
                    <section>
                        <div class="itnry_head_wrap">

                            <span>NATIONAL PARK </span>
                        </div>
                            <?php
                            $falls = Place::find()->where(['placecatagory' => '9'])->all();
                            foreach ($falls as $place) {
                                $image = PlaceImage::find()->select('image_name')->where(['place_id' => $place->place_id])->one();
                                ?>

                            <div class="row no-margin">
                                <div class="col-md-3 small-padding">

                                    <div class="falls-img">
                                        <img src="/<?php echo Yii::$app->name . '/backend/upload/thumbnail_widget/thumbnail_widget_small/' . $image['image_name'] ?>" class="img-responsive"/>
                                    </div>
                                </div>
                                <div class="col-md-9 small-padding">
                                    <?php
                                    $description = str_word_count($place['placedescription']) > 0 ? substr($place['placedescription'], 0, 150) . ' ...' : $place['placedescription'];
                                    $description = strip_tags($description);
                                    $title = strtoupper($place['placetitle']);
                                    $catagory = $place['placecatagory'];
                                    echo Html::a("<div class='hiking-description'>
                                                                        <b>$title</b> <span>$catagory</span>                                   
                                                                      </div>", ['place/placedescription?place=' . Yii::$app->encrypt->encode($place['place_id'])]);
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

        </div>
    </div>

<?php
$this->registerJsFile("@web/js/jquery.flip.min.js", [
    'depends' => [
        \yii\web\JqueryAsset::className()
    ]
]);

$this->registerJs(
        '$(function(){
    $(".flip").flip({
        trigger: "hover",
        axis: "x"
    });
    
    $("#sidebar,#main_column").stick_in_parent();
});
        ', View::POS_READY, 'my-button-handler'
);
?>


