<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->helper("html");
        $this->load->helper("form");
        $this->load->helper('url');


        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){		
		$data['pageTitle'] = 'Bookings';
        $this->load->model('user_model');
        $data['services_booked'] = $this->user_model->getServicesBookedData($this->session->userdata('id'));
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/bookings', $data);
		$this->load->view('dashboard/footer');
	}

    

}

?>