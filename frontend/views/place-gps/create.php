<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PlaceGps */

$this->title = 'Create Place Gps';
$this->params['breadcrumbs'][] = ['label' => 'Place Gps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-gps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
