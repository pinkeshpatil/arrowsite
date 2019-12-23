<?php
class Services_model extends CI_Model {
  
  function getUserServices($userid) {
    $this->db->where('user_id', $userid);
    $query = $this->db->get('athletesmarketplace_services');
    $servicesData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $servicesData[sizeof($servicesData)] = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'service_title' => $row->service_title,
                          'service_description' => $row->service_description,
                          'service_pricing' => $row->service_pricing,
                          'service_category' => $row->service_category,
                          'service_image' => $row->service_image
                        );
      }
      return $servicesData;
    } else {
      $servicesData[0] = array(
          'id' => '',
          'user_id' => '',
          'service_title' => '',
          'service_description' => '',
          'service_pricing' => '',
          'service_category' => '',
          'service_image' => ''
      );
      return $servicesData;
    }
  }

  function getServiceData($serviceid) {
    $this->db->where('id', $serviceid);
    $query = $this->db->get('athletesmarketplace_services');
    $serviceData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $serviceData = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'service_title' => $row->service_title,
                          'service_description' => $row->service_description,
                          'service_pricing' => $row->service_pricing,
                          'service_category' => $row->service_category,
                          'service_image' => $row->service_image
                        );
      }
      return $serviceData;
    } else {
      $serviceData = array(
          'id' => '',
          'user_id' => '',
          'service_title' => '',
          'service_description' => '',
          'service_pricing' => '',
          'service_category' => '',
          'service_image' => ''
      );
      return $serviceData;
    }
  }

  function getServiceMediaData($serviceid) {
    $this->db->where('service_id', $serviceid);
    $query = $this->db->get('athletesmarketplace_services_media');
    $serviceMediaData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $serviceMediaData[sizeof($serviceMediaData)] = array(
                          'service_img_id' => $row->service_img_id,
                          'service_image_name' => $row->service_image_name
                        );
      }
    } 
    return $serviceMediaData;
  }  

  function updateServiceData($serviceData, $userid, $serviceid){
    $this->db->where('id', $serviceid);
    $query = $this->db->get('athletesmarketplace_services');
    if($query->num_rows() > 0) {
      $this->db->where("id", $serviceid);
      $this->db->update('athletesmarketplace_services', $serviceData);
      return $serviceid;
    } else {
      $serviceData['user_id'] = $userid;
      $this->db->insert('athletesmarketplace_services', $serviceData);
      $service_id = $this->db->insert_id();
      
      $update_data = array('url_key' => md5('service_'.$service_id));
      $this->db->where('id', $service_id);
      $this->db->update('athletesmarketplace_services', $update_data);
      return $service_id;
    }
  }

  function sevice_images_insert($data) {
    $this->db->insert('athletesmarketplace_services_media', $data);
    return $this->db->insert_id();
  }

  function deleteService($serviceid){
    $this->db->where("id", $serviceid);
    return $this->db->delete('athletesmarketplace_services');
  }

  function getPackagesData($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('athletesmarketplace_packages');
    $packagesData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $packagesData[sizeof($packagesData)] = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'package_title' => $row->package_title,
                          'package_cost' => $row->package_cost
                        );
      }
      return $packagesData;
    } else {
      $packagesData[0] = array(
          'id' => '',
          'user_id' => '',
          'package_title' => '',
          'package_cost' => ''
      );
      return $packagesData;
    }
  }

  function getPackageData($packageid) {
    $this->db->where('id', $packageid);
    $query = $this->db->get('athletesmarketplace_packages');
    $packageData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $packageData = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'package_title' => $row->package_title,
                          'package_cost' => $row->package_cost
                        );
      }
      return $packageData;
    } else {
      $packageData = array(
          'id' => '',
          'user_id' => '',
          'package_title' => '',
          'package_cost' => ''
      );
      return $packageData;
    }
  }

  function updatePackageData($packageData, $userid, $packageid){
    $this->db->where('id', $packageid);
    $query = $this->db->get('athletesmarketplace_packages');
    if($query->num_rows() > 0) {
      $this->db->where("id", $packageid);
      $this->db->update('athletesmarketplace_packages', $packageData);
      return $packageid;
    } else {
      $packageData['user_id'] = $userid;
      $this->db->insert('athletesmarketplace_packages', $packageData);
      $package_id = $this->db->insert_id();
      return $package_id;
    }
  }

  function deletePackage($packageid){
    $this->db->where("id", $packageid);
    return $this->db->delete('athletesmarketplace_packages');
  }

  function getCategoriesData($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('athletesmarketplace_categories');
    $CategoriesData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $CategoriesData[sizeof($CategoriesData)] = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'category_title' => $row->category_title,
                          'category_description' => $row->category_description,
                          'active' => $row->active
                        );
      }
      return $CategoriesData;
    } else {
      $CategoriesData[0] = array(
          'id' => '',
          'user_id' => '',
          'category_title' => '',
          'category_description' => '',
          'active' => ''
      );
      return $CategoriesData;
    }
  }

  function getCategoryData($categoryid) {
    $this->db->where('id', $categoryid);
    $query = $this->db->get('athletesmarketplace_categories');
    $categoryData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $categoryData = array(
                          'id' => $row->id,
                          'user_id' => $row->user_id,
                          'category_title' => $row->category_title,
                          'category_description' => $row->category_description,
                          'active' => $row->active
                        );
      }
      return $categoryData;
    } else {
      $categoryData = array(
          'id' => '',
          'user_id' => '',
          'category_title' => '',
          'category_description' => '',
          'active' => ''
      );
      return $categoryData;
    }
  }

  function updateCategoryData($categoryData, $userid, $categoryid){
    $this->db->where('id', $categoryid);
    $query = $this->db->get('athletesmarketplace_categories');
    if($query->num_rows() > 0) {
      $this->db->where("id", $categoryid);
      $this->db->update('athletesmarketplace_categories', $categoryData);
      return $categoryid;
    } else {
      $categoryData['user_id'] = $userid;
      $this->db->insert('athletesmarketplace_categories', $categoryData);
      $category_id = $this->db->insert_id();
      return $category_id;
    }
  }

  function deleteCategory($categoryid){
    $this->db->where("id", $categoryid);
    return $this->db->delete('athletesmarketplace_categories');
  }

  function getServiceReviews($userid) {
    $this->db->where('user_id', $userid);
    $this->db->order_by('review_id', 'desc');
    $query = $this->db->get('athletesmarketplace_service_reviews');
    $reviewsData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $reviewsData[sizeof($reviewsData)] = $row;
      }
    }
    return $reviewsData;
  }

  function updateBusinessAddressData($user_id, $usermeta_type, $usermeta_field, $usermeta_value){
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

  function getBusinessAddressData($user_id, $usermeta_type){
    $this->db->where('user_id', $user_id);
    $this->db->where('usermeta_type', $usermeta_type);
    $query = $this->db->get('athletesmarketplace_usermeta');
    $street_address = ''; $city = ''; $state = ''; $zipcode = '';
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
          if($row->usermeta_field == "street_address"){
            $street_address = $row->usermeta_value;
          }
          if($row->usermeta_field == "city"){
            $city = $row->usermeta_value;
          }
          if($row->usermeta_field == "state"){
            $state = $row->usermeta_value;
          }
          if($row->usermeta_field == "zipcode"){
            $zipcode = $row->usermeta_value;
          }
      }
    }
    $businessAddress = array('street_address' => $street_address, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode);
    return $businessAddress;
  }

  function get_business_services_booking($user_id){
        $service_ids = array();
        $this->db->where('user_id', $user_id);
        $services_query = $this->db->get('athletesmarketplace_services');
        if($services_query->num_rows() > 0) {
          foreach($services_query->result() as $service) {
            $service_ids[sizeof($service_ids)] = $service->id;
          }
        }

        $this->db->where('service_id IN ('. implode(',', $service_ids) .')');
        $this->db->order_by('booking_id', 'desc');
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
  
}

?>
