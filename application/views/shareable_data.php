          
          <!-- Section 2/1 -->          
          <div class="row">                
            <div class="col-md-12">
              <div class="box box-primary" id="shareable-info">
                    <div class="box-header">
                        <h2 class="info-title">Other Shareable Information</h2> <a href="javascript:void(0)" id="shareableinfoEditBtn" onclick="makeEditable('shareableinfoEditBtn', 'shareable-info-view', 'shareable-info-edit');" style="float: right;">Edit</a>
                    </div><!-- /.box-header -->
                    <div id="shareable-info-view" style="display: block;">
                      <div class="panel panel-default tab-panel">
                        <div class="row">
                          <!--    
                            <div class="col-md-3 active">
                                <div class="panel-heading tab-btn tab-one">About</div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel-heading tab-btn tab-two">Insurance Info</div>
                            </div>
                            <div class="col-md-6">
                            
                            </div>
                          -->
                        </div>                    
                        <div id="aboutInfoBox" class="panel-body payment-fieldset tab-body tab-one-body">
                          <div class="box-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="about_information_shareable">Information Shareable: </label>
                                          <?php if($aboutinfo['about_information_shareable'] == 'yes'){ 
                                              echo 'Yes';
                                           } else {
                                              echo 'No';
                                           } ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="email">Email</label><br/>
                                          <?php if($aboutinfo['about_email'] != ''){ 
                                              echo $aboutinfo['about_email'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="email">Phone</label><br/>
                                          <?php if($aboutinfo['about_phone'] != ''){ 
                                              echo $aboutinfo['about_phone'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="dob">Date of Birth</label><br/>
                                          <?php if($aboutinfo['about_dob'] != ''){ 
                                              echo $aboutinfo['about_dob'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <!--
                                      <div class="form-group">
                                          <label for="mobile">PRS</label><br/>
                                          <?php if($aboutinfo['about_prs'] != ''){ 
                                              //echo $aboutinfo['about_prs'];
                                           } else {
                                              //echo 'Not Available';
                                           } ?>
                                      </div>    
                                      -->                                
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <label for="address">Address</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="street">Street</label><br/>
                                          <?php if($aboutinfo['about_street'] != ''){ 
                                              echo $aboutinfo['about_street'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="city">City</label><br/>
                                          <?php if($aboutinfo['about_city'] != ''){ 
                                              echo $aboutinfo['about_city'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="state">State</label><br/>
                                          <?php if($aboutinfo['about_state'] != ''){ 
                                              echo $aboutinfo['about_state'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>                                    
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="zipcode">Zipcode</label><br/>
                                          <?php if($aboutinfo['about_zipcode'] != ''){ 
                                              echo $aboutinfo['about_zipcode'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>                                    
                                  </div>
                              </div>                               
                          </div><!-- /.box-body -->
                        </div>                      
                        <div id="insuranceInfoBox" class="panel-body payment-fieldset tab-body tab-two-body">
                           <div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="fname">Insurance Name</label><br/>
                                          <?php if($insuranceinfo['insurance_name'] != ''){ 
                                              echo $insuranceinfo['insurance_name'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Insurance ID</label><br/>
                                          <?php if($insuranceinfo['insurance_id'] != ''){ 
                                              echo $insuranceinfo['insurance_id'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                      </div>
                                  </div>                                
                              </div>                          
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Insurance Expiry Date</label><br/>
                                          <?php if($insuranceinfo['insurance_expiry_date'] != ''){ 
                                              echo $insuranceinfo['insurance_expiry_date'];
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
                    <div id="shareable-info-edit" style="display: none;">
                        <div class="panel panel-default tab-panel">
                          <div class="row"> 
                            <!--   
                              <div class="col-md-3 active">
                                  <div class="panel-heading tab-btn tab-one">About</div>
                              </div>
                              <div class="col-md-3">
                                  <div class="panel-heading tab-btn tab-two">Insurance Info</div>
                              </div>
                              <div class="col-md-6">
                              
                              </div>
                            -->
                          </div>                    
                          <div class="panel-body payment-fieldset tab-body tab-one-body">
                            <!-- form start -->
                            <?php $this->load->helper("form"); ?>
                            <form role="form" id="updateAboutInfo" name="updateAboutInfo" action="" method="post">
                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="checkbox" name="about_information_shareable" id="about_information_shareable" value="yes" <?php if($aboutinfo['about_information_shareable'] == 'yes'){ echo 'checked'; } ?>>
                                          <label for="about_information_shareable">Information Shareable</label>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email" id="email" value="<?php echo $aboutinfo['about_email']; ?>" name="email" maxlength="128">
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input type="text" class="form-control required digits" id="mobile_number" value="<?php echo $aboutinfo['about_phone']; ?>" name="mobile_number" maxlength="10">
                                          </div>
                                        </div>
                                    </div>
                                </div>                        
                                <div class="row">
                                    <div class="col-md-6">         
                                        <div class="form-group">
                                            <label for="about_dob">Date of Birth</label>   
                                            <input type="date" class="form-control required date" id="about_dob" value="<?php if($aboutinfo['about_dob'] != ''){ 
                                              echo $aboutinfo['about_dob'];
                                           }  ?>" name="about_dob" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <!--
                                        <div class="form-group">
                                           <label for="about_prs">PRS</label>   
                                            <input type="text" class="form-control required" id="about_prs" value="<?php if($aboutinfo['about_prs'] != ''){ 
                                              //echo $aboutinfo['about_prs'];
                                           }  ?>" name="about_prs">
                                        </div>
                                      -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      <label for="about_address">Address</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="about_street">Street</label><br/>
                                            <input type="text" class="form-control required" id="about_street" value="<?php if($aboutinfo['about_street'] != ''){ 
                                              echo $aboutinfo['about_street'];
                                           }  ?>" name="about_street">
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about_city">City</label><br/>
                                            <input type="text" class="form-control required" id="about_city" value="<?php if($aboutinfo['about_city'] != ''){ 
                                              echo $aboutinfo['about_city'];
                                           }  ?>" name="about_city">
                                        </div>                                    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about_state">State</label><br/>   
                                             <select name="about_state" id="about_state" class="form-control">
                                              <?php if($aboutinfo['about_state'] == 'florida'){ 
                                                  $selected = 'selected="selected"';
                                                } else {
                                                  $selected = '';
                                                } ?>
                                               <option value="florida" <?php echo $selected; ?>>Florida</option>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about_zipcode">Zipcode</label><br/>
                                            <input type="text" class="form-control required" id="about_zipcode" value="<?php if($aboutinfo['about_zipcode'] != ''){ 
                                              echo $aboutinfo['about_zipcode'];
                                           }  ?>" name="about_zipcode">
                                        </div>                                    
                                    </div>
                                </div>                          
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                            <div class="row">
                                <div class="col-md-7">
                                  <input type="submit" class="btn btn-primary" id="saveaboutbtn" name="saveaboutbtn" value="Save" />
                                  <input type="reset" class="btn btn-default" value="Reset" />
                                  <div class="hidden-fields">
                                    <input type="hidden" name="page" id="page" value="my_info">
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div id="aboutmsg" class="alert"></div>
                                </div>
                            </div>
                          </div>
                            </form>
                            <div id="aboutLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
                          </div>                      
                          <div class="panel-body payment-fieldset tab-body tab-two-body">
                            <form role="form" id="updateInsuranceInfo" name="updateInsuranceInfo" action="" method="post">
                             <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">        
                                        <div class="form-group">
                                            <label for="insurance_name">Insurance Name</label><br/>
                                            <input type="text" class="form-control required" id="insurance_name" value="" name="insurance_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="insurance_id">Insurance ID</label><br/>
                                            <input type="text" class="form-control required email" id="insurance_id" value="" name="insurance_id">
                                        </div>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="insurance_expiry_date">Insurance Expiry Date</label><br/>
                                            <input type="text" class="form-control required" id="insurance_expiry_date" value="" name="insurance_expiry_date">
                                        </div>
                                    </div>                                
                                </div>                          
                             </div><!-- /.box-body --> 
                             <div class="box-footer">
                              <div class="row">
                                  <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" id="saveinsuranceinfobtn" name="saveinsuranceinfobtn" value="Save" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                  </div>
                                  <div class="col-md-5">
                                    <div id="insuranceinfomsg" class="alert"></div>
                                  </div>
                              </div>                         
                             </div>
                           </form>
                           <div id="insuranceinfoLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
                         </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
         