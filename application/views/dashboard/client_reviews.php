<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Client Reviews</h2>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="service-how-to-book" style="display: block;">
                        <div class="box-body">
                            <?php
                              if(isset($reviews)){
                                  $i = 1;
                                  foreach($reviews as $review){
                                    if($i <= 5){
                                      echo '<div class="row"><div class="col-md-12">'.$review->review_description.'</div></div><hr/>';
                                    }
                                    $i++;
                                  }
                              }
                          ?>                                                 
                        </div><!-- /.box-body -->
                </div>
            </div>
          </div>