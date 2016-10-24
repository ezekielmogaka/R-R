 <!-- PRICING TABLE-->
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <ul class="pricing_table row">
                        <li class="price_block col-md-4 col-xs-11">
                            <!-- <center><button class="bronze-button ">Bronze</button></center>  -->
                            <h3><?= $homepage_data['packages'][0]['package_title'] ?> Package <sup style="color:#cd7f32"><i class="fa fa-certificate" ></i></sup></h3>
                            <div class="price orange">
                                <div class="price_figure">
                                    <span class="price_number">Ksh. <?= $homepage_data['packages'][0]['package_cost'] ?> </span>
                                    <span class="price_tenure">Quartely</span>
                                </div>
                            </div>
                            <ul class="features">
                                <li><?= $homepage_data['packages'][0]['package_discount'] ?>% Discount on Reports</li>
                                <li>Valid for 3 months</li>
                                
                            </ul>
                            <div class="footer">
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-shadow caption lft slide_btn red" data-toggle="modal" data-target="#myModal1"><i class="fa fa-cloud-download" data-toggle="modal" data-target=".bs-example-modal-lg"></i>Download Application Form
                                  
                                </button>
                            </div>
                        </li>
                        <li class="price_block col-md-4 col-xs-11">
                            <!-- <center><button class="silver-button ">Silver</button></center>  -->
                            <h3><?= $homepage_data['packages'][1]['package_title'] ?> Package<sup style="color:#D3D3D3;"><i class="fa fa-certificate" ></i></sup></h3>
                            <div class="price orange">
                                <div class="price_figure">
                                    <span class="price_number">Ksh. <?= $homepage_data['packages'][1]['package_cost'] ?></span>
                                    <span class="price_tenure">Semi-annually</span>
                                </div>
                            </div>
                            <ul class="features">
                                <li><?= $homepage_data['packages'][1]['package_discount'] ?>% Discount on Reports</li>
                                <li>Valid for 6 months</li>
                                
                            </ul>
                            <div class="footer">
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-shadow caption lft slide_btn red" data-toggle="modal" data-target="#myModal2"><i class="fa fa-cloud-download" data-toggle="modal" data-target=".bs-example-modal-lg"></i>Download Application Form
                                  
                                </button>

                                 
                            </div>
                        </li>
                        <li class="price_block col-md-4 col-xs-11">
                            <!-- <center><button class="gold-button ">Gold</button></center>  -->
                            <h3><?= $homepage_data['packages'][2]['package_title'] ?> Package <sup style="color:#FFDF00;"><i class="fa fa-certificate" ></i></sup></h3>
                            <div class="price orange">
                                <div class="price_figure">
                                    <span class="price_number">Ksh. <?= $homepage_data['packages'][2]['package_cost'] ?></span>
                                    <span class="price_tenure">Yearly</span>
                                </div>
                            </div>
                            <ul class="features">
                                <li><?= $homepage_data['packages'][2]['package_discount'] ?>% Discount on Reports</li>
                                 <li>Valid for 12 months</li>
                                
                            </ul>
                            <div class="footer">
                               <!--  <a href="#" class="btn btn-info">View Terms</a> -->

                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-shadow caption lft slide_btn red" data-toggle="modal" data-target="#myModal3" ><i class="fa fa-cloud-download" data-toggle="modal" data-target=".bs-example-modal-lg"></i>Download Application Form
                                  
                                </button>


                                <!-- Button trigger modal -->
                                <!-- <a href="<?= base_url()?>assets/application_form/<?= $homepage_data['packages'][2]['application_form']; ?>" target='_blank' class='btn btn-primary btn-shadow caption lft slide_btn red'><i class="fa fa-cloud-download" data-toggle="modal" data-target="#myModal"></i>Download Application Form</a>
 -->



                            </div>
                        </li>
                    </ul>
                    <ul class="skeleton pricing_table" style="margin-top: 100px; overflow: hidden;">
                        <li class="label" style="margin: 0 none;">ul.pricing_table</li>
                        <li class="price_block">
                            <span class="label">li.price_block</span>
                            <h3><span class="label">h3</span></h3>
                            <div class="price">
                                <span class="label">div.price</span>
                                <div class="price_figure">
                                    <span class="label">div.price_figure</span>
                                    <span class="price_number">
                              <span class="label">span.price_number</span>
                                    </span>
                                    <span class="price_tenure">
                              <span class="label">span.price_tenure</span>
                                    </span>
                                </div>
                            </div>
                            <ul class="features">
                                <li class="label">ul.features</li>
                                <br />
                                <br />
                                <br />
                            </ul>
                            <div class="footer">
                                <span class="label">div.footer</span>
                            </div>
                        </li>
                        <li class="price_block" style="opacity: 0.5;">
                            <span class="label">li.price_block</span>
                            <h3><span class="label">h3</span></h3>
                            <div class="price">
                                <span class="label">div.price</span>
                                <div class="price_figure">
                                    <span class="label">div.price_figure</span>
                                    <span class="price_number">
                              <span class="label">span.price_number</span>
                                    </span>
                                    <span class="price_tenure">
                              <span class="label">span.price_tenure</span>
                                    </span>
                                </div>
                            </div>
                            <ul class="features">
                                <li class="label">ul.features</li>
                                <br />
                                <br />
                                <br />
                            </ul>
                            <div class="footer">
                                <span class="label">div.footer</span>
                            </div>
                        </li>
                        <li class="price_block" style="opacity: 0.25;">
                            <span class="label">li.price_block</span>
                            <h3><span class="label">h3</span></h3>
                            <div class="price">
                                <span class="label">div.price</span>
                                <div class="price_figure">
                                    <span class="label">div.price_figure</span>
                                    <span class="price_number">
                              <span class="label">span.price_number</span>
                                    </span>
                                    <span class="price_tenure">
                              <span class="label">span.price_tenure</span>
                                    </span>
                                </div>
                            </div>
                            <ul class="features">
                                <li class="label">ul.features</li>
                                <br />
                                <br />
                                <br />
                            </ul>
                            <div class="footer">
                                <span class="label">div.footer</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /PRICING TABLE -->




        

