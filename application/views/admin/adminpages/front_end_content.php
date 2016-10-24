<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
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
                                    <a href="#">
                                        <?=$page_title?>
                                    </a>
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
                                        <h4><i class="fa fa-edit"></i><?=$page_title?></h4>
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
             echo form_open_multipart('admin/update_front_end_content', $form_attributes);
              foreach ($content as $data){
             ?>
                                            
                                            
                                           <input type="hidden" class="form-control" id="content_id" step='50' name="content_id" required value="<?php echo $data['content_id'];?>">
                                           
                                            <div class="form-group">
                                                <label for="content_data" class="col-lg-3 col-sm-3 control-label">Package Features</label>
                                                <div class=" col-lg-9 col-md-9 col-sm-9">
                                                    <textarea class="wysihtml5 form-control" type="text" name="content_data" rows="13" required />
                                                        
                                                        <?php echo $data['content_data'];?>
                                                    </textarea>
                                                    <?php
                                              echo form_error('content_data');  

                                              ?>
                                                        <p class="help-block">  <?=$page_title?> Content</p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                            ?>
                                                <div class="form-group" style="margin-top:30px;">
                                                    <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Update Content<i class="fa fa-arrow-circle-right"></i></button>
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
                App.setPage("add_new_matter"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>
            <!-- /JAVASCRIPTS -->
