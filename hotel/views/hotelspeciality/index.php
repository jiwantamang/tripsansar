<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel hotel\models\HotelSpecialitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotel Specialities';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="main-content">
    <section class="wrapper site-min-height">

        <div class="hotel-speciality-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Hotel Speciality', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   // 'id',
                    'speciality',
                    'description',
                    'note',
                  //  'date_created',
                    // 'date_updated',
                    // 'date_deleted',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

