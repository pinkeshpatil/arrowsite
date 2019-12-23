<?php
class User_services_model extends CI_Model {
  
  function getAllUserServices() {
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

  function getUserServiceData($service_key) {
    $this->db->where('url_key', $service_key);
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

  function getServiceCategoriesData($category_id) {
    $this->db->where('id', $category_id);
    $query = $this->db->get('athletesmarketplace_categories');
    $categoriesData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $categoriesData[sizeof($categoriesData)] = $row;
      }
    }
    return $categoriesData;
  }

  function getServicePackagesData($package_id) {
    $this->db->where('id', $package_id);
    $query = $this->db->get('athletesmarketplace_packages');
    $packagesData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $packagesData[sizeof($packagesData)] = $row;
      }
    }
    return $packagesData;
  }

  function getServiceMediaData($service_id) {
    $this->db->where('service_id', $service_id);
    $query = $this->db->get('athletesmarketplace_services_media');
    $mediaData = array();
    if($query->num_rows() > 0) {
      foreach($query->result() as $row) {
        $mediaData[sizeof($mediaData)] = $row;
      }
    }
    return $mediaData;
  }
  
  function saveReviewData($reviewdata) {
    $this->db->insert('athletesmarketplace_service_reviews', $reviewdata);
    return $this->db->insert_id();
  } 

  function saveServiceBookingData($bookingdata) {
    $this->db->insert('athletesmarketplace_service_bookings', $bookingdata);
    return $this->db->insert_id();
  }

  function getUserServiceReviews($serviceid) {
    $this->db->where('service_id', $serviceid);
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

}

?>
