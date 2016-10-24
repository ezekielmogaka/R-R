

    <script type="text/javascript">
      function checkForm(form)
  { 
      console.log("My form input",form);
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }

    if(form.password.value != "" && form.password.value == form.confirm_password.value) {
      if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
      if(form.password.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.password.focus();
        return false;
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
                        <li><a href="#">Reports</a></li>
                        <li class="active"><?=$page_title?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--/End of Breadcrumbs-->

 
                     
        <div id="signupbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title"><b>Sign Up</b></div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a  href="<?php echo(base_url());?>index.php/Welcome/show_login" >Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                </form>
                                <?php echo validation_errors(); ?>
                                
                                <?php 

                                    
                                
                                   $attributes = array("class" => "form-horizontal", "id" => "signupForm", "name" => "usersignupform" ,"onsubmit"=>"return checkForm(this);" );
                                   echo form_open("Welcome/registration", $attributes);?>
                                

                                  <!-- <form role="form" id="signupForm" method="POST" onsubmit="return checkForm(this);" action="<?php echo(base_url());?>index.php/Welcome/registration" >   -->
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First Name" required>
                                        <?php 
                                               $this->load->helper('form');
                                               echo form_error('firstname');  
                                               ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Last Name" required>
                                    <?php
                                              echo form_error('lastname');  

                                              ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>"  placeholder="Email Address" required>
                                    <?php
                                              echo form_error('email');  

                                              ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" required>
                                    <?php
                                              echo form_error('password');  

                                              ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control"  placeholder="Confirm Password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" type="password" onkeyup="checkPass(); return false;" required>
                                    <?php
                                              echo form_error('confirm_password');  

                                              ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                       
                                         <button type="submit" class="btn btn-primary">Sign Up</button>
                                        
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                                                            
                                        
                                </div>
                                 <?php echo form_close(); ?>
                                 <?php echo $this->session->flashdata('msg'); ?>
                                
                                
                                
                            <!-- </form> -->
                         </div>
                    </div>

               
               <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

                
         </div> 
    </div>
    




                  