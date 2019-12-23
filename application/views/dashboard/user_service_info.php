<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Description & Pricing</h2> 
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="serviceinfo-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="eventInfoBox">
                               <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <h2><?php echo $user_service['service_title']; ?></h2>
                                      </div>
                                    </div>
                                  </div>
                                  <?php if(!file_exists(base_url().'assets/uploads/services-images/'.$user_service['service_image']) && $user_service['service_image'] != ''){  ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <img src="<?php echo base_url().'assets/uploads/services-images/'.$user_service['service_image']; ?>" height="200" width="200">
                                      </div>
                                    </div>
                                  </div>
                                  <?php } ?>
                                  <?php if($user_service['service_description']){ ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Description</h4>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label><?php echo $user_service['service_description']; ?></label>
                                      </div>
                                    </div>
                                  </div>
                                  <?php } ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Category</h4>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label><?php echo $user_service['service_category']; ?></label>
                                      </div>
                                    </div>
                                  </div>
                               </div>
                          </div>              
                        </div><!-- /.box-body -->
                </div>
            </div>
          </div>

          