<!-- Modal -->
<div class="modal fade " id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
          <span style="color:blue;font-size: 80%;">
          <ol>
          <div class="col-sm-6">

          
          
          <li>

<h4>Supply of the Services and Payment</h4>
<div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>1.1</b> <br>The Agreement shall commence on the date of signature
of this Agreement by the party signing last in time and
shall continue for an indefinite period until terminated by
either party on no less than thirty (30) days written notice
of termination to the other.</a>

  <a href="javascript:;" class="list-group-item"><b>1.2</b> <br>R & R shall provide the Services to the Client with effect
from a date R & R agrees until the Agreement terminates.</a>


  <a href="javascript:;" class="list-group-item"><b>1.3</b> <br>R & R may from time to time change upgrade or modify
the methods the Client uses to access the Services,
provided that R & R shall, save where impractical, give
the Client at least 1 month’s notice.</a>

   <a href="javascript:;" class="list-group-item"><b>1.4</b> <br>R & R’s performance of the services shall meet the
reasonable service level and timeframe; the service level
hours will be 0800-1700hours Monday-Friday.</a>

    <a href="javascript:;" class="list-group-item"><b>1.5</b> <br>The Client shall ensure that it has all the necessary
equipment to gain access to the Services (including,
without limitation, computer hardware communications
equipment and internet access facilities).</a>

     <a href="javascript:;" class="list-group-item"><b>1.6</b> <br>All Services performed by R & R are subject to R & R ’s
schedule of rates and charges (as published from time to
time). R&R’s reports are accessed on a prepayment
basis and the client will prepay for any Reports that the
Client shall require from R & R without deduction or set-
off of any nature. Upon utilization of the prepaid amounts
the Client shall be required to deposit additional amount
and if the Client does not replenish the Client
acknowledges that it will not have access to the any
Reports. Any prepaid amounts that remain unutilized six
(6) months after the date of purchase shall expire and not
be refunded. In addition, the parties agree that upon
termination of the Agreement any unutilized amounts will
not be capable of being refunded to the Client.</a>


      <a href="javascript:;" class="list-group-item"><b>1.7</b> <br>Fees and charges payable by the Client may be
varied by R & R at any time and R & R will within 1
month’s notice notify the Client of the revised fees
and charges.</a>

      
</div>

</li>

<li>
    

    <h4>The Client’s Obligations</h4>

    <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>2.1</b> <br>The Client shall maintain adequate security measures to
