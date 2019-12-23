<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('search_model');
        $this->load->helper('url');
        
        date_default_timezone_set('US/Eastern');        
        if($this->session->userdata('id') === null){            
            //$this->session->set_userdata('searchterm', $this->input->get('s'));
        	//redirect(base_url('login'));
        }
    }

	function index(){
		$data['pageTitle'] = 'Search Results';
        if($this->input->get('s') !== null){
            $searchterm = $this->input->get('s');
            $data['servicesSearch'] = $this->search_model->getSerivesSearch($searchterm);
            $data['eventsSearch'] = $this->search_model->getEventsSearch($searchterm);
        } elseif ($this->input->get('search-service') !== null ) {
            $searchterm = $this->input->get('search-service');
            $searchcity = $this->input->get('search-city');
            
            $data['businessSearch'] = $this->search_model->getBusinessSearch($searchterm, $searchcity);
        } else {
            redirect(base_url());
        }
        
        $this->load->view('header', $data);
        $this->load->view('search_result', $data);
        $this->load->view('footer');
	}
    
    
    
    
    
}