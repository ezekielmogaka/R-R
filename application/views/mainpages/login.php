<!--/End of Breadcrumbs-->
<div id="loginbox" style="margin-top:90px;margin-bottom: 90px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<?= isset($server_error) && $server_error != false ? $server_error: "" ?>
    <div class="panel panel-info" style="border-color:#D9DADC;">
        <div class="panel-heading" style="background: #D9DADC;border-color:#D9DADC;">
            <div class="panel-title" style="text-align:center;text-transform: uppercase;">Sign In</div>
        </div>
        <div style="padding-top:30px" class="panel-body">
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                           <?if($this->session->flashdata('flashSuccess')):?>
                <p class='flashMsg flashSuccess'> <?=$this->session->flashdata('flashSuccess')?> </p>
                <?endif?>
                 
                <?if($this->session->flashdata('flashWarning')):?>
                <p class='flashMsg flashWarning'> <?=$this->session->flashdata('flashWarning')?> </p>
                <?endif?>


            <?php
            if(isset($server_reply) && $server_reply!==null){
          echo $server_reply;
          
      }

                          $attributes = array("class" => "form-horizontal","role"=>"form", "id" => "loginform" );
                            

         echo form_open($submit_url, $attributes);

    ?>
                <div class="form-group" style="padding-right: 20px; padding-left: 20px;">
                <div style="margin-bottom: 2px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="someone@example.com" required multiple>                    
                </div>
                <div class="help-block">
                    <?php 
                       echo form_error('email');  
                    ?>
                </div>
                </div>
                <div class="form-group" style="padding-right: 20px; padding-left: 20px;">
                <div style="margin-bottom: 2px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                   
                </div>
                <div class="help-block">
                    <?php 
                       echo form_error('password');  
                    ?>
                </div>
                </div>
                <div class="input-group col-md-12">
                    <div class="checkbox col-md-9">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                    <div class="col-md-3">
                        <a data-toggle="modal" href="#myModal">Forgot password?</a>
                    </div>
                </div>
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-md-12 col-sm-12 col-xs-12 controls">
                        <div class="col-md-2 col-sm-2 col-xs-2"> <button type="submit" class="btn btn-primary" > Sign In</button></div>
                        <div class="col-md-1 col-sm-1 col-xs-1" style=" margin-top: 8px;font-weight: bolder;">OR</div>
                        <div class="col-md-4 col-sm-4 col-xs-4" >
                        <a href="<?= base_url()?>index.php/Welcome/request_registration" class="btn btn-info"> Request Registration</a>
                            
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password?</h4>
                            </div>
                            <div class="modal-body">
  
          
               
                   
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form" method= "POST" action ="<?php echo site_url('welcome/forgot');?>">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      
                                      <input type="email" id="email" name="email" placeholder="email address" class="form-control" type="email" required="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-info btn-block" value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>
                   
                
       
</div>
                            
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="submit">Cancel</button>
                               
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
        </div>
    </div>
</div>
<!-- </div> -->