protect the integrity and security of any access credentials and reports provided to it. The Client shall promptly notify R & R of any breach or suspected breach of such security measures.</a>

  <a href="javascript:;" class="list-group-item"><b>2.2</b> <br>The Client shall not supply or engage in any business
involving the supply to any other person of any of the
services, or any part of them, or any reports or any
information derived from R & R.</a>


  <a href="javascript:;" class="list-group-item"><b>2.3</b> <br>The Client acknowledges and agrees that no intellectual
property rights (including copyright and rights of
confidence) in the reports or the access software or any
other aspect of the Services are transferred to the Client.</a>

   <a href="javascript:;" class="list-group-item"><b>2.4</b> <br>The Client acknowledges that the information contained in
the Reports is collected from a number of sources both public and private and R & R has no means of verifying
the veracity of the information. Consequently, the Client shall not hold R & R liable or responsible for any such
information being inaccurate incomplete or misleading unless occasioned by R & R ’s gross negligence or willful
default.</a>

    <a href="javascript:;" class="list-group-item"><b>2.5</b> <br>The Client warrants that the reports accessed by, or
released to it shall be accessed, used, and disposed off, in accordance with statutes governing such access, use
and/or disposal.</a>
      
</div>
</li>

      <li>
          <h4>Confidentiality and Anonymity</h4>

          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>3.1</b> <br>Except as expressly permitted by the Agreement the
Client may not disclose or supply to any other person any
Information derived from R & R.</a>
 <a href="javascript:;" class="list-group-item disabled"><b>3.2</b> <br>The Client may disclose Confidential Information  :
 <ol>
     <li>When required to do so by law or any regulatory
authority; and</li>
     <li>To its personnel whose duties reasonably require
such disclosure, on condition that the Client shall
ensure that each such person to whom such
disclosure is made: (i) is informed of the
obligations of confidentiality under these
Conditions and (ii) complies with those obligations
as if they were bound by them.</li>

 </ol>

 </a>
 <a href="javascript:;" class="list-group-item disabled"> <b>3.3</b> <br>The provisions of this Condition 4 shall survive expiry or
termination of the Agreement for any reason.</a>

</div>
          </li>



          </div>
          <div class="col-sm-6">
    


          <li>
          <h4>Limitation of Liability and Indemnity</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>4.1</b> <br>Subject to R & R 's compliance with its obligations under
the Regulations, the Client agrees that R & R shall not in
any circumstances whatsoever be liable for any loss
damage action claim expense or cost of any kind
whatsoever arising whether directly or indirectly from any
inaccuracies faults or omissions in the reports or in
connection with the provision of the Services generally
unless caused by R & R ’s gross negligence or willful
default.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>4.2</b> <br>The Client acknowledges that R & R provides the Services
at a price that does not reflect any benefit that may be
obtained by the Client in receiving the Services, including
any profit that the Client may make or the amount of any
credit that the Client may give. The Client agrees that R &
R shall not in any circumstance (including if R & R has
been negligent) be liable for (a) any type of special indirect
or consequential loss or damage whatsoever or (b) any
loss of business opportunity capital profit reputation or
goodwill arising out of or in connection with the Agreement
or the receipt of reports or other Services.

 </a>
 <a href="javascript:;" class="list-group-item disabled"><b>4.3</b> <br>R & R ’s entire liability in respect of any single cause of
action arising out of or in connection with the Agreement
or its subject matter (whether for breach of contract
negligence infringement of any statute or otherwise) shall
be limited, to the extent that the cause of action relates to
the supply of the Services, at R & R ’s option, to: (i) an
obligation on the part of R & R to supply the Services
again; or (ii) payment of the cost of either (a) having the
Services supplied again; or (b) reimbursement of the cost
of the service whichever is the lower.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.4</b> <br>Except as expressly provided in the Agreement all
representations conditions and warranties whether
express or implied (by statute or otherwise) are hereby
excluded to the fullest extent permitted by law.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.5</b> <br>The Client hereby agrees to indemnify and keep
indemnified R & R and its officers, personnel and agents
from time to time (each an “Indemnified Person”) on a full
and unqualified indemnity basis against all and any costs
(including legal fees) claims actions proceedings
damages demands liabilities losses and expenses of
whatsoever nature and howsoever arising suffered or
incurred by the Indemnified Person relating to or in
connection with any person inducing a breach of contract,
breach of confidentiality or otherwise against the
Indemnified Person following the use by the Client of the
Services or the reports or in connection with any breach
or default on the part of the Client unless such costs
claims actions proceedings damages demands liabilities
losses and expenses arise solely through R & R’s gross
negligence or willful default.</a>

