<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title"><?php echo $event->event_title; ?></h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-4">
          <?php $this->load->view('event-page-left-sidebar'); ?>
        </div>
        <div class="col-md-8">
              <div class="row">
                   <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <h2><?php echo $event->event_title; ?></h2>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php if($event->event_email) { echo 'Email: <label>'.$event->event_email.'</label>'; } ?>
                            <br/>
                            <?php if($event->event_phone) { echo 'Phone #: <label>'.$event->event_phone.'</label>'; } ?>
                            <?php if($event->event_website) { echo '<br/>Website: <label><a href="'.$event->event_website.'" target="_blank">'.$event->event_website.'</a></label>'; } ?>
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                            Date: <label><?php if($event->event_from_date != $event->event_to_date){ echo $event->event_from_date .' - '. $event->event_to_date;  } else { echo $event->event_from_date; } ?> </label><br/>
                            Time: <label><?php if($event->event_all_day == 'no'){ echo $event->event_from_time .' - '. $event->event_to_time;  } else { echo 'All Day'; } ?> </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <h4>Event Location</h4>
                            <label><?php echo $event->event_street; ?>,<br/><?php echo $event->event_city; ?>, <?php echo $event->event_state; ?> - <?php echo $event->event_zipcode; ?></label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php if($event->event_fees){ ?>
                            <h4>Fees</h4>
                            <label>$<?php echo $event->event_fees; ?></label>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <?php if($event->event_description){ ?>
                      <div class="row">
                        <div class="col-md-12">
                          <h4>Description</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><?php echo $event->event_description; ?></label>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="row">
                        <div class="col-md-12">
                          <h4>Event Images</h4>                          
                          <?php 
                            if(!empty($eventImages)){ 
                              $no = 1;
                              foreach($eventImages as $image){
                                if($image->image_name != ""){
                          ?> 
                                <div class="col-md-4">         
                                    <div class="form-group">
                                        <a href="<?php echo base_url().'assets/uploads/events-images/'.$image->image_name; ?>" target="_blank"><img src="<?php echo base_url().'assets/uploads/events-images/'.$image->image_name; ?>" class="img-responsive" style="width:200px;height: 200px;"></a>
                                    </div>
                                </div>
                          <?php
                                  }
                              if($no % 3 == 0){
                                echo '</div><div class="row">';
                              }
                              $no++;
                              }
                            }
                          ?>
                        </div>
                      </div>
                   </div>
              </div>
        </div>
    </div>     
</div>
