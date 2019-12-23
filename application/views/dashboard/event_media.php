<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Photos</h2> <a href="javascript:void(0)" id="eventmediaEditBtn" onclick="makeEditable('eventmediaEditBtn', 'eventmedia-view', 'eventmedia-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="eventmedia-view" style="display: block;">
                        <div class="box-body" id="eventMediaInfoBox">
                          <div class="row">
                          <?php 
                            if(isset($media)){ 
                              $no = 1;
                              foreach($media as $event){
                                if($event->image_name != ""){
                          ?> 
                                <div class="col-md-3">         
                                    <div class="form-group">
                                        <img src="<?php echo base_url().'assets/uploads/events-images/'.$event->image_name; ?>" class="img-responsive" style="width:100px;height: 100px;">
                                    </div>
                                </div>
                          <?php
                                  }
                              if($no % 4 == 0){
                                echo '</div><div class="row">';
                              }
                              $no++;
                              }
                            }
                          ?>
                          </div>
                        </div><!-- /.box-body -->
                </div>
                <div id="eventmedia-edit" style="display: none;">
                  <!-- form start -->                    
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                      <div class="row">
                                        <?php 
                                          if(isset($media)){ 
                                            $no = 1;
                                            foreach($media as $event){
                                              if($event->image_name != ""){
                                        ?> 
                                              <div class="col-md-3">         
                                                  <div class="form-group">
                                                      <img src="<?php echo base_url().'assets/uploads/events-images/'.$event->image_name; ?>" class="img-responsive" id="img_<?php echo $event->img_id; ?>" style="width:100px;height: 100px;">
                                                      <center><a href="javascript:void(0)" id="edit_<?php echo $event->img_id; ?>" class="eventMediaEdit">Change</a> | <a href="javascript:void(0)" id="delete_<?php echo $event->img_id; ?>" class="eventMediaDelete">Delete</a></center>
                                                  </div>
                                              </div>
                                        <?php
                                                }
                                            if($no % 4 == 0){
                                              echo '</div><div class="row">';
                                            }
                                            $no++;
                                            }
                                          }
                                        ?>
                                    </div>                                    
                                </div>
                              </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer" id="updateEventMediaForm" style="display: none;">
                          <div class="row">
                              <div class="col-md-12">
                                <?php $this->load->helper("form"); ?>
                                <form role="form" id="updateEventMedia" name="updateEventMedia" action="" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="media_id" id="media_id" value="">
                                  <input type="hidden" name="event_id" id="event_id" value="<?php echo $event->event_id; ?>">
                                  <input type="file" name="update_event_media" id="update_event_media" style="display: none;">
                                  <input type="submit" class="btn btn-primary" id="saveeventmediabtn" name="saveeventmediabtn" value="Update Image" />
                                </form>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6"><br/>
                                <div id="eventmediamsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                </div>
                <div id="eventmediaLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>