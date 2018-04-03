<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model hotel\models\Room */

$this->title = 'Update Room: ' . $model->room_id;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_id, 'url' => ['view', 'room_id' => $model->room_id, 'room_type_id' => $model->room_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="room-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->


