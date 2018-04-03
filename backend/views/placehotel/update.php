<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PlaceHotel */

$this->title = 'Update Place Hotel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Place Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper">
		
<div class="place-hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    		
    </section>  
</section>

