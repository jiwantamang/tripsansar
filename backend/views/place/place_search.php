

<?php
use yii\helpers\Html;
use backend\models\Place;

$model = Place::find()->asArray()->where(['placetitle'=> $searchstring])->orderBy('place_id')->all();

?>
<div class="site-index">
    <div class="container">
    <div class="row small-margin">
      <div class="col-md-8">
        <div class="itnry_head_wrap">

            <span class="days_box">Search Result </span> <span class="itnry_heading"> With Places</span>
          </div>
      </div>

    </div>

    <div class="row">

        <div class="col-md-8">
            <?php
                $i=0;

                if(count($model) == 0){

                    echo "<h3 style='margin:2em;'>Sorry no result found ....</h3>";
                }
                foreach($model as $value){
            ?>
          <div class="row divider small-margin">
            <div class="col-md-9">

              <div class="hiking-view" style="padding:auto 1% ">
                  <div class="hiking-img">
                      <img src="../web/uploads/<?php echo $value['placeimages']?>" class="img-responsive img-thumbnail"/>
                  </div>
                  <div class="hiking-description" style="padding:5px;position:relative">
                    <b style="margin:0.4em;"> <?= Html::a($value['placetitle'], ['place/placedescription', 'id' => $value['place_id']], ['class' => 'profile-link']) ?> </b>
                    <i style="font-size:10px; color: blue;">  Category:&nbsp;&nbsp;<?php  echo $value['placecatagory']?></i>

                  </div>
                  <div>
                    <p style="font-size:15px;margin:0.5em 0 0.5em 1em;">
                      <i>
                          <?php
                            $description = "Lumbini is one of the most religious place exists all around the world for the buddhism. Lumbini is the place where the buddha was born Lumbini is one of the most religious place exists all around the world for the buddhism. Lumbini is the place where the buddha was born";
                            //echo $str = count($description) > 10 ? substr($description, 0,10).'...' : $description;
                            echo $str = str_word_count($description) > 30 ? substr($description, 0,150).'...'.'<a href="#">Read more</a>' : $description;
                            ?>

                      </i>

                  </p>
                  </div>


              </div>

            </div>
            <div class="col-md-3">
                <div class="star-div">
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

                </div>
            </div>


          </div>
          <hr>


          <?php } ?>


          </div>
              <div class="col-md-4">

              </div>
          </div>

    <br>

</div>
