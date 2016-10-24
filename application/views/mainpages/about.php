    <div class="container" style="margin-top: 90px;margin-bottom: 90px;">
        <div class="row">
            <div class="col-lg-5">
                <div class="span5 about-carousel">
                    <div id="myCarousel" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="active item">
                                
                                <img src="<?=base_url()?>assets/images/about/transport.jpg" alt="">
                                <div class="carousel-caption">
                                    <p>Research on Transport infrastucture</p>
                                </div>
                            </div>
                            <div class="item">
                                
                                 <img src="<?=base_url()?>assets/images/about/food.jpg" alt="">

                                <div class="carousel-caption">
                                    <p>Research on the Food Sector</p>
                                </div>
                            </div>
                            <div class="item">
                                
                                 <img src="<?=base_url()?>assets/images/about/industry.jpg" alt="">
                                <div class="carousel-caption">
                                    <p>Industry Overviews and in-depth reports....</p>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 about" style="margin-top:-38px;text-align: justify;
    text-justify: inter-word;">
                <div class="text-center"><h4>Welcome to Research and Ratings Company</h4></div>
                <p>
                <?php

                 foreach ($contents as $about_us){
                                        echo $about_us['content_data'];
                                    }
                                        ?>
                   
                    
            </div>
        </div>
       
    </div>


   

    
    <!--container end-->