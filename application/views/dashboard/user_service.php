<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="heading">
        <h1 class="page-title"> <?php if(isset($user['name'])){ echo $user['name']; } ?></h1>          
      </div>
    </div>
    <div class="col-md-6">
      <?php $this->load->helper("form"); ?>
      <form role="form" id="updatePackageInfo" name="updatePackageInfo" action="" method="post" style="margin-top: 15px;">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <select class="form-control" name="service_category" id="service_category">
                <option value="Athletic Training">Athletic Training</option>
                <option value="Chiropractic Services">Chiropractic Services</option>
                <option value="Coaching">Coaching</option>
                <option value="Gym">Gym</option>
                <option value="Nutrition">Nutrition</option>
                <option value="Personal Training">Personal Training</option>
                <option value="Physical Therapy">Physical Therapy</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="submit" name="submit-header" id="submit-header" class="btn btn-default" value="Filter">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-12">
              <div class="row">
                  <div class="col-md-7" style="margin-left: 6px;margin-right: 6px;">
                      <?php $this->load->view('dashboard/user_service_info'); ?>
                      <?php $this->load->view('dashboard/user_service_media'); ?>
                  </div>
                  <div class="col-md-4" style="margin-left: 6px;margin-right: 6px;">
                    <?php if($this->session->userdata('id') !== null){ ?>
                    <form role="form" id="saveServiceBookingForm" name="saveServiceBookingForm" action="" method="post">  
                    <?php } ?>
                      <?php $this->load->view('dashboard/user_service_booking'); ?>
                      <?php $this->load->view('dashboard/user_service_pricing'); ?>
                      <?php $this->load->view('dashboard/user_service_book_btn'); ?>
                    <?php if($this->session->userdata('id') !== null){ ?>
                      <input type="hidden" name="service_id" id="service_id" value="<?php echo $user_service['id']; ?>">
                      <input type="hidden" name="service_star_rating" id="service_star_rating" value="0">
                      <input type="hidden" name="user_loggedin" id="user_loggedin" value="true">                      
                    </form>
                    <?php } ?>
                    <input type="hidden" name="user_loggedin" id="user_loggedin" value="false">  
                    <div id="servicebooking_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
                  </div>
              </div>              
        </div>
    </div>   
     <div class="row">    
        <div class="col-md-12">
              <div class="row">
                  <div class="col-md-5">
                    <?php $this->load->view('dashboard/user_service_star_rating'); ?>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-5">
                    <?php $this->load->view('dashboard/client_reviews'); ?>
                  </div>
              </div>
        </div>
    </div>
</div>