</div>
          </li>

         <li>
          <h4>Suspension and Termination</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>5.1</b> <br>Upon execution of this Agreement, it shall remain in full
force and effect unless either party gives notice in writing
to the others of its intention to terminate the Agreement.
Subject to and without prejudice to the provisions of
Condition 5.2 the party giving notice to terminate the
Agreement shall ensure that the period of time between
the other party receiving such notice and the date on
which the Agreement is to terminate is not less than thirty
(30) days.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>5.2</b> <br>R & R may suspend supply of the Services immediately
by notice if: (a) the Client makes any unauthorized use of
the Services; (b) the Client fails to make any payment
under the Agreement when the payment is due; or (c) the
Client fails to comply with its obligations under the
Agreement; suspension of the Services shall not affect
any of the Client’s obligations under the Agreement,
including any obligation to make any payment.

 </a>
 

</div>
          </li>
         
         
  

             
          </div>

          </ol>
      </span>

         
        </div>
      </div>
      <div class="modal-footer">
       

      

        <FORM METHOD="LINK" id="form1" ACTION="<?= base_url()?>assets/application_form/<?= $homepage_data['packages'][0]['application_form']; ?>" >

       
         <input type="checkbox"  id="field_terms"  name="terms"   style="width: 20px;" ><a href="javascript:;" >
        <span style="color:blue;font-size: 140%;">Accept our terms and Conditions</span></a>
        <br/>
        <br/>
        
        

        
    <INPUT TYPE="submit" VALUE="Download Application Form" class='btn btn-primary btn-shadow fa fa-cloud-download' />
     <button type="button" class="btn btn-primary btn-shadow" data-dismiss="modal">Close</button>
   </FORM>


       
        
      </div>
    </div>
  </div>
</div>

<!-- Modal1 End -->




<!-- Modal -->
<div class="modal fade " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
          <span style="color:blue;font-size: 80%;">
          <ol>
          <div class="col-sm-6">

          
          
          <li>

<h4>Supply of the Services and Payment</h4>
<div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>1.1</b> <br>The Agreement shall commence on the date of signature
of this Agreement by the party signing last in time and
shall continue for an indefinite period until terminated by
either party on no less than thirty (30) days written notice
of termination to the other.</a>

  <a href="javascript:;" class="list-group-item"><b>1.2</b> <br>R & R shall provide the Services to the Client with effect
from a date R & R agrees until the Agreement terminates.</a>


  <a href="javascript:;" class="list-group-item"><b>1.3</b> <br>R & R may from time to time change upgrade or modify
the methods the Client uses to access the Services,
provided that R & R shall, save where impractical, give
the Client at least 1 month’s notice.</a>

   <a href="javascript:;" class="list-group-item"><b>1.4</b> <br>R & R’s performance of the services shall meet the
reasonable service level and timeframe; the service level
hours will be 0800-1700hours Monday-Friday.</a>

    <a href="javascript:;" class="list-group-item"><b>1.5</b> <br>The Client shall ensure that it has all the necessary
equipment to gain access to the Services (including,
without limitation, computer hardware communications
equipment and internet access facilities).</a>

     <a href="javascript:;" class="list-group-item"><b>1.6</b> <br>All Services performed by R & R are subject to R & R ’s
schedule of rates and charges (as published from time to
time). R&R’s reports are accessed on a prepayment
basis and the client will prepay for any Reports that the
Client shall require from R & R without deduction or set-
off of any nature. Upon utilization of the prepaid amounts
the Client shall be required to deposit additional amount
and if the Client does not replenish the Client
acknowledges that it will not have access to the any
Reports. Any prepaid amounts that remain unutilized six
(6) months after the date of purchase shall expire and not
be refunded. In addition, the parties agree that upon
termination of the Agreement any unutilized amounts will
not be capable of being refunded to the Client.</a>


      <a href="javascript:;" class="list-group-item"><b>1.7</b> <br>Fees and charges payable by the Client may be
