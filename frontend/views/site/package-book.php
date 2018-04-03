<div class="site-index">
    <div class="row small-margin">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title">You are about to book a package </h1>
                </div>
                <?php
                    $data = backend\models\Package::findOne($id);                
                ?>
                <div class="panel-body">
                <div class="widget widget_search">
                        <div class="kd-pkg-info">                            
                          <ul>
                            <li><i class="fa fa-map-marker"></i> <strong>Package Name :</strong> <?= $data->package_name;?></li>          
                            <li><i class="fa fa-map-marker"></i> <strong>Duration:</strong> <?= $data->total_days;?> Days</li>                                      
                            <li><i class="fa fa-ticket"></i> <strong>Minimum Members:</strong> <?= $data->minimum_team_no;?> Members</li>
                            <li><i class="fa fa-ticket"></i> <strong>Start Date:</strong> <?= Yii::$app->formatter->asDate($data->start_date);?></li>
                            <li><i class="fa fa-tag"></i> <strong>Price:</strong> $<?= $data->amount;?> USD /<span style="font-size: 14px;"> per person</span></li>
                            <li><?= yii\helpers\Html::a('Confirm Booking',['bookconfirm','id'=>$data->id],['class'=>"btn btn-success btn-lg pull-center"]);?></li>
                          </ul>

                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    

