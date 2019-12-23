<?php
class Calendar_model extends CI_Model {
  
  function get_calendar_prefs(){
        $prefs = array(
            'show_next_prev'  => TRUE,
            'next_prev_url'   => base_url().'calendar/'
        );
        $prefs['template'] = '
            {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

            {heading_row_start}<tr>{/heading_row_start}

            {heading_previous_cell}<th class="calendar_previous_url" style="text-align:center;"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan="{colspan}" style="text-align:center;" >{heading}</th>{/heading_title_cell}
            {heading_next_cell}<th class="calendar_next_url" style="text-align:center;"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

            {heading_row_end}</tr>{/heading_row_end}

            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}<td>{week_day}</td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}

            {cal_row_start}<tr>{/cal_row_start}
            {cal_cell_start}<td>{/cal_cell_start}
            {cal_cell_start_today}<td>{/cal_cell_start_today}
            {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

            {cal_cell_content}{day}<br/>{content}{/cal_cell_content}
            {cal_cell_content_today}<div class="highlight">{day}<br/>{content}</div>{/cal_cell_content_today}

            {cal_cell_no_content}{day}{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

            {cal_cell_blank}&nbsp;{/cal_cell_blank}

            {cal_cell_other}{day}{/cal_cel_other}

            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}

            {table_close}</table>{/table_close}
    ';
    return $prefs;
  }

   function get_business_calendar_prefs(){
        $prefs = array(
            'show_next_prev'  => TRUE,
            'next_prev_url'   => base_url().'calendar/'
        );
        $prefs['template'] = '
            {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

            {heading_row_start}<tr>{/heading_row_start}

            {heading_previous_cell}<th class="business_calendar_previous_url" style="text-align:center;"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan="{colspan}" style="text-align:center;" >{heading}</th>{/heading_title_cell}
            {heading_next_cell}<th class="business_calendar_next_url" style="text-align:center;"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

            {heading_row_end}</tr>{/heading_row_end}

            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}<td>{week_day}</td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}

            {cal_row_start}<tr>{/cal_row_start}
            {cal_cell_start}<td>{/cal_cell_start}
            {cal_cell_start_today}<td>{/cal_cell_start_today}
            {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

            {cal_cell_content}{day}<br/>{content}{/cal_cell_content}
            {cal_cell_content_today}<div class="highlight">{day}<br/>{content}</div>{/cal_cell_content_today}

            {cal_cell_no_content}{day}{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

            {cal_cell_blank}&nbsp;{/cal_cell_blank}

            {cal_cell_other}{day}{/cal_cel_other}

            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}

            {table_close}</table>{/table_close}
    ';
    return $prefs;
  }


  function get_calendar_events(){
    $events_query = $this->db->get('athletesmarketplace_events');
    $events = array();
    $year = date('Y');
    if($events_query->num_rows() > 0) {      
      foreach($events_query->result() as $event) {
        $from_date = $event->event_from_date;
        $to_date = $event->event_to_date;
        $date1 = date_create($from_date);
        $date2 = date_create($to_date);
        $diff = date_diff($date1,$date2);
        $url = $event->event_title;
        $url = str_replace(' ', '-', $url);
        $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); 
        $url = strtolower($url); // Convert to lowercase
        if($diff->d > 0){
            for($i = 0; $i <= 2; $i++){
                $timestamp = strtotime($from_date. ' + '.$i.' day');
                $day = date('d', $timestamp);
                $day = ltrim($day, '0');
                $month = date('m', $timestamp);
                $month = ltrim($month, '0');
                $year = date('Y', $timestamp); 
                if(!isset($events[$year][$month][$day])){
                  $events[$year][$month][$day] = '<p><a href="'.base_url().'calendar/'.$url.'/event/'.md5('eventid_'.$event->event_id).'">'.$event->event_title.'</a></p>';
                } else {
                  $events[$year][$month][$day] = $events[$year][$month][$day] . '<p><a href="'.base_url().'calendar/event/'.$url.'/'.md5('eventid_'.$event->event_id).'">'.$event->event_title.'</a></p>';
                }
            }
        } else {
            $timestamp = strtotime($from_date);
            $day = date('d', $timestamp);
            $day = ltrim($day, '0');
            $month = date('m', $timestamp);
            $month = ltrim($month, '0');
            $year = date('Y', $timestamp); 

            if(!isset($events[$year][$month][$day])){
              $events[$year][$month][$day] = '<p><a href="'.base_url().'calendar/event/'.$url.'/'.md5('eventid_'.$event->event_id).'">'.$event->event_title.'</a></p>';
            } else {
              $events[$year][$month][$day] = $events[$year][$month][$day] . '<p><a href="'.base_url().'calendar/event/'.$url.'/'.md5('eventid_'.$event->event_id).'">'.$event->event_title.'</a></p>';
            }
        }
      }
      return $events;
    } else {
      return $events;
    }
  }
    
    function get_services_booking($user_id){
        $this->db->where('user_id', $user_id);
        $booking_query = $this->db->get('athletesmarketplace_service_bookings');
        $bookings = array();
        $year = date('Y');
        if($booking_query->num_rows() > 0) {      
            foreach($booking_query->result() as $booking) {
                $booking_date = $booking->booking_date;

                $this->db->where('id', $booking->service_id); 
                $service_query = $this->db->get('athletesmarketplace_services');
                foreach($service_query->result() as $service) {
                    $service_title = $service->service_title;
                }
                $url = $service_title;
                $url = str_replace(' ', '-', $url);
                $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); 
                $url = strtolower($url); // Convert to lowercase
            
                $timestamp = strtotime($booking_date);
                $day = date('d', $timestamp);
                $day = ltrim($day, '0');
                $month = date('m', $timestamp);
                //$month = ltrim($month, '0');
                $year = date('Y', $timestamp); 

                if(!isset($bookings[$year][$month][$day])){
                  $bookings[$year][$month][$day] = '<p><a href="'.base_url().'user-services/service/'.$url.'/'.md5('service_'.$booking->service_id).'">'.$service_title.'</a></p>';
                } else {
                  $bookings[$year][$month][$day] = $bookings[$year][$month][$day] . '<p><a href="'.base_url().'user-services/service/'.$url.'/'.md5('service_'.$booking->service_id).'">'.$service_title.'</a></p>';
                }
            }
        }
        return $bookings;
    }
  

  function get_calendar_event($key_url){
    $this->db->where('event_url_key' , $key_url);
    $event_query = $this->db->get('athletesmarketplace_events');
    $eventData = array();
    if($event_query->num_rows() > 0) {      
      foreach($event_query->result() as $event) {
        $eventData = $event;
      }
    } 
    return $eventData;
  }

  function get_calendar_event_media($event_id){
    $this->db->where('event_id' , $event_id);
    $event_query = $this->db->get('athletesmarketplace_events_media');
    $eventImages = array();
    if($event_query->num_rows() > 0) {      
      $eventImages = $event_query->result();
    } 
    return $eventImages;
  }
}

?>
