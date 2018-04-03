<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packages';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">
          <section class="wrapper">
              <div class="package-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Package', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'package_name',
                        'package_description:ntext',
                        'package_owner',
                        'amount',
                        // 'minimum_team_no',
                        // 'start_date',
                        // 'total_days',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>

          </section>
</section>

