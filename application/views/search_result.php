<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <?php if($this->input->get('s')){ ?>
            <h1 class="page-title">Servies Search Results for: "<?php echo $this->input->get('s'); ?>"</h1>         
          <?php } else { ?>
            <h1 class="page-title">Business Search Results for: "<?php echo $this->input->get('search-service'); ?> in <?php echo $this->input->get('search-city'); ?>"</h1>         
          <?php } ?>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 50px 0;">
    <div class="row">    
        <div class="col-md-2">
            <?php //$this->load->view('left-sidebar'); ?>
        </div>        
        <div class="col-md-8">
          <?php 
              $isEmpty = false;
              if($this->input->get('s') && $this->input->get('s') == "" && $this->input->get('search-service') && $this->input->get('search-service') == ""){ 
                $isEmpty = true;
              } 
              
          ?>
      <?php if($isEmpty == false) { ?>
          <?php if(!empty($servicesSearch)){ ?>
              <div class="row">    
                <div class="col-md-12">
                    <h3>Search results found in Services:</h3>
                </div>
              </div>
              <?php foreach ($servicesSearch as $service) { 
                      $url = $service->service_title;
                      $url = str_replace(' ', '-', $url);
                      $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); 
                      $url = strtolower($url); // Convert to lowercase
              ?>
              <div class="row">    
                <div class="col-md-12">
                  <a href="<?php echo base_url().'user-services/service/'.$url.'/'.md5('service_'.$service->id); ?>"><h4><?php echo $service->service_title; ?></h4></a>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <p><?php echo $service->service_description; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <a href="<?php echo base_url().'user-services/service/'.$url.'/'.md5('service_'.$service->id); ?>">View More</a>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <hr/>
                </div>
              </div>
              <?php } ?>
          <?php } ?>

          <?php if(!empty($eventsSearch)){ ?>
              <div class="row">    
                <div class="col-md-12">
                    <h3>Search results found in Events:</h3>
                </div>
              </div>
              <?php foreach ($eventsSearch as $event) { 
                  $url = $event->event_title;
                  $url = str_replace(' ', '-', $url);
                  $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); 
                  $url = strtolower($url); // Convert to lowercase
              ?>
              <div class="row">    
                <div class="col-md-12">
                  <a href="<?php echo base_url().'calendar/event/'.$url.'/'.md5('eventid_'.$event->event_id); ?>"><h4><?php echo $event->event_title; ?></h4></a>
                </div>
              </div>              
              <div class="row">    
                <div class="col-md-12">
                  <p><b>Date:</b> <?php if($event->event_from_date != $event->event_to_date){ echo $event->event_from_date.' - '.$event->event_to_date; } else { echo $event->event_from_date; } ?></p>
                  <p><b>Time:</b> <?php if($event->event_all_day == 'no'){ echo $event->event_from_time.' - '.$event->event_to_time; } else { echo 'All Day'; } ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <p><b>Address:</b></p>
                  <p><?php echo $event->event_street; ?></p>
                  <p><?php echo $event->event_city.', '.$event->event_state.' '.$event->event_zipcode; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <p><b>Description:</b></p>
                  <p><?php echo $event->event_description; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <a href="<?php echo base_url().'calendar/event/'.$url.'/'.md5('eventid_'.$event->event_id); ?>">View More</a>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <hr/>
                </div>
              </div>
              <?php } ?>
          <?php } ?>

          <?php if(!empty($businessSearch)){ ?>
              <div class="row">    
                <div class="col-md-12">
                    <h3>Search results found in Businesses:</h3>
                </div>
              </div>
              <?php for($i = 0; $i < sizeof($businessSearch); $i++) { ?>
              <div class="row">    
                <div class="col-md-12">
                  <a href="#"><h4><?php echo $businessSearch[$i]['business_name']; ?></h4></a>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <label>Gym Type:</label>
                  <p><?php echo $businessSearch[$i]['business_gym_type']; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <label>Short Bio:</label>
                  <p><?php echo $businessSearch[$i]['business_short_bio']; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <label>Address:</label>
                  <p><?php echo $businessSearch[$i]['business_street_address']; ?></p>
                  <p><?php echo $businessSearch[$i]['business_city'].' '.$businessSearch[$i]['business_state'].' '.$businessSearch[$i]['business_zipcode']; ?></p>
                </div>
              </div>
              <div class="row">    
                <div class="col-md-12">
                  <hr/>
                </div>
              </div>
              <?php } ?>
          <?php } ?>

          <?php if(empty($servicesSearch) && empty($eventsSearch) && empty($businessSearch)){ ?>
            <h2>Result not found.</h2>
          <?php } ?>
    <?php } else { ?>
          <h3>Search term should not empty, plase try again.</h3>
          <form action="<?php echo base_url();?>search" name="srarchForm" id="srarchForm" method="get">
            <div class=" col-xs-5 col-md-4">
              <div class="form-group">
                <input type="text" class="form-control search-field" name="search-service" id="search-service" placeholder="What can we help you find?" data-rule="minlen:4" data-msg="Please enter at least 4 chars of Services" />
              </div>
            </div>
            <div class=" col-xs-5 col-md-4">
              <div class="form-group">
                <input type="text" class="form-control search-field" name="search-city" id="search-city" placeholder="City/Zip (Optional)" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars of City/Zip" />
              </div>
            </div>
            <div class=" col-xs-1 col-md-1" align="center" valign="middle">
              <div class="form-group">
                <input type="submit" class="btn btn-primary" name="search" id="search" value="Search" style="height: 35px;">
              </div>
            </div>          
          </form>
    <?php } ?>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>