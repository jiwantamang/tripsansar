



<?php
use yii\helpers\Html;
use frontend\models\Place;

?>
<div class="container" style="background-color: lightgoldenrodyellow;">
    <div class="container" >
        <div class="wells">
        <div class="row">
            <div class="col-md-3"> <!-- this is  a coloum which contain the profile picture.-->
                <div class="col-md-1">
                    <!-- this is  a div is a gap for  a profile picture picture.-->

                </div>
                 <div class="col-md-10" style="border:1px solid; padding-top: 15px;">
                     <div class="well">
                    <img src="../web/images/bgf.jpg" class=" img-circle" id="profileimage">
                    <br>
                    <span class="glyphicon glyphicon-camera"></span><a style="pointer-events: hover;">&nbsp; change profile</a></span>
                </div>
                </div>
                 <div class="col-md-1">
                    <!-- this is  a div is a gap for  a profile picture picture.-->

                </div>
               
            </div>
               <div class="col-md-8">
                    <div class="ribbon" style="background-color:lightskyblue;border:1px solid lightskyblue; ">
                   <ul class="nav nav-tabs">
                    <li role="presentation" class="active-hover" style="color:blue"><?= Html::a('Profile', ['profiledash/profiledash'], ['class' => 'profile-link']) ?></li>
                    <li role="presentation"><?= Html::a('Places', ['profiledash/profileplace'], ['class' => 'profile-link']) ?></li>
                    <li role="presentation"><?= Html::a('Setting', ['profiledash/profilesetting'], ['class' => 'profile-link']) ?></li>
                     <li role="presentation"><?= Html::a('Follow up', ['profiledash/profilefollowup'], ['class' => 'profile-link']) ?></li>
                    <li role="presentation"><?= Html::a('Comments', ['profiledash/profilecomments'], ['class' => 'profile-link']) ?></li>
                   </ul>
                  </div>
                   
                   
                    <div  class="wells">
                     <h3>comments</h3>

                   <?php 
                   
                   $id = Yii::$app->user->id;
                   
               
                  // $userid = common\models\User::find()->select(['id'])->where(['id'=>$id])->one()['id'];
                 //  echo $userid;
            
                  $treckkingplace = Place::find()->where(['user_id'=>$id])->andWhere(['placecatagory'=>'treckking'])->all();
                  
                  
               
                ?>
                     <h3>TRECKKING PLACES</h3>
                 <?php
                  foreach($treckkingplace  as $value) {
                            
                   ?>
                     
                    
         <div class="row place-section" >
               
            <div class="col-md-2" class="imagesectionofplace">

             <img src="../web/uploads/<?php echo $value['placeimages']?>" class="placesmallimages" >

             </div>
            <div class="col-md-7 placerow" >
               
         <?= Html::a($value['placetitle'], ['place/placedescription', 'id' => $value['place_id']], ['class' => 'profile-link']) ?>
              
               
            </div>
              <div class="col-md-2" style="padding-left:60px;">
                      <br><br>
                       <?= Html::a('',['place/placedescripton'], ['class' => 'glyphicon glyphicon-eye-open']) ?>
                       <?= Html::a('',['place/update'], ['class' => 'glyphicon glyphicon-pencil']) ?>
                      <?= Html::a('',['place/delete'], ['class' => 'glyphicon glyphicon-trash']) ?>
                  </div>
                 </div>
                  <?php } ?>
                     
                     <h3> Religious place</h3>
                     <?php
                    
                     $religiousplace = Place::find()->where(['user_id'=>$id])->andWhere(['placecatagory'=>'religiousplace'])->all();
                     
                     foreach ($religiousplace as  $religiousvalue) {
                         
                  
                     
                     ?>
                                      
         <div class="row place-section" >
               
            <div class="col-md-2" class="imagesectionofplace">

             <img src="../web/uploads/<?php echo $religiousvalue['placeimages']?>" class="placesmallimages" >

             </div>
            <div class="col-md-7 placerow" >
               
         <?= Html::a($religiousvalue['placetitle'], ['place/placedescription', 'id' => $religiousvalue['place_id']], ['class' => 'profile-link']) ?>
              
               
            </div>
             <div class="col-md-2" style="padding-left:60px;">
                      <br><br>
                       <?= Html::a('',['place/placedescripton'], ['class' => 'glyphicon glyphicon-eye-open']) ?>
                       <?= Html::a('',['place/update'], ['class' => 'glyphicon glyphicon-pencil']) ?>
                      <?= Html::a('',['place/delete'], ['class' => 'glyphicon glyphicon-trash']) ?>
                  </div>
                 </div>
                  <?php } ?>
                     
                     
                     
                     <h3>lakes</h3>
                     
                        <?php
                    
                     $lakesplace = Place::find()->where(['user_id'=>$id])->andWhere(['placecatagory'=>'lakes'])->all();
                     
                     foreach ($lakesplace as  $lakesvalue) {
                         
                  
                     
                     ?>
                                      
         <div class="row place-section" >
               
            <div class="col-md-2" class="imagesectionofplace">

             <img src="../web/uploads/<?php echo $lakesvalue['placeimages']?>" class="placesmallimages" >

             </div>
            <div class="col-md-7 placerow" >
               
         <?= Html::a($lakesvalue['placetitle'], ['place/placedescription', 'id' => $lakesvalue['place_id']], ['class' => 'profile-link']) ?>
              
               
            </div>
             <div class="col-md-2" style="padding-left:60px;">
                      <br><br>
                       <?= Html::a('',['place/placedescripton'], ['class' => 'glyphicon glyphicon-eye-open']) ?>
                       <?= Html::a('',['place/update'], ['class' => 'glyphicon glyphicon-pencil']) ?>
                      <?= Html::a('',['place/delete'], ['class' => 'glyphicon glyphicon-trash']) ?>
                  </div>
                 </div>
                  <?php } ?>
                     
                     
               </div>
           

                       <?php 
                       
                       
                       $model = Place::find()->asArray()->where(['user_id'=>'0'])->all();
                       foreach ($model as $key => $value) {
                          $i=0; 
                       
                       ?> 
                     <?php ++$i; ?>
                     <div class="row">
                            <div class="col-md-2" class="imagesectionofplace">

                        <img src="../web/uploads/<?php echo $value['placeimages']?>" class="placesmallimages" >

                      </div>
                         <div class="col-md-7">
                                <?= Html::a($value['placetitle'], ['place/placedescription', 'id' => $value['place_id']], ['class' => 'profile-link']) ?>
                         </div>
                     </div>
                     
                       <?php }?>
                 </div>
               </div>
           
                     </div>
        </div>
        </div>
</div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

