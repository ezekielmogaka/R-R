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
                                    <a href="#">Edit Report</a>
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
             echo form_open_multipart('admin/submit_edited_report', $form_attributes);

             echo "<input type='hidden' name='hidden_report_id' value='".$report_details[0]['report_id']."'/>";

             
            ?>
                                            <div class="form-group">
                                                <label for="reportcategory" class="col-lg-3 col-sm-3 control-label">Report Category</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <select class="form-control" id="reportcategory" name="reportcategory" required selected="selected">
                                                        <option value="0" selected="">--------Select Category-------</option>
                                                        <?php
                   foreach ($categories as $category) {
                     
                      if(isset($report_details[0]['category_id']) && $report_details[0]['category_id'] != null && $report_details[0]['category_id'] == $category['category_id']){
                         echo "<option value='".$category['category_id']."' selected='selected'>".$category['category_name']."</option>";
                      }else{
                         echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";
                      }
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
                                                    <input type="text" class="form-control" id="reportname" name="reportname" required value="<?php if(isset($report_details[0]['report_name']) && $report_details[0]['report_name'] != null){ echo $report_details[0]['report_name']; }else{echo set_value('reportname');}?>">
                                                    <p class="help-block">Descriptive title of the report</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportdescription" class="col-lg-3 col-sm-3 control-label">Report Descripion</label>
                                                <div class=" col-lg-9 col-md-9 col-sm-9">
                                                    <textarea class="wysihtml5 form-control" type="text" name="reportdescription" columns="20" required>
                                                        <?php if(isset($report_details[0]['report_description']) && $report_details[0]['report_description'] != null){ echo $report_details[0]['report_description']; }else{echo set_value('reportdescription');}?>
                                                    </textarea>
                                                    <p class="help-block">Summative description of the whole report in 200 words</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportpages" class="col-lg-3 col-sm-3 control-label">Number of Pages</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step="1" class="form-control" id="reportpages" name="reportpages" required value="<?php if(isset($report_details[0]['number_of_pages']) && $report_details[0]['number_of_pages'] != null){ echo $report_details[0]['number_of_pages']; }else{echo set_value('reportpages');}?>" placeholder="e.g 900">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="year_published" class="col-lg-3 col-sm-3 control-label">Year Published</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step="1" class="form-control" id="year_published" name="year_published" required value="<?php if(isset($report_details[0]['year_published']) && $report_details[0]['year_published'] != null){ echo $report_details[0]['year_published']; }else{echo set_value('year_published');}?>" placeholder="e.g 2015">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reportprice" class="col-lg-3 col-sm-3 control-label">Price in Ksh</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number" step='0.50' class="form-control" id="reportprice" name="reportprice" required value="<?php if(isset($report_details[0]['year_published']) && $report_details[0]['year_published'] != null){ echo $report_details[0]['year_published']; }else{echo set_value('reportprice');}?>" placeholder="e.g 100.50">
                                                </div>
                                            </div>
                                            <!-- CLick toggle checkbox -->
                                           <!--  <div class="form-group">
                                                <label for="checkbox_toggle" class="col-lg-3 col-sm-3 control-label">Click to upload files</label>
                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <input type="checkbox" class="form-control" id="checkbox_toggle" name="checkbox_toggle" value="1">
                                                </div>
                                            </div> -->
                                            <!-- end of the click button -->
                                            <!-- hide this unless unhide clicked -->
                                           <!--  <div class="hidden toggle_onclick_button">
                                                <div class="form-group" style="margin-top:30px;">
                                                    <label for="reportfile" class="col-lg-3 col-sm-3 control-label">Full Report</label>
                                                    <div class="col-lg-6">
                                                        <input type="file" class="btn" id="reportfile" name="reportfile" value="<?= set_value('reportfile')?>">
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
                                                        <input type="file" class="btn" id="reportfile_sample" name="reportfile_sample" value="<?= set_value('reportfile_sample')?>">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <?php
                        if(isset($server_reply_file2) && null !==$server_reply_file2){
                         echo $server_reply_file2;
                        }
                     ?>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- end of hidden -->

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
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Update Report<i class="fa fa-arrow-circle-right"></i></button>
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
            <script type="text/javascript" src="<?= base_url()?>assets/js/customscript.js"></script>
            <script type="text/javascript" src="<?= base_url()?>assets/js/admin/customscript.js"></script>
            <script>
            jQuery(document).ready(function() {
                App.setPage("edit_report"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>
            <!-- /JAVASCRIPTS -->
