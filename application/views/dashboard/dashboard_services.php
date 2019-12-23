
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="info-title">Summary of Your Listed Services</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12">
		              <div id="serviceinfo-view" style="display: block;">
		                        <div class="box-body">
		                            <div class="row">
		                                <div class="col-md-4">         
		                                    <div class="form-group">
		                                        <label for="service-title">Title</label>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="service-description">Description</label>
		                                    </div>
		                                </div>
		                                <div class="col-md-2">
		                                </div>
		                            </div>   
		                          <?php 
		                            if(isset($services)){ 
		                              foreach($services as $service){
		                          ?>   
		                            <div class="row" id="service_<?php echo $service['id']; ?>">
		                                <div class="col-md-4">         
		                                    <div class="form-group service_title_div">
		                                        <label for="service-title"><?php echo $service['service_title']; ?></label>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group service_description_div">
		                                        <label for="service-description"><?php echo $service['service_description']; ?></label>
		                                    </div>
		                                </div>
		                                <div class="col-md-2">
		                                  <a href="javascript:void(0)" id="<?php echo $service['id']; ?>" class="editService" title="Edit Service"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteServiceModal" data-userid="<?php echo $service['id']; ?>" title="Delete Service"></span></a>
		                                </div>
		                            </div> 
		                          <?php
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
		                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById('service_picture').click();">Upload Picture</a></p>
		                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_picture" id="service_picture"></p>
		                                    </div>
		                                </div>
		                              </div>
		                        </div><!-- /.box-body -->
		                        <div class="box-footer">
		                          <div class="row">
		                              <div class="col-md-12">
		                                <input type="submit" class="btn btn-primary" id="saveserviceinfobtn" name="saveserviceinfobtn" value="Save" />
		                                <input type="reset" class="btn btn-default" value="Reset" />
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
		                <div id="ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
		            </div>
              </div>
            </div>
        