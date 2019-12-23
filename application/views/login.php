<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Login</h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 50px 0;">
    <div class="row">    
        <div class="col-md-3">
            <?php //$this->load->view('left-sidebar'); ?>
        </div> 
        <div class="col-md-6">
            <div class="panel panel-default login-panel">
                <?php 
                      $isLogin = 'block'; 
                      $isRegister = 'none';
                      if(!isset($communityForm)){
                        $isLogin = 'block'; 
                        $isRegister = 'none'; 
                        $classLogin = 'active';
                        $classRegister = '';                             
                      } else { 
                        $isLogin = 'none'; 
                        $isRegister = 'block';
                        $classLogin = '';
                        $classRegister = 'active'; 
                      } 

                      if(isset($activeSection)){
                        if($activeSection['loginActive']){
                          $isLogin = 'block'; 
                          $isRegister = 'none';
                          $classLogin = 'active';
                          $classRegister = '';
                        } else {
                          $isLogin = 'none'; 
                          $isRegister = 'block';
                          $classLogin = '';
                          $classRegister = 'active';
                        }
                      }
                ?>
                <div class="row">    
                    <div class="col-md-3 <?php echo $classLogin; ?>">
                        <div class="panel-heading" id="login-btn">Login</div>
                    </div>
                    <div class="col-md-3 <?php echo $classRegister; ?>">
                        <div class="panel-heading" id="register-btn">Sign Up</div>
                    </div>
                    <div class="col-md-6">
                    
                    </div>
                </div>                
                <div class="panel-body login-panel-body" style="display: <?php echo $isLogin; ?>">
                    <?php
                    if($this->session->flashdata('message'))
                    {
                        echo '
                        <div class="alert alert-success">
                            '.$this->session->flashdata("message").'
                        </div>
                        ';
                    }
                    ?>
                    <form method="post" action="<?php echo base_url(); ?>login/validation">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                            <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                            <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Forgot Password?</a>
                            <div class="hidden-fields">
                              <?php if($_GET['page'] === null) { ?>
                                <input type="hidden" name="page" id="page" value="<?php echo base_url(); ?>">
                              <?php } else { ?> 
                              <input type="hidden" name="page" id="page" value="<?php echo $_GET['page']; ?>"> 
                              <?php } ?>  
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body register-panel-body" style="display:  <?php echo $isRegister; ?>">
                    <form method="post" action="<?php echo base_url(); ?>registration">
                     <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="user_name" class="form-control" value="<?php if(isset($communityForm)){ echo $communityForm['name']; } else { echo set_value('user_name'); } ?>" />
                      <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                     </div>
                     <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" name="user_email" class="form-control" value="<?php if(isset($communityForm)){ echo $communityForm['email']; } else { echo set_value('user_email'); } ?>" />
                      <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                     </div>
                     <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                      <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                     </div>
                     <div class="form-group">
                      <label>Re-type Password</label>
                      <input type="password" name="re_type_user_password" class="form-control" value="<?php echo set_value('re_type_user_password'); ?>" />
                      <span class="text-danger"><?php echo form_error('re_type_user_password'); ?></span>
                     </div>
                     <div class="form-group">
                       <div class="row">    
                        <div class="col-md-6" style="padding-top: 10px;"> 
                          <input type="checkbox" name="athlete_user" id="athlete_user" value="1" checked="checked" <?php echo set_checkbox('athlete_user', '1'); ?>>
                          <label style="vertical-align:middle;">Athlete</label>
                        </div>
                        <div class="col-md-6" style="padding-top: 10px;"> 
                          <input type="checkbox" name="business_user" id="business_user" value="2" checked="checked" <?php echo set_checkbox('business_user', '2'); ?>>
                          <label style="vertical-align:middle;">Bussiness</label>
                        </div>
                      </div>
                      <span class="text-danger"><?php echo form_error('athlete_user'); ?></span>
                     </div>
                     <div class="form-group">
                      <input type="submit" name="register" value="Register" class="btn btn-info" />
                      <div class="hidden-fields">
                          <input type="hidden" name="page" id="page" value="login">
                      </div>
                     </div>
                    </form>
                   </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php //$this->load->view('right-sidebar'); ?>
        </div>
    </div>
</div>
