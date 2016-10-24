<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <!-- side bar -->
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <aside class="profile-nav alt green-border">
                <ul class="nav nav-pills nav-stacked">
                    <li <?php echo $report_part==1 ? "class='active'": "";?> id="industry_reports"> <i class="fa fa-industry"></i>Industry Reports<span class=" pull-right r-activity"></span><span class="badge pull-right"><?= count($industry_reports)?></span></li>
                    <li <?php echo $report_part==2 ? "class='active'": "";?> id="sector_reports"> <i class="fa fa-pie-chart"></i> Sector Reports<span class=" pull-right r-activity"></span><span class="badge pull-right"><?= count($sector_reports)?></span></li>
                    <li <?php echo $report_part==3 ? "class='active'": "";?> id="corporate_reports"> <i class="fa fa-building-o"></i>Corporate Reports <span class=" pull-right r-activity"></span><span class="badge pull-right"><?= count($corporate_reports)?></span></li>
                </ul>
            </aside>
        </div>
        <!-- end side bar -->
        <!-- Main bar -->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
            <!-- tables go here -->
            <section class="panel panel-active">
                <div class="panel-body">
                    <div class="panel-header text-center">
                        <h5><?= $page_title?> SORTED BY YEAR</h5>
                    </div>
                    <div class="adv-table">
                        <table class="display table  table-striped table-hover datatable" id="datatable1">
                            <thead>
                                <tr>
                                    <th width="3%"></th>
                                    <th width="20%">Report Title</th>
                                    <th width="7%">Year Published</th>
                                    <th width="7%">Price</th>
                                    <th width="7%">Pages</th>
                                    <th width="53%">Description</th>
                                    <th width="10%"> View Sample</th>
                                    <th width="5%">Cart<i class="fa fa-shopping-cart"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                      $count_reports = 1;
                                      foreach ($reports as $report){
                                        echo "<tr>
                                              <td>
                                              ".$count_reports."
                                              </td>
                                              <td>
                                              ".$report['report_name']."
                                              </td>
                                              <td>
                                              ".$report['year_published']."
                                              </td>
                                              <td>
                                              ".$report['report_price']."
                                              </td>
                                               <td>
                                              ".$report['number_of_pages']."
                                              </td>
                                              <td>
                                              ".$report['report_description']."
                                              </td>
                                              <td>
                                              <a href='". base_url()."assets/reports/sample/".$report['sample_report_path']."' target='_blank' class='btn btn-info  fa fa-eye'>View</a>
                                              </td>
                                              <td>";
                                              if(null != $this->session->userdata('to_cart_files')){
                                                $to_cart_files = $to_cart_files = explode(':>>', $this->session->userdata('to_cart_files'));
                                              }else{
                                                $to_cart_files = array();
                                              }

                                              if(count($to_cart_files) != 0 && array_search($report['full_report_path'], $to_cart_files) !== FALSE){
                                                echo "<button class='btn btn-primary' >Added to Cart</button>";

                                              }else{


                                              echo "<a hreflang='".$report['full_report_path']."' href='". base_url()."assets/reports/full/".$report['full_report_path']."' download='".$report['report_name'].$report['file_type']."' class='btn btn-success fa fa-shopping-cart' id='add_to_cart'>Add to Cart</a>";
                                            }

                                             echo "</td>
                                              </tr>                                              
                                              ";
                                              $count_reports++;
                                      }



                                      ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="3%"></th>
                                    <th width="20%">Report Title</th>
                                    <th width="7%">Year Published</th>
                                    <th width="7%">Price</th>
                                    <th width="7%">Pages</th>
                                    <th width="53%">Description</th>
                                    <th width="10%"> View Sample</th>
                                    <th width="5%">Cart<i class="fa fa-shopping-cart"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   
</div>
<!-- /end Main bar -->
</div>
</div>
<!-- /End Main Content -->
<script type="text/javascript">
var baseUrl = "<?= base_url()?>";
</script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/admin_assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
<script>
jQuery(document).ready(function() {
    App.setPage("dynamic_table"); //Set current page
    App.init(); //Initialise plugins and elements
});
</script>
<!-- /JAVASCRIPTS -->
