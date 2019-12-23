<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-primary">
          <center><h3>Calendar</h3></center>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group calendarBox">
        <?php                             
            echo $this->calendar->generate($year, $month, $calendarData); 
        ?>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-primary">
          <center><h3>UPCOMING EVENTS</h3></center>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <ul class="list-group">
          <?php
            $this->db->where('event_from_date >= ', date('Y-m-d') );
            $this->db->order_by('event_from_date' , 'ASC');
            $this->db->order_by('event_from_time' , 'ASC');
            $this->db->limit(5);
            $events_query = $this->db->get('athletesmarketplace_events');
            if($events_query->num_rows() > 0) {
              foreach($events_query->result() as $row) {
          ?>
                <li class="list-group-item"><?php echo $row->event_title; ?><br/><span class="meta-field">Date: <?php if($row->event_from_date != $row->event_to_date){ echo $row->event_from_date.' - '.$row->event_to_date; } else { echo $row->event_from_date; } ?> <br/> Time: <?php if($row->event_all_day == 'no'){ echo $row->event_from_time.' - '.$row->event_to_time; } else { echo 'All Day'; } ?></span></li>
          <?php
             }
            }
          ?>
        </ul>
    </div>
</div>
