          <!-- Section 1/1 -->
          <style type="text/css">
          .fa-star{
            cursor: pointer;
          }
          .checked {
            color: orange;
          }
          </style>
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Review / Star Rating</h2> 
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="photos-view" style="display: block;">
                        <div class="box-body">
                            <div class="row" id="eventInfoBox">
                               <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Star Rating</h5>
                                      <div class="form-group" id="starRatingGroup">
                                        <span class="fa fa-star ratingBtn" id="rating_1"></span>
                                        <span class="fa fa-star ratingBtn" id="rating_2"></span>
                                        <span class="fa fa-star ratingBtn" id="rating_3"></span>
                                        <span class="fa fa-star ratingBtn" id="rating_4"></span>
                                        <span class="fa fa-star ratingBtn" id="rating_5"></span>                       
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Submit Review</h5>
                                      <form role="form" id="saveServiceReviewForm" name="saveServiceReviewForm" action="" method="post">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="service-review" id="service-review" class="form-control"></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" id="submitservicereview" name="submitservicereview" value="Submit" />
                                                <div class="hidden-fields">
                                                  <input type="hidden" name="service_id" id="service_id" value="<?php echo $user_service['id']; ?>">
                                                </div>
                                            </div> 
                                          </div>
                                          <div class="col-md-8">
                                            <div id="servicereviewmsg" class="alert"></div>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                               </div>
                          </div>              
                        </div><!-- /.box-body -->
                </div>
                <div id="servicereview_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          