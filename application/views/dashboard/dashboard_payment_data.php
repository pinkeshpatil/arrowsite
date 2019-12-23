          <!-- Section 2/1 -->          
          <div class="row">                
            <div class="col-md-12">
              <div class="box box-primary" id="payment-edit-1">
                    <div class="box-header">
                        <h2 class="info-title">Payment Information</h2> <a href="javascript:void(0)" id="paymentinfoEditBtn" onclick="makeEditable('paymentinfoEditBtn', 'payment-info-view', 'payment-info-edit');" style="float: right;">Edit</a>
                    </div><!-- /.box-header -->
                    <div id="payment-info-view" style="display: block;">
                      <div class="panel panel-default tab-panel">
                        <div class="row">    
                            <div class="col-md-3 active">
                                <div class="panel-heading tab-btn tab-one">Credit Card</div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel-heading tab-btn tab-two">Paypal</div>
                            </div>
                            <div class="col-md-6">
                            
                            </div>
                        </div>                    
                        <div id="ccPaymentInfoBox" class="panel-body payment-fieldset tab-body tab-one-body">
                          <div class="box-body">
                              <div class="row">
                                  <div class="col-md-6">        
                                      <div class="form-group">
                                          <label for="creditcardno">Credit Card #</label><br/>
                                          <?php if($ccpaymentinfo['cc_number'] != ''){
                                            $count = strlen($ccpaymentinfo['cc_number']) - 4;
                                            for($n = 1; $count >= $n; $n++){
                                              echo "*";
                                              if($n % 4 === 0){
                                                echo " ";
                                              }
                                            }
		                                		  echo substr($ccpaymentinfo['cc_number'],-4);
		                                	   } else {
                                            echo 'Not Available';
                                          } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="email">Expiry Date</label><br/>
                                          <?php if($ccpaymentinfo['cc_exp'] != ''){ 
		                                		      echo $ccpaymentinfo['cc_exp'];
		                                	     } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="password">CVV #</label><br/>
                                          <?php if($ccpaymentinfo['cc_cvv'] != ''){ 
                                            echo "***";
		                                	    } else {
                                            echo 'Not Available';
                                          } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="mobile">Name on Card</label><br/>
                                          <?php if($ccpaymentinfo['cc_name'] != ''){ 
		                                		    echo $ccpaymentinfo['cc_name'];
		                                	    } else {
                                            echo 'Not Available';
                                          } ?>
                                      </div>                                    
                                  </div>
                              </div>                          
                          </div><!-- /.box-body -->
                        </div>                      
                        <div id="paypalPaymentInfoBox" class="panel-body payment-fieldset tab-body tab-two-body">
                           <div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="fname">Name</label><br/>
                                          <?php if($paypalpaymentinfo['paypal_name'] != ''){ 
                                            echo $paypalpaymentinfo['paypal_name'];
                                          } else {
                                            echo 'Not Available';
                                          } ?>
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Paypal ID</label><br/>
                                          <?php if($paypalpaymentinfo['paypal_email'] != ''){ 
                                            echo $paypalpaymentinfo['paypal_email'];
                                          } else {
                                            echo 'Not Available';
                                          } ?>
                                      </div>
                                  </div>                                
                              </div>                          
                           </div><!-- /.box-body --> 
                        </div>
                      </div>
                    </div>
                    <div id="payment-info-edit" style="display: none;">
                        <div class="panel panel-default tab-panel">
                          <div class="row">    
                              <div class="col-md-3 active">
                                  <div class="panel-heading tab-btn tab-one">Credit Card</div>
                              </div>
                              <div class="col-md-3">
                                  <div class="panel-heading tab-btn tab-two">Paypal</div>
                              </div>
                              <div class="col-md-6">
                              
                              </div>
                          </div>                    
                          <div class="panel-body payment-fieldset tab-body tab-one-body">
                            <!-- form start -->
                            <?php $this->load->helper("form"); ?>
                            <form role="form" id="businessUpdateCCInfo" name="businessUpdateCCInfo" action="" method="post">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">         
                                        <div class="form-group">
                                            <label for="cc_number">Credit Card #</label>
                                            <?php if($ccpaymentinfo['cc_number'] != ''){
                                                $count = strlen($ccpaymentinfo['cc_number']);           
                                                $i = 0;
                                                $ccnumber = "";
                                                for($n = 1; $count >= $n; $n++){
                                                  $ccnumber .= substr($ccpaymentinfo['cc_number'], $i, 1);
                                                  if($n % 4 === 0 && $count > $n){
                                                    $ccnumber .= " ";
                                                  }
                                                  $i++;
                                                }
                                              } else {
                                                $ccnumber = "";
                                              }
                                           ?>
                                            <input type="text" class="form-control required digits" id="cc_number" value="<?php echo $ccnumber; ?>" name="cc_number" maxlength="19">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_exp">Expiry Date</label><br/>
                                            <?php
                                            	if($ccpaymentinfo['cc_exp'] != ''){ 
		                                			$cc_exp = explode('/', $ccpaymentinfo['cc_exp']);
		                                			$cc_exp_month = $cc_exp[0];
		                                			$cc_exp_year = $cc_exp[1];
		                                	 	} else {
		                                	 		$cc_exp_month = '';
		                                	 		$cc_exp_year = '';
		                                	 	}
                                            ?>
                                            <div class="row">
                                            	<div class="col-md-6">
		                                            <select name="cc_exp_month" id="cc_exp_month" class="form-control">
		                                            	<option value="">MM</option>
		                                            	<?php       		
		                                            		for($i = 1; $i <= 12; $i++){
		                                            			$dateObj   = DateTime::createFromFormat('!m', $i);
																$month = $dateObj->format('M');
																if($i < 10){
																	$i = sprintf("%02d", $i);
																}
																if($cc_exp_month == $i){
																	$selected = 'selected="selected"';
																} else {
																	$selected = '';
																}
		                                            			echo "<option value='".$i."' ".$selected.">".$month."</option>";
		                                            		}
		                                            	?>           	
		                                            </select>
		                                        </div>
		                                        <div class="col-md-6">
		                                        	<select name="cc_exp_year" id="cc_exp_year" class="form-control">
		                                        		<option value="">YYYY</option>
		                                            	<?php       		
		                                            		$yearnow = date("Y");
															$yearnext = $yearnow + 5;
		                                            		for($y = $yearnow; $y <= $yearnext; $y++){
		                                            			if($cc_exp_year == $y){
																	$selected = 'selected="selected"';
																} else {
																	$selected = '';
																}
		                                            			echo "<option value='".$y."' ".$selected.">".$y."</option>";
		                                            		}
		                                            	?>           	
		                                            </select>
		                                        </div>
		                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_cvv">CVV #</label><br/>
                                            <input type="text" class="form-control required digits" id="cc_cvv" value="<?php if($ccpaymentinfo['cc_cvv'] != ''){ 
		                                		echo $ccpaymentinfo['cc_cvv'];
		                                	 } ?>" name="cc_cvv" maxlength="3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_name">Name on Card</label><br/>
                                            <input type="text" class="form-control required" id="cc_name" value="<?php if($ccpaymentinfo['cc_name'] != ''){ 
		                                		echo $ccpaymentinfo['cc_name'];
		                                	 } ?>" name="cc_name">
                                        </div>                                    
                                    </div>
                                </div>                          
                            </div><!-- /.box-body -->
                            <div class="box-footer">
	                          <div class="row">
	                              <div class="col-md-7">
	                                <input type="submit" class="btn btn-primary" id="saveccinfobtn" name="saveccinfobtn" value="Save" />
	                                <input type="reset" class="btn btn-default" value="Reset" />
	                              </div>
	                              <div class="col-md-5">
	                                <div id="ccinfomsg" class="alert"></div>
	                              </div>
	                          </div>
	                        </div>
                            </form>
                            <div id="ccinfoLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
                          </div>                      
                          <div class="panel-body payment-fieldset tab-body tab-two-body">
                            <form role="form" id="businessUpdatePaypalInfo" name="businessUpdatePaypalInfo" action="" method="post">
                             <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">        
                                        <div class="form-group">
                                            <label for="paypal_name">Name</label><br/>
                                            <input type="text" class="form-control required" id="paypal_name" value="<?php if($paypalpaymentinfo['paypal_name'] != ''){ 
                                        echo $paypalpaymentinfo['paypal_name'];
                                       } ?>" name="paypal_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="paypal_email">Paypal ID</label><br/>
                                            <input type="text" class="form-control required email" id="paypal_email" value="<?php if($paypalpaymentinfo['paypal_email'] != ''){ 
                                        echo $paypalpaymentinfo['paypal_email'];
                                       } ?>" name="paypal_email">
                                        </div>
                                    </div>                                
                                </div>                          
                             </div><!-- /.box-body --> 
                             <div class="box-footer">
                              <div class="row">
                                  <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" id="savepaypalinfobtn" name="savepaypalinfobtn" value="Save" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                  </div>
                                  <div class="col-md-5">
                                    <div id="paypalinfomsg" class="alert"></div>
                                  </div>
                              </div>                         
                             </div>
                           </form>
                           <div id="paypalinfoLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
                      </div>
                    </div>
              </div>
            </div>
          </div>