varied by R & R at any time and R & R will within 1
month’s notice notify the Client of the revised fees
and charges.</a>

      
</div>

</li>

<li>
    

    <h4>The Client’s Obligations</h4>

    <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>2.1</b> <br>The Client shall maintain adequate security measures to
protect the integrity and security of any access credentials and reports provided to it. The Client shall promptly notify R & R of any breach or suspected breach of such security measures.</a>

  <a href="javascript:;" class="list-group-item"><b>2.2</b> <br>The Client shall not supply or engage in any business
involving the supply to any other person of any of the
services, or any part of them, or any reports or any
information derived from R & R.</a>


  <a href="javascript:;" class="list-group-item"><b>2.3</b> <br>The Client acknowledges and agrees that no intellectual
property rights (including copyright and rights of
confidence) in the reports or the access software or any
other aspect of the Services are transferred to the Client.</a>

   <a href="javascript:;" class="list-group-item"><b>2.4</b> <br>The Client acknowledges that the information contained in
the Reports is collected from a number of sources both public and private and R & R has no means of verifying
the veracity of the information. Consequently, the Client shall not hold R & R liable or responsible for any such
information being inaccurate incomplete or misleading unless occasioned by R & R ’s gross negligence or willful
default.</a>

    <a href="javascript:;" class="list-group-item"><b>2.5</b> <br>The Client warrants that the reports accessed by, or
released to it shall be accessed, used, and disposed off, in accordance with statutes governing such access, use
and/or disposal.</a>
      
</div>
</li>

      <li>
          <h4>Confidentiality and Anonymity</h4>

          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>3.1</b> <br>Except as expressly permitted by the Agreement the
Client may not disclose or supply to any other person any
Information derived from R & R.</a>
 <a href="javascript:;" class="list-group-item disabled"><b>3.2</b> <br>The Client may disclose Confidential Information  :
 <ol>
     <li>When required to do so by law or any regulatory
authority; and</li>
     <li>To its personnel whose duties reasonably require
such disclosure, on condition that the Client shall
ensure that each such person to whom such
disclosure is made: (i) is informed of the
obligations of confidentiality under these
Conditions and (ii) complies with those obligations
as if they were bound by them.</li>

 </ol>

 </a>
 <a href="javascript:;" class="list-group-item disabled"> <b>3.3</b> <br>The provisions of this Condition 4 shall survive expiry or
termination of the Agreement for any reason.</a>

</div>
          </li>



          </div>
          <div class="col-sm-6">
    


          <li>
          <h4>Limitation of Liability and Indemnity</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>4.1</b> <br>Subject to R & R 's compliance with its obligations under
the Regulations, the Client agrees that R & R shall not in
any circumstances whatsoever be liable for any loss
damage action claim expense or cost of any kind
whatsoever arising whether directly or indirectly from any
inaccuracies faults or omissions in the reports or in
connection with the provision of the Services generally
unless caused by R & R ’s gross negligence or willful
default.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>4.2</b> <br>The Client acknowledges that R & R provides the Services
at a price that does not reflect any benefit that may be
obtained by the Client in receiving the Services, including
any profit that the Client may make or the amount of any
credit that the Client may give. The Client agrees that R &
R shall not in any circumstance (including if R & R has
been negligent) be liable for (a) any type of special indirect
or consequential loss or damage whatsoever or (b) any
loss of business opportunity capital profit reputation or
goodwill arising out of or in connection with the Agreement
or the receipt of reports or other Services.

 </a>
 <a href="javascript:;" class="list-group-item disabled"><b>4.3</b> <br>R & R ’s entire liability in respect of any single cause of
action arising out of or in connection with the Agreement
or its subject matter (whether for breach of contract
negligence infringement of any statute or otherwise) shall
be limited, to the extent that the cause of action relates to
the supply of the Services, at R & R ’s option, to: (i) an
obligation on the part of R & R to supply the Services
again; or (ii) payment of the cost of either (a) having the
Services supplied again; or (b) reimbursement of the cost
of the service whichever is the lower.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.4</b> <br>Except as expressly provided in the Agreement all
representations conditions and warranties whether
express or implied (by statute or otherwise) are hereby
excluded to the fullest extent permitted by law.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.5</b> <br>The Client hereby agrees to indemnify and keep
indemnified R & R and its officers, personnel and agents
from time to time (each an “Indemnified Person”) on a full
and unqualified indemnity basis against all and any costs
(including legal fees) claims actions proceedings
damages demands liabilities losses and expenses of
whatsoever nature and howsoever arising suffered or
incurred by the Indemnified Person relating to or in
connection with any person inducing a breach of contract,
breach of confidentiality or otherwise against the
Indemnified Person following the use by the Client of the
Services or the reports or in connection with any breach
or default on the part of the Client unless such costs
claims actions proceedings damages demands liabilities
losses and expenses arise solely through R & R’s gross
negligence or willful default.</a>

