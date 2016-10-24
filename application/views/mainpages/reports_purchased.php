<!-- **************************** -->
<!-- **************************** -->
<!-- **************************** -->
<!-- **************************** -->
<!-- Show Purchased Reports -->
<!-- Main Content -->
<div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <!-- Start Panel -->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <section class="panel panel-active">
                        <div class="panel-body">
                            <div class="panel-header">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <h5>Reports You Have Purchased</h5>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <?php if (null != $this->session->userdata('cart_count')) {?>
                                        <aside class="cart-check-out col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6" style="margin-top:0px;">
                                            <div class="col-md-4 col-sm-4 col-xs-6" style="padding-left:0px;">
                                                <img src="<?=base_url()?>assets/images/cart3.jpg" width="50px" height="auto" style="margin-top:2px;">
                                                <div class="check_cart_count">
                                                    <span id="cart_count_check"><?=(null != $this->session->userdata('cart_count')) ? $this->session->userdata('cart_count') : 0?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-4 col-xs-6">
                                                <a class="btn btn-lg btn-primary btn-block" href="<?=base_url()?>purchase/">
                                                    <?=(0 != intval($this->session->userdata('cart_count'))) ? "<i class='fa fa-check'></i> Check Out" : "0 Items"?></a>
                                            </div>
                                        </aside>
                                        <?php }?>
                                </div>
                            </div>
                            <?php if (isset($report_details['history'])) {
  ?>
                                <div class="adv-table">
                                    <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table-striped  table-hover">
                                        <thead>
                                            <tr class="">
                                                <th width="2%"></th>
                                                <th width="18%">Report Title</th>
                                                <th width="2%">Type</th>
                                                <th width="50">Description</th>
                                                <th width="6%">Price</th>
                                                <th width="6%">Discount</th>
                                                <th width="6%">Amount Paid</th>
                                                <th width="5%"> </th>
                                                <th width="5%"> </th>
                                            </tr>
                                        </thead>
                                        <tbody class='dt-body-center'>
                                            <?php
$this->load->helper('myurihelper_helper');

  foreach ($report_details['history'] as $report) {

    echo "<tr>
                                             <td class='dt-body-center' width='20%' style='padding: 10px;'>

                                              <img class='img-responsive' src='" . base_url() . "assets/images/banner/report_cover.png' width='auto' height='auto'/>

                                              </td>
                                              <td class='dt-body-center' width='2%'>
                                              " . $report['report_details']['report_name'] . "
                                              </td>
                                              <td>";
    if (intval($report['report_details']['category_id']) == 1) {
      echo "<span class='badge badge-sm label-primary'>Industry</span>";
    } else if (intval($report['report_details']['category_id']) == 2) {
      echo "<span class='badge badge-sm label-info'>Sector</span>";
    } else {
      echo "<span class='badge badge-sm label-danger'>Corporate</span>";

    }

    echo "</td>
                                              <td class='dt-body-center' width='25%'>
                                              " . $report['report_details']['report_description'] . "
                                              </td>
                                              <td>
                                              " . number_format($report['price'], 2, '.', ',') . "
                                              </td>
                                              <td>
                                              " . number_format($report['discount'], 2, '.', ',') . "
                                              </td>
                                              <td>
                                              " . number_format($report['amount_paid_this_report'], 2, '.', ',') . "
                                              </td>
                                              <td>
                                              <a href='" . base_url() . "welcome/view-report-sample/" . base64url_encode($this->encrypt->encode(FCPATH . "assets/reports/sample/" . $report['report_details']['sample_report_path'])) . "' target='_blank' class='btn btn-info'>View Sample</a>
                                              </td>
                                              <td>";

    echo "<a href='" . base_url() . "purchase/download-full-report/" . base64url_encode($this->encrypt->encode(FCPATH . "assets/reports/full/" . $report['report_details']['full_report_path'])) . "' target='_blank' class='btn btn-primary'>Download Full</a>
                                              </td>
                                              ";
  }

  ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="2%"></th>
                                                <th width="18%">Report Title</th>
                                                <th width="2%">Type</th>
                                                <th width="50">Description</th>
                                                <th width="6%">Price</th>
                                                <th width="6%">Discount</th>
                                                <th width="6%">Amount Paid</th>
                                                <th width="5%"> </th>
                                                <th width="5%"> </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php } else {?>
                                    <div class="no-report-history">
                                        <div class="text-for-info">
                                            You Have not Purchased Any Report.
                                        </div>
                                    </div>
                                    <?php }?>
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
<!-- End of Reports Purchased -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- Package Infomation -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<?php
$end = preg_replace('/\s+/', '', $report_details['user_details']['package_end_date']);
$end_date = strtotime($end);
$today_date = strtotime(date('d-m-Y'));

$this->db->select_max('report_price');
$max_price_result = $this->db->get('reports')->result_array();
$max_price_result = $max_price_result[0]['report_price'];
$this->db->select_min('report_price');
$min_price_result = $this->db->get('reports')->result_array();
$min_price_result = $min_price_result[0]['report_price'];

