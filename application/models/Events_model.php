<?php
class Events_model extends CI_Model {
  
  function get_events(){
    $events_query = $this->db->get('athletesmarketplace_events');
    $events = array();
    if($events_query->num_rows() > 0) {      
      $events = $events_query->result();
      return $events;
    } else {
      return $events;
    }
  }

  
  function get_event($event_id){
    $this->db->where('event_id' , $event_id);
    $event_query = $this->db->get('athletesmarketplace_events');
    $eventData = array();
    if($event_query->num_rows() > 0) {      
      foreach($event_query->result() as $event) {
        $eventData = $event;
      }
    } 
    return $eventData;
  }

  function get_event_media($event_id){
    $this->db->where('event_id' , $event_id);
    $media_query = $this->db->get('athletesmarketplace_events_media');
    $eventMedia = array();
    if($media_query->num_rows() > 0) {      
      foreach($media_query->result() as $event) {
        $eventMedia[sizeof($eventMedia)] = $event;
      }
    } 
    return $eventMedia;
  }

  function get_event_media_img($media_id){
    $this->db->where('img_id' , $media_id);
    $media_query = $this->db->get('athletesmarketplace_events_media');
    $imgData = array();
    if($media_query->num_rows() > 0) {      
      foreach($media_query->result() as $event) {
        $imgData = $event;
      }
    } 
    return $imgData;
  }

  function update_event($eventData, $event_id){
    $this->db->where('event_id', $event_id);
    $event_rst = $this->db->update('athletesmarketplace_events', $eventData);
    if($event_rst){
        return $event_id;
    } else {
        return '';
    }
  }

  function event_image_update($imgData, $img_id){
    $this->db->where('img_id', $img_id);
    $img_rst = $this->db->update('athletesmarketplace_events_media', $imgData);
    if($img_rst){
        return $img_id;
    } else {
        return '';
    }
  }
  
}

?>
