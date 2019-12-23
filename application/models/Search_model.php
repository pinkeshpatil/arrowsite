<?php
class Search_model extends CI_Model {
  
    function getSerivesSearch($searchterm){
      $this->db->like('service_title', $searchterm);
      $this->db->or_like('service_description', $searchterm);
      $service_query = $this->db->get('athletesmarketplace_services');
      $servicesData = array();
      if($service_query->num_rows() > 0) {
        $servicesData = $service_query->result();
      } 
      
      return $servicesData;

    }

    function getEventsSearch($searchterm){
      $this->db->like('event_title', $searchterm);
      $this->db->or_like('event_description', $searchterm);
      $events_query = $this->db->get('athletesmarketplace_events');
      $eventsData = array();
      if($events_query->num_rows() > 0) {      
        $eventsData = $events_query->result();
      }
      return $eventsData;
    }

    function getBusinessSearch($searchterm, $searchcity){
      $businessData = array();
      $userids = array();
      if($searchterm != ''){
        $this->db->like('name', $searchterm);
        $user_query = $this->db->get('athletesmarketplace_register');      
        if($user_query->num_rows() > 0) {   
          foreach($user_query->result() as $row) {   
            $userids[sizeof($userids)] = $row->id;
          }
        }
      }

      if($searchterm != ''){
        $this->db->like('gym_type', $searchterm);
        $this->db->or_like('short_bio', $searchterm);
        $userbio_query = $this->db->get('athletesmarketplace_userbio');
        if($userbio_query->num_rows() > 0) {   
          foreach($userbio_query->result() as $row) {   
            $userids[sizeof($userids)] = $row->user_id;
          }
        }
      }

      if($searchcity != ''){
        $this->db->where('usermeta_type', 'business_address');
        $this->db->like('usermeta_value', $searchcity);
        $userbio_query = $this->db->get('athletesmarketplace_usermeta');
        if($userbio_query->num_rows() > 0) {   
          foreach($userbio_query->result() as $row) {   
            $userids[sizeof($userids)] = $row->user_id;
          }
        }
      }

      $userids = array_unique($userids);
      if(sizeof($userids) > 0){
        for($i = 0; $i <  sizeof($userids); $i++){
          $business_name = ''; $business_gym_type = ''; $business_short_bio = '';
          $business_street_address = ''; $business_city = ''; $business_state = '';
          $business_zipcode = '';
          $users = implode(",", $userids);

          $this->db->where('id', $userids[$i]);
          $user_query = $this->db->get('athletesmarketplace_register');      
          if($user_query->num_rows() > 0) {   
            foreach($user_query->result() as $row) {   
              $business_name = $row->name;
            }
          }

          $this->db->where('user_id', $userids[$i]);
          $user_query = $this->db->get('athletesmarketplace_userbio');      
          if($user_query->num_rows() > 0) {   
            foreach($user_query->result() as $row) {   
              $business_gym_type = $row->gym_type;
              $business_short_bio = $row->short_bio;
            }
          }

          $this->db->where('user_id', $userids[$i]);
          $user_query = $this->db->get('athletesmarketplace_usermeta');      
          if($user_query->num_rows() > 0) {   
            foreach($user_query->result() as $row) { 
              if($row->usermeta_field == 'street_address'){
                $business_street_address = $row->usermeta_value;
              }
              if($row->usermeta_field == 'city'){
                $business_city = $row->usermeta_value;
              }
              if($row->usermeta_field == 'state'){
                $business_state = $row->usermeta_value;
              }
              if($row->usermeta_field == 'zipcode'){
                $business_zipcode = $row->usermeta_value;
              } 
            }
          }

          $businessData[sizeof($businessData)] = array('business_name' => $business_name, 'business_gym_type' => $business_gym_type, 'business_short_bio' => $business_short_bio, 'business_street_address' => $business_street_address, 'business_city' => $business_city, 'business_state' => $business_state, 'business_zipcode' => $business_zipcode);
        }

      }
      
      return $businessData;
    }
}

?>
