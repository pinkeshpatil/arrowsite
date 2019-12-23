<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Pricing</h2> <a href="javascript:void(0)" id="packagesinfoEditBtn" onclick="makeEditable('packagesinfoEditBtn', 'packagesinfo-view', 'packagesinfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="packagesinfo-view" style="display: block;">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">         
                                    <div class="form-group">
                                        <label for="packages-title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="packages-description">Cost</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>   
                          <?php 
                            if(isset($packages)){ 
                              foreach($packages as $package){
                                if($package['id'] != ''){
                          ?>   
                            <div class="row" id="package_<?php echo $package['id']; ?>">
                                <div class="col-md-4">         
                                    <div class="form-group package_title_div">
                                        <label for="packages-title"><?php echo $package['package_title']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group package_cost_div">
                                        <label for="packages-cost"><?php echo $package['package_cost']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="<?php echo $package['id']; ?>" class="editPackage" title="Edit Package"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deletePackageModal" data-packageid="<?php echo $package['id']; ?>" title="Delete Package"></span></a>
                                </div>
                            </div> 
                          <?php
                                }
                              }
                            } 
                          ?>              
                        </div><!-- /.box-body -->
                </div>
                <div id="packagesinfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updatePackageInfo" name="updatePackageInfo" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="packages-title">Add New Package</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="packages-title">Title</label>
                                        <input type="text" class="form-control required" value="" id="package-title" name="package-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="package-cost">Cost</label>
                                        <input type="text" class="form-control" name="package-cost" id="package-cost">
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="savepackageinfobtn" name="savepackageinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12"><br/>
                                <div id="packageinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                
                <div id="packageInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          