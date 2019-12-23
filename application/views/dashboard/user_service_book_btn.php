<!-- Section 1/1 -->
          <div class="row">
            <div class="col-md-12">
              <div id="photos-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="">
                               <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <?php if($this->session->userdata('id') !== null){ ?>
                                          <input type="submit" class="btn btn-primary" id="bookservicebtn" name="bookservicebtn" value="Book Appointment" style="width: 180px;">
                                        <?php } else { ?>
                                          <b>To book this service appointment, please <a href="<?php echo base_url('login'); ?>?page=<?php echo current_url(); ?>">login here</a>.</b>
                                        <?php } ?>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div id="servicebookingmsg" class="alert"></div>
                                      </div>
                                  </div>
                                  </div>
                               </div>
                          </div>              
                        </div><!-- /.box-body -->
                </div>
            </div>
          </div>
          

          