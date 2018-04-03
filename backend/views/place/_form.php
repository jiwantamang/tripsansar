<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Placecatagory;
use backend\models\Countries;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use dosamigos\fileupload\FileUploadUI;



?>
      

<div class="place-form">

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'placetitle')->textInput() ?>


    <?= $form->field($model, 'placedescription')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'placespeciality')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'festivals')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'trip_summary')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'contact')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

      
            <?= FileUploadUI::widget([
            'model' => $model,
            'attribute' => 'file',
            'url' => ['place/imageupload', 'id' => $model->place_id],
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

       

            <?= $form ->field($model , 'placecatagory')->dropDownList(
                ArrayHelper::map(Placecatagory::find()->all(), 'placecatagory_id','placecatagory'),
                    ['prompt'=>'select catagory']


           )?>

    <?php

        // Parent
         
        $data = ArrayHelper::map(Countries::find()->all(),'country_id','country_name');


        // Normal parent select
          echo $form->field($model, 'country')->dropDownList($data, ['id' => 'cat-id']);

          // Dependent Dropdown
          
          if($model->isNewRecord){
              echo $form->field($model, 'city')->widget(DepDrop::classname(), [
              'options' => ['id' => 'subcat-id'],
              'pluginOptions' => [
                  'depends' => ['cat-id'],
                  'placeholder' => 'Select...',
                  'url' => Url::to(['/address/subcat'])
              ]
          ]);
          } else {
                echo $form->field($model, 'city')->widget(DepDrop::classname(), [
              'data'=> ArrayHelper::map(\backend\models\Cities::find()->where(['countries_country_id'=>$model->country])->all(),'city_id','city_name'),
              'options' => ['id' => 'subcat-id'],
              'pluginOptions' => [
                  'depends' => ['cat-id'],
                  'placeholder' => 'Select...',
                  'url' => Url::to(['/address/subcat'])
              ]
          ]);
          }
          
          
          

          echo $form->field($model,'placeimages')->hiddenInput()->label(false);
          echo $form->field($model,'placeaddress')->textInput();
          echo $form->field($model,'is_adventure')->checkbox(['class'=>'agreement   ']);
          echo $form->field($model,'meta_tags')->textInput();

     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
          