<?php 
    use yii\helpers\Html;
    use frontend\models\Place;
    use yii\web\View;

    $catagoryModel = \frontend\models\Placecatagory::find()->where(['placecatagory'=>$type])->one();
    $model = Place::find()->where(['placetitle'=>$searchstring])->all();
?>
<div class="site-index">
    <div class="container">
    <div class="row small-margin">
      <div class="col-md-8">
            <div class="gradient-heading-height">
                   <span>Search Result </span>
            </div>        
      
            <?php
                $i=0;

                if(count($model) == 0){

                    echo "<h3 style='margin:2em;'>Sorry no result found ....</h3>";
                }
                foreach($model as $value){
                    $img_name = \backend\models\PlaceImage::find()->where(['place_id'=>$value['place_id']])->one();
            ?>
          <div class="row divider small-margin">
            <div class="col-md-9">

              <div class="hiking-view" style="padding:auto 1% ">
                  <div class="hiking-img">
                      <img src="/<?php echo Yii::$app->name ?>/backend/upload/thumbnail_widget/<?php echo $img_name->image_name; ?>" class="img-responsive img-thumbnail"/>
                  </div>
                  <div class="hiking-description" style="padding:5px;position:relative">
                    <b style="margin:0.4em;"> <?= Html::a($value['placetitle'], ['place/placedescription', 'place' => Yii::$app->encrypt->encode($value['place_id'])], ['class' => 'profile-link']) ?> </b>
                    <i style="font-size:10px; color: blue;">  TYPE:&nbsp;&nbsp;<?php  echo $catagoryModel['placecatagory']?></i>
                  </div>
                  <div>
                    <p style="font-size:15px;margin:0.5em 0 0.5em 1em;">
                      <i>
                          <?php
                            $description = $value['placedescription'];
                            //echo $str = count($description) > 10 ? substr($description, 0,10).'...' : $description;
                            echo $str = str_word_count($description) > 30 ? substr($description, 0,150).'...'.'<a href="#">Read more</a>' : $description;
                            ?>

                      </i>

                  </p>
                  </div>


              </div>

            </div>
            <div class="col-md-3">
<!--                <div class="star-div">
                  <table>
                    <tr>
                      <td>
                        <ul>
                            <li>
                              <i>Rating:</i>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                             <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                        </ul>
                      </td>

                    </tr>
                    <tr>
                      <td>
                        <ul>
                            <li>
                                <i>Comment:</i>
                            </li>
                            <li>
                                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <ul>
                          <li>
                              <i> Views:</i>
                          </li>
                          <li>
                              &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                          </li>
                      </ul>
                    </tr>
                  </table>

                </div>-->
            </div>


          </div>
          <hr>


          <?php } 
          
          echo '<b><p style="margin-left:5%;"><u>Other Related Places</u></p></b>';
          
          
          // get other places
          $key_array = explode(" ", $searchstring);
          $word1="default";
          
          $word1 = $key_array[0];          
          $other_place= Place::find()->where(['!=','placetitle',$searchstring])->orWhere(['like','placetitle',$word1])->limit(20)->orderBy(['placetitle'=>SORT_DESC])->all();
         
          if(count($other_place) > 0){
              foreach($other_place as $value){
                    $img_name = \backend\models\PlaceImage::find()->where(['place_id'=>$value['place_id']])->one();
            ?>
          <div class="row divider small-margin">
            <div class="col-md-9">

              <div class="hiking-view" style="padding:auto 1% ">
                  <div class="hiking-img">
                      <img src="/<?php echo Yii::$app->name ?>/backend/upload/thumbnail_widget/<?php echo $img_name->image_name; ?>" class="img-responsive img-thumbnail"/>
                  </div>
                  <div class="hiking-description" style="padding:5px;position:relative">
                    <b style="margin:0.4em;"> <?= Html::a($value['placetitle'], ['place/placedescription', 'place' => Yii::$app->encrypt->encode($value['place_id'])], ['class' => 'profile-link']) ?> </b>
                    <i style="font-size:10px; color: blue;">  TYPE:&nbsp;&nbsp;<?php  echo $catagoryModel['placecatagory']?></i>
                  </div>
                  <div>
                    <p style="font-size:15px;margin:0.5em 0 0.5em 1em;">
                      <i>
                          <?php
                            $description = $value['placedescription'];
                            //echo $str = count($description) > 10 ? substr($description, 0,10).'...' : $description;
                            echo $str = str_word_count($description) > 30 ? substr($description, 0,150).'...'.'<a href="#">Read more</a>' : $description;
                            ?>

                      </i>

                  </p>
                  </div>


              </div>

            </div>
            <div class="col-md-3">
<!--                <div class="star-div">
                  <table>
                    <tr>
                      <td>
                        <ul>
                            <li>
                              <i>Rating:</i>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                             <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                            <li>
                               <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </li>
                        </ul>
                      </td>

                    </tr>
                    <tr>
                      <td>
                        <ul>
                            <li>
                                <i>Comment:</i>
                            </li>
                            <li>
                                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <ul>
                          <li>
                              <i> Views:</i>
                          </li>
                          <li>
                              &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                          </li>
                      </ul>
                    </tr>
                  </table>

                </div>-->
            </div>


          </div>
         


          <?php } 
          }
          
         
            
          
          ?>


          
          </div>
                <div class="col-md-4 sticky_columns">
                    
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