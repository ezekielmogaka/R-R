
<!-- HEADER -->
  <header class="navbar clearfix navbar-fixed-top" id="header">
  
    <div class="container">
        <div class="navbar-brand">
          <!-- COMPANY LOGO -->
         <a href="index.html">
            <img src="<?= base_url()?>assets/images/logo.gif" alt="Research and ratings" class="img-responsive" height="30" width="120">
          </a> 
          <!-- /COMPANY LOGO -->
          
          <!-- SIDEBAR COLLAPSE -->
          <div id="sidebar-collapse" class="sidebar-collapse btn">
            <i class="fa fa-bars" 
              data-icon1="fa fa-bars" 
              data-icon2="fa fa-bars" ></i>
          </div>
          <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->
     
        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->          
        <ul class="nav navbar-nav pull-right">
         

         
          
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <li class="dropdown user" id="header-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img alt="" src="<?= base_url()?>assets/admin_assets/img/avatars/avatar3.jpg" />
              <span class="username"><?php if($this->session->userdata('user_email')!==null){ echo $this->session->userdata('user_name');} ?></span>
              <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
             
              <li><a href="<?= base_url()?>index.php/admin/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    
    <!-- TEAM STATUS -->
    <div class="container team-status" id="team-status">
      <div id="scrollbar">
      <div class="handle">
      </div>
      </div>
      <div id="teamslider">
        <ul class="team-list">
        <li class="current">
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar3.jpg" alt="" />
          </span>
          <span class="title">
          You
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 35%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 20%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 10%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">6</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">3</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">1</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar1.jpg" alt="" />
          </span>
          <span class="title">
          Max Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 15%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 40%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 20%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">2</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">8</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">4</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar2.jpg" alt="" />
          </span>
          <span class="title">
          Jane Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 65%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 10%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 15%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">10</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">3</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">4</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar4.jpg" alt="" />
          </span>
          <span class="title">
          Ellie Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 5%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 48%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 27%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">1</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">6</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">2</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar5.jpg" alt="" />
          </span>
          <span class="title">
          Lisa Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 21%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 20%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 40%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">4</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">5</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">9</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar6.jpg" alt="" />
          </span>
          <span class="title">
          Kelly Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 45%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 21%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 10%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">6</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">3</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">1</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar7.jpg" alt="" />
          </span>
          <span class="title">
          Jessy Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 7%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 30%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 10%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">1</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">6</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">2</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0);">
          <span class="image">
            <img src="<?= base_url()?>assets/admin_assets/img/avatars/avatar8.jpg" alt="" />
          </span>
          <span class="title">
          Debby Doe
          </span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: 70%">
            <span class="sr-only">35% Complete (success)</span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 20%">
            <span class="sr-only">20% Complete (warning)</span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 5%">
            <span class="sr-only">10% Complete (danger)</span>
            </div>
          </div>
          <span class="status">
            <div class="field">
              <span class="badge badge-green">13</span> completed
              <span class="pull-right fa fa-check"></span>
            </div>
            <div class="field">
              <span class="badge badge-orange">7</span> in-progress
              <span class="pull-right fa fa-adjust"></span>
            </div>
            <div class="field">
              <span class="badge badge-red">1</span> pending
              <span class="pull-right fa fa-list-ul"></span>
            </div>
            </span>
          </a>
        </li>
        </ul>
      </div>
      </div>
    <!-- /TEAM STATUS -->
  </header>
  <!--/HEADER -->
  


