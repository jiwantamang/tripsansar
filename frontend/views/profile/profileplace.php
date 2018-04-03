



<?php

use yii\helpers\Html;
use frontend\models\Place;
use frontend\models\Placecatagory;

$placedata = Placecatagory::find()->asArray()->all();?>
<?php

foreach ($placedata as $var) {
    
}


?>
<div class="container" style="background-color: lightgoldenrodyellow;">
    <div class="container" >
        <div class="wells">
            <div class="row">
                <div class="col-md-3"> <!-- this is  a coloum which contain the profile picture.-->
                    <div class="row">
                         <div class="col-md-10" style="border:1px solid; padding-top: 15px;">
                        <div class="well">

                            <img src="../web/images/bgf.jpg" class=" img-circle" id="profileimage">
                            <br>
                            <span class="glyphicon glyphicon-camera"></span><a style="pointer-events: hover;">&nbsp; change profile</a></span>
                        </div>
                    </div>
                    </div>
                   
                   
                </div>
                <div class="col-md-8">
                    <div class="ribbon" style="background-color:lightskyblue;border:1px solid lightskyblue; ">
                        <ul class="nav nav-tabs">

                            <li role="presentation" class=" active active-hover" style="color:blue"><?= Html::a('Profile', ['profiledash/profiledash'], ['class' => 'profile-link']) ?></li>

                            <li role="presentation" class="active-hover" style="color:blue"><?= Html::a('Profile', ['profiledash/profiledash'], ['class' => 'profile-link']) ?></li>

                            <li role="presentation"><?= Html::a('Places', ['profiledash/profileplace'], ['class' => 'profile-link']) ?></li>
                            <li role="presentation"><?= Html::a('Setting', ['profiledash/profilesetting'], ['class' => 'profile-link']) ?></li>
                            <li role="presentation"><?= Html::a('Follow up', ['profiledash/profilefollowup'], ['class' => 'profile-link']) ?></li>
                            <li role="presentation"><?= Html::a('Comments', ['profiledash/profilecomments'], ['class' => 'profile-link']) ?></li>
                        </ul>

                    </div>

                    <div  class="wells">
                        <h3>Your places</h3>




                        <?php
                        $id = Yii::$app->user->id;


                        // $userid = common\models\User::find()->select(['id'])->where(['id'=>$id])->one()['id'];
                        //  echo $userid;

                        $treckkingplace = Place::find()->where(['user_id' => $id])->andWhere(['placecatagory' => 'treckking'])->all();
                        ?>
                       
                        <h3>TRECKKING PLACES</h3>
                        <?php
                        foreach ($treckkingplace as $value) {
                            ?>


                            <div class="row place-section" >

                                <div class="col-md-2" class="imagesectionofplace">

                                    <img src="../web/uploads/<?php echo $value['placeimages'] ?>" class="placesmallimages" >

                                </div>
                                <div class="col-md-7 placerow" >

                                        <?= Html::a($value['placetitle'], ['place/placedescription', 'id' => $value['place_id']], ['class' => 'profile-link']) ?>


                                </div>
                                <div class="col-md-2" style="padding-left:60px;">
                                    <br><br>
                                    <?= Html::a('', ['profiledash/profileview',
                                        'id'=>$value['place_id'],
                                        'place_type'=>$value['placecatagory']
                                    ], ['class' => 'glyphicon glyphicon-eye-open']) ?>
                                    <?= Html::a('', ['place/update','id' =>$value['place_id']], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('', ['place/delete','id' =>$value['place_id']], ['class' => 'glyphicon glyphicon-trash']) ?>
                                </div>
                            </div>
                                <?php } ?>

      
                                    <h3>RELEGIOUS PLACES</h3>
                                  
                                                <?php
                                                $relegious = Place::find()->asArray()->where(['placecatagory' => 'religious'])->all();
                                                ?>
                                    
                                        <?php
                                                foreach ($relegious as $key => $relegiousvalue) {
                                                 
                                                        
                                                    ?>
                                       
                                                <div class="row place-section" >   
                                            <div class="row">
                                                <div class="col-md-2" class="imagesectionofplace">

                                                    <img src="../web/uploads/<?php echo $relegiousvalue['placeimages'] ?>" class="placesmallimages" >

                                                 </div>
                                                <div class="col-md-7">
                                                   <?= Html::a($relegiousvalue['placetitle'], ['place/placedescription', 'id' => $relegiousvalue['place_id']], ['class' => 'profile-link']) ?>

                                                </div>

                                                <div class="col-md-2" style="padding-left:60px;">

                                                    <br><br>
                                                        <?= Html::a('', ['profiledash/profileview',
                                                            
                                                            'id' => $relegiousvalue['place_id'],
                                                                'place_type'=>$relegiousvalue['placecatagory'], 
                                                                ], 
                                        ['class' => 'glyphicon glyphicon-eye-open']) ?>
                                                        <?= Html::a('', ['place/update','id' =>$relegiousvalue['place_id']], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                                        <?= Html::a('', ['place/delete','id' =>$relegiousvalue['place_id']], ['class' => 'glyphicon glyphicon-trash']) ?>
                                                </div>

                                              </div>
                                               
                                            </div>
                                     <?php } ?>
                                  



                                        <h3>lakes</h3>

                                                <?php
                                                $lakesplace = Place::find()->where(['user_id' => $id])->andWhere(['placecatagory' => 'lakes'])->all();
                                                        
                                             
                                                foreach ($lakesplace as $lakesvalue) {
                                                    ?>

                                            <div class="row place-section" >

                                                <div class="col-md-2" class="imagesectionofplace">

                                                    <img src="../web/uploads/<?php echo $lakesvalue['placeimages'] ?>" class="placesmallimages" >

                                                </div>
                                                <div class="col-md-7 placerow" >

                                            <?= Html::a($lakesvalue['placetitle'], ['place/placedescription', 'id' => $lakesvalue['place_id']], ['class' => 'profile-link']) ?>


                                                </div>
                                                <div class="col-md-2" style="padding-left:60px;">

                                                         <?= Html::a('', ['profiledash/profileview',
                                                            
                                                            'id' => $lakesvalue['place_id'],
                                                                'place_type'=>$lakesvalue['placecatagory'], 
                                                                ], 
                                        ['class' => 'glyphicon glyphicon-eye-open']) ?>
                                                        <?= Html::a('', ['place/update','id' =>$lakesvalue['place_id']], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                                        <?= Html::a('', ['place/delete','id' =>$lakesvalue['place_id']], ['class' => 'glyphicon glyphicon-trash']) ?>
                                                </div>

                                        <?php } ?>
                                            <br>

                                        </div>





                                        <h3>city  PLACES</h3>
                                        <div class="row place-section" >
                                    <?php
                                    $city = Place::find()->asArray()->where(['placecatagory' => 'cityarea'])->all();
                                    foreach ($city as  $cityvalue) {

                                        $i = 0;
                                        ?>

                                        <?php ++$i; ?>
                                                <div class="row">
                                                    <div class="col-md-2" class="imagesectionofplace">

                                                        <img src="../web/uploads/<?php echo $cityvalue['placeimages'] ?>" class="placesmallimages" >

                                                        ``    </div>
                                                    <div class="col-md-7">
                                    <?= Html::a($cityvalue['placetitle'], ['place/placedescription', 'id' => $cityvalue['place_id']], ['class' => 'profile-link']) ?>

                                                    </div>

                                                    <div class="col-md-2" style="padding-left:60px;">

                                                        <br><br>
                                                <?= Html::a('', ['profiledash/profileview', 
                                                    'id' => $cityvalue['place_id'],
                                                     'place_type' => $cityvalue['placecatagory'],
                                                    ],
                                                        ['class' => 'glyphicon glyphicon-eye-open']) ?>
                                                <?= Html::a('', ['place/update', 'id' => $cityvalue['place_id']], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                                <?= Html::a('', ['place/delete', '$model' => $cityvalue['place_id']], ['class' => 'glyphicon glyphicon-trash']) ?>
                                                        
                             
                        
                                                    </div>

                                                </div>
    <?php } ?>







                                        </div>    


                                    </div>

                                       
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>


</div>
