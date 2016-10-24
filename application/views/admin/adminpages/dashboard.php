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
            Here goes box setting content.
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
                    <li>Dashboard</li>
                  </ul>
                  <!-- /BREADCRUMBS -->
                  <div class="clearfix">
                    <h3 class="content-title pull-left">Dashboard</h3>
                    
                  </div>
                  <div class="description">Overview, Statistics and more</div>
                </div>
              </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- DASHBOARD CONTENT -->
            <div class="row">
              <!-- COLUMN 1 -->
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-4">
                   <div class="dashbox panel panel-default">
                    <div class="panel-body">
                       <div class="panel-left red">
                        <i class="fa fa-book"></i>
                       </div>
                       <div class="panel-right">
                        <div class="number">
                        <?php if(isset($count_reports) && $count_reports != null){ echo $count_reports;}else{ echo 0;} ?>
                        </div>
                        <div class="title">Reports</div>
                       
                       </div>
                    </div>
                   </div>
                  </div>
                  <div class="col-lg-4">
                   <div class="dashbox panel panel-default">
                    <div class="panel-body">
                       <div class="panel-left blue">
                        <i class="fa fa-users"></i>
                       </div>
                       <div class="panel-right">
                        <div class="number"><?php if(isset($count_users) && $count_users != null){ echo $count_users; }else{ echo $count_users; } ?>
                        </div>
                        <div class="title">Clients</div>
                       
                       </div>
                    </div>
                   </div>
                  </div>
                   <div class="col-lg-4">
                   <div class="dashbox panel panel-default">
                    <div class="panel-body">
                       <div class="panel-left blue">
                        <i class="fa fa-shopping-cart"></i>
                       </div>
                       <div class="panel-right">
                        <div class="number">
                        0
                        </div>
                        <div class="title">Weekly Sales</div>
                        
                       </div>
                    </div>
                   </div>
                  </div>
                </div>


                <?php
                $all_users= $this->db->get('users');
                $all = $all_users->num_rows();
               



                $gold = 3;

                $gold_query = $this->db->get_where('users', array('package_id' => $gold));
                $gold_package = $gold_query->num_rows();
                


                $platinum = 2;

                $platinum_query = $this->db->get_where('users', array('package_id' => $platinum));
                $platinum_package = $platinum_query->num_rows();
                


                $bronze = 1;

                $query = $this->db->get_where('users', array('package_id' => $bronze));
                $bronze_package = $query->num_rows();

                

                $gold_percentage = (($gold_package/$all) * 100);
                 

                $platinum_percentage = (($platinum_package / $all) * 100);

                $bronze_percentage = (($bronze_package / $all) * 100);
                

                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="quick-pie panel panel-default">
                      <div class="panel-body">
                        <div class="col-md-4 text-center">
                          <div id="dash_pie_1" class="piechart" data-percent="<?=$gold_percentage ?>">
                            <span class="percent"></span>
                          </div>
                          <a href="#" class="title">Gold Package <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="col-md-4 text-center">
                          <div id="dash_pie_2" class="piechart" data-percent="<?=$platinum_percentage ?>">
                            <span class="percent"></span>
                          </div>
                          <a href="#" class="title">Platinum Package <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="col-md-4 text-center">
                          <div id="dash_pie_3" class="piechart" data-percent="<?=$bronze_percentage ?>">
                            <span class="percent"></span>
                          </div>
                          <a href="#" class="title">Bronze Package <i class="fa fa-angle-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
              </div>
              <!-- /COLUMN 1 -->
              
              <!-- COLUMN 2 -->
              <div class="col-md-6">
                <div class="box solid grey">
                  <div class="box-title">
                    <h4><i class="fa fa-dollar"></i>Revenue Last Month</h4>
                    <div class="tools">
                      <span class="label label-danger">
                        20% <i class="fa fa-arrow-up"></i>
                      </span>
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
                    <div id="chart-revenue" style="height:240px"></div>
                  </div>
                </div>
              </div>
              <!-- /COLUMN 2 -->
            </div>
             <!-- /DASHBOARD CONTENT -->
             <!-- HERO GRAPH -->
            <div class="row">
              <div class="col-md-12">
                <!-- BOX -->
                <div class="box border blue">
                  <div class="box-title">
                    <h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Report Sales last Month</span></h4>
                  </div>
                  <div class="box-body">
                    <div class="tabbable header-tabs">
                      <ul class="nav nav-tabs">
                         <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Sales Chart</span></a></li>
                         <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Report Sale Statistics</span></a></li>
                       </ul>
                       <div class="tab-content">
                         <div class="tab-pane fade in active" id="box_tab1">
                          <!-- TAB 1 -->
                          <div id="chart-dash" class="chart"></div>
                          <hr class="margin-bottom-0">
                           <!-- /TAB 1 -->
                         </div>
                         <div class="tab-pane fade" id="box_tab2">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="demo-container">
                                <div id="placeholder" class="demo-placeholder"></div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="demo-container" style="height:100px;">
                                <div id="overview" class="demo-placeholder"></div>
                              </div>
                              <div class="well well-bottom">
                                <h4>Month over Month Analysis</h4>
                                <ol>
                                  <li>Selection support makes it easy to construct flexible zooming schemes.</li>
                                  <li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
                                  <li>Try selecting a rectangle on either of them.</li>
                                </ol>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>
                    </div>
                  </div>
                </div>
                <!-- /BOX -->
              </div>
            </div>
            <!-- /HERO GRAPH -->
            
           
            </div>
            <!-- /CALENDAR & CHAT -->
            <div class="footer-tools">
              <span class="go-top">
                <i class="fa fa-chevron-up"></i> Top
              </span>
            </div>
          </div><!-- /CONTENT-->

          <!-- JQUERY -->
  <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>