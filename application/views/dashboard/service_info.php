<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Services</h2> <a href="javascript:void(0)" id="serviceinfoEditBtn" onclick="makeEditable('serviceinfoEditBtn', 'serviceinfo-view', 'serviceinfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="serviceinfo-view" style="display: block;">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">         
                                    <div class="form-group">
                                        <label for="service-title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="service-pricing">Pricing ($)</label>
                                    </div>
                                </div>
                                <div class="col-md-3">         
                                    <div class="form-group">
                                        <label for="service-categories">Categories</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>   
                          <?php 
                            if(isset($services)){ 
                              foreach($services as $service){
                                if($service['id'] != ''){
                          ?>   
                            <div class="row" id="service_<?php echo $service['id']; ?>">
                                <div class="col-md-5">         
                                        <label for="service-title"><?php echo $service['service_title']; ?></label>
                                </div>
                                <div class="col-md-2">
                                        <label for="service-pricing"><?php echo $service['service_pricing']; ?></label>
                                </div>
                                <div class="col-md-3" style="padding: 5px;">
                                        <label for="service-category" style="word-break: break-all;"><?php echo $service['service_category']; ?></label>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="<?php echo $service['id']; ?>" class="editService" title="Edit Service"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteServiceModal" data-serviceid="<?php echo $service['id']; ?>" title="Delete Service"></span></a>
                                </div>
                            </div> 
                          <?php
                                }
                              }
                            } 
                          ?>              
                        </div><!-- /.box-body -->
                </div>
                <div id="serviceinfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateServiceInfo" name="updateServiceInfo" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">                            
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="service-title">Add New Service</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="service-title">Title</label>
                                        <input type="text" class="form-control required" value="" id="service-title" name="service-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-description">Description</label>
                                        <textarea class="form-control" name="service-description" id="service-description"></textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-thumbnail">Upload Thumbnail Picture</label>
                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById('service_picture').click();"><span class="fa fa-picture-o" style="font-size: 25px;"></span></a></p>
                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_picture" id="service_picture"></p>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-media">Upload Pictures/Videos</label>
                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById('service_media').click();"><span class="fa fa-picture-o" style="font-size: 25px;"></span></a></p>
                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_media[]" id="service_media" multiple="multiple"></p>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-pricing">Pricing ($)</label>
                                        <input type="text" class="form-control required" value="" id="service-pricing" name="service-pricing">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-pricing">Categories</label>
                                        <select class="form-control" name="service-category[]" id="service-category" multiple="multiple">
                                          <option value="Athletic Training">Athletic Training</option>
                                          <option value="Chiropractic Services">Chiropractic Services</option>
                                          <option value="Coaching">Coaching</option>
                                          <option value="Gym">Gym</option>
                                          <option value="Nutrition">Nutrition</option>
                                          <option value="Personal Training">Personal Training</option>
                                          <option value="Physical Therapy">Physical Therapy</option>
                                          <option value="Other">Other</option>
                                        </select>  
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="saveserviceinfobtn" name="saveserviceinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default resetBtn" value="Reset" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                <div id="serviceinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="serviceinfo-update" style="display: none;">
                </div>
                <div id="serviceInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          