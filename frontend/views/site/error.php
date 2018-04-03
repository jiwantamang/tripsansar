<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning small-margin">
                <div class="panel-heading">
                  <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                      <div class="site-error">

                      <div class="alert alert-danger">
                          <?= nl2br(Html::encode($message)) ?>
                      </div>

                      <p>
                          The above error occurred while the Web server was processing your request.
                      </p>
                      <p>
                          Please contact us if you think this is a server error. Thank you.
                      </p>

                  </div>

                </div>
            </div>

        </div>
    </div>
    
    