<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('services_model');
        $this->load->model('payment_model');
        $this->load->helper("html");
        $this->load->helper("form");
        $this->load->helper('url');


        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){		
		$data['pageTitle'] = 'Pro Dashboard';
        $data['services'] = $this->services_model->getUserServices($this->session->userdata('id'));
        $data['ccpaymentinfo'] = $this->payment_model->getpaymentData($this->session->userdata('id'), 1, 'creditcard', md5('userid_'.$this->session->userdata('id')));
        $data['paypalpaymentinfo'] = $this->payment_model->getpaymentData($this->session->userdata('id'), 1, 'paypal', md5('userid_'.$this->session->userdata('id')));     
        $this->load->helper('url');
        $this->load->model('calendar_model');
        $prefs = $this->calendar_model->get_business_calendar_prefs();
        $this->load->library('calendar', $prefs);
        //$eventsData = $this->calendar_model->get_calendar_events();
        $bookingData = $this->services_model->get_business_services_booking($this->session->userdata('id'));
        if($this->uri->segment(2) !== null){
            $year = $this->uri->segment(2);
        } else {
            $year = date('Y');
        } 
        if($this->uri->segment(3) !== null){
            $month = $this->uri->segment(3);
        } else {
            $month = date('m');
        }
        $data['year'] = $year;
        $data['month'] = $month;                
        $data['calendarData'] = $bookingData;		

		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('dashboard/footer');
	}

    function businessUpdateCCInfo(){
        $this->load->model('payment_model');
        $valid = 0;
        if($this->input->post('cc_number') !== null){
            $cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'creditcard', 'cc_number', str_replace(' ', '', $this->input->post('cc_number')), md5('userid_'.$this->session->userdata('id')));
            if($cc_number_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }

        if($this->input->post('cc_exp_month') !== null && $this->input->post('cc_exp_year') !== null){
            $cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'creditcard', 'cc_exp', $this->input->post('cc_exp_month').'/'.$this->input->post('cc_exp_year'), md5('userid_'.$this->session->userdata('id')));
            if($cc_number_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }

        if($this->input->post('cc_cvv') !== null){
            $cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'creditcard', 'cc_cvv', str_replace(' ', '', $this->input->post('cc_cvv')), md5('userid_'.$this->session->userdata('id')));
            if($cc_number_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }

        if($this->input->post('cc_name') !== null){
            $cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'creditcard', 'cc_name', $this->input->post('cc_name'), md5('userid_'.$this->session->userdata('id')));
            if($cc_number_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }


        if($valid == 1){
            echo 'success';
        } else {
            echo 'error';
        }
    }

    function businessUpdatePaypalInfo(){
        $this->load->model('payment_model');
        $valid = 0;
        if($this->input->post('paypal_name') !== null){
            $paypal_name_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'paypal', 'paypal_name', $this->input->post('paypal_name'), md5('userid_'.$this->session->userdata('id')));
            if($paypal_name_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }
        
        
        if($this->input->post('paypal_email') !== null){
            $paypal_email_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 1, 'paypal', 'paypal_email', $this->input->post('paypal_email'), md5('userid_'.$this->session->userdata('id')));
            if($paypal_email_rest){
                $valid = 1;
            } else {
                $valid = 0;
            }
        }


        if($valid == 1){
            echo 'success';
        } else {
            echo 'error';
        }
    }

    function refreshBusinessCCPaymentInfo(){
        $this->load->model('payment_model');
        $ccpaymentinfo = $this->payment_model->getpaymentData($this->session->userdata('id'), 1, 'creditcard', md5('userid_'.$this->session->userdata('id')));
        $html = '';
        $html .= '<div class="box-body">
                              <div class="row">
                                  <div class="col-md-6">        
                                      <div class="form-group">
                                          <label for="creditcardno">Credit Card #</label><br/>';
                                           if($ccpaymentinfo['cc_number'] != ''){
                                                $count = strlen($ccpaymentinfo['cc_number']) - 4;
                                                for($n = 1; $count >= $n; $n++){
                                                      $html .= "*";
                                                      if($n % 4 === 0){
                                                        $html .= " ";
                                                      }
                                                }
                                                $html .= substr($ccpaymentinfo['cc_number'],-4);
                                            } else {
                                                $html .= 'Not Available';
                                            }
                                    $html .=  '</div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="email">Expiry Date</label><br/>';
                                                if($ccpaymentinfo['cc_exp'] != ''){ 
                                                    $html .= $ccpaymentinfo['cc_exp'];
                                                } else {
                                                    $html .= 'Not Available';
                                                }
                                    $html .= '</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="password">CVV #</label><br/>';
                                          if($ccpaymentinfo['cc_cvv'] != ''){ 
                                            $html .= "***";
                                          } else {
                                            $html .= 'Not Available';
                                          }
                                    $html .= '</div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="mobile">Name on Card</label><br/>';
                                            if($ccpaymentinfo['cc_name'] != ''){ 
                                                $html .= $ccpaymentinfo['cc_name'];
                                            } else {
                                                $html .= 'Not Available';
                                            }
                                    $html .=  '</div>                                    
                                  </div>
                              </div>                          
                          </div><!-- /.box-body -->';
        echo $html;                
    }

    function refreshBusinessPaypalPaymentInfo(){
        $this->load->model('payment_model');
        $paypalpaymentinfo = $this->payment_model->getpaymentData($this->session->userdata('id'), 1, 'paypal', md5('userid_'.$this->session->userdata('id')));
        $html = '';
        $html .= '<div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="fname">Name</label><br/>';
                                          if($paypalpaymentinfo['paypal_name'] != ''){ 
                                            $html .= $paypalpaymentinfo['paypal_name'];
                                          } else {
                                            $html .= 'Not Available';
                                          } 
                              $html .=  '</div>
                                      
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Paypal ID</label><br/>';
                                          if($paypalpaymentinfo['paypal_email'] != ''){ 
                                            $html .= $paypalpaymentinfo['paypal_email'];
                                          } else {
                                            $html .= 'Not Available';
                                          }
                                    $html .=  '</div>
                                  </div>                                
                              </div>                          
                           </div><!-- /.box-body -->';
        echo $html;
    }

    function inbox(){
      $data['pageTitle'] = 'Inbox';
      $this->load->view('dashboard/header', $data);
      $this->load->view('dashboard/inbox', $data);
      $this->load->view('dashboard/footer');    
    }

}

?>