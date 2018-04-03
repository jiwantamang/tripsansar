<?php
 use yii\helpers\Html;
 use backend\models\Place;
 use backend\models\placecatagory;
 use dosamigos\gallery\Gallery;


 $data = Place::findOne($id);

?>


<div class="site-index">
  <div class="placeimage">
    <img src="../web/uploads/<?php echo $data['placeimages']?>" class="placedescriptionimage" >
  </div>


    <div class="row no-margin">
      <div class="itnry_head_wrap">
          <span class="days_box"> INTRODUCTION </span> <span class="itnry_heading"> <?= strtoupper($data['placetitle']); ?></span>

      </div>

      <section class="placedescription">
        <?= $data['placedescription']?>
      </section>

    </div>

    <div class="row no-margin">
      <div class="col-md-8">
        <div class="itnry_head_wrap">
            <span class="days_box"> INTRODUCTION </span> <span class="itnry_heading"></span>

        </div>
            <div id="exTab3">
            <ul  class="nav nav-pills small-margin">
            			<li class="active">
                    <a  href="#1b" data-toggle="tab">HISTORY</a>
            			</li>
            			<li><a href="#2b" data-toggle="tab">FESTIVALS</a>
            			</li>
            			<li><a href="#3b" data-toggle="tab">CONSULT</a>
            			</li>
              		<li><a href="#4a" data-toggle="tab">DIRECTION</a>
            			</li>
            		</ul>

            			<div class="tab-content clearfix">
            			  <div class="tab-pane active" id="1b">
                      <p>
                        Swayambhu is among the oldest religious sites in Nepal. According to the Gopālarājavaṃśāvalī Swayambhu was founded by the great-grandfather of King Mānadeva (464-505 CE), King Vṛsadeva, about the beginning of the 5th century CE. This seems to be confirmed by a damaged stone inscription found at the site, which indicates that King Mānadeva ordered work done in 640 CE.[3]

                However, Emperor Ashoka is said to have visited the site in the third century BCE and built a temple on the hill which was later destroyed.

                Although the site is considered Buddhist, the place is revered by both Buddhists and Hindus. Numerous Hindu monarch followers are known to have paid their homage to the temple, including Pratap Malla, the powerful king of Kathmandu, who is responsible for the construction of the eastern stairway in the 17th century.[4]

                The stupa was completely renovated in May 2010, its first major renovation since 1921[5][6] and its 15th in the nearly 1,500 years since it was built. The dome was re-gilded using 20 kg of gold. The renovation was funded by the Tibetan Nyingma Meditation Center of California, and began in June 2008.[7]

                Pratapur Temple in the Swayambhu Monument Zone of the Kathmandu Valley World Heritage site, Nepal suffered damage from a lightning strike at around 5 a.m. on 14 February 2011, during a sudden thunderstorm.

                The temple complex suffered damage in the April 2015 Nepal earthquake.[8]
                      </p>
            				</div>
            				<div class="tab-pane" id="2b">
                      <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
            				</div>
                    <div class="tab-pane" id="3b">
                      <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
            				</div>
                      <div class="tab-pane" id="4b">
                      <h3>We use css to change the background color of the content to be equal to the tab</h3>
            				</div>
            			</div>
              </div>

              <div class="itnry_head_wrap">
                  <span class="days_box"> PHOTO GALLERY </span> <span class="itnry_heading"></span>
              </div>

              <section class="small-margin">


                                    <?php
                                    $items = [
                                        [
                                            'url' => '@web/images/gallery_images/1.jpg',
                                            'src' => '@web/images/gallery_link/1.jpg',
                                            'options' => array('title' => 'Red Carpet Program')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/2.jpg',
                                            'src' => '@web/images/gallery_link/2.jpg',
                                            'options' => array('title' => 'Picnic Program')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/3.jpg',
                                            'src' => '@web/images/gallery_link/3.jpg',
                                            'options' => array('title' => 'Staff Image')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/4.jpg',
                                            'src' => '@web/images/gallery_link/4.jpg',
                                            'options' => array('title' => 'GoodWill Tour')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/5.jpg',
                                            'src' => '@web/images/gallery_link/5.jpg',
                                            'options' => array('title' => 'Sail us to the Moon')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/6.jpg',
                                            'src' => '@web/images/gallery_link/6.jpg',
                                            'options' => array('title' => 'Sail us to the Moon')
                                        ],
                                        [

                                            'url' => '@web/images/gallery_images/7.jpg',
                                            'src' => '@web/images/gallery_link/7.jpg',
                                            'options' => array('title' => 'Sail us to the Moon')
                                        ]

                                    ];
                                    ?>
                                  <?= Gallery::widget(['items' => $items]); ?>


              </section>
      </div>

      <div class="col-md-4">
      </div>
    </div>
