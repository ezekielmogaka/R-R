<!-- Main Content -->
<div class="container" style="border:2px solid #f4f4f4;margin-top:12px;margin-bottom:12px;">
    <div class="panel">
        <div class="panel-body">
            <div class="row" style="min-height:430px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                
                 <!--quote start-->
            <div class="quote">
                <div class="col-lg-12 col-sm-12">
                    <div class="quote-info">
                        <h1>Reports</h1>
                       <h5> <p>R&R's subscribers have access to previously done reports and receive notifications on any updates to reports following material developments affecting an industry, sector or company.</p></h5>
                        

                        <p>To purchase a report, take a look at the list below and click to view a sample. The sample gives an overview of the report's content. Click <b>Add to Cart</b> and then check out to purchase the report(s) of your choice. A code will be sent via email for payment authorization to complete the process. 
</h4>
                         <p>See a missing report from our list or would you like a specific report done? Feel free to <span style="color:white"> <a href="http://researchandratings.co.ke/welcome/contact"><b>Contact Us</b></a> </span> and let us know. </p>
                    </div>
                </div>
               
            </div>
            <!--quote end-->
            
                    <section class="panel panel-active">
                        <div class="panel-body">
                            <div class="panel-header" style="margin-bottom:90px;">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <h5><?= $page_title?></h5>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <aside class="cart-check-out col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6" style="margin-top:0px;">
                                        <div class="col-md-4 col-sm-4 col-xs-6" style="padding-left:0px;">
                                            <img src="<?=base_url()?>assets/images/cart3.jpg" width="50px" height="auto" style="margin-top:2px;">
                                            <div class="check_cart_count">
                                                <span id="cart_count_check"><?= (null != $this->session->userdata('cart_count'))?$this->session->userdata('cart_count'): 0?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-lg btn-primary btn-block btn-check-out" id="check_out_button">
                                                <?= (0 != intval($this->session->userdata('cart_count')))?"<i class='fa fa-check'></i> Check Out": "0 Items"?></button>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                            <div class="adv-table">
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0.5" class="table-responsive datatable table table-striped table-hover">
                                    <thead>
                                    
                                        <tr class="">
                                            <th width='5%'></th>
                                            <th width='15%'>Report</th>
                                            <th width='10%'>Year Published</th>
                                            <th width='45%'>Description</th>
                                            <th width='5%'>Price (Ksh.)</th>
                                            <th width='10%'>View Report Sample </th>
                                            <th width='10%'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </th>
                                        </tr>
                                    </thead>
                                    <tbody class='dt-body-center'>
                                        <?php
                                $this->load->helper('myurihelper_helper');

                                      $count_reports = 1;
                                      $upload_path_cover= "./assets/reports/report_covers/";
                                      foreach ($reports as $report){
                                        echo "<tr>   
                                             <td class='dt-body-center' width='20%' style='padding: 10px;'>
                                             
                                              <img class='img-thumbnail' src='".base_url().$upload_path_cover.$report['report_cover_path']."' style='width:150px;height:150px'/>
                                            
                                              </td>                                           
                                              <td class='dt-body-center' width='15%'>                                                                                              
                                                ".$report['report_name']."                                              
                                              </td>
                                              <td class='dt-body-center' width='10%'>
                                              ".$report['year_published']."
                                              </td>
                                              <td class='dt-body-center' width='45%'>
                                              ".$report['report_description']."
                                              </td>
                                              <td class='dt-body-center' width='5%'>
                                              ".number_format($report['report_price'],2,'.',',')."
                                              </td>
                                              <td class='dt-body-center' width='10%'>
                                              <a href='".base_url()."welcome/view-report-sample/".base64url_encode($this->encrypt->encode(FCPATH."assets/reports/sample/".$report['sample_report_path']))."' target='_blank' class='btn btn-info'>View Sample</a>
                                              </td>
                                              <td class='dt-body-center' width='10%'>";
                                              if(null != $this->session->userdata('to_cart_files')){
                                                $to_cart_files = $to_cart_files = explode(':>>', $this->session->userdata('to_cart_files'));
                                              }else{
                                                $to_cart_files = array();
                                              }

                                              if(count($to_cart_files) != 0 && array_search($report['report_id'], $to_cart_files) !== FALSE){
                                                echo "<button class='btn btn-primary' >Added to Cart</button>";

                                              }else{
                                                echo "<input type='hidden' name='encoded_report_id' value='".$this->encrypt->encode($report['report_id'])."'/>";

                                                echo "<button class='btn btn-default add_to_cart' >Add to Cart</button>";                                           
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
                                             <th width='5%'></th>
                                            <th width='15%'>Report</th>
                                            <th width='10%'>Year Published</th>
                                            <th width='45%'>Description</th>
                                            <th width='5%'>Price (Ksh.)</th>
                                            <th width='10%'>View Report Sample </th>
                                            <th width='10%'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </th>
                                        </tr>
                                    </tfoot>
                                </table>
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