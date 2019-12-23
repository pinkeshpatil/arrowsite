<?php
class Web_model extends CI_Model {
  
  function getUsers() {
    $query = $this->db->get('athletesmarketplace_userbio');
    $users = array();
    if($query->num_rows() > 0) {
       $this->db->join('athletesmarketplace_userbio', 'athletesmarketplace_register.id = athletesmarketplace_userbio.user_id', 'full'); 
        $query = $this->db->get('athletesmarketplace_register');
        foreach($query->result() as $row) {
          $userData = array(
                          'user_id' => $row->user_id,
                          'name' => $row->name,
                          'email' => $row->email,
                          'gym_type' => $row->gym_type,
                          'mobile_number' => $row->mobile_number,
                          'short_bio' => $row->short_bio,
                          'profile_img_name' => $row->profile_img_name
                        );
          $users[sizeof($users)] = $userData;
        }      
    } else {
        $users[sizeof($users)] = array('error' => 'Users Not Found!');
    }
    return $users;
  }

  function getUserBio($userid) {
    $this->db->where('user_id', $userid);
    $query = $this->db->get('athletesmarketplace_userbio');
    if($query->num_rows() > 0) {
       $this->db->join('athletesmarketplace_userbio', 'athletesmarketplace_register.id = athletesmarketplace_userbio.user_id', 'full'); 
      $query = $this->db->get('athletesmarketplace_register');
      foreach($query->result() as $row) {
        $userData = array(
                          'name' => $row->name,
                          'email' => $row->email,
                          'gym_type' => $row->gym_type,
                          'mobile_number' => $row->mobile_number,
                          'short_bio' => $row->short_bio,
                          'profile_img_name' => $row->profile_img_name
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

  function event_insert($data) {
    $this->db->insert('athletesmarketplace_events', $data);
    $event_id = $this->db->insert_id();

    $update_data = array('event_url_key' => md5('eventid_'.$event_id));
    $this->db->where('event_id', $event_id);
    $this->db->update('athletesmarketplace_events', $update_data);
    
    return $event_id;
  }

  function event_image_insert($data) {
    $this->db->insert('athletesmarketplace_events_media', $data);
    return $this->db->insert_id();
  }

  function contactform_insert($data) {
    $this->db->insert('athletesmarketplace_contactforms', $data);
    return $this->db->insert_id();
  }

  function get_contactforms(){
      $contact_query = $this->db->get('athletesmarketplace_contactforms');
      $messages = array();
      if($contact_query->num_rows() > 0) {
        foreach($contact_query->result() as $row) {
          $messages[sizeof($messages)] = $row;
        }
      }
      return $messages;
  }

}

?>
