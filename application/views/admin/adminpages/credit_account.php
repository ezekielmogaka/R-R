<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
  <!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
 <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>


  <div id="main-content">
      
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
                      <a href="#"><?=$page_title?></a>
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

            <!-- DATA TABLES -->
            <div class="row">
              <div class="col-md-12">
                <!-- BOX -->
                <div class="box border blue">
                  <div class="box-title">
                    <h4><i class="fa fa-table"></i><?=$page_title?></h4>
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
                  <div class="box-body">
                    <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                      <thead>
                      <tr class="gradeX">
                        <tr>
                             <th>#</th>
                              <th>Name</th>
                              <th>Current Package Name</th> 
                              <th>Package Period</th>                              
                              <th>Remaining amount</th>
                              <th>Credit Account</th> 
                              
                           
                        </tr>
                      </thead>
                      <tbody>
                        

                        <?php
                        $counter = 1;
                           foreach ($credit_account_details as $client)
                           {

                            ?>

                              <!-- Modal -->
                    

                    <?php

                            
                             echo "<tr class='gradeX'>";
                            

                             echo "<td> 
                                  ".$counter."
                                </td>

                                <td>
                               
                                  ".$client['clientNames']."
                                   </td>

                                   <td>
                                   ".$client['package_name']."
                                   </td>
                                   <td>
                                   ".$client['package_start_date']." < - > ".$client['package_end_date']."
                                   </td>
                                   <td>
                                   ".$client['remaining_package_amount']."
                                   </td>
                                  
                                                                 
                                  
                                   <td>";?>
                                   <div class="target hidden">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Credit account for: <B><?php echo $client['clientNames'];?></B></h4>
                          </div>
                          <div class="modal-body">
                          <?php
                      echo validation_errors();

                        if(isset($server_reply) && null !== $server_reply){
                          echo $server_reply;
                        }
                       $form_attributes = array('class'=>'form-horizontal','role'=>'form');
                       echo form_open_multipart('admin/save_credit_account_details', $form_attributes);
                      ?>

                      <?php echo $client['clientNames'];?>

                                             <input type="hidden" class="form-control" id="client_id" name="client_id" required value="<?php echo $client['client_id'];?>" >

                                             <input type="hidden" class="form-control" id="package_id" name="package_id" required value="<?php echo $client['package_id'];?>" >
                                             
                                              <input type="hidden" class="form-control" id="user_email" name="user_email" required value="<?php echo $client['user_email'];?>" >


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
                                                <label for="transaction_id" class="col-lg-3 col-sm-3 control-label">Transaction Id(Receipt No)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="<?= set_value('transaction_id')?>" required placeholder="Transaction Id or receipt no.">
                                                    <?php
                                              echo form_error('transaction_id');  

                                              ?>
                                                        <p class="help-block">Payment Transaction Id or receipt No.</p>
                                                </div>
                                            </div>

                                                                                          

                                    


                              <div class="form-group" style="margin-top:30px;">
                                  <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Credit Account<i class="fa fa-arrow-circle-right"></i></button>
                              </div>

                                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php


                                   echo "<button type='button' class='btn btn-primary showModal' id='' data-toggle='modal' data-target='#myModal' onclick='showmodalthis(this)' >
                                 Accept/Reject

                                </button>

                                </td>
                                  
                                  
                                   </tr>";
                                   ?>
                                                                                    

                                   
                    <?php

                                     $counter = $counter+1;

                             
                           }


                          ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                           <th>#</th>
                              <th>Client Type</th>
                              <th>Current Package Name</th> 
                              <th>Package Period</th>                              
                              <th>Remaining amount</th>
                              <th>Credit Account</th> 
                          
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /BOX -->
              </div>
            </div>
            
            
            <div class="separator"></div>
            
          
            
          </div><!-- /CONTENT-->
        </div>
      </div>

          </div><!-- /CONTENT-->
           <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

           </div>

    


  <!-- DATA TABLES -->
  <script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/media/assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>

  <script>
    jQuery(document).ready(function() {   
      App.setPage("dynamic_table");  //Set current page
      App.init(); //Initialise plugins and elements
    });
  </script>

  <script type="text/javascript">
   function showmodalthis(thisclass){
    var parent =$(thisclass).parent().parent().find('.target');
    $('#myModal').html(parent.html());
    
   }
  </script>
  <!-- /JAVASCRIPTS -->

