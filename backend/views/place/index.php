<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Places';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="main-content">
          <section class="wrapper">
              <div class="place-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Place', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'place_id',
            'user_id',
            'placetitle',
            //'placeaddress',
            //'placedescription:ntext',
            // 'placeimages',
            'placecatagory',
             
            // 'placespeciality:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'min-width:10%;']
            ],
        ],
    ]); ?>
</div>
          </section>
</section>

