<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Photos/Videos</h2> <a href="javascript:void(0)" id="servicmedisEditBtn" onclick="makeEditable('servicmedisEditBtn', 'servicemedia-view', 'servicemedia-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="servicemedia-view" style="display: block;">
                        <div class="box-body">
                          <div class="row">
                          <?php 
                            if(isset($services)){ 
                              $no = 1;
                              foreach($services as $service){
                                if($service['service_image'] != ""){
                          ?> 
                                <div class="col-md-4">         
                                    <div class="form-group">
                                        <img src="<?php echo base_url().'assets/uploads/services-images/'.$service['service_image']; ?>" class="img-responsive" style="width:100px;height: 100px;">
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
                                                       
                        </div><!-- /.box-body -->
                </div>
                <div id="servicemedia-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateServiceMedia" name="updateServiceMedia" action="" method="post">
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="services-photos">Photos</label>
                                        
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-videos">Videos</label>
                                        
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