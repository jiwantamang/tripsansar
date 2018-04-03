
<div class="site-index">
    <div class="msg-box">
        <div class="panel panel-danger">
            <!-- Default panel contents -->
            <div class="panel-heading">Message</div>
            <div class="panel-body">
              <p>Sorry No rooms are available </p>
              <?php 
                echo \yii\helpers\Html::a('Go Back',Yii::$app->request->referrer,['class'=>'profile-link']);
              ?>
            </div>       
        </div>
    </div>        
</div>