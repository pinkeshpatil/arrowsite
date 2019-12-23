<!-- Section 1/1 -->
<?php if(isset($service_media) && sizeof($service_media) > 0){ ?>
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Photos/Videos</h2> 
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="photos-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="">
                               <div class="col-md-12">
                                  <div class="row">
                                    <?php
                                      $no = 1;
                                      foreach($service_media as $image){
                                          if($image->service_img_id != ''){
                                             echo '<div class="col-md-3"><a href="'.base_url().'assets/uploads/services-images/'.$image->service_image_name.'" target="_blank"><img src="'.base_url().'assets/uploads/services-images/'.$image->service_image_name.'" width="180" class="img-responsive service-media"/></a></div>';
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
                        </div><!-- /.box-body -->
                </div>
            </div>
          </div>
<?php } ?>

          