if ($today_date > $end_date && $this->session->user_email != "") {
  $style = 'style="font-size:15px;margin:2px;color:#F1780B"';
  $title = 'Expired Package';
  $style_header = 'style="color:#F1780B"';
  $footer = 'Your package has expired. You can renew by subscribing to any of the Packages below just like you subscribed to this. Note that any remaining amount will be Not be Carried Forward';
} else if ($today_date < $end_date && $this->session->user_email != "") {
  $style = 'style="font-size:15px;margin:2px;"';
  $title = 'Active Package';
  $style_header = '';
  $footer = '';
} else {
  $style = 'style="font-size:15px;margin:2px;"';
  $title = 'Active Package';
  $style_header = '';
  $footer = '';
}

?>
<div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <!-- Start Panel -->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <section class="panel panel-active">
                        <div class="panel-body">
                            <div class="panel-header">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <h5 <?=$style_header?>><?=$title?></h5>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <?php if (isset($report_details['user_details'])) {?>
                                        <aside class="cart-check-out col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6" style="margin-top:0px;">
                                            <div class="col-md-4 col-sm-4 col-xs-6" style="padding-left:0px;">
                                            </div>
                                            <div class="col-md-8 col-sm-4 col-xs-6">
                                                <button class="btn btn-lg btn-primary btn-block">
                                                    <?=$report_details['user_details']['package_title']?>
                                                </button>
                                            </div>
                                        </aside>
                                        <?php }?>
                                </div>
                            </div>
                            <?php if (isset($report_details['user_details'])) {?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <aside class="package_details profile-nav  green-border">
                                            <ul class="nav nav-pills nav-stacked" style="margin-top:8px;">
                                                <li><i class="fa fa-header" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>Package Title <span class="pull-right r-activity" <?=$style?>><?=$report_details['user_details']['package_title']?></span></li>
                                                <li><i class="fa fa-clock-o" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>Start Date <span class="pull-right r-activity" <?=$style?>><?=$report_details['user_details']['package_start_date']?></span></li>
                                                <li><i class="fa fa-clock-o" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>End Date <span class="pull-right r-activity" <?=$style?>><?=$report_details['user_details']['package_end_date']?></span></li>
                                            </ul>
                                        </aside>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <aside class="package_details profile-nav green-border">
                                            <ul class="nav nav-pills nav-stacked" style="margin-top:8px;">
                                                <li><i class="fa fa-pie-chart" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>Package Discount <span class="pull-right r-activity" <?=$style?>><?=$report_details['user_details']['package_discount']?>%</span></li>
                                                <li><i class="fa fa-money" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>Original Amount<span class="pull-right r-activity" <?=$style?>><?=number_format($report_details['user_details']['original_package_amount'], 2, '.', ',')?>/=</span></li>
                                                <li><i class="fa fa-money" style="font-size:15px;padding: 5px 5px 5px 0px;"></i>Remaining Amount <span class="pull-right r-activity" <?=$style?>><?=number_format($report_details['user_details']['remaining_package_amount'], 2, '.', ',')?>/=</span></li>
                                            </ul>
                                        </aside>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="font-size: 16px;margin-top: 30px;color: #60A8E9;">
                                <?=$footer?>
                                </div>
                                <?php } else {?>
                                    <div class="no-report-history">
                                        <div class="text-for-info">
                                            You Do Not Have an Active Package, See Packages below.
                                        </div>
                                    </div>
                                    <?php }?>
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
<!-- End of Package Infomation -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- Packages -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<?php if ((isset($report_details['user_details']) && ($report_details['user_details']['remaining_package_amount'] < $min_price_result)) || (isset($report_details['user_details']) && ($today_date > $end_date)) || (null == $this->session->user_email)) {
  if (isset($report_details['user_details']) && ($today_date > $end_date)) {
   /* $message = "Your package has expired. You can renew by subscribing to any of these";
    echo $message;*/
   // require_once('subpages/pricing_table.php');
    ?>
    <div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <!-- Start Panel -->
    <div class="panel">
        <div class="panel-body">
           <!--property start-->
<div class="gray-b ">

    <?php 
   // echo $message;

    require_once('subpages/pricing_table.php'); ?>
</div>
<!--property end-->
        </div>
        <!-- end panel-body -->
    </div>
    <!-- end panel -->
</div>
<?php

  }/* else if (isset($report_details['user_details']) && ($report_details['user_details']['remaining_package_amount'] < $min_price_result)) {
    $message = "Your remaining amount  <span class='amount'>({$report_details['user_details']['remaining_package_amount']}/=)</span> can not purchase the report with the lowest price <span class='amount'>({$min_price_result}/=)</span>, kindly renew your package";

    echo $message;

  }*/ 
  /*else {

    $message = "You can subscribe to any of these packages";
  }*/

  ?>

<?php }?>
<!-- End  Packages -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
<!-- ********************************** -->
