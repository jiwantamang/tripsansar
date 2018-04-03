<?php
    use yii\bootstrap\Modal;

    // get the package data 
    
    $data = backend\models\Package::findOne($id);
    // get the all images of packages
    $images = \backend\models\PackageImage::findAll(['package_id'=>$id]);
    $this->title = $data->package_name;
?>

<div class="site-index">
    
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid rounded img-responsive img-thumbnail" src="<?= Yii::$app->urlManagerBackend->baseUrl.'/upload/package_gallary/'.$images[0]['image_name']?>" alt="" width="100%">
        </div>
        <div class="col-md-4">
            <div class="widget widget_search">
                  <div class="kd-pkg-info">
                      <h3 style="color:white;text-decoration: underline"><b><?= strtoupper($data->package_name);?></b></h3>
                    <ul>
                      <li><i class="fa fa-map-marker"></i> <strong>Duration:</strong> <?= $data->total_days;?> Days</li>          
                      <li><i class="fa fa-paper-plane"></i> <strong>Total Days:</strong> <?= $data->total_days;?></li>
                      <li><i class="fa fa-ticket"></i> <strong>Minimum Members:</strong> <?= $data->minimum_team_no;?></li>
                      <li><i class="fa fa-ticket"></i> <strong>Start Date:</strong> <?= Yii::$app->formatter->asDate($data->start_date);?></li>
                      <li><i class="fa fa-tag"></i> <strong>Price:</strong> $<?= $data->amount;?> USD /<span style="font-size: 14px;"> per person</span></li>
                      <li><?= yii\helpers\Html::a('Book Now',['bookpackage','id'=>$data->id],['class'=>"btn btn-warning btn-lg pull-center"]);?></li>
                    </ul>
                    
                  </div>
                </div>
        </div>
    </div>
                  
      <!-- Call to Action Well -->
      <div class="card text-white my-4 text-center" style="background-color: wheat;">
        <div class="card-body">
            <p class="text-white m-0">Secure you seat <span><?= yii\helpers\Html::a('Book Now',['bookpackage','id'=>$data->id],['class'=>"btn btn-warning btn-xs pull-center"]);?></span></p>
        </div>
      </div>

      <!-- Content Row -->                  
        <div class="row">
            <div class="col-md-12">
                <section class="small-margin">
                    <?= $data->package_description;?>
                </section>
                
            </div>
        </div>
      
<!--      <div class="row">
            <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Card One</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
         /.col-md-4 
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Card Two</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
         /.col-md-4 
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Card Three</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
         /.col-md-4 
      </div>-->
<!--        
    
<div id="book_process" class="modal">

    <div class="modal-dialog">

        <div class="modal-content" style="border-radius: 0px;background-color: whitesmoke">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title text-info">Book Details</h4>
                
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <img src="https://tripsansar.com/images/loading_bricks.gif"/>
                      
                    </div>
                </div>
                                
            </div>

        </div>

    </div>

</div>-->

            
        <?php
    Modal::begin([
        'id' => 'book_process',
        'header' => '<h4 style="color:black;margin:0px">Please Wait</h4>',
        'options'=>[
                'tabindex' => false,
                'class'=>'modal'

            ],
        
        'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],
    ]);
    ?>
    
        <div class="image-center">
            <img src="https://tripsansar.com/images/loading_bricks.gif"/>
          </div>',  
    
    <?php
    Modal::end();
    ?>

 <?php
    $this->registerJs($this->render('ajax.js'), yii\web\View::POS_END);

  ?>