</div>
          </li>

         <li>
          <h4>Suspension and Termination</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>5.1</b> <br>Upon execution of this Agreement, it shall remain in full
force and effect unless either party gives notice in writing
to the others of its intention to terminate the Agreement.
Subject to and without prejudice to the provisions of
Condition 5.2 the party giving notice to terminate the
Agreement shall ensure that the period of time between
the other party receiving such notice and the date on
which the Agreement is to terminate is not less than thirty
(30) days.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>5.2</b> <br>R & R may suspend supply of the Services immediately
by notice if: (a) the Client makes any unauthorized use of
the Services; (b) the Client fails to make any payment
under the Agreement when the payment is due; or (c) the
Client fails to comply with its obligations under the
Agreement; suspension of the Services shall not affect
any of the Client’s obligations under the Agreement,
including any obligation to make any payment.

 </a>
 

</div>
          </li>
         
         
  

             
          </div>

          </ol>
      </span>

         
        </div>
      </div>
      <div class="modal-footer">
       
      

        <FORM METHOD="LINK" id="form2" onsubmit="return checkForm(this);" ACTION="<?= base_url()?>assets/application_form/<?= $homepage_data['packages'][1]['application_form']; ?>" >

       
         <input type="checkbox"  id="field_terms"  name="terms"   style="width: 20px;" ><a href="javascript:;" >
        <span style="color:blue;font-size: 140%;">Accept our terms and Conditions</span></a>
        <br/>
        <br/>
        

        
    <INPUT TYPE="submit" VALUE="Download Application Form" class='btn btn-primary btn-shadow fa fa-cloud-download'/>
     <button type="button" class="btn btn-primary btn-shadow" data-dismiss="modal">Close</button>
   </FORM>


       
        
      </div>
    </div>
  </div>
</div>

<!-- Modal2 End -->




<!-- Modal -->
<div class="modal fade " id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
          <span style="color:blue;font-size: 80%;">
          <ol>
          <div class="col-sm-6">

          
          
          <li>

<h4>Supply of the Services and Payment</h4>
<div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>1.1</b> <br>The Agreement shall commence on the date of signature
of this Agreement by the party signing last in time and
shall continue for an indefinite period until terminated by
either party on no less than thirty (30) days written notice
of termination to the other.</a>

  <a href="javascript:;" class="list-group-item"><b>1.2</b> <br>R & R shall provide the Services to the Client with effect
from a date R & R agrees until the Agreement terminates.</a>


  <a href="javascript:;" class="list-group-item"><b>1.3</b> <br>R & R may from time to time change upgrade or modify
the methods the Client uses to access the Services,
provided that R & R shall, save where impractical, give
the Client at least 1 month’s notice.</a>

   <a href="javascript:;" class="list-group-item"><b>1.4</b> <br>R & R’s performance of the services shall meet the
reasonable service level and timeframe; the service level
hours will be 0800-1700hours Monday-Friday.</a>

    <a href="javascript:;" class="list-group-item"><b>1.5</b> <br>The Client shall ensure that it has all the necessary
equipment to gain access to the Services (including,
without limitation, computer hardware communications
equipment and internet access facilities).</a>

     <a href="javascript:;" class="list-group-item"><b>1.6</b> <br>All Services performed by R & R are subject to R & R ’s
schedule of rates and charges (as published from time to
time). R&R’s reports are accessed on a prepayment
basis and the client will prepay for any Reports that the
Client shall require from R & R without deduction or set-
off of any nature. Upon utilization of the prepaid amounts
the Client shall be required to deposit additional amount
and if the Client does not replenish the Client
acknowledges that it will not have access to the any
Reports. Any prepaid amounts that remain unutilized six
(6) months after the date of purchase shall expire and not
be refunded. In addition, the parties agree that upon
termination of the Agreement any unutilized amounts will
not be capable of being refunded to the Client.</a>


      <a href="javascript:;" class="list-group-item"><b>1.7</b> <br>Fees and charges payable by the Client may be
