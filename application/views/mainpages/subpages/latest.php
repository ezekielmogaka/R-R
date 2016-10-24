     <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <!--tab start-->
                <section class="panel tab">
                   
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">

                         <h1>Latest Articles</h1>




                             <div class="row">


                            <?php

                            foreach ($latest_articles as $articles){

                            ?>

                            
                              <article class="media">
                                         <a class="pull-left thumb p-thumb">
                                                      <img src="<?= base_url()?>assets/new_article_images/<?= $articles['article_image_path']?>">
                                                  </a>

                                                  <div class="media-body">
                                                      <a class=" p-head" href="<?php echo $articles['link']; ?>"> 
                                                      <?php
                                                                  echo $articles['article_heading'];
                                          

                                              ?>
                                              </a>
                                                      <p><?php
                                                                  echo $articles['article_description'];
                                          

                                              ?></p>
                                                  </div>
                                              </article>
                             

                                <?php
                              }

                                ?>


                                  
                                 

                                </div>
                                        
                               



                           
   
                        </div>
                    </div>
                </section>
                <!--tab end-->
            </div>
            
        </div>
    </div>










