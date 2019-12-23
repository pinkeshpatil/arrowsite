<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Additions</h2> <a href="javascript:void(0)" id="additioninfoEditBtn" onclick="makeEditable('additioninfoEditBtn', 'additioninfo-view', 'additioninfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="additioninfo-view" style="display: block;">
                        <div class="box-body">
                          <?php if(isset($additions)){  ?>
                            <div class="row">
                                <div class="col-md-2">         
                                    <div class="form-group">
                                        <input type="checkbox" name="addition_checkbox_all" id="addition_checkbox_all">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="addition-title">Addition</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>   
                          <?php 
                              foreach($additions as $addition){
                                if($addition['id'] != ''){
                          ?>   
                            <div class="row" id="addition_<?php echo $addition['id']; ?>">
                                <div class="col-md-2">         
                                    <div class="form-group addition_checkbox_div">
                                        <input type="checkbox" class="form-control" name="addition_checkbox_<?php echo $addition['id']; ?>" id="addition_checkbox_<?php echo $addition['id']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group addition_title_div">
                                        <label for="addition_title"><?php echo $addition['addition_title']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="<?php echo $addition['id']; ?>" class="editAddition" title="Edit Addition"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteAdditionModal" data-additionid="<?php echo $addition['id']; ?>" title="Delete Addition"></span></a>
                                </div>
                            </div> 
                          <?php
                                }
                              }
                            }  else {
                          ?>        
                           <div class="row">
                                <div class="col-md-2">         
                                    <div class="form-group">
                                      <input type="button" class="btn btn-primary" id="addadditioninfobtn" name="addadditioninfobtn" value="Add Addition" onclick="makeEditable('additioninfoEditBtn', 'additioninfo-view', 'additioninfo-edit');" />
                                    </div>
                                  </div>
                            </div>
                          <?php } ?>     
                        </div><!-- /.box-body -->
                </div>
                <div id="additioninfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateAdditionInfo" name="updateAdditionInfo" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="addition-title">Add New Addition</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="addition-title">Title</label>
                                        <input type="text" class="form-control required" value="" id="addition-title" name="addition-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="apply_addition" id="apply_addition">
                                        <label for="addition-description">Apply</label>
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="saveadditioninfobtn" name="saveadditioninfobtn" value="Save" />
                                <input type="reset" class="btn btn-default resetBtn" value="Reset" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                <div id="additioninfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="additionInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          