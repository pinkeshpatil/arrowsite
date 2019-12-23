<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Events</h1>          
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
                <h2 class="info-title">Events</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12">
                      <table class="table table-hover">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="40%">Title</th>
                            <th width="15%">Date</th>
                            <th width="15%">Time</th>
                            <th width="10%">Fees</th>
                            <th width="10%">Action</th>
                        </tr>
                        <?php
                          foreach($eventsData as $event) {
                              if($event->event_from_date != $event->event_to_date){ 
                                $event_date = $event->event_from_date.' - '.$event->event_to_date; 
                              } else { 
                                $event_date = $event->event_from_date; 
                              }

                              if($event->event_all_day == 'no'){ 
                                $event_time = $event->event_from_time.' - '.$event->event_to_time;
                              } else { 
                                $event_time = 'All Day'; 
                              }

                              echo '<tr>
                                      <td>'.$event->event_id.'</td>
                                      <td>'.$event->event_title.'</td>
                                      <td>'.$event_date.'</td>
                                      <td>'.$event_time.'</td>
                                      <td>'.$event->event_fees.'</td>
                                      <td><a href="'.base_url().'events/edit_event/'.$event->event_id.'" id="'.$event->event_id.'" class="editEvent" title="Edit Event"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteEventModal" data-eventid="'.$event->event_id.'" title="Delete Event"></span></td>
                                    </tr>';
                          }
                        ?>
                      </table>
                   </div>
              </div>
            </div>
        </div>
    </div>   
</div>
