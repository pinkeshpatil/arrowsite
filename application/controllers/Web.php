<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();        
        $this->load->model('web_model');
        $this->load->helper("html");
        $this->load->helper("form");
        $this->load->helper('url');
        $this->load->library('form_validation');
  		$this->load->library('encrypt');


        date_default_timezone_set('US/Eastern');
        if($this->uri->segment(1) != 'logout' && $this->session->userdata('user_type') == 2){
        	redirect(base_url().'dashboard');
        }

    }

	function index(){		
		$data['pageTitle'] = 'Home';
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}


	function reheb_recovery(){
		$data['pageTitle'] = 'Reheb Recovery';		
		$this->load->view('header', $data);
		$this->load->view('reheb_recovery');
		$this->load->view('footer');
	}

	function host_an_event(){
		$data['pageTitle'] = 'Host An Event';		
		$this->load->view('header', $data);
		$this->load->view('host_an_event');
		$this->load->view('footer');
	}

	function contact_us(){
		$data['pageTitle'] = 'Contact Us';		
		$this->load->view('header', $data);
		$this->load->view('contact_us');
		$this->load->view('footer');
	}

	function our_story(){
		$data['pageTitle'] = 'Our Story';		
		$this->load->view('header', $data);
		$this->load->view('our_story');
		$this->load->view('footer');
	}

	function our_cities(){
		$data['pageTitle'] = 'Our Cities';		
		$this->load->view('header', $data);
		$this->load->view('our_cities');
		$this->load->view('footer');
	}

	function get_involed(){
		$data['pageTitle'] = 'Get Involed';		
		$this->load->view('header', $data);
		$this->load->view('get_involed');
		$this->load->view('footer');
	}

	function signup_newsletter(){
		$data['pageTitle'] = 'Sign Up for Newsletter';		
		$this->load->view('header', $data);
		$this->load->view('signup_newsletter');
		$this->load->view('footer');
	}
	

	function profile($userid){
		$data['pageTitle'] = 'Profile';	
		$data['user'] = $this->web_model->getUserBio($userid);	
		$this->load->view('header', $data);
		$this->load->view('profile', $data);
		$this->load->view('footer');
	}	

	function logout(){
		$this->session->unset_userdata('searchterm');
	    $this->session->unset_userdata('id');
	    $this->session->unset_userdata('user_type');
	    redirect(base_url());
	}

	public function invalid_time(){
	    $this->form_validation->set_message('invalid_time', 'To time should not before from time.');
	    return FALSE;
	}

	function add_event(){
	    $this->form_validation->set_rules('event_title', 'Event Title', 'required|trim');
	    $this->form_validation->set_rules('event_email', 'Email Address', 'required|trim|valid_email|is_unique[athletesmarketplace_register.email]');
	    $this->form_validation->set_rules('event_phone', 'Phone', 'required|numeric');
	    $this->form_validation->set_rules('event_fees', 'Fees', 'required|trim');
	    $this->form_validation->set_rules('event_from_date', 'From Date', 'required');
	    $this->form_validation->set_rules('event_to_date', 'To Date', 'required');
	    $this->form_validation->set_rules('event_description', 'Desciption', 'required');
	    $this->form_validation->set_rules('agreement', 'Agreement', 'required');

	    $date1 = date_create($this->input->post('event_from_date')." ".$this->input->post('event_from_time'));
		$date2 = date_create($this->input->post('event_to_date')." ".$this->input->post('event_to_time'));
		$diff = date_diff($date1,$date2);
		if($diff->invert == 1){
			$this->form_validation->set_rules('event_to_time', 'To Date', 'callback_invalid_time');
		}

	    if($this->form_validation->run()) {	    	
	    	if($this->input->post('event_all_day') == 1){
	    		$event_all_day = 'yes';
	    	} else {
	    		$event_all_day = 'no';
	    	}
	    	if($this->input->post('agreement') == 1){
	    		$event_agreement_sign = 'yes';
	    	} else {
	    		$event_agreement_sign = 'no';
	    	}
		     $data = array(
		      'event_title'  => $this->input->post('event_title'),
		      'event_email'  => $this->input->post('event_email'),
		      'event_phone'  => $this->input->post('event_phone'),
		      'event_website'  => $this->input->post('event_website'),
		      'event_fees'  => $this->input->post('event_fees'),
		      'event_from_date'  => $this->input->post('event_from_date'),
		      'event_to_date'  => $this->input->post('event_to_date'),	      
		      'event_from_time'  => $this->input->post('event_from_time'),
		      'event_to_time'  => $this->input->post('event_to_time'),
		      'event_all_day'  => $event_all_day,
		      'event_street'  => $this->input->post('event_street_address'),
		      'event_city'  => $this->input->post('event_city'),
		      'event_state'  => $this->input->post('event_state'),
		      'event_zipcode'  => $this->input->post('event_zipcode'),
		      'event_description'  => $this->input->post('event_description'),
		      'event_agreement_sign'  => $event_agreement_sign
		     );
		     $id = $this->web_model->event_insert($data); 
		     //$id = 1;
		     if($id){
				$this->load->library('upload');
			    $files = $_FILES;
			    $dataInfo = array();
			    $event_images = count($_FILES['event_images']['name']);
			    $imgno = 1;
			    for($i=0; $i<$event_images; $i++)
			    {           
			        $_FILES['event_images']['name']= $id.$imgno.'_'.$files['event_images']['name'][$i];
			        $_FILES['event_images']['type']= $files['event_images']['type'][$i];
			        $_FILES['event_images']['tmp_name']= $files['event_images']['tmp_name'][$i];
			        $_FILES['event_images']['error']= $files['event_images']['error'][$i];
			        $_FILES['event_images']['size']= $files['event_images']['size'][$i];
			        $this->upload->initialize($this->set_upload_options());
			        if($this->upload->do_upload('event_images')){
			        	$dataInfo = $this->upload->data();  
						$event_img = $dataInfo['file_name'];
						$imgData = array('event_id' => $id, 'image_name' => $event_img);
						$this->web_model->event_image_insert($imgData); 
						$imgno++;
			        }	
			    }
				$this->session->set_flashdata('event_submit_msg_success', '<div class="alert alert-success">Event added successfully!</div>');
				//$this->host_an_event();
				redirect(base_url().'add_event');
		     } else {
		     	$this->session->set_flashdata('event_submit_msg_fail', '<div class="alert alert-danger">Event submitting fail!</div>');
		      	$this->host_an_event();
		     }
	    } else {
	      	$this->host_an_event();
	    }
	}

	private function set_upload_options(){	   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = 'assets/uploads/events-images/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	function contactform(){
	    $this->form_validation->set_rules('contact_name', 'Name', 'required|trim');
	    $this->form_validation->set_rules('contact_email', 'Email', 'required|trim');
	    $this->form_validation->set_rules('cotact_message', 'Message', 'required|trim');
	    if($this->form_validation->run()) {
		    $data = array(
			      'name'  => $this->input->post('contact_name'),
			      'email'  => $this->input->post('contact_email'),
			      'message'  => $this->input->post('cotact_message')
			  );
		    $contact_id = $this->web_model->contactform_insert($data); 
		    if($contact_id){
		    	$this->session->set_flashdata('contactform_submit_msg', '<div class="alert alert-success">Form submitted successfully!</div>');
		    } else {
		    	$this->session->set_flashdata('contactform_submit_msg', '<div class="alert alert-danger">Getting error while submitting form!</div>');
		    }
		    redirect(base_url().'contact_us');
		} else {
			$this->contact_us();
		}
	} 

	

}
