<div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <div class="panel">
        <div class="panel-body">
            <div class="row" style="min-height:430px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <section class="panel panel-active">
                        <div class="panel-body">
                            <div class="panel-header" style="margin-bottom:90px;">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <h5>You Have 0 Items in Cart</h5>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <aside class="cart-check-out col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6" style="margin-top:0px;">
                                        <div class="col-md-4 col-sm-4 col-xs-6" style="padding-left:0px;">
                                            <!-- <img src="<?=base_url()?>assets/images/cart3.jpg" width="50px" height="auto" style="margin-top:2px;"> -->
                                            <div class="check_cart_count">
                                                <!-- <span id="cart_count_check"><?= (null != $this->session->userdata('cart_count'))?$this->session->userdata('cart_count'): 0?></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-4 col-xs-6">
                                            <!-- <button class="btn btn-lg btn-primary btn-block btn-check-out" id="check_out_button"> -->
                                            <!-- <?= (0 != intval($this->session->userdata('cart_count')))?"<i class='fa fa-check'></i> Check Out": "0 Items"?></button> -->
                                        </div>
                                    </aside>
                                </div>
                            </div>
                            <!-- Main bar -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <!-- tables go here -->
                                <section class="panel panel-active">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 24%;padding-top: 0%;">
                                        <img src="<?= base_url()?>assets/images/cart3.jpg" alt="cart 0 Items">
                                        <span style="display: inline-block;min-width: 31px;padding: 1px 0px;font-size: 106px;font-weight: normal;color: #555;line-height: 0.3;vertical-align: top;white-space: nowrap;text-align: center;">0</span>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left:58%;">
                                        <a href="<?= base_url()?>welcome/industry" class="btn btn-md btn-info">View Reports</a>
                                        <?php if(null !== $this->session->user_email){
                                            ?>
                                            <span>OR</span>
                                            <a href="<?= base_url()?>purchase/account" class="btn btn-md btn-primary">View Account</a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                </section>
                                <!-- /table ends -->
                            </div>
                            <!-- /end Main bar -->
                        </div>
                </div>
                </section>
                <!-- /table ends -->
            </div>
            <!-- /end Main bar -->
        </div>
    </div>
    <!-- end panel-body -->
</div>
<!-- end panel -->
</div>
<script type="text/javascript">
var baseUrl = "<?= base_url()?>";
</script>
