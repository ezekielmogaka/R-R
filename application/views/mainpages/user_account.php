      <!--Breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1><?=$page_title?></h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active"><?=$page_title?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--/End of Breadcrumbs-->


     <!-- Main Content -->
   <div class="container">
    
     
       <div class="row">
       <!-- side bar -->
          <div class="col-md-5  toppad  pull-right col-md-offset-8 ">
           <A href="edit.html" >Edit Profile</A>

         <a href="<?=base_url()?>index.php/welcome/logout"> Log out</a>
       <br>
<p class=" text-info">

            <?php

            $date = date('Y-m-d H:i:s');
            echo $date;
            ?>

</p>
      </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

         <aside class="profile-nav alt green-border">



          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Welcome to your account,  
              <?php  echo $this->session->userdata('firstname');
              echo " ";
              echo $this->session->userdata('lastname');
            
              ?>
              
             
              
            </h3>
            </div>
            </div>

                           <aside>
           
            <div class="list-group list-group-snippet">
                <a class="active list-group-item is-menu" href="#" id="tab-preview">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    My Reports    
                </a>
                <a href="#" id="tab-html" class="list-group-item  is-menu">

                    <span class="glyphicon glyphicon-list"></span>
                    Industry Reports
                </a>  
                             
                                    <a href="#" id="tab-css" class="list-group-item is-menu">

                        <span class="glyphicon glyphicon-leaf"></span>
                        Sector Reports
                    </a>
                
                                    <a href="#" id="tab-js" class="list-group-item is-menu">
                        <span class="glyphicon glyphicon-asterisk"></span>
                        Corporate Reports
                    </a>
                 

              
               
                                   
            
            </div>
         </aside>


                        <aside>
           
            <div class="list-group list-group-snippet">
                <a class="active list-group-item is-menu" href="#" id="tab-preview">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    My Subscriptions  
                </a>                        
            
            </div>
         </aside>


                        <aside>
           
            <div class="list-group list-group-snippet">
                <a class="active list-group-item is-menu" href="#" id="tab-preview">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    My View Later List   
                </a>
                 <ul class="chat-list">

                 <li>                              
                                <i class="fa fa-clock-o"></i>
                                <span>Marketing</span>
                                <span class="pull-right"><a href="" class="btn-xs btn-info ">view</a><a href="" class="btn-xs btn-danger"><span class="fa fa-times"></span></a></span>
                              
                          </li>
                          <li>
                              
                                  <i class="fa fa-clock-o"></i>
                                  <span>Water Cooler</span>
                                  <span class="pull-right"><a href="" class="btn-xs btn-info ">view</a><a href="" class="btn-xs btn-danger"><span class="fa fa-times"></span></a></span>
                           
                          </li>
                          <li>
                             
                                  <i class="fa fa-clock-o"></i>
                                  <span>Design Lounge</span>
                                  <span class="pull-right"><a href="" class="btn-xs btn-info ">view</a><a href="" class="btn-xs btn-danger"><span class="fa fa-times"></span></a></span>
                            
                          </li>
                          </ul>
           

              
               
                                   
            
            </div>
         </aside>

             <aside>
           
            <div class="list-group list-group-snippet">
                <a class="active list-group-item is-menu" href="#" id="tab-preview">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    User Account Settings
                </a>                        
            
            </div>
         </aside>




             
           <ul class="nav nav-pills nav-stacked">
            <ul class="chat-list">
                          <li class="mtop20">  
                          
                   <h4>My Reports</h4>
                      
                               
                          </li>
                          </ul>

              <li class="active"> <i class="fa fa-industry"></i>Industry Reports<span class="label label-primary pull-right r-activity">4</span></li>
              <li> <i class="fa fa-pie-chart"></i> Sector Reports <span class="label label-info pull-right r-activity">0</span></li>
              <li> <i class="fa fa-building-o"></i> Corporate Reports <span class="label label-default pull-right r-activity">1</span></li>
              
           </ul>
           </aside>

            


            

          
                    
        </div>
        <!-- end side bar -->

        <!-- Main bar -->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 ">

         <!-- tables go here -->
         <section class="panel panel-active">
 
                          <div class="panel-body">
                          <div class="panel-header text-center">
                          <h5>INDUSTRY REPORTS SORTED BY YEAR</h5>

                          </div>
                                <div class="adv-table">
                                    <table  class="display table  table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th width="3%"></th>
                                          <th width="20%">Report Title</th>
                                          <th width="7%">Year Published</th>
                                          <th width="53%">Description</th>                                          
                                          <th width="5%"> </th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <tr >
                                          <td>1</td>
                                          <td>Insurance Industry Report, 2015</td>
                                          <td ><div class="mtop50">2015</div></td>
                                          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>                                          
                                          <td ><button class="btn btn-info btn-sm mtop50">View Report</button></td>

                                      </tr>
                                      <tr >
                                          <td>2</td>
                                          <td>Banking Industry Report, 2014</td>
                                          <td ><div class="mtop50">2015</div></td>
                                          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>                                          
                                          <td ><button class="btn btn-info btn-sm mtop50">View Report</button></td>
                                      </tr>
                                      <tr >
                                          <td>3</td>
                                          <td>Real Estate Industry Report, 2015</td>
                                          <td ><div class="mtop50">2015</div></td>
                                          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>                                          
                                          <td ><button class="btn btn-info btn-sm mtop50">View Report</button></td>
                                          
                                      </tr>
                                     
                                      
                                      </tbody>
                                      
                          </table>
                                </div>
                          </div>
                      </section>
         <!-- /table ends -->
          
        </div>
        <!-- /end Main bar -->


           

          
            
       </div>
   </div>

   <!-- /End Main Content -->