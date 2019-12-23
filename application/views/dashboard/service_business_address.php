<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Business Address</h2> <a href="javascript:void(0)" id="businessinfoEditBtn" onclick="makeEditable('businessinfoEditBtn', 'businessinfo-view', 'businessinfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="businessinfo-view" style="display: block;">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">         
                                    <div class="form-group" id="addressInfoBox">
                                      <?php if($business_address){ ?>
                                        <label for="business-address">
                                          <?php echo $business_address['street_address']; ?>
                                        </label>
                                        <label for="business-address">
                                          <?php echo $business_address['city']." ".$business_address['state']." ".$business_address['zipcode']; ?>
                                        </label>
                                      <?php } else { ?>
                                        <label for="business-address">Address not saved.</label>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>     
                        </div><!-- /.box-body -->
                </div>
                <div id="businessinfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateBusinessAddressInfo" name="updateBusinessAddressInfo" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body"> 
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="street_address">Street Address</label>
                                        <input type="text" class="form-control required" value="<?php echo $business_address['street_address']; ?>" id="street_address" name="street_address">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control required" value="<?php echo $business_address['city']; ?>" id="city" name="city">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state" id="state">
                                          <option value="florida">Florida</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city">Zipcode</label>
                                        <input type="text" class="form-control required" value="<?php echo $business_address['zipcode']; ?>" id="zipcode" name="zipcode">
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="savebusniessinfobtn" name="savebusniessinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12"><br/>
                                <div id="busniessAddressinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                
                <div id="businessAddressInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          