<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel hotel\models\HotelProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotel Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>

     <section id="main-content">
          <section class="wrapper site-min-height">
          
          			<div class="hotel-profile-index">
		
   					 <h1><?= Html::encode($this->title) ?></h1>
   					 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  						  <p>
    					    <?= Html::a('Create Hotel Profile', ['create'], ['class' => 'btn btn-success']) ?>
  						  </p>
 							   <?= GridView::widget([
    						    'dataProvider' => $dataProvider,
   						     'filterModel' => $searchModel,
  							      'columns' => [
 					           ['class' => 'yii\grid\SerialColumn'],

 					           'id',
 					           'description:ntext',
 					           'rating',
 					           'minimum_cost',
 					           'address',
 					           // 'note1',
 					           // 'note2',
 					           // 'note3',
 					           // 'note4',
 					           // 'image',
 					           // 'hotel_hotel_id',

 					           ['class' => 'yii\grid\ActionColumn'],
 						       ],
 							   ]); ?>
						</div>


		      </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


