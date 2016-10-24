<!-- Footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h1>Contact Info</h1>

                <address>

                        <p>Location: Nairobi, Kenya.</p>
                        
                        <p>Street Address: Equity Building, Opp. Yaya Centre. </p>
                        <p>Postal Address: P.O. Box 4823 - 00506</p>

                        <p>Phone : +254 776 392900</p>
                        
                        <p>Email : <a href="javascript:;">info@researchandratings.co.ke</a></p>
                    </address>
            </div>
            <div class="col-lg-5 col-sm-5">
               <h1>Latest Tweets</h1>
                    <div class="tweet-box">
                        <i class="fa fa-twitter"></i>
                        <em>Please follow <a href="javascript:;">@researchandratings</a> for Industry analysis, Sector studys and corporate Research <a href="javascript:;">twitter.com/researchandratings</a></em>
                    </div>      
            </div>
            <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                <h1>stay connected</h1>
                <ul class="social-link-footer list-unstyled">
                    <li><a href="https://www.facebook.com/researchandratings/"><i class="fa fa-facebook"></i></a></li>
                    
                    <li><a href="https://twitter.com/FeePlan_Ltd"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/ End of Footer-->
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script defer src="<?=base_url()?>assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/assets/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.parallax-1.1.3.js"></script>
<script src="<?=base_url()?>assets/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>assets/js/link-hover.js"></script>
<script src="<?=base_url()?>assets/assets/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!--common script for all pages-->
<script src="<?=base_url()?>assets/js/common-scripts.js"></script>
<script src="<?=base_url()?>assets/js/revulation-slide.js"></script>
<script src="<?=base_url()?>assets/js/jquery.stepy.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url()?>assets/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatable/DT_bootstrap.js"></script>
<!-- Custom Script -->
<script type="text/javascript" src="<?=base_url()?>assets/js/customscript.js"></script>
<script type="text/javascript">
var baseUrl = "<?= base_url()?>";
</script>
<?php
    if(isset($specific_scripts) && count($specific_scripts) != 0){
        foreach($specific_scripts as $script){
            echo "<script type='text/javascript' src='".base_url()."assets/js/".$script."'></script>";
        }
    }


    ?>
    </body>

    </html>