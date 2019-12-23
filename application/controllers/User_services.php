<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_services extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('user_services_model');

        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	//redirect(base_url());
        }
    }

	function index(){		
		$data['pageTitle'] = 'User Services'; 
        $data['user_services'] = $this->user_services_model->getAllUserServices();
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/view_services', $data);
        $this->load->view('dashboard/footer');
	}

    function service(){
        if($this->uri->segment(4) !== null){
            $service_key = $this->uri->segment(4);
            $data['pageTitle'] = 'User Service';
            $this->load->model('user_model');
            $user = $this->user_model->getUserBio($this->session->userdata('id'));
            $user_service = $this->user_services_model->getUserServiceData($service_key);
            $reviews = $this->user_services_model->getUserServiceReviews($user_service['id']);      
            $service_media = $this->user_services_model->getServiceMediaData($user_service['id']);
            

            $data['user_service'] = $user_service;
            $data['service_media'] = $service_media;
            $data['reviews'] = $reviews;
            $data['user'] = $user;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/user_service', $data);
            $this->load->view('dashboard/footer');
        } else {
            redirect('user-services');
        }
    }

    function saveServiceReviewForm(){
        if($this->input->post('service-review') !== null){            
            $reviewData = array(                
                'user_id' => $this->session->userdata('id'),
                'service_id' => $this->input->post('service_id'),
                'review_description' => $this->input->post('service-review')
            );
            $review_id = $this->user_services_model->saveReviewData($reviewData);
            if($review_id){
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    function saveServiceBookingForm(){
        if($this->input->post('service-booking-date') !== null){            
            $bookingData = array(                                
                'user_id' => $this->session->userdata('id'),
                'booking_date' => $this->input->post('service-booking-date'),
                'service_id' => $this->input->post('service_id'),
                'service_star_rating' => $this->input->post('service_star_rating')
            );
            $booking_id = $this->user_services_model->saveServiceBookingData($bookingData);
            if($booking_id){
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }
    

}
?>