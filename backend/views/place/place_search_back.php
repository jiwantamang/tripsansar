<?php
    foreach ($model as $value) {
    $i=0;

    ?>
        <div class="row place-section" >
            <?php ++$i;?>
            <div class="col-md-2" class="imagesectionofplace">
                <img src="../web/uploads/<?php echo $value['placeimages']?>" class="placesmallimages" >
            </div>
            <div class="col-md-7 placerow" >
            <u>
                <b>

               <?= Html::a($value['placetitle'], ['place/placedescription', 'id' => $value['place_id']], ['class' => 'profile-link']) ?>
                </b> <i style="font-size:10px; color: blue;">  Category:&nbsp;&nbsp;<?php  echo $value['placecatagory']?></i>
             </u>
            <p style="font-size:12px;">
              <i>
                  <?php
                    $description = "Lumbini is one of the most religious place exists all around the world for the buddhism. Lumbini is the place where the buddha was born";
                    echo $str = count($description) > 10 ? substr($description, 0,10).'...' : $description;
                    ?>

              </i>

          </p>
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

      </div>

    <?php } ?>
