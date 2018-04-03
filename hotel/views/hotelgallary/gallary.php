<?php
    use hotel\models\HotelGallary;
    use dosamigos\gallery\Gallery;

?>

<section id="main-content">
    <section class="wrapper site-min-height">
        

                  <?php
                            $gallary_images = HotelGallary::find()->where(['hotel_hotel_id'=>Yii::$app->user->identity->hotelid])->all();
                         
                            if(count($gallary_images) > 0){

                                
                                ?>
                               <div class="itnry_head_wrap">
                                   <span class="days_box"> PHOTO GALLERY </span> <span class="itnry_heading"></span>
                               </div>

                               <section class="small-margin">

                                 <?php

                                   // get gallary of this place

                                   $items = array();
                                   foreach($gallary_images as $gallary){
                                     $img1 = 'https://hotel.tripsansar.com/upload/hotel_gallary/hotel_gallary_thumbnail/'.$gallary->image_name;
                                     $img2 = 'https://hotel.tripsansar.com/upload/hotel_gallary/'.$gallary->image_name;


                                       $items[] = [
                                             'url' => $img2,

                                             'src' => $img1,
                                            // 'options' => array('title' => $gallary->image_description)
                                       ];
                                   }



                                    ?>

                                   <?= Gallery::widget(['items' => $items]); ?>


                        </section>

                        <?php

                      }
                      
                      ?>
    </section>
</section>