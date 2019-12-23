<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Calendar</h1>          
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
        </div>
    </div>     
</div>
