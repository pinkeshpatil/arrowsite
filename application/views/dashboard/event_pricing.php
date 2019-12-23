<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Pricing</h2> <a href="javascript:void(0)" id="eventpricingEditBtn" onclick="makeEditable('eventpricingEditBtn', 'eventpricing-view', 'eventpricing-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="eventpricing-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="eventPricingBox">
                               <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <?php if($event->event_fees){ ?>
                                        <h4>Fees</h4>
                                        <label>$<?php echo $event->event_fees; ?></label>
                                        <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                          </div>              
                        </div><!-- /.box-body -->
                </div>
                <div id="eventpricing-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateEventPricing" name="updateEventPricing" action="" method="post">
                        <div class="box-body">                             
                              <div class="row">
                                <div class="col-md-12">
                                  <h4>Event Pricing</h4>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Fees</label>
                                    <input type="text" name="event_fees" id="event_fees" class="form-control" value="<?php echo $event->event_fees;  ?>" />
                                  </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="saveEventpricingbtn" name="saveEventpricingbtn" value="Save" />
                                <input type="reset" class="btn btn-default resetBtn" value="Reset" />
                                <div class="hidden-fields">
                                  <input type="hidden" name="event_id" id="event_id" value="<?php echo $event->event_id; ?>">
                                </div>
                              </div>
                          </div>
                          <br/>
                          <div class="row">
                              <div class="col-md-12">
                                <div id="eventpricingmsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="eventPricing_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          