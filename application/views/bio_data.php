<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Bio</h2> <a href="javascript:void(0)" id="bioEditBtn" onclick="makeEditable('bioEditBtn', 'bio-view', 'bio-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="bio-view" style="display: block;">                    
                        <div class="row">  
                          <div class="col-md-2">
                              
                          </div>
                          <div class="col-md-6" style="text-align: center;">
                            <div class="profile-section">
                              <?php if($user_bio['profile_img_name'] != ''){ ?>
                                <img src="<?php echo base_url().'assets/uploads/profile-images/'.$user_bio['profile_img_name']; ?>" width="180" class="img-responsive profile-pic"/>
                              <?php } else { ?>
                                 <img src="<?php echo base_url(); ?>assets/images/picture-icon.png" width="47" class="img-responsive profile-pic"/>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="col-md-2">
                              
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label><br/>
                                        <?php echo $user_bio['name']; ?>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Primary Sports</label><br/>
                                        <?php if($user_bio['gym_type'] != ''){ 
                                              echo $user_bio['gym_type'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">              
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="shotdesc">Short Bio</label><br/>
                                      <?php if($user_bio['short_bio'] != ''){ 
                                              echo $user_bio['short_bio'];
                                           } else {
                                              echo 'Not Available';
                                           } ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                </div>
                <div id="bio-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateUserBio" name="updateUserBio" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row" id="wrapper">
                                <div class="col-md-2"></div>
                                <div class="col-md-6" style="text-align: center;">
                                  <?php if($user_bio['profile_img_name'] != ''){ ?>
                                    <div class="profile-section" id="drop-area">
                                        <img src="<?php echo base_url().'assets/uploads/profile-images/'.$user_bio['profile_img_name']; ?>" width="180" class="img-responsive profile-pic" />                     
                                    </div>
                                    <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById('profile_img').click();">Update Profile Picture</a></p>
                                  <?php } else { ?>
                                    <div class="profile-section" id="drop-area">
                                        <img src="<?php echo base_url()?>assets/images/picture-icon.png" width="47" class="img-responsive profile-pic" />
                                    </div>
                                    <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById('profile_img').click();">Upload Profile Picture</a></p>
                                  <?php  } ?>
                                  <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="profile_img" id="profile_img" value="">
                                    <input type="hidden" name="uploaded_profile_img" id="uploaded_profile_img" value="">
                                  </p>
                                  
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                               
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $user_bio['name']; ?>" id="name" name="name" maxlength="128">
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gym_type">Primary Sports</label>
                                        <input type="text" class="form-control required digits" id="gym_type" value="<?php echo $user_bio['gym_type']; ?>" name="gym_type" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_bio">Short Bio</label>
                                        <textarea class="form-control required" id="short_bio" name="short_bio" cols="5"><?php echo $user_bio['short_bio']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-6">
                                <input type="submit" class="btn btn-primary" id="savebiobtn" name="savebiobtn" value="Save" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                              </div>
                              <div class="col-md-6">
                                <div id="biomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                <div id="bioLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>