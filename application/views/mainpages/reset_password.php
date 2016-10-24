<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Change your Password</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form" method ="POST" autocomplete="off" action ="<?php echo site_url('welcome/update_password');?>">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                     
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>

                                    <input type ="hidden" id="user_id" name="user_id"   required="" value ="<?=$client_id?>">

                                                                            
                                      <input type ="password" id="password" name="password" placeholder="password" class="form-control" type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"  required="" style="-webkit-text-security: circle;">

                                    
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group"> 
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>

                                      <input type ="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control"   required="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="Update Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Did not Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>