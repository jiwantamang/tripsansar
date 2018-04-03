<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PlaceHotel */

$this->title = 'Create Place Hotel';
$this->params['breadcrumbs'][] = ['label' => 'Place Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper">
    
    		
<div class="place-hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

    		
    </section>  
</section>
