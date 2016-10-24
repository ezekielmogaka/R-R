<div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <div class="panel">
        <div class="panel-body">
            <div class="row" style="min-height:430px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <section class="panel panel-active">
                        <div class="panel-body">
                            <div class="panel-header text-left">
                                <h5>Reports added to <?= $page_title?> </h5>
                            </div>
                            <div class="adv-table">                                
                                  <table id="carttable" cellpadding="0" cellspacing="0" border="0" class="datatable table-striped  table-hover">
                                    <thead>
                                        <tr class="">
                                            <th width="1%">Report</th>
                                            <th width="17%">Report Title</th>
                                            <th width="5%"> Type</th>
                                            <th width="9%">Year Published</th>
                                            <th width="51%">Description</th>
                                            <th width="4%">Price (KSh)</th>
                                            <th width="4%">Discount</th>
                                            <th width="4%"> Amount to Pay</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $this->load->helper('myurihelper_helper');

                                      $count_reports = 1;
                                      $total_amount_for_reports = 0.00;
                                      $total_amount_to_pay = 0.00;
                                      $total_discount = 0.00;
                                      $report_ids = "";
                                      $report_prizes = "";
                                      $report_discounts ="";
                                      $reports_amount_to_pay ="";

                                      foreach ($report_details['user_reports'] as $report){

                                        if($report[0]['report_status'] == 1){
                                          $discounted_price_alt = "Purchased";
                                          $amount_to_pay_alt = "Purchased";
                                          $report_price_alt = "Purchased";


                                        }else{

                                          $discounted_price_alt = "";
                                          $amount_to_pay_alt = "";
                                          $report_price_alt = "";

                                          $discounted_price_raw = round(($report[0]['report_price'] *($report_details['user_details']['package_discount']/100)),1);

                                        $discounted_price = number_format($discounted_price_raw,2,'.',',');

                                        $amount_to_pay_raw = round($report[0]['report_price'],1) - $discounted_price_raw;
                                        
                                        $amount_to_pay = number_format($amount_to_pay_raw,2,'.',',') ;

                                        $report_price_raw = $report[0]['report_price'];
                                        $report_price = number_format($report_price_raw,2,'.',',');



                                        $total_amount_to_pay += floatval($amount_to_pay_raw);
                                        $total_amount_for_reports += floatval($report_price_raw);
                                        $total_discount += floatval($discounted_price_raw); 

                                        $report_ids .= $report[0]['report_id']."::>>";
                                        $report_prizes .= floatval($report[0]['report_price'])."::>>";
                                        $report_discounts .= $discounted_price_raw."::>>";
                                        $reports_amount_to_pay .=$amount_to_pay_raw."::>>";


                                        }

                                        
                                        
                                        
                                        echo "<tr>
                                               <td class='dt-body-center'  style='padding: 10px;width: 20%;'>                                             
                                              <img class='img-responsive' src='".base_url()."assets/images/banner/report_cover.png' width='50%' height='auto'/>
                                              <input type='hidden' name='report_id' value='".$this->encrypt->encode($report[0]['report_id'])."'/>                                            
                                              </td>                                               
                                              <td>
                                              ".$report[0]['report_name']."
                                              </td>
                                              <td>";
                                              if(intval($report[0]['category_id']) ==1){
                                                echo "<span class='badge badge-sm label-primary'>Industry</span>";
                                              }else if(intval($report[0]['category_id']) ==2){
                                                echo "<span class='badge badge-sm label-info'>Sector</span>";
                                              }else{
                                                 echo "<span class='badge badge-sm label-danger'>Corporate</span>";
                                                 
                                              }
                                              
                                        echo "</td>
                                              <td>
                                              ".$report[0]['year_published']."
                                              </td>
                                              <td>
                                              ".$report[0]['report_description']."
                                              </td>
                                              <td>
                                              ";

                                              if(isset($report_price_alt) && $report_price_alt !== ""){

                                                echo $report_price_alt;
                                              }else{
                                                echo $report_price;
                                              }

                                          echo "</td>
                                              <td>";

                                              if(isset($discounted_price_alt) && $discounted_price_alt !== ""){
                                                echo $discounted_price_alt;
                                              }else{
                                                echo $discounted_price;
                                              }
 
                                            echo "</td>
                                              <td>";

                                              if(isset($amount_to_pay_alt) && $amount_to_pay_alt !== ""){
                                                echo $amount_to_pay_alt;
                                              }else{
                                                echo $amount_to_pay ;
                                              }


                                              echo "</td>
                                              <td style='text-align:center;'>";
                                              if(!isset($amount_to_pay_alt) || $amount_to_pay_alt == ""){
                                               echo "<button class='btn btn-sm btn-warning remove_for_pay'><i class='fa fa-minus'></i> Remove </button>";
                                              }else{

                                                echo "<a class='btn btn-sm btn-info'  href='".base_url()."welcome/view-report-sample/".base64url_encode($this->encrypt->encode(FCPATH."assets/reports/sample/".$report[0]['sample_report_path']))."' target='_blank'>View Sample</a>";
                                                
                                              }
                                              
                                              echo "</td>
                                              </tr>                                              
                                              ";


                                              $count_reports++;
                                      }



                                      ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="adv-table" style="margin-top: 27px;">
                                <table class="display table  table-strped" id="exaple">
                                    <tr style="text-align: right;">
                                        <td width="2px"></td>
                                        <td width="7px"></td>
                                        <td width="82px"></td>
                                        <td width="63px" style="font-size:large;"><b>Totals</b></td>
                                        <td width="238px">
                                            <b>   <?= number_format($total_amount_for_reports,2,'.',',') ?></b>
                                        </td>
                                        <td width="28px" style="text-align: center;">
                                            <b><?= number_format($total_discount,2,'.',',') ?></b>
                                        </td>
                                        <td width="30px">
                                            <b> <?= number_format($total_amount_to_pay,'2','.',',') ?></b>
                                        </td>
                                        <td width="88px">
                                            <button class="<?= ($total_amount_to_pay > 0.00)?'hidden':'' ?> btn btn-block btn-sm btn-danger remove_all_or_clear_cart"><i class="fa fa-times"></i> Clear Cart </button>
                                        </td>
                                    </tr>
                                </table>
                                <script type="text/javascript">
                                var reportIDs = "<?= $this->encrypt->encode($report_ids) ?>";
                                var reportPrizes = "<?= $this->encrypt->encode($report_prizes) ?>";
                                var reportDiscounts = "<?= $this->encrypt->encode($report_discounts) ?>";
                                var reportsAmountToPay = "<?= $this->encrypt->encode($reports_amount_to_pay) ?>";
                                var reportsTotalAmount = "<?= $this->encrypt->encode($total_amount_to_pay) ?>";
                                </script>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 co-sm-12 col-xs-12">
                                    <?php

                                    $end = preg_replace('/\s+/', '', $report_details['user_details']['package_end_date']);
                                    $end_date = strtotime($end);
                                    $today_date = strtotime(date('d-m-Y'));

                                   
                                    if($today_date > $end_date){
                                      ?>
                                      <div class="text-center" style="color:#984D59;font-size: 23px;" id="authorize_payment_i">Your Package expired on <?=  $end?>. 
                                      <a href="<?=base_url()?>purchase/account" class="btn btn-xs btn-primary">Click Here</a>  to start renew
                                      </div>


                                      <?php

                                    }else if($unconfirmed_reports != "" && $this->encrypt->decode($unconfirmed_reports[0]['report_ids']) == $report_ids){
                                ?>
                                        <div class="btn-lg btn-block col-md-12">
                                            <div class="col-md-4" style="padding-top:6px;font-size:initial;" id="message_before_code">Enter Code Sent to Your Email</div>
                                            <div class="col-md-3">
                                                <input name="confirm_code_value" type="text" class="form-control" />
                                            </div>
                                            <div class="col-md-5">
                                                <button class="btn btn-md btn-info" id="confirm_code">Submit Code</button> OR
                                                <button class="btn btn-success btn-md" id="resend_code">Resend Code</button>
                                            </div>
                                        </div>
                                        <?php

                         }else if($total_amount_to_pay != 0.00 && ($report_details['user_details']['remaining_package_amount'] > $total_amount_to_pay )){
                          ?>
                                            <div class="col-md-5" style=" font-size: initial;padding-top: 8px;">
                                                Authorize Payment of KSh.<b> <?= number_format($total_amount_to_pay,'2','.',',') ?></b> ?</div>
                                            <div class="col-md-2" style="font-size: initial;font-weight: 700;">
                                                <button class="btn btn-primary btn-md  btn-block" id="authorize_payment_id">Yes</button>
                                            </div>
                                            <div class="col-md-1" style=" font-size: initial;padding-top: 8px;"> OR </div>
                                            <div class="col-md-2" style="font-size: initial;font-weight: 700;">
                                                <a href="#" class="btn btn-danger btn-md btn-block remove_all_or_clear_cart">Clear Cart</a>
                                            </div>
                                            <?php
                              }else if($report_details['user_details']['remaining_package_amount'] < $total_amount_to_pay ){
                          ?>
                                                <div class="alert alert-dangr text-center" style="color:#984D59;font-size: 23px;" id="authorize_payment_i">You only have <b>KSh. <?= number_format($report_details['user_details']['remaining_package_amount'],2,'.',',') ?> </b> in your account. Reduce items in Cart or <a class="btn btn-xs btn-primary" data-toggle="modal" data-backdrop="static" data-target="#myModal"  href="#myModal">Click Here</a> to Request For Crediting your Account</div>
                                                <?php

                         }

                        ?>
                                                    <!-- <button class="btn btn-block btn-lg btn-primary" id="clear_cart"> Clear Cart </button> -->
                                </div>
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
<!-- /End Main Content -->
 

 <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Request to Add More Money To your Account</h4>
                </div>
                <div class="modal-body">
                <?php