varied by R & R at any time and R & R will within 1
month’s notice notify the Client of the revised fees
and charges.</a>

      
</div>

</li>

<li>
    

    <h4>The Client’s Obligations</h4>

    <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>2.1</b> <br>The Client shall maintain adequate security measures to
protect the integrity and security of any access credentials and reports provided to it. The Client shall promptly notify R & R of any breach or suspected breach of such security measures.</a>

  <a href="javascript:;" class="list-group-item"><b>2.2</b> <br>The Client shall not supply or engage in any business
involving the supply to any other person of any of the
services, or any part of them, or any reports or any
information derived from R & R.</a>


  <a href="javascript:;" class="list-group-item"><b>2.3</b> <br>The Client acknowledges and agrees that no intellectual
property rights (including copyright and rights of
confidence) in the reports or the access software or any
other aspect of the Services are transferred to the Client.</a>

   <a href="javascript:;" class="list-group-item"><b>2.4</b> <br>The Client acknowledges that the information contained in
the Reports is collected from a number of sources both public and private and R & R has no means of verifying
the veracity of the information. Consequently, the Client shall not hold R & R liable or responsible for any such
information being inaccurate incomplete or misleading unless occasioned by R & R ’s gross negligence or willful
default.</a>

    <a href="javascript:;" class="list-group-item"><b>2.5</b> <br>The Client warrants that the reports accessed by, or
released to it shall be accessed, used, and disposed off, in accordance with statutes governing such access, use
and/or disposal.</a>
      
</div>
</li>

      <li>
          <h4>Confidentiality and Anonymity</h4>

          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>3.1</b> <br>Except as expressly permitted by the Agreement the
Client may not disclose or supply to any other person any
Information derived from R & R.</a>
 <a href="javascript:;" class="list-group-item disabled"><b>3.2</b> <br>The Client may disclose Confidential Information  :
 <ol>
     <li>When required to do so by law or any regulatory
authority; and</li>
     <li>To its personnel whose duties reasonably require
such disclosure, on condition that the Client shall
ensure that each such person to whom such
disclosure is made: (i) is informed of the
obligations of confidentiality under these
Conditions and (ii) complies with those obligations
as if they were bound by them.</li>

 </ol>

 </a>
 <a href="javascript:;" class="list-group-item disabled"> <b>3.3</b> <br>The provisions of this Condition 4 shall survive expiry or
termination of the Agreement for any reason.</a>

</div>
          </li>



          </div>
          <div class="col-sm-6">
    


          <li>
          <h4>Limitation of Liability and Indemnity</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>4.1</b> <br>Subject to R & R 's compliance with its obligations under
the Regulations, the Client agrees that R & R shall not in
any circumstances whatsoever be liable for any loss
damage action claim expense or cost of any kind
whatsoever arising whether directly or indirectly from any
inaccuracies faults or omissions in the reports or in
connection with the provision of the Services generally
unless caused by R & R ’s gross negligence or willful
default.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>4.2</b> <br>The Client acknowledges that R & R provides the Services
at a price that does not reflect any benefit that may be
obtained by the Client in receiving the Services, including
any profit that the Client may make or the amount of any
credit that the Client may give. The Client agrees that R &
R shall not in any circumstance (including if R & R has
been negligent) be liable for (a) any type of special indirect
or consequential loss or damage whatsoever or (b) any
loss of business opportunity capital profit reputation or
goodwill arising out of or in connection with the Agreement
or the receipt of reports or other Services.

 </a>
 <a href="javascript:;" class="list-group-item disabled"><b>4.3</b> <br>R & R ’s entire liability in respect of any single cause of
action arising out of or in connection with the Agreement
or its subject matter (whether for breach of contract
negligence infringement of any statute or otherwise) shall
be limited, to the extent that the cause of action relates to
the supply of the Services, at R & R ’s option, to: (i) an
obligation on the part of R & R to supply the Services
again; or (ii) payment of the cost of either (a) having the
Services supplied again; or (b) reimbursement of the cost
of the service whichever is the lower.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.4</b> <br>Except as expressly provided in the Agreement all
representations conditions and warranties whether
express or implied (by statute or otherwise) are hereby
excluded to the fullest extent permitted by law.</a>

