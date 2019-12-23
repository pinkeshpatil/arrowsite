
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="info-title">Calendar</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12 calendarBox">
                      <?php 
                            echo $this->calendar->generate($year, $month, $calendarData); 
                      ?>
                   </div>
              </div>
            </div>
        