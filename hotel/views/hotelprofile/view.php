<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelProfile */
$model = hotel\models\HotelProfile::find()->where(['hotel_hotel_id'=>Yii::$app->user->identity->hotelid])->one();
$this->title = "Profile Details";


// get the details of the hotel profile 

?>

     <section id="main-content">
          <section class="wrapper site-min-height">
    	
        	<div class="hotel-profile-view">

                 	<h1><?= Html::encode($this->title) ?></h1>

    				<p>
        			<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       				<?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                    ],
        			]) ?>
    				
                                </p>

    				<?= DetailView::widget([
        			'model' => $model,
        			'attributes' => [
                                  
                                    [
                                        'label'=>'Hotel Name',                                       
                                        'format'=>'raw',
                                        'value'=>function($data){
                                            return '<h3>'.hotel\models\Hotel::findOne($data->hotel_hotel_id)['hotelname'].'</h3>';
                                        }
                                    ],
                                            
                                    'description:ntext',
                                    [
                                      'label'=>'Image',
                                        'format'=>'html',
                                        'value'=>function($data){
                                            return Html::img('/'.Yii::$app->name.'/hotel/upload/hotel_thumbnail/'.$data->image,['width'=>200]);
                                        }
                                    ],
                                    'rating',
                                    'minimum_cost',
                                    'address',
                                    'note1',
                                    'note2',
                                    'note3',
                                    'note4',
                                  
                                  
                                   
        			],
    			]) ?>

			</div>


		      </section><! --/wrapper -->
      	</section><!-- /MAIN CONTENT -->

