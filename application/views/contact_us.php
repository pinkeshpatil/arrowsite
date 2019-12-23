<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Contact Us</h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 50px 0;">
    <div class="row">    
        <div class="col-md-3">
            <?php $this->load->view('left-sidebar'); ?>
        </div>        
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <h4>Office Address:</h4>
              <p><b>Training Block</b></p>
              <p>Florida, US</p>
            </div>
            <div class="col-md-5">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111438.31005560521!2d-81.16665089149241!3d29.21039815293512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e6db9425025683%3A0x366a3bb71dcb2aeb!2sDaytona%20Beach%2C%20FL%2C%20USA!5e0!3m2!1sen!2sin!4v1574080421341!5m2!1sen!2sin" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-1"></div>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">Contact Us</div>
               <div class="panel-body">
                <form method="post" action="<?php echo base_url(); ?>web/contactform">
                 <div class="form-group">
                  <label>Your Name <span class="required-icon">*</span></label>
                  <input type="text" name="contact_name" class="form-control" value="<?php echo set_value('contact_name'); ?>" />
                  <span class="text-danger"><?php echo form_error('contact_name'); ?></span>
                 </div>
                 <div class="form-group">
                  <label>Your Email <span class="required-icon">*</span></label>
                  <input type="text" name="contact_email" class="form-control" value="<?php echo set_value('contact_email'); ?>" />
                  <span class="text-danger"><?php echo form_error('contact_email'); ?></span>
                 </div>
                 <div class="form-group">
                  <label>Message <span class="required-icon">*</span></label>
                  <textarea name="cotact_message" class="form-control"><?php echo set_value('cotact_message'); ?></textarea>                  
                  <span class="text-danger"><?php echo form_error('cotact_message'); ?></span>
                 </div>
                 <div class="form-group" style="float: right;">
                  <input type="submit" name="send" value="Send" class="btn btn-info" />
                 </div>
                 <div class="form-group" style="width: 70%;">
                    <?php echo $this->session->flashdata('contactform_submit_msg'); ?>
                 </div>
                </form>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
            <?php $this->load->view('right-sidebar'); ?>
        </div>        
    </div>
</div>