<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelProfile */

$this->title = 'Update Hotel Profile: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

     <section id="main-content">
          <section class="wrapper site-min-height">
					
				<div class="hotel-profile-update">

   			 <h1><?= Html::encode($this->title) ?></h1>

   				 <?= $this->render('_form', [
   			     'model' => $model,
   				 ]) ?>

				</div>

		      </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


