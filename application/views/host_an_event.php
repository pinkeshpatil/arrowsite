<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Host An Event!</h1>          
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
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <?php echo $this->session->flashdata('event_submit_msg_success'); ?>
                        <?php echo $this->session->flashdata('event_submit_msg_fail'); ?>
                    </div>
                  </div>
                </div>
            <form method="post" action="<?php echo base_url(); ?>add_event"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <h3>Event Details</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" name="event_title" id="event_title" class="form-control" value="<?php echo set_value('event_title'); ?>" />
                    <span class="text-danger"><?php echo form_error('event_title'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event Email</label>
                    <input type="text" name="event_email" id="event_email" class="form-control" value="<?php echo set_value('event_email');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_email'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event Phone</label>
                    <input type="text" name="event_phone" id="event_phone" class="form-control digital" value="<?php echo set_value('event_phone'); ?>" />
                    <span class="text-danger"><?php echo form_error('event_phone'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Event Website/Link</label>
                    <input type="text" name="event_website" id="event_website" class="form-control" value="<?php echo set_value('event_website'); ?>" />
                    <span class="text-danger"><?php echo form_error('event_website'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Event Pricing</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Fees</label>
                    <input type="text" name="event_fees" id="event_fees" class="form-control" value="<?php echo set_value('event_fees');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_fees'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Event Date & Time</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date From</label>
                    <input type="date" name="event_from_date" id="event_from_date" class="form-control" value="<?php echo set_value('event_from_date');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_from_date'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date To</label>
                    <input type="date" name="event_to_date" id="event_to_date" class="form-control digital" value="<?php echo set_value('event_to_date'); ?>" />
                    <span class="text-danger"><?php echo form_error('event_to_date'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Time From</label>
                    <select name="event_from_time" id="event_from_time" class="form-control">
                      <?php
                        $ampm = "AM";
                        $bool = true;
                        for($hours=0; $hours<12; $hours++) {
                            for($mins=0; $mins<60; $mins+=15) {
                                if($hours == 0){
                                  $hour = '12';
                                } else {
                                  $hour = str_pad($hours,2,'0',STR_PAD_LEFT);
                                }
                                $time = $hour.':'.str_pad($mins,2,'0',STR_PAD_LEFT).' '.$ampm;
                                echo '<option value="'.$time.'" '.set_select('event_from_time', $time, False).'>'.$time.'</option>';
                            }
                            if($hours == 11 && $bool == true){
                              $hours = 0;
                              $ampm = "PM";
                              $bool = false;
                            }
                        }
                      ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('event_from_time'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Time To</label>
                    <select name="event_to_time" id="event_to_time" class="form-control">
                      <?php
                        $ampm = "AM";
                        $bool = true;
                        for($hours=0; $hours<12; $hours++) {
                            for($mins=0; $mins<60; $mins+=15) {
                                if($hours == 0){
                                  $hour = '12';
                                } else {
                                  $hour = str_pad($hours,2,'0',STR_PAD_LEFT);
                                }
                                $time = $hour.':'.str_pad($mins,2,'0',STR_PAD_LEFT).' '.$ampm;
                                echo '<option value="'.$time.'" '.set_select('event_to_time', $time, False).'>'.$time.'</option>';
                            }
                            if($hours == 11 && $bool == true){
                              $hours = 0;
                              $ampm = "PM";
                              $bool = false;
                            }
                        }
                      ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('event_to_time'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="custom-control custom-checkbox" style="margin-top: 30px;text-align: center;">                    
                    <input type="checkbox" name="event_all_day" id="event_all_day" class="custom-control-input" value="1" <?php echo set_checkbox('event_all_day', '1'); ?>>
                    <label class="form-check-label">All Day</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Event Location</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Street Address</label>
                    <input type="text" name="event_street_address" id="event_street_address" class="form-control" value="<?php echo set_value('event_street_address');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_street_address'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>City/Town</label>
                    <input type="text" name="event_city" id="event_city" class="form-control" value="<?php echo set_value('event_city');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_city'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>State</label>
                    <select name="event_state" id="event_state" class="form-control">
                      <option value="florida">Florida</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('event_city'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Zipcode</label>
                    <input type="text" name="event_zipcode" id="event_zipcode" class="form-control" value="<?php echo set_value('event_zipcode');  ?>" />
                    <span class="text-danger"><?php echo form_error('event_zipcode'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="event_description" id="event_description" class="form-control"><?php echo set_value('event_description'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('event_description'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Event Images</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Upload Images</label>
                    <input type="file" name="event_images[]" id="event_images" class="form-control" value="<?php echo set_value('event_images');  ?>" multiple="multiple"/>
                    <span class="text-danger"><?php echo form_error('event_images'); ?></span>
                  </div>
                  <div id="event_images_preview">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Agreement:</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div id="agreementBox">
                    Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa.<br/>
                    Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa.<br/>
                    Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock.<br/><br/>
                    
                    <input type="checkbox" name="agreement" id="agreement" value="1" <?php echo set_checkbox('agreement', '1'); ?>> <b>I agree.</b>
                  </div>
                  <span class="text-danger"><?php echo form_error('agreement'); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" style="float: right;">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    <input type="submit" name="event_submit" value="Submit" class="btn btn-info" />
                    
                  </div>
                </div>                
              </div>
            </form>
        </div>
        <div class="col-md-3">
          <?php //$this->load->view('right-sidebar'); ?>
        </div>
           
    </div>
</div>
