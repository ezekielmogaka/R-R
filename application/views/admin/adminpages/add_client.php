 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
  <link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />

  <!-- JQUERY -->
  <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
  
<script type="text/javascript">
      function checkForm(form)
  { 
      console.log("My form input",form);
    

    if(form.password.value != "" && form.password.value == form.confirm_password.value) {
      if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
     
      }
      re = /[0-9]/;
     /* if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password.focus();
        return false;
      }*/
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }

    alert("You entered a valid password: " + form.password.value);
    return true;
  }

    </script>

     <script type="text/javascript">

    function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('confirm_password');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirm_password.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirm_password.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirm_password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
  </script>

    <div id="main-content">
      <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Box Settings</h4>
          </div>
          <div class="modal-body">s
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
            <!-- FORMS -->
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2">

                    
                  </div>
                  <div class="col-md-8">
                    <div class="box border primary">
                      <div class="box-title">
                        <h4><i class="fa fa-bars"></i><?=$page_title?></h4>
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
                      <div class="box-body big">
                        <h3 class="form-title"></h3>

                                           <?php
              if(isset($server_reply) && null !== $server_reply){
                echo $server_reply;
                echo $this->session->flashdata('email_sent'); 
              }
             $form_attributes = array('class'=>'form-horizontal','role'=>'form',"onsubmit"=>"return checkForm(this);" );
             echo form_open_multipart('admin/submit_client', $form_attributes);
             ?>

      
                          
             <div class="form-group">
                  <label class="col-lg-3 col-sm-3 control-label" for="client_type">Client Type</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                  <?php echo form_error('client_type'); ?>
          
                      <select class="form-control m-bot15" required id="client_type" name ="client_type">
                          <option>Individual</option>
                          <option>Company</option>
                         
                      </select>
                      <?php
                                              echo form_error('client_type');  

                                              ?>
                      <p class="help-block">Client type</p>
                      
                  </div>

              </div>

               <div class="form-group">
                  <label for="clientNames" class="col-lg-3 col-sm-3 control-label">Client Names</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="text" class="form-control" id="clientNames" name="clientNames" required value="<?= set_value('clientNames')?>" >
                        <?php
                                              echo form_error('clientNames');  

                                              ?>
                      <p class="help-block">Client's Full Names</p>
                  </div>
              </div>


              <div class="form-group">
                  <label for="contactPerson" class="col-lg-3 col-sm-3 control-label">Contact Person</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="text" class="form-control" id="contactPerson" name="contactPerson" required value="<?= set_value('contactPerson')?>" >
                        <?php
                                              echo form_error('contactPerson');  

                                              ?>
                      <p class="help-block">Contact Person</p>
                  </div>
              </div>

              <div class="form-group">
                  <label for="email" class="col-lg-3 col-sm-3 control-label">Email</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" required value="<?= set_value('email')?>" >
                      <p class="help-block">Email</p>
                  </div>
              </div>

              <div class="form-group">
                  <label for="phone" class="col-lg-3 col-sm-3 control-label">Phone</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" required value="<?= set_value('phone')?>" >
                        <?php
                                              echo form_error('phone');  

                                              ?>
                      <p class="help-block">Phone</p>
                  </div>
              </div>

              <!-- <div class="form-group">
                  <label for="password" class="col-lg-3 col-sm-3 control-label">Password</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required value="<?= set_value('password')?>" >
                        <?php
                                      echo form_error('password');  

                                              ?>
                      <p class="help-block">Password</p>
                  </div>
              </div>

               <div class="form-group">
                  <label for="confirm_password" class="col-lg-3 col-sm-3 control-label">Confirm Password</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                      <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required value="<?= set_value('confirm_password')?>" onkeyup="checkPass(); return false;">
                        <?php
                                              echo form_error('confirm_password');  

                                              ?>
                      <p class="help-block">Password Confirmation</p>
                  </div>
              </div>
 -->
             

              <div class="form-group">
                  <label for="client_notes" class="col-lg-3 col-sm-3 control-label">Client More Information</label>
                  <div class=" col-lg-9 col-md-9 col-sm-9">
                      <textarea class="wysihtml5 form-control" type="text" name ="client_notes" rows="15"  required>
                      <?= set_value('client_notes')?> 
                        
                      </textarea> 
                        <?php
                                              echo form_error('client_notes');  

                                              ?>
                      <p class="help-block">Brief Client Description</p>
                  </div>
              </div>

             
              
             
             
              

              <div class="form-group" style="margin-top:30px;">
                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Save Client<i class="fa fa-arrow-circle-right"></i></button>                
              </div>

                         </form>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-2">

                    
                  </div>
                </div>
                
                
        </div>
      </div>
    </div>
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/assets/fuelux/js/spinner.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

<!--this page  script only-->
<script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
    
    <script>
    jQuery(document).ready(function() {   
      App.setPage("add_new_matter");  //Set current page
      App.init(); //Initialise plugins and elements
    });
  </script>
  <!-- /JAVASCRIPTS -->