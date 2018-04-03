<?php 

use yii\helpers\Html;
use dosamigos\fileupload\FileUploadUI;
use yii\widgets\ActiveForm;

$this->title = 'Change Profile Picture';

$model = new \frontend\models\UploadForm();

?>
<div class="site-index">
<div class="customer-profile-create">
     
     <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <b>Profile Details</b>
        </div>
        <div class="panel-body">
        
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            
             <?= FileUploadUI::widget([
                    'model' => $model,
                    'attribute' => 'imageFile',
                    'url' => ['customerprofile/imageupload', 'id' => Yii::$app->user->id],
                    'gallery' => false,
                    'fieldOptions' => [
                        'accept' => 'image/*',
                        'multiple'=>false
                    ],
                    'clientOptions' => [
                        'maxFileSize' => 2000000
                    ],
                    // ...
                    'clientEvents' => [
                        'fileuploaddone' => 'function(e, data) {
                                                console.log(e);
                                                console.log(data);
                                            }',
                        'fileuploadfail' => 'function(e, data) {
                                                console.log(e);
                                                console.log(data);
                                            }',
                    ],
                ]); ?>

            <?php ActiveForm::end(); ?>
        
        </div>       
      </div>
</div>
</div>