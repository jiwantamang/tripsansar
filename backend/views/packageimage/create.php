<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PackageImage */

$this->title = 'Create Package Image';
$this->params['breadcrumbs'][] = ['label' => 'Package Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="main-content">
    <section class="wrapper">
        <div class="package-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </section>
</section>