//if "email" variable is filled out, send email
  if (isset($_REQUEST['sender_email']))  {
  
  //Email information
  $admin_email = "info@researchandratings.co.ke";
  $sender_email = $_REQUEST['sender_email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  $phone = $_REQUEST['phone'];
  $name = $_REQUEST['name'];
  $contact_person = $_REQUEST['contact_person'];

  $message = "From:    ". $name."\r\n"."Contact Person:  ".$contact_person."\r\n"."Email:  ".$sender_email."\r\n"."Phone: ".$phone."\r\n\n\n"."Message: "."\r\n".$comment;

   
$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: ".$sender_email."\r\n"."X-Mailer: php";


  
  
//send email
  mail($admin_email, $subject, $message,$headers);


  
  //Email response
  echo "Thank you for contacting Research And Ratings.!";
  }
  
  //if "email" variable is not filled out, display the form
  else{
  
?>
               
                   <form id="credit-request" method="GET" action="" role="form" enctype="text/plain">

    <div class="messages"></div>

    <div class="controls">

       
         <?php

                     if(!null == $this->session->user_email){
                        ?>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text"  value="<?php echo $this->session->names;?>" name="name" id="name" class="form-control" required readonly>
                             <small class="text-muted">Name of company or individual</small>
                        </div>
                        <?php
                      }else{


                        ?>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" placeholder="" name="name" id="name" class="form-control" required>
                             <small class="text-muted">Name of company or individual</small>
                        </div>
                        <?php
                      }
                       if(!null == $this->session->user_email){

                        ?>
                        <div class="form-group">
                            <label for="name">Contact Person</label>
                            <input type="text" value="<?php echo $this->session->contact_person;?>" name="contact_person" id="contact_person" class="form-control" required readonly>
                             <small class="text-muted">Name of person to be contacted</small>
                        </div>
                        <?php
                      }else{


                        ?>

                       <div class="form-group">
                            <label for="name">Contact Person</label>
                            <input type="text" placeholder="" name="contact_person" id="contact_person" class="form-control" required>
                             <small class="text-muted">Name of person to be contacted</small>
                        </div>
                        <?php
                      }

                      if(!null == $this->session->user_email){

                        ?>

                         <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $this->session->user_email;?>" required id="sender_email" readonly name="sender_email" >
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>

          <?php
        }else{

          ?>
           <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" required id="sender_email" name="sender_email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>

          <?php
          }
           if(!null == $this->session->user_email){


          ?>
                      <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" value="<?php echo $this->session->client_phone;?>" name="phone" class="form-control" readonly required>
                             <small class="text-muted">Phone number of contact person</small>
                        </div>

                        <?php
                      }else{


                        ?>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" minlength="10" maxlength="13"  class="form-control" required>
                             <small class="text-muted">Phone number of contact person</small>
                        </div>
                        <?php

                       }

                       $subject = "Request For My Account to be Credited";

                        ?>




                        
                         <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text"  id="subject" name="subject" class="form-control" value="<?php echo $subject;?>"  readonly required>
                             <small class="text-muted">Reason for Contacting us</small>
                        </div>
             
                        
                        
       
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment">Message *</label>
                    <textarea placeholder="Message for Us *" rows="5"  name="comment" id="textarea" autofocus maxlength="1000" class="form-control" data-error="Please,leave us a message." required></textarea>
                    <div id="textarea_feedback"></div>
                    <small class="text-muted">Message</small>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Submit Request">
                 <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted"><strong>*</strong> These fields are required. </p>
            </div>
        </div>
    </div>

</form>
                    <p class="text-warning"><small>Click the Submit Request Button in order to Make Request</small></p>

                     <?php
  }
?>
                    
                </div>
                <div class="modal-footer">
                    
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                     
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

     <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
    var text_max = 1000;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});
    </script>

