<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('calendar_model');
        $this->load->helper('url');
        
        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){
        //$eventsData = $this->calendar_model->get_calendar_events();
        $prefs = $this->calendar_model->get_calendar_prefs();
        $this->load->library('calendar', $prefs);
        $bookingData = $this->calendar_model->get_services_booking($this->session->userdata('id'));
        $data['year'] = date('Y');
        $data['month'] = date('m');		
		$data['pageTitle'] = 'Calendar';
        $data['calendarData'] = $bookingData;
        $this->load->view('header', $data);
        $this->load->view('calendar');
        $this->load->view('footer');
	}

    function getCalendar(){
        $prefs = $this->calendar_model->get_calendar_prefs();
        $this->load->library('calendar', $prefs);
        $urlStr = $this->input->post('url');
        $url = explode("/", $urlStr);
        $year = $url[sizeof($url)-2];
        $month = $url[sizeof($url)-1];
        //$eventsData = $this->calendar_model->get_calendar_events();
        $bookingData = $this->calendar_model->get_services_booking($this->session->userdata('id'));        
        $prefs = $this->calendar_model->get_calendar_prefs();
        $this->load->library('calendar', $prefs);
        echo $this->calendar->generate($year, $month, $bookingData); 
    }

    function getBusinessCalendar(){
        $urlStr = $this->input->post('url');
        $url = explode("/", $urlStr);
        $year = $url[sizeof($url)-2];
        $month = $url[sizeof($url)-1];
        //$eventsData = $this->calendar_model->get_calendar_events();
        //$bookingData = $this->calendar_model->get_services_booking($this->session->userdata('id'));
        $this->load->model('services_model');
        $bookingData = $this->services_model->get_business_services_booking($this->session->userdata('id'));        
        $prefs = $this->calendar_model->get_business_calendar_prefs();
        //print_r($prefs); die;
        $this->load->library('calendar', $prefs);
        echo $this->calendar->generate($year, $month, $bookingData); 
    }

    function event(){
        if($this->uri->segment(4) !== null){
            $url_key = $this->uri->segment(4);
            $event = $this->calendar_model->get_calendar_event($url_key);
            $eventImages = $this->calendar_model->get_calendar_event_media($event->event_id);
            $data['pageTitle'] = $event->event_title;
            $data['event'] = $event;
            $data['eventImages'] = $eventImages;
            $eventsData = $this->calendar_model->get_calendar_events();
            if(!empty($event)){

                $data['year'] = date('Y');
                $data['month'] = date('m');        
                $data['calendarData'] = $eventsData;

                $this->load->view('header', $data);
                $this->load->view('event', $data);
                $this->load->view('footer');
            } else {
                redirect('calendar');    
            }
        } else {
            redirect('calendar');
        } 
        
    }
}