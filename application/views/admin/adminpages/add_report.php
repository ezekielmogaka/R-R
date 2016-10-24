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
                <div class="modal-body">s Here goes box setting content.
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
                                    <a href="<?= base_url().'index.php/admin/admin_dashboard' ?>">Home</a>
                                </li>
                                <li>
                                    <a href="#">Cases/Matters</a>
                                </li>
                                <li>
                                    <?=$page_title?>
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
             echo form_open_multipart('admin/submit_new_report', $form_attributes);
             ?>
                                            <div class="form-group">
                                                <label for="reportcategory" class="col-lg-3 col-sm-3 control-label">Report Category</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <select class="form-control" id="reportcategory" name="reportcategory" required value="<?= set_value('reportcategory')?>">
                                                        <option value="">--------Select Category-------</option>
                                                        <?php
                   foreach ($categories as $category) {
                      echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";
                   }
                  ?>
                                                    </select>
                                                    <p class="help-block">Select any of the
                                                        <?= count($categories)?> report categories.</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportname" class="col-lg-3 col-sm-3 control-label">Report Title/Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="reportname" name="reportname" required value="<?= set_value('reportname')?>">
                                                    <p class="help-block">Descriptive title of the report</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportdescription" class="col-lg-3 col-sm-3 control-label">Report Descripion</label>
                                                <div class=" col-lg-9 col-md-9 col-sm-9">
                                                    <textarea class="wysihtml5 form-control" type="text" name="reportdescription" rows="15" required>
                                                        <?= set_value('reportdescription')?>
                                                    </textarea>
                                                    <p class="help-block">Summative description of the whole report </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportpages" class="col-lg-3 col-sm-3 control-label">Number of Pages</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step="1" class="form-control" id="reportpages" name="reportpages" required value="<?= set_value('reportpages')?>" placeholder="e.g 90">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="year_published" class="col-lg-3 col-sm-3 control-label">Year Published</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step="1" class="form-control" id="year_published" name="year_published" required value="<?= set_value('year_published')?>" placeholder="2016">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportprice" class="col-lg-3 col-sm-3 control-label">Price in Ksh</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step='100' class="form-control" id="reportprice" name="reportprice" required value="<?= set_value('reportprice')?>" placeholder="e.g 25000">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="reportfile" class="col-lg-3 col-sm-3 control-label">Full Report</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="reportfile" name="reportfile" required value="<?= set_value('reportfile')?>" required/>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php
                        if(isset($server_reply_file1) && null !==$server_reply_file1){
                          echo $server_reply_file1;
                        }
                     ?>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="reportfile_sample" class="col-lg-3 col-sm-3 control-label">Sample Report</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="reportfile_sample" name="reportfile_sample" value="<?= set_value('reportfile_sample')?>" required/>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php
                        if(isset($server_reply_file2) && null !==$server_reply_file2){
                         echo $server_reply_file2;
                        }
                     ?>
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="cover_page" class="col-lg-3 col-sm-3 control-label">Report Cover Page</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="cover_page" name="cover_page" value="<?= set_value('cover_page')?>" required/>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php
                        if(isset($server_reply_file3) && null !==$server_reply_file3){
                         echo $server_reply_file3;
                        }
                     ?>
                                                </div>
                                            </div>


                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Save Report<i class="fa fa-arrow-circle-right"></i></button>
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
