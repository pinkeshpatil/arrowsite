<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Description</h2> <a href="javascript:void(0)" id="eventinfoEditBtn" onclick="makeEditable('eventinfoEditBtn', 'eventinfo-view', 'eventinfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="eventinfo-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="eventInfoBox">
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
                               </div>
                          </div>              
                        </div><!-- /.box-body -->
                </div>
                <div id="eventinfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateEventInfo" name="updateEventInfo" action="" method="post">
                        <div class="box-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Event Title</label>
                                    <input type="text" name="event_title" id="event_title" class="form-control" value="<?php echo $event->event_title; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Event Email</label>
                                    <input type="text" name="event_email" id="event_email" class="form-control" value="<?php echo $event->event_email;  ?>" />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Event Phone</label>
                                    <input type="text" name="event_phone" id="event_phone" class="form-control digital" value="<?php echo $event->event_phone; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Event Website/Link</label>
                                    <input type="text" name="event_website" id="event_website" class="form-control" value="<?php echo $event->event_website; ?>" />
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
                                    <input type="date" name="event_from_date" id="event_from_date" class="form-control" value="<?php echo $event->event_from_date;  ?>" />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Date To</label>
                                    <input type="date" name="event_to_date" id="event_to_date" class="form-control digital" value="<?php echo $event->event_to_date; ?>" />
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
                                                if($event->event_from_time == $time){
                                                  $selected = 'selected="selected"';
                                                } else {
                                                  $selected = '';
                                                }
                                                echo '<option value="'.$time.'" '.$selected.'>'.$time.'</option>';
                                            }
                                            if($hours == 11 && $bool == true){
                                              $hours = 0;
                                              $ampm = "PM";
                                              $bool = false;
                                            }
                                        }
                                      ?>
                                    </select>
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
                                                if($event->event_from_time == $time){
                                                  $selected = 'selected="selected"';
                                                } else {
                                                  $selected = '';
                                                }
                                                echo '<option value="'.$time.'" '.$selected.'>'.$time.'</option>';
                                            }
                                            if($hours == 11 && $bool == true){
                                              $hours = 0;
                                              $ampm = "PM";
                                              $bool = false;
                                            }
                                        }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="custom-control custom-checkbox" style="margin-top: 30px;text-align: center;">  
                                    <?php
                                      if($event->event_all_day == 'yes'){
                                        $checked = 'checked="checked"';
                                      } else {
                                        $checked = '';
                                      }
                                    ?>                  
                                    <input type="checkbox" name="event_all_day" id="event_all_day" class="custom-control-input" value="1" <?php echo $checked; ?>>
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
                                    <input type="text" name="event_street_address" id="event_street_address" class="form-control" value="<?php echo $event->event_street;  ?>" />                                    
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>City/Town</label>
                                    <input type="text" name="event_city" id="event_city" class="form-control" value="<?php echo $event->event_city;  ?>" />
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>State</label>
                                    <select name="event_state" id="event_state" class="form-control">
                                      <option value="florida">Florida</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" name="event_zipcode" id="event_zipcode" class="form-control" value="<?php echo $event->event_zipcode;  ?>" />
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
                                    <textarea name="event_description" id="event_description" class="form-control"><?php echo $event->event_description; ?></textarea>
                                  </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="saveEventinfobtn" name="saveEventinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default resetBtn" value="Reset" />
                                <div class="hidden-fields">
                                  <input type="hidden" name="event_id" id="event_id" value="<?php echo $event->event_id; ?>">
                                </div>
                              </div>
                          </div>
                          <br/>
                          <div class="row">
                              <div class="col-md-12">
                                <div id="eventinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="eventInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          