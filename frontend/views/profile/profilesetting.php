
<?php


use yii\helpers\Html;
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
                     <h3>settings</h3>
                     <br>
                     <div class="row_selected">
                         
                         
                         <table class=" table table-condensed">
                            
                             <tr>
                                 <td>
                                 UserName:  sagar basnet
                             </td>
                              <td>
                               
                             </td>
                              <td>

                            <?= Html::a('Edit', ['setting/username'], ['class' => 'profile-link']) ?>

                            <?= Html::a('Edit', ['/'], ['class' => 'profile-link']) ?>

                             </td>
                             </tr>
                           
                              <tr>
                                 <td>
                                     Password:<b>  *********** </b> 
                                 </td>
                                 <td>
                                     
                                 </td>
                                  <td>
                                     <?= Html::a('Edit', ['/'], ['class' => 'profile-link']) ?>
                                 </td>
                             </tr>
                           
                            
                             <tr>
                                 <td>
                                     E-mail:john@gmail.com
                                 </td>
                                 <td>
                                     
                                 </td>
                                  <td>
                                     <?= Html::a('Edit', ['/'], ['class' => 'profile-link']) ?>
                                 </td>
                             </tr>
                     
                             
                         </table>
                         <p style="color: blue;"></p>
                     </div>
                     
                 </div>
               </div>
         
            </div>
        </div>
        </div>
   
        
    </div>
   
    
</div>
<?php


