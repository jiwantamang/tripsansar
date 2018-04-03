<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model hotel\models\HotelGallary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Gallaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="hotel-gallary-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id, 'hotel_hotel_id' => $model->hotel_hotel_id], [
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
                    'id',
                    'image_name',
                    'image_description',
                    'hotel_hotel_id',
                ],
            ]) ?>

        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
