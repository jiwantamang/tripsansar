<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model hotel\models\RoomType */

$this->title = 'Create Room Type';
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="main-content">

    <section class="wrapper site-min-height">
        <div class="room-type-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </section><! --/wrapper -->

</section><!-- /MAIN CONTENT -->

