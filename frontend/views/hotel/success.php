<div class="site-index small-padding">
            <div class="row">
                      <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">Congratulation</h3>
              </div>
              <div class="panel-body small-padding">

                <p> You have successfully booked <?php echo $model->room_id . ' rooms '?> for <?php echo $model->date_from.' to '.$model->date_to?> </p>
                <p> For more plase see the information below</p>

                <table class="table bg-warning">
                        <tr>
                            <th>Customer Name</th>
                           <td><?php echo $model->customer_id ?></td>
                       </tr>
                       <tr>
                           <th>Hotel</th>
                           <td><?php echo $model->hotelid ?></td>
                       </tr>
                        <tr>
                           <th>Booked Date </th>
                           <td></td>
                       </tr>
                        <tr>
                           <th>No of Rooms</th>
                           <td><?php echo $model->room_id; ?></td>
                       </tr>
                       <tr>
                           <th>Booked For</th>
                           <td><?php echo $model->date_from .' - '.$model->date_to ?></td>
                       </tr>

                       <tr>
                           <th>Transaction Id</th>
                           <td><?php echo $model->transaction_id;?></td>
                       </tr>

                   </table>

                   <?php echo \yii\helpers\Html::a( 'Ok', ['customerprofile/index'],['class'=>'btn btn-default']); ?>

               </div>

            </div>


            </div>

          </div>
</div>

