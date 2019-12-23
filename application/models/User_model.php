<?php
class User_model extends CI_Model {
  
  function getUserBio($userid) {    
    $name = ''; $email = '';
    $this->db->where('id', $userid);
    $query = $this->db->get('athletesmarketplace_register');
    if($query->num_rows() > 0) {
        foreach($query->result() as $row) {
          $name = $row->name;
          $email = $row->email;
        }
      

      $this->db->where('user_id', $userid);
      $userbio_query = $this->db->get('athletesmarketplace_userbio');
      if($userbio_query->num_rows() > 0) {        
        foreach($userbio_query->result() as $row) {
          $userData = array(
                            'name' => $name,
                            'email' => $email,
                            'gym_type' => $row->gym_type,
                            'mobile_number' => $row->mobile_number,
                            'short_bio' => $row->short_bio,
                            'profile_img_name' => $row->profile_img_name
                          );
        }
      } else {
        $userData = array(
                            'name' => $name,
                            'email' => $email,
                            'gym_type' => '',
                            'mobile_number' => '',
                            'short_bio' => '',
                            'profile_img_name' => ''
                          );
      }
      return $userData;
    } else {
      $this->db->where('id', $userid);
      $regi_query = $this->db->get('athletesmarketplace_register');
      if($regi_query->num_rows() > 0) {
        foreach($regi_query->result() as $row) {
            $userData = array(
                          'name' => $row->name,
                          'email' => $row->email,
                          'gym_type' => '',
                          'mobile_number' => '',
                          'short_bio' => '',
                          'profile_img_name' => ''
                        );
        }
        return $userData;
      } else {
        return 'User Not Found';
      }
    }
  }

  function updateUserData($userData, $userid){
    $this->db->where("id", $userid);
    $this->db->update('athletesmarketplace_register', $userData);
  }

  function updateBioData($bioData, $userid){
    $this->db->where('user_id', $userid);
    $query = $this->db->get('athletesmarketplace_userbio');
    if($query->num_rows() > 0) {
      $this->db->where("user_id", $userid);
      $this->db->update('athletesmarketplace_userbio', $bioData);
    } else {
      $bioData['user_id'] = $userid;
      $this->db->insert('athletesmarketplace_userbio', $bioData);
    }
  }

  

  function getAboutData($user_id, $usermeta_type){
    $this->db->where('id', $user_id);
    $query = $this->db->get('athletesmarketplace_register');
    $email = ''; $phone = '';
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
          $email = $row->email;
      }
      $this->db->where('user_id', $user_id); 
      $query = $this->db->get('athletesmarketplace_userbio');
      if($query->num_rows() > 0) {
        foreach($query->result() as $row) {
            $phone = $row->mobile_number;
        }
      }
    }

    $this->db->where('user_id', $user_id);
    $this->db->where('usermeta_type', $usermeta_type);
    $about_query = $this->db->get('athletesmarketplace_usermeta');
    if($usermeta_type == "about"){
      if($about_query->num_rows() > 0) {      
        $about_dob = ''; $about_prs = ''; $about_street = ''; $about_city = ''; $about_state = ''; $about_zipcode = ''; $about_information_shareable = '';        
        foreach($about_query->result() as $row) {
              if($row->usermeta_field == 'about_dob'){
                $about_dob = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_prs'){
                $about_prs = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_street'){
                $about_street = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_city'){
                $about_city = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_state'){
                $about_state = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_zipcode'){
                $about_zipcode = $row->usermeta_value;
              }
              if($row->usermeta_field == 'about_information_shareable'){
                $about_information_shareable = $row->usermeta_value;
              }   
          }
          $aboutData = array(
                            'about_email' => $email,
                            'about_phone' => $phone,
                            'about_dob' => $about_dob,
                            'about_prs' => $about_prs,
                            'about_street' => $about_street,
                            'about_city' => $about_city,
                            'about_state' => $about_state,
                            'about_zipcode' => $about_zipcode,
                            'about_information_shareable' => $about_information_shareable
                          );
          return $aboutData;
      } else {
          $aboutData = array(
                            'about_email' => $email,
                            'about_phone' => $phone,
                            'about_dob' => '',
                            'about_prs' => '',
                            'about_street' => '',
                            'about_city' => '',
                            'about_state' => '',
                            'about_zipcode' => '',
                            'about_information_shareable' => ''
                          );
          return $aboutData;
      }
    } else if($usermeta_type == "insurance"){
      if($about_query->num_rows() > 0) {      
        $insurance_name = ''; $insurance_id = ''; $insurance_expiry_date = ''; 
        foreach($about_query->result() as $row) {
              if($row->usermeta_field == 'insurance_name'){
                $insurance_name = $row->usermeta_value;
              }
              if($row->usermeta_field == 'insurance_id'){
                $insurance_id = $row->usermeta_value;
              }
              if($row->usermeta_field == 'insurance_expiry_date'){
                $insurance_expiry_date = $row->usermeta_value;
              }
          }
          $aboutData = array(
                            'insurance_name' => $insurance_name,
                            'insurance_id' => $insurance_id,
                            'insurance_expiry_date' => $insurance_expiry_date
                          );
          return $aboutData;
      } else {
          $aboutData = array(
                            'insurance_name' => '',
                            'insurance_id' => '',
                            'insurance_expiry_date' => ''
                          );
          return $aboutData;
      }
    }
  }

  function updateUserAboutData($user_id, $usermeta_type, $usermeta_field, $usermeta_value){
    $this->db->where('user_id', $user_id);
    $this->db->where('usermeta_type', $usermeta_type);
    $this->db->where('usermeta_field', $usermeta_field);
    $query = $this->db->get('athletesmarketplace_usermeta');
    if($query->num_rows() > 0) {
      $infoData = array('usermeta_value' => $usermeta_value);
      $this->db->where('user_id', $user_id);
      $this->db->where('usermeta_type', $usermeta_type);
      $this->db->where('usermeta_field', $usermeta_field);
      return $this->db->update('athletesmarketplace_usermeta', $infoData);
    } else {
      $ccData = array(
                  'user_id' => $user_id,
                  'usermeta_type' => $usermeta_type,
                  'usermeta_field' => $usermeta_field,
                  'usermeta_value' => $usermeta_value
                  );
      return $this->db->insert('athletesmarketplace_usermeta', $ccData);
    }
  }

  function getServicesBookedData($userid) {
    $bookingData = array();
    $service_title = ''; $pricing = '';
    $service_ids = array();
    $this->db->where('user_id', $userid);
    $services_query = $this->db->get('athletesmarketplace_services');
    if($services_query->num_rows() > 0) {
      foreach($services_query->result() as $service) {
        $service_ids[sizeof($service_ids)] = $service->id;
      }
    }

    $this->db->where('service_id IN ('. implode(',', $service_ids) .')');
    $this->db->order_by('booking_id', 'desc');
    $booking_query = $this->db->get('athletesmarketplace_service_bookings');
    if($booking_query->num_rows() > 0) {
      foreach($booking_query->result() as $booking) {
        $this->db->where('id', $booking->service_id); 
        $service_query = $this->db->get('athletesmarketplace_services');
        foreach($service_query->result() as $service) {
          $service_title = $service->service_title;
          $pricing = $service->service_pricing;
        }

        $bookingData[sizeof($bookingData)] = array(
                            'booking_date' => $booking->booking_date,
                            'service_title' => $service_title,
                            'pricing' => $pricing,
                            'rating' => $booking->service_star_rating
                          );
      }
    }
    return $bookingData;
  }
}

?>
