
    <!--google map start-->
<!-- 
    <div class="contact-map">
         <div id="map-canvas" style="width: 100%; height: 400px"></div>
     </div>  -->
     <!--google map end-->
     

     <!--container start-->
      <div class="container" style="margin-top: 90px;margin-bottom: 90px;">


        <div class="row">
            <div class="col-lg-5 col-sm-5 address">
                <h4>Research & Ratings Company Limited</h4>
                <p>
                     <b>Location: </b>
                    <span class="muted">Nairobi, Kenya. </span><br/>

                    <b>Street Address: </b>
                    <span class="muted">Equity Building, Opp. Yaya Centre.</span><br/>
                </p>
                <br>
                <br>
                <br>
                <p>

                    <b>Postal Address: </b>
                    <span class="muted">P.O. Box 4823 - 00506</span><br/>
                    <b>Phone : </b>
                    <span class="muted">+254 776 392900 </span><br/>
                   
                    <p><b>Email : </b> <a href="javascript:;">info@researchandratings.co.ke</a></p>
                    
                </p>
            </div>

    <?php

//if "email" variable is filled out, send email
  if (isset($_REQUEST['sender_email']))  {
  
  //Email information
  $admin_email = "info@researchandratings.co.ke";
  $sender_email = $_REQUEST['sender_email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  $phone = $_REQUEST['phone'];
  $name = $_REQUEST['name'];
  $contact_person = $_REQUEST['contact_person'];

  $message = "From:    ". $name."\r\n"."Contact Person:  ".$contact_person."\r\n"."Email:  ".$sender_email."\r\n"."Phone: ".$phone."\r\n\n\n"."Message: "."\r\n".$comment;

   
$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: ".$sender_email."\r\n"."X-Mailer: php";


  
  
//send email
  mail($admin_email, $subject, $message,$headers);


  
  //Email response
  echo "Thank you for contacting Research And Ratings.!";
  }
  
  //if "email" variable is not filled out, display the form
  else{
?>
            <div class="col-lg-7 col-sm-7 address">
                <h4>Send us a Message</h4>
                <div class="contact-form">
                    <form role="form" action="" method="get" enctype="text/plain">

                     <?php

                     if(!null == $this->session->user_email){
                        ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"  value="<?php echo $this->session->names;?>" name="name" id="name" class="form-control" required readonly>
                             <small class="text-muted">Name of company or individual</small>
                        </div>
                        <?php
                      }else{


                        ?>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" placeholder="" name="name" id="name" class="form-control" required>
                             <small class="text-muted">Name of company or individual</small>
                        </div>
                        <?php
                      }
                       if(!null == $this->session->user_email){

                        ?>
                        <div class="form-group">
                            <label for="name">Contact Person</label>
                            <input type="text" value="<?php echo $this->session->contact_person;?>" name="contact_person" id="contact_person" class="form-control" required readonly>
                             <small class="text-muted">Name of person to be contacted</small>
                        </div>
                        <?php
                      }else{


                        ?>

                       <div class="form-group">
                            <label for="name">Contact Person</label>
                            <input type="text" placeholder="" name="contact_person" id="contact_person" class="form-control" required>
                             <small class="text-muted">Name of person to be contacted</small>
                        </div>
                        <?php
                      }

                      if(!null == $this->session->user_email){

                        ?>

                         <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $this->session->user_email;?>" required id="sender_email" readonly name="sender_email" >
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>

          <?php
        }else{

          ?>
           <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" required id="sender_email" name="sender_email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>

          <?php
          }
           if(!null == $this->session->user_email){


          ?>
                      <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" value="<?php echo $this->session->client_phone;?>" name="phone" class="form-control" readonly required>
                             <small class="text-muted">Phone number of contact person</small>
                        </div>

                        <?php
                      }else{


                        ?>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" minlength="10" maxlength="13"  class="form-control" required>
                             <small class="text-muted">Phone number of contact person</small>
                        </div>
                        <?php

                       }

                        ?>




                        
                         <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text"  id="subject" name="subject" class="form-control" autofocus required>
                             <small class="text-muted">Reason for Contacting us</small>
                        </div>
             
                        
                        
                        <div class="form-group">
                            <label for="phone">Message</label>
                            <textarea placeholder="" rows="5"  name="comment" id="textarea" maxlength="1000" class="form-control"></textarea>

                             <div id="textarea_feedback"></div>
                             <small class="text-muted">Message</small>

                        </div>

                        <button class="btn btn-info" type="submit">Submit</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                    </form>

                   

                </div>
            </div>
             <?php
  }
?>
        </div>

       

    </div>
    <!--container end-->

    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
    var text_max = 1000;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});
    </script>

   