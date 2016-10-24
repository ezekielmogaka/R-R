<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Research and Ratings">
    <meta property="og:title" content="Industry analysis,Sector Studies, Corporate research"/>
    <meta name="author" content="Ezzy">
    <meta name="keyword" content="marketsectors, industry reports,Research and ratings, sector, Corporate reports ">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">
    <title>Research and Ratings-Kenya</title>
    
    
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/theme.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/flexslider.css" />
    <link href="<?= base_url()?>assets/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?= base_url()?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url()?>assets/assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="<?= base_url()?>assets/assets/revolution_slider/rs-plugin/css/settings.css" media="screen">
    <!-- Custom styles for this template -->
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
    <!-- For Data table -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/datatable/demo_table.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/datatable/DT_bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_assets/js/datatables/media/css/jquery.dataTables.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]--><?php

        if(isset($specific_css) && $specific_css!== null){
            foreach ($specific_css as $css) {

              
                 echo "<link href='".base_url()."assets/css/".$css."' rel='stylesheet'/>";
                     
               
               
              }
        }

    ?>
</head>
<!-- Header-->
<header class="header-frontend">
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="navbar-inner"> 
        <div class="container-fluid" style="border-bottom: 1.5px solid #ddd;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>welcome" style="margin-left: 1.5px;margin-top: 1.5px;margin-bottom: 1.0px;">
                <img class="img-responsive" alt="R&R Logo" src="<?= base_url() ?>assets/images/R&R.png" >
                 
                </a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li <?php if((isset($active) && isset($content)) && $active=="home" ){echo "class='active'";}?>>
                        <a href="<?=base_url()?>welcome">Home</a>
                    </li>
                    <li <?php if((isset($active) && isset($content)) && $active=="aboutus" ){echo "class='active'";}?>>
                        <a href="<?=base_url()?>welcome/about">About Us</a>
                    </li>
                    <li <?php if((isset($active) && isset($content)) && ($active=="industry" ) ){echo "class='active dropdown'";}else{ echo "class='dropdown'";}?> >
                        <a href="<?=base_url()?>welcome/industry">Industry</a>
                    </li>
                    <li <?php if((isset($active) && isset($content)) && ($active=="sector" ) ){echo "class='active dropdown'";}else{ echo "class='dropdown'";}?> >
                        <a href="<?=base_url()?>welcome/sector">Sector</a>
                    </li>
                    <li <?php if((isset($active) && isset($content)) && ($active=="corporate" ) ){echo "class='active dropdown'";}else{ echo "class='dropdown'";}?> >
                        <a href="<?=base_url()?>welcome/corporate">Corporate</a>
                    </li>
                    
                    <li <?php if((isset($active) && isset($content)) && $active=="contactus" ){echo "class='active'";}?>>
                        <a href="<?=base_url()?>welcome/contact">Contact Us</a>
                    </li> 
                    <li <?php if((isset($active) && isset($content)) && $active=="cart" ){echo "class='active'";}?>>
                        <a href="<?= base_url()?>purchase/show-cart">
                        <img src="<?=base_url()?>assets/images/cart3.jpg" width="35px" height="auto" style="margin-top:-2px;">
                        <div  class="houses_cart_count">
                        <span id="cart_count"><?= (null != $this->session->userdata('cart_count'))?$this->session->userdata('cart_count'): 0?></span></div>
                        </a>
                    </li>

                    <?php

                     if(!null == $this->session->user_email){
                        ?>

                    <li <?php if((isset($active) && isset($content)) && $active=="account" ){echo "class='active'";}?>>
                        <a href="<?=base_url()?>purchase/account">Account</a>
                    </li>

                    <?php
                }

                    ?>

                    <?php

                     if(null == $this->session->user_email){
                        ?>
                        <li <?php if((isset($active) && isset($content)) && $active=="login" ){echo "class='active'";}?> style="margin-right:0px;">
                            <a href="<?=base_url()?>welcome/show-login" style="background-color:transparent;">
                                Login <span style="font-size:large;margin-top:-5px;" class="fa fa-user color-fa-default"></span>
                            </a>
                        </li>
                        <?php
                     } else{
                        ?>
                            <li <?php if((isset($active) && isset($content)) && $active=="login" ){echo "class='active'";}?> style="margin-right:0px;">
                                <a href="<?=base_url()?>welcome/logout" style="background-color:transparent;">
                                 Logout  <span style="font-size:large;margin-top:-5px;" class="fa fa-user color-fa-active"></span>
                                </a>
                            </li>
                            <?php
                     }



                    ?>
                </ul>
            </div>
        </div>
        </div>
    </div>
</header>
<!-- /end of Header -->
