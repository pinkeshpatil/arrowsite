<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Bookings</h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="info-title">Services Bookings</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12">
                      <table class="table table-hover">
                        <tr>
                            <th width="20%">Date</th>
                            <th>Service Title</th>
                            <th style="text-align: center;">Pricing</th>
                            <th style="text-align: center;">Rating</th>
                        </tr>
                        <?php
                            if(sizeof($services_booked) > 0){
                                for($i=0; $i < sizeof($services_booked); $i++){
                                    echo '<tr>
                                        <th width="20%">'.$services_booked[$i]['booking_date'].'</th>
                                        <th>'.$services_booked[$i]['service_title'].'</th>
                                        <th style="text-align: center;">$'.$services_booked[$i]['pricing'].'</th>
                                        <th style="text-align: center;">
                                            <div class="form-group" id="starRatingGroup">';
                                        for($r = 1; $r <= 5; $r++){
                                            if($r <= $services_booked[$i]['rating']){
                                                echo '<span class="fa fa-star ratingBtn checked" id="rating_'.$r.'"></span>';
                                            } else {
                                                echo '<span class="fa fa-star ratingBtn" id="rating_'.$r.'"></span>';
                                            }
                                        }
                                        
                                    echo '</div></th>
                                    </tr>';
                                }
                            }
                        ?>                        
                      </table>
                   </div>
              </div>
            </div>
        </div>
    </div>   
</div>
