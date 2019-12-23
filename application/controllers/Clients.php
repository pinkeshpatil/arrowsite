<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

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
		$data['pageTitle'] = 'Clients';
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/clients', $data);
		$this->load->view('dashboard/footer');
	}

    

}

?>