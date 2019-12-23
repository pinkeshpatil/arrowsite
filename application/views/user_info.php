<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">My Info</h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <!-- Section 1 -->
        <div class="col-md-6">
          <?php $this->load->view('bio_data'); ?>
          <?php //$this->load->view('review_data'); ?>
        </div>  
        <!-- Section 2 -->
        <div class="col-md-6">
          <?php $this->load->view('payment_data'); ?>
          <?php $this->load->view('shareable_data'); ?>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php $this->load->view('booking_data'); ?>
      </div>
    </div>
</div>



