<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Place */

$this->title = 'Update :' . $model->placetitle;
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->place_id, 'url' => ['view', 'id' => $model->place_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section id="main-content">
    <section class="wrapper">
        <div class="place-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section>
</section>