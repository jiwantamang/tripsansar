
<?php

use backend\models\Place;

  // get all the PlaceSearch

  $records = Place::find()->all();


 ?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> All Places</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>SN</th>
                                  <th>ID</th>
                                  <th>PLACE NAME</th>
                                  <th class="numeric">CREATED DATE</th>
                                  <th class="numeric">ADDRESS</th>
                                  <th class="numeric">CATAGORY</th>

                              </tr>
                              </thead>
                              <tbody>


                                <?php

                                  $i=0;
                                    foreach($records as $data){
                                      ?>
                                      <tr>
                                          <td><?= ++$i;?></td>
                                          <td><?= $data['place_id']?></td>
                                          <td><?= $data['placetitle']?></td>
                                          <td class="numeric"><?= $data['placetitle']?></td>
                                          <td class="numeric"><?= $data['placeaddress']?></td>
                                          <td class="numeric"><?= $data['placecatagory']?></td>

                                      </tr>
                                      <?php
                                    }

                                 ?>

                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->
		  	</div><!-- /row -->


		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