<a href="javascript:;" class="list-group-item disabled"><b>4.5</b> <br>The Client hereby agrees to indemnify and keep
indemnified R & R and its officers, personnel and agents
from time to time (each an “Indemnified Person”) on a full
and unqualified indemnity basis against all and any costs
(including legal fees) claims actions proceedings
damages demands liabilities losses and expenses of
whatsoever nature and howsoever arising suffered or
incurred by the Indemnified Person relating to or in
connection with any person inducing a breach of contract,
breach of confidentiality or otherwise against the
Indemnified Person following the use by the Client of the
Services or the reports or in connection with any breach
or default on the part of the Client unless such costs
claims actions proceedings damages demands liabilities
losses and expenses arise solely through R & R’s gross
negligence or willful default.</a>

</div>
          </li>

         <li>
          <h4>Suspension and Termination</h4>
          <div class="list-group">
  <a href="javascript:;" class="list-group-item disabled"><b>5.1</b> <br>Upon execution of this Agreement, it shall remain in full
force and effect unless either party gives notice in writing
to the others of its intention to terminate the Agreement.
Subject to and without prejudice to the provisions of
Condition 5.2 the party giving notice to terminate the
Agreement shall ensure that the period of time between
the other party receiving such notice and the date on
which the Agreement is to terminate is not less than thirty
(30) days.</a>

 <a href="javascript:;" class="list-group-item disabled"><b>5.2</b> <br>R & R may suspend supply of the Services immediately
by notice if: (a) the Client makes any unauthorized use of
the Services; (b) the Client fails to make any payment
under the Agreement when the payment is due; or (c) the
Client fails to comply with its obligations under the
Agreement; suspension of the Services shall not affect
any of the Client’s obligations under the Agreement,
including any obligation to make any payment.

 </a>
 

</div>
          </li>
         
         
  

             
          </div>

          </ol>
      </span>

         
        </div>
      </div>
      <div class="modal-footer">
        

       <!--  <a href="<?= base_url()?>assets/application_form/<?= $homepage_data['packages'][2]['application_form']; ?>" target='_blank' id="myLink" class='btn btn-primary btn-shadow'><i class="fa fa-cloud-download" data-toggle="modal" data-target="#myModal" disabled></i>Download Application Form</a> -->

        <form method="link" id="form3"  action="<?= base_url()?>assets/application_form/<?= $homepage_data['packages'][0]['application_form']; ?>" >

        <input type="checkbox"  id="field_terms"  name="terms"   style="width: 20px;" ><a href="javascript:;" >
        <span style="color:blue;font-size: 140%;">Accept our terms and Conditions</span></a>
        <br/>
        <br/>
        
    <input TYPE="submit" value="Download Application Form" class='btn btn-primary btn-shadow fa fa-cloud-download'  />
     <button type="button" class="btn btn-primary btn-shadow" data-dismiss="modal">Close</button>
   </form>

       
        
      </div>
    </div>
  </div>
</div>

<!-- Modal3 End -->


        <script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function() {
    
    var myForm1 = document.getElementById("form1");

    var myForm2 = document.getElementById("form2");

    var myForm3 = document.getElementById("form3");
    
    var checkForm = function(e) {
      
      if(!this.terms.checked) {
        alert("Please indicate that you accept the Terms and Conditions of Research & Ratings");
        this.terms.focus();
        e.preventDefault(); // equivalent to return false
        return;
      }
    };

    // attach the form submit handler
    myForm1.addEventListener("submit", checkForm, true);
    myForm2.addEventListener("submit", checkForm, true);
    myForm3.addEventListener("submit", checkForm, true);

    var myCheckbox = document.getElementById("field_terms");
    var myCheckboxMsg = "Please indicate that you accept the Terms and Conditions of R&R";

    // set the starting error message
    myCheckbox.setCustomValidity(myCheckboxMsg);

    // attach checkbox handler to toggle error message
    myCheckbox.addEventListener("change", function() {
      this.setCustomValidity(this.validity.valueMissing ? myCheckboxMsg : "");
    }, false);

  }, false);

</script>