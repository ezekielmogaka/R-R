<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div>
        <!-- /SEARCH BAR -->
        <!-- SIDEBAR QUICK-LAUNCH -->
        <!-- <div id="quicklaunch">
            <!-- /SIDEBAR QUICK-LAUNCH -->
        <!-- SIDEBAR MENU -->
        <ul>
            <li>
                <a href="<?= base_url().'admin/admin_dashboard' ?>">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-unlink"></i> <span class="menu-text">Front End</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Manage Pages</span>
                    <span class="arrow"></span>
                    </a>
                        <ul class="sub-sub">
                            
                            <li><a class="" href="<?= base_url()?>admin/industry_analysis_edit"><span class="sub-sub-menu-text">Industry Analysis Content</span></a></li>
                            <li><a class="" href="<?= base_url()?>admin/sector_studies_edit"><span class="sub-sub-menu-text">Sector Analysis Content</span></a></li>
                            <li><a class="" href="<?= base_url()?>admin/corporate_research_edit"><span class="sub-sub-menu-text">Corporate Research Content</span></a></li>
                            <li><a class="" href="<?= base_url()?>admin/about_us_edit"><span class="sub-sub-menu-text">About Us</span></a></li>

                             <li><a class="" href="<?= base_url()?>admin/latest_articles"><span class="sub-sub-menu-text">Latest Links</span></a></li>
                        </ul>
                       
                    </li>
                    <li class="has-sub-sub">
                    <a href="javascript:;" class=""><span class="sub-menu-text">Manage Latest Articles</span>
                    <span class="arrow"></span>
                    </a>
                     <ul class="sub-sub">
                            
                             <li><a class="" href="<?= base_url()?>admin/latest_articles"><span class="sub-sub-menu-text">Add Article</span></a></li>
                             <li><a class="" href="<?= base_url()?>admin/view_latest_articles"><span class="sub-sub-menu-text">View Latest Articles</span></a></li>
                        </ul>
                        
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-archive"></i> <span class="menu-text">Reports<span class="badge pull-right"><?php echo $this->db->get('reports')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url()?>admin/add_report"><span class="sub-menu-text">Add New</span></a></li>
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Manage Reports</span>
                    <span class="arrow"></span>
                    </a>
                        <ul class="sub-sub">
                            <li><a class="" href="<?= base_url()?>admin/industry_reports"><span class="sub-sub-menu-text">Industry Reports</span></a></li>
                            <li><a class="" href="<?= base_url()?>admin/sector_reports"><span class="sub-sub-menu-text">Sector Reports</span></a></li>
                            <li><a class="" href="<?= base_url()?>admin/corporate_reports"><span class="sub-sub-menu-text">Corporate Reports</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i> <span class="menu-text">Manage Clients<span class="badge pull-right"><?php echo $this->db->get('users')->num_rows();?></span></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'admin/add_new_client'?>"><span class="sub-menu-text">Add New Client</span></a></li>
                    <li><a class="" href="<?= base_url().'admin/manage_clients'?>"><span class="sub-menu-text">List of Clients</span></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-gift"></i> <span class="menu-text">Packages<span class="badge pull-right"><?php echo $this->db->get('packages')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'admin/gold_package'?>"><span class="sub-menu-text">Gold</span></a></li>
                    <li><a class="" href="<?= base_url().'admin/platinum_package'?>"><span class="sub-menu-text">Platinum</span></a></li>
                    <li><a class="" href="<?= base_url().'admin/bronze_package'?>"><span class="sub-menu-text">Bronze</span></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-money"></i> <span class="menu-text">Payments<span class="badge pull-right"><?php echo $this->db->get('payments')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'admin/new_payment'?>"><span class="sub-menu-text">Package Subscription</span></a></li>
                    <li><a class="" href="<?= base_url().'admin/credit_account'?>"><span class="sub-menu-text">Credit Account</span></a></li>
                    <li><a class="" href="<?= base_url().'admin/manage_payments'?>"><span class="sub-menu-text">Manage Payments</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
<!-- /SIDEBAR -->
<script>
jQuery(document).ready(function() {
    App.setPage("widgets_box"); //Set current page
    App.init(); //Initialise plugins and elements
});
</script>
<!-- /JAVASCRIPTS -->
