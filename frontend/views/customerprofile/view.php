<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerProfile */

// get profile of the user
//$model = \frontend\models\CustomerProfile::find()->where(['customer_id'=>$id])->one();
$this->title = $model->firstName.' '.$model->middleName.' '.$model->lastName;
?>
<div class="customer-profile-create">
    
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel-body">
                <?php
                
                if(Yii::$app->session->hasFlash("profile-updated")){
                    echo Alert::widget([
                        'type' => Alert::TYPE_SUCCESS,
                        'title' => 'Congratulation',
                        'titleOptions' => ['icon' => 'info-sign'],
                        'body' => 'Your profile is updated'
                ]);
                    
                    
                }
            
            ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                    
                    'firstName',
                    'middleName',
                    'lastName',                    
                    'gender',
                    'customer_id',
                    'telephone',
                    'dob',
                    'nationality',
                    'address', 
                    [
                        'attribute'=>'image',
                        'value'=>'/'.Yii::$app->name.'/frontend/upload/thumbnail/'.$model->image,
                        'format' => ['image',['width'=>'100','height'=>'100']],
                    ],
                ],
            ]) ?>
        </div>

    </div>
    
</div>