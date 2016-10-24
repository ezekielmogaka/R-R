<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?= base_url()?>assets/css/daterangepicker.css" />
<!-- JQUERY -->
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<div id="main-content">
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Box Settings</h4>
                </div>
                <div class="modal-body">Here goes box setting content.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->
                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#"></a>
                                </li>
                                
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left"><?=$page_title?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->
                <!-- FORMS -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="box border primary">
                                    <div class="box-title">
                                        <h4><i class="fa fa-bars"></i><?=$page_title?></h4>
                                        <div class="tools hidden-xs">
                                            <a href="#box-config" data-toggle="modal" class="config">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <a href="javascript:;" class="reload">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <a href="javascript:;" class="collapse">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a href="javascript:;" class="remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box-body big">
                                        <h3 class="form-title"></h3>
                                        <?php
              if(isset($server_reply) && null !== $server_reply){
                echo $server_reply;
              }
             $form_attributes = array('class'=>'form-horizontal','role'=>'form');
             echo form_open_multipart('admin/submit_new_article', $form_attributes);
             ?>    



                                            <div class="form-group">
                                                <label for="transaction_id" class="col-lg-3 col-sm-3 control-label">Article Title</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="article_heading" name="article_heading" value="<?= set_value('article_heading')?>" required placeholder="Article Heading">
                                                    <?php
                                              echo form_error('article_heading');  

                                              ?>
                                                        <p class="help-block">Article title</p>
                                                </div>
                                            </div>


                                             <div class="form-group">
                                                <label for="article_description" class="col-lg-3 col-sm-3 control-label">Brief Article Descrition</label>
                                                <div class=" col-lg-9 col-md-9 col-sm-9">
                                                    <textarea class="wysihtml5 form-control" type="text" name="article_description" columns="20" required />

                                                     <?php
                                              echo form_error('article_description');  

                                              ?>
                                                        
                                                    </textarea>
                                                    <p class="help-block">Summative description of the Article</p>
                                                </div>
                                            </div>
                                            

                                              <div class="form-group">
                                                <label for="link" class="col-lg-3 col-sm-3 control-label">Article Link</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="url" class="form-control" id="link" name="link" value="<?= set_value('link')?>" aria-required="true" required placeholder="Should start with https:// or http://">
                                                    <?php
                                              echo form_error('link');  

                                              ?>
                                                        <p class="help-block">Article Link</p>
                                                </div>
                                            </div>
                             

                      
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="date_added">Date Added</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('date_added'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="25-05-2016  15:00" required id="date_added" name="date_added">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                            <?php
                                              echo form_error('date_added');  

                                              ?>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Payment Date</p>
                                                </div>
                                            </div> 


                                             <div class="form-group" style="margin-top:30px;">
                                                <label for="article_image" class="col-lg-3 col-sm-3 control-label">Article Image</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="article_image" name="article_image" value="<?= set_value('article_image')?>">
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php
                        if(isset($datareturned)){
                         echo $server_reply_file;
                        }
                     ?>
                                                </div>
                                            </div>                                      


                                           
                                      
                                           
                                            
                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Save Article<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?= base_url()?>assets/js/moment.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/js/daterangepicker.js"></script>
            <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/fuelux/js/spinner.min.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
            <!--this page  script only-->
            <script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
            <script>
            jQuery(document).ready(function() {
                App.setPage("new_articles"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>

         

      

         