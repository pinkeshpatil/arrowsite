<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Calendar</h2> <!-- <a href="javascript:void(0)" id="servicavailabilityEditBtn" onclick="makeEditable('servicavailabilityEditBtn', 'serviceavailability-view', 'serviceavailability-edit');" style="float: right;">Edit</a> -->
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="serviceavailability-view" style="display: block;">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">         
                                    <div class="form-group calendarBox">
                                        <?php echo $this->calendar->generate($year, $month, $calendarData); ?>
                                    </div>
                                </div>
                            </div>                                                
                        </div><!-- /.box-body -->
                </div>
                <div id="serviceavailability-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateServiceMedia" name="updateServiceMedia" action="" method="post">
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="services-serviceavailability"></label>
                                        
                                    </div>                                    
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="saveservicemediabtn" name="saveservicemediabtn" value="Upload" />
                                
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <div id="serviceinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="bioLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>