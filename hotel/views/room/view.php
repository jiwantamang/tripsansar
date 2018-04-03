<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model hotel\models\Room */

$this->title = $model->room_id;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="room-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'room_id' => $model->room_id, 'room_type_id' => $model->room_type_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'room_id' => $model->room_id, 'room_type_id' => $model->room_type_id], [
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
                    'room_id',
                    'floor',
                    'room_number',
                    'has_conditioner',
                    'has_tv',
                    'has_phone',
                    'available_from',
                    'price_per_day',
                    'description:ntext',
                    'hotel_id',
                    'room_type_id',
                ],
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->


