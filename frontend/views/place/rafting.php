<?php
       use edofre\sliderpro\models\Slide;
       use yii\imagine\Image;
       use yii\helpers\Url;
       use yii\helpers\Html;
       
       $this->title = "Rafting";
?>

<div class="site-index">
    
    <div class="row custom-row">
        <div class="col-md-5">
            <?php 
                $img = '/'.Yii::$app->name.'/backend/upload/rafting/rafting1.jpg';
                echo Html::img($img,['class'=>'img-responsive']);                                                            
            ?>
        </div>
        <div class="col-md-7">
            <div>
                <h4><b>Sun Kosi River Rafting (7 nights/8 days)</b></h4>
            <table class="table">
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            </div>
                       
                        
        </div>
    </div>
    
     <div class="row custom-row">
        <div class="col-md-7">
            <h4><b>Karnali River Rafting - Wild West (10 days)</b></h4>
            <hr>
        </div>
        <div class="col-md-5">
            <?php 
                
                $img1 = '/'.Yii::$app->name.'/backend/upload/rafting/rafting2.jpg';
                echo Html::img($img1,['class'=>'img-responsive']);
                
                
            ?>
        </div>
    </div>
    
     <div class="row custom-row">
        <div class="col-md-5">
            <?php 

                $img2 = '/'.Yii::$app->name.'/backend/upload/rafting/rafting3.jpg';
                echo Html::img($img2,['class'=>'img-responsive']);

                
                
            ?>
        </div>
        <div class="col-md-7">
            <h4><b>Marshyangdi River Rafting (2 days)</b> </h4>
            <hr>
        </div>
    </div>
    
     <div class="row custom-row">
        <div class="col-md-7">
            <h4><b>Kali Gandaki River Rafting (3 days Pokhara to Pokhara) </b></h4>
            <hr>
        </div>
        <div class="col-md-5">
            <?php 

                $img3 = '/'.Yii::$app->name.'/backend/upload/rafting/rafting4.jpg';
                echo Html::img($img3,['class'=>'img-responsive']);
                
                
                
            ?>
        </div>
    </div>
    
    
