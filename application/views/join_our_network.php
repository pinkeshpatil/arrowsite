<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Join Our Network</h1>          
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
      <center><h3>JOIN OUR PROFESSIONAL NETWORK</h3></center>
      <form method="post" action="<?php echo base_url(); ?>registration">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
          <span class="text-danger"><?php echo form_error('user_name'); ?></span>
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email');  ?>" />
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
        <div class="form-group" style="float: right;">
          <input type="reset" name="reset" value="Reset" class="btn btn-default">
          <input type="submit" name="register" value="Register" class="btn btn-info" />
          
          <div class="hidden-fields">
              <input type="hidden" name="page" id="page" value="join_our_network">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3">
      <?php //$this->load->view('right-sidebar'); ?>
    </div>
  </div>
</div>
