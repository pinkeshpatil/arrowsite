      <div id="login-bg">
        <div class="light-bg">
            <div class="container">
              <div class="row">
                <div class="login-bg-heading">
                  <h1 class="page-title">Basic Information</h1>          
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="container" style="padding: 100px 0;">
          <div class="row">                
            <div class="col-md-3">
            	<?php $this->load->view('left-sidebar'); ?>
            </div>
            <div class="col-md-6">
              <div>
                <!-- form start -->
                <?php if(isset($registredUser)){ ?>
                  <h3>Hi <?php echo $registredUser['name']; ?>, complete your profile with basic information.</h3>
                <?php } else { ?>
                  <h3>Hi, complete your profile with basic information.</h3>
                <?php } ?>
                <?php $this->load->helper("form"); ?>
                <form role="form" id="addBasicInfo" name="addBasicInfo" action="<?php echo base_url('login/addBasicInfo'); ?>" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">         
                      <div class="form-group">
                        <label for="about_dob">Date of Birth</label>   
                        <input type="date" class="form-control required date" id="about_dob" value="<?php echo set_value('about_dob'); ?>" name="about_dob"  data-provide="datepicker">
                        <span class="text-danger"><?php echo form_error('about_dob'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="about_prs">PRS</label>   
                        <input type="text" class="form-control required" id="about_prs" value="<?php echo set_value('about_prs'); ?>" name="about_prs">
                        <span class="text-danger"><?php echo form_error('about_prs'); ?></span>
                      </div>
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
                        <input type="text" class="form-control required" id="about_street" value="<?php echo set_value('about_street'); ?>" name="about_street">
                        <span class="text-danger"><?php echo form_error('about_street'); ?></span>
                      </div>                                    
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="about_city">City</label><br/>
                        <input type="text" class="form-control required" id="about_city" value="<?php echo set_value('about_city'); ?>" name="about_city">
                        <span class="text-danger"><?php echo form_error('about_city'); ?></span>
                      </div>                                    
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="about_state">State</label><br/>   
                        <select name="about_state" id="about_state" class="form-control">
                          <option value="florida">Florida</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('about_state'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="about_zipcode">Zipcode</label><br/>
                        <input type="text" class="form-control required" id="about_zipcode" value="<?php echo set_value('about_zipcode'); ?>" name="about_zipcode">
                        <span class="text-danger"><?php echo form_error('about_zipcode'); ?></span>
                      </div>                                    
                    </div>
                  </div>                          
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-7">
                      <input type="submit" class="btn btn-primary" id="saveaboutbtn" name="saveaboutbtn" value="Procced" />
                      <input type="reset" class="btn btn-default" value="Reset" />
                      <div class="hidden-fields">
                        <input type="hidden" name="registeredId" id="registeredId" value="<?php if(isset($registredUser)){ echo $registredUser['id']; } ?>">
                        <input type="hidden" name="registeredName" id="registeredName" value="<?php if(isset($registredUser)){ echo $registredUser['name']; } ?>">
                        <input type="hidden" name="page" id="page" value="basic_information">
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
          </div>
          <div class="col-md-3">
          	<?php $this->load->view('right-sidebar'); ?>
          </div>
        </div>
      </div>  
         