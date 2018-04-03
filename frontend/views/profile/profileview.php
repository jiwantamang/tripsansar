



<?php
use yii\helpers\Html;
use frontend\models\Place;


$placetype = $placetype;
$data = Place::find()->where(['place_id'=>$id])->andWhere(['placecatagory'=>$placetype])->one();

?>
<div class="container" style="background-color: lightgoldenrodyellow;">
    <div class="container" >
        <div class="wells">
        <div class="row">
            <div class="col-md-3"> <!-- this is  a coloum which contain the profile picture.-->
                <div class="col-md-1">
                    
                </div>
                 <div class="col-md-10" style="border:1px solid; padding-top: 15px;">
                    <div class="well">
                    <img src="../web/images/bgf.jpg" class=" img-circle" id="profileimage">
                    <br>
                    <span class="glyphicon glyphicon-camera"></span><a style="pointer-events: hover;">&nbsp; change profile</a></span>
                </div>
                </div>
                 <div class="col-md-1">
                    
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
                   
             
                     <div class="wells">
                         <br>
                         <br>
                         
                         <?php 
                      
                     
                        ?>
                        <table class="table table-bordered">

                        <tr>
                          <th>PlaceTitle</th>
                          <td><?php echo $data['placetitle'] ?></td>

                        </tr>
                        <tr>
                         <th>PlaceAddress</th>
                          <td><?php echo $data['placeaddress'] ?></td>

                        </tr>
                        <tr>
                         <th>PlaceCatagory</th>
                          <td><?php echo $data['placecatagory'] ?></td>
                        </tr>
                        <tr>
                           <th>PlaceDescription</th>
                          <td><?php echo $data['placedescription'] ?></td>
                        </tr>
                        <tr>
                           <th>PlaceSpeciality</th>
                          <td><?php echo $data['placespeciality'] ?></td>
                        </tr>
                        <tr>
                           <th>PlaceImages</th>
                           <td><img src="../web/uploads/<?php echo $data['placeimages'] ?> " class="profileviewimage"></td>
                        </tr>
                        
                      </table>
                       <?php 
                        ?>
                         
                         
                     </div>
                
                   <br> <br> <br>
        </div>
        </div>
        </div>
    </div>
        