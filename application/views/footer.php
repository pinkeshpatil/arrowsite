  <?php if($this->session->userdata('id')) { ?>
      
  <?php } else { ?>
  <div id="about-bg">
    <div class="container">
      <div class="row">
        <div class="join-community-bg-heading">
          <h1 style="text-align: center;">Want To Stay In The Know? Sign Up For Our Newsletter</h1>
          <div class="spacer50"></div>
        </div>

        <div class=" col-xs-12 col-md-4">
          <div class="join-community-bg-wrapper">
              
          </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="join-community-bg-wrapper">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <form action="<?php echo base_url('login'); ?>" method="post" role="form" class="form joinCommunityForm">
                <div class="row">
                  <div class="col-md-2" style="vertical-align: middle;">
                    <label>Name:</label>
                  </div>
                  <div class="col-md-10"> 
                    <div class="form-group">                   
                      <input type="text" name="join-community-name" class="form-control" id="join-community-name" placeholder="Name" data-rule="minlen:4"
                        data-msg="Please enter at least 4 chars" />
                      <div class="validation"></div>
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-2" style="vertical-align: middle;">
                    <label>Email:</label>
                  </div>
                  <div class="col-md-10"> 
                    <div class="form-group">                      
                      <input type="email" class="form-control" name="join-community-email" id="join-community-email" placeholder="Email" data-rule="email"
                        data-msg="Please enter a valid email" />
                      <div class="validation"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="text-align: center;">
                  <div class="submit">
                    <button class="btn btn-default" type="submit">Continue</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <div class=" col-xs-12 col-md-4">
          <div class="join-community-bg-wrapper">
          </div>
        </div>
      </div>
    </div>  
    <div class="cover"></div>
  </div>
<?php } ?>
  <section class="top-nav hidden-xs" style="border-top: 1px solid #01b1d7;border-bottom: none;padding-top: 10px;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="top-left">
               <p><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a> | <a href="<?php echo base_url('our_story'); ?>">Our Story</a> | <a href="<?php echo base_url('our_cities'); ?>">Our Cities</a> | <a href="<?php echo base_url('get_involed'); ?>">Get Involed</a> | <a href="<?php echo base_url('signup_newsletter'); ?>">Sign Up for Newsletter</a></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="top-right">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>                
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="top-nav hidden-xs" style="border-top: 1px solid #01b1d7;border-bottom: none;padding-top: 10px;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="top-left">
               <p>Copyright 2019 <b>TrainingBlock</b> - All Rights Reserved.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="top-right">
                <p><a href="#">Privacy Policy</a> | <a href="#">Site Terms & Disclosures</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- jQuery -->
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.flexslider.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.inview.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.mousewheel.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.carousel-1.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/contactform.js'); ?>"></script>

  <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').carousel({hAlign:'center', vAlign:'center', hMargin:0.9, frontWidth:300, frontHeight:600, carouselWidth:1340, carouselHeight:660, directionNav:true, description:true, descriptionContainer:'.description', backOpacity:0.5});
        });
  </script>
</body>
</html>
