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
                <div class="modal-body">
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
                                    <a href="#">Home</a>
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
             echo form_open_multipart('admin/submit_new_payment', $form_attributes);
             ?>
                                            <div class="form-group">
                                                <label for="user_email" class="col-lg-3 col-sm-3 control-label">Client</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <select class="form-control" id="user_email" name="user_email" required value="<?= set_value('user_email')?>">
                                                        <option value="">--------Select Client------</option>
                                                        <?php
                   foreach ($clients_details as $client) {
                      echo "<option value='".$client['user_email']."'>".$client['clientNames']."</option>";
                    }
                      ?>
                                                            <?php
                                              echo form_error('client');  
                                              

                                              ?>
                                                    </select>
                                                    <p class="help-block">Select any of the Clients.</p>
                                                </div>
                                            </div>


                                             <div class="form-group">
                                                <label for="client_id" class="col-lg-3 col-sm-3 control-label">Package Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <select class="form-control" id="package_id" name="package_id" required value="<?= set_value('package_id')?>">
                                                        <option value="">--------Select Package------</option>
                                                        <?php
                   foreach ($package_details as $package) {
                      echo "<option value='".$package['package_id']."'>".$package['package_title']." </option>";
                    }
                      ?>
                                                            <?php
                                              echo form_error('client');  

                                              ?>
                                                    </select>
                                                    <p class="help-block">Select Package Name</p>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="payment_mode">Mode of Payment</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('payment_mode'); ?>
                                                    <select class="form-control m-bot15" required id="payment_mode" name="payment_mode" value="<?= set_value('payment_mode')?>">
                                                        <option value="">-- Mode of Payment --</option>
                                                        <option>Cash</option>
                                                        <option>Bank</option>
                                                        <option>Cheque</option>
                                                        <option>M-Pesa</option>
                                                        <option>Airtel Money</option>
                                                        <option>Orange Money</option>
                                                    </select>
                                                    <p class="help-block">Mode of Payment</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="payment_date">Payment Date</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('payment_date'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="21-03-2016  15:25" required id="payment_date" name="payment_date">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                            <?php
                                              echo form_error('payment_date');  

                                              ?>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Payment Date</p>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-3" for="package_start_date">Package Start Date</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('package_start_date'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="21-03-2016  15:25" required id="package_start_date" name="package_start_date">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                            <?php
                                              echo form_error('package_start_date');  

                                              ?>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Package Start Date</p>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-3" for="package_end_date">Package End Date</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('package_end_date'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="21-03-2016  15:25" required id="package_end_date" name="package_end_date">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                            <?php
                                             

                                              ?>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Package End Date</p>
                                                </div>
                                            </div>

                                           


                                            <!--  <div class="form-group">
                                                <label for="amount" class="col-lg-3 col-sm-3 control-label">Package Period</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" step='50' class="form-control" id="startDate" name="package_period" required value="<?= set_value('package_period')?>" placeholder="For Example 19-04-2016 - 12-08-2017">
                                                    <?php
                                              echo form_error('package_period');  

                                              ?>
                                                        <p class="help-block">Package Period</p>
                                                </div>
                                            </div>
 -->
                                      
                                            <div class="form-group">
                                                <label for="amount" class="col-lg-3 col-sm-3 control-label">Amount(KSh)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="number"  class="form-control" id="amount" name="amount" required value="<?= set_value('amount')?>" placeholder="For Example 1500">
                                                    <?php
                                              echo form_error('amount');  

                                              ?>
                                                        <p class="help-block">Amount in Kenya Shillings</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="transaction_id" class="col-lg-3 col-sm-3 control-label">Transaction Id(Receipt No)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="<?= set_value('transaction_id')?>" required placeholder="Transaction Id or receipt in the case of cash">
                                                    <?php
                                              echo form_error('transaction_id');  

                                              ?>
                                                        <p class="help-block">Payment Transaction Id or receipt No.</p>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Save Payment<i class="fa fa-arrow-circle-right"></i></button>
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
                App.setPage("new_payment_form"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>

            <style type="text/css">
      .demo { position: relative; }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
      </style>

      <script type="text/javascript">
      $(document).ready(function() {

        $('#config-text').keyup(function() {
          eval($(this).val());
        });
        
        $('.configurator input, .configurator select').change(function() {
          updateConfig();
        });

        $('.demo i').click(function() {
          $(this).parent().find('input').click();
        });

        $('#startDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment().subtract(6, 'days')
        });

        $('#endDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment()
        });

        updateConfig();

        function updateConfig() {
          var options = {};

          if ($('#singleDatePicker').is(':checked'))
            options.singleDatePicker = true;
          
          if ($('#showDropdowns').is(':checked'))
            options.showDropdowns = true;

          if ($('#showWeekNumbers').is(':checked'))
            options.showWeekNumbers = true;

          if ($('#showISOWeekNumbers').is(':checked'))
            options.showISOWeekNumbers = true;

          if ($('#timePicker').is(':checked'))
            options.timePicker = true;
          
          if ($('#timePicker24Hour').is(':checked'))
            options.timePicker24Hour = true;

          if ($('#timePickerIncrement').val().length && $('#timePickerIncrement').val() != 1)
            options.timePickerIncrement = parseInt($('#timePickerIncrement').val(), 10);

          if ($('#timePickerSeconds').is(':checked'))
            options.timePickerSeconds = true;
          
          if ($('#autoApply').is(':checked'))
            options.autoApply = true;

          if ($('#dateLimit').is(':checked'))
            options.dateLimit = { days: 7 };

          if ($('#ranges').is(':checked')) {
            options.ranges = {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
          }

          if ($('#locale').is(':checked')) {
            options.locale = {
              format: 'MM-DD-YYYY HH:mm',
              separator: ' - ',
              applyLabel: 'Apply',
              cancelLabel: 'Cancel',
              fromLabel: 'From',
              toLabel: 'To',
              customRangeLabel: 'Custom',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
            };
          }

          if (!$('#linkedCalendars').is(':checked'))
            options.linkedCalendars = false;

          if (!$('#autoUpdateInput').is(':checked'))
            options.autoUpdateInput = false;

          if ($('#alwaysShowCalendars').is(':checked'))
            options.alwaysShowCalendars = true;

          if ($('#parentEl').val().length)
            options.parentEl = $('#parentEl').val();

          if ($('#startDate').val().length) 
            options.startDate = $('#startDate').val();

          if ($('#endDate').val().length)
            options.endDate = $('#endDate').val();
          
          if ($('#minDate').val().length)
            options.minDate = $('#minDate').val();

          if ($('#maxDate').val().length)
            options.maxDate = $('#maxDate').val();

          if ($('#opens').val().length && $('#opens').val() != 'right')
            options.opens = $('#opens').val();

          if ($('#drops').val().length && $('#drops').val() != 'down')
            options.drops = $('#drops').val();

          if ($('#buttonClasses').val().length && $('#buttonClasses').val() != 'btn btn-sm')
            options.buttonClasses = $('#buttonClasses').val();

          if ($('#applyClass').val().length && $('#applyClass').val() != 'btn-success')
            options.applyClass = $('#applyClass').val();

          if ($('#cancelClass').val().length && $('#cancelClass').val() != 'btn-default')
            options.cancelClass = $('#cancelClass').val();

          $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#config-demo').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
          
        }

      });
      </script>
            <!-- /JAVASCRIPTS -->
