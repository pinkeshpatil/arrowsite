<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if($this->session->userdata('id'))
  {
   redirect('web/profile');
  }
  $this->load->library('form_validation');
  $this->load->library('encrypt');
  $this->load->model('login_model');
 }

 function index($data = null)
 {
  $data['pageTitle'] = 'Login';
  if($this->input->post('join-community-name') && $this->input->post('join-community-email')){  
    $name = $this->input->post('join-community-name');
    $email = $this->input->post('join-community-email');
    $data['communityForm'] = array('name' => $name, 'email' => $email);
  }  
  $this->load->view('header', $data);
  $this->load->view('login', $data);
  $this->load->view('footer');
 }

 function join_our_network(){
    $data['pageTitle'] = 'Join Our Network';
    $this->load->view('header', $data);
    $this->load->view('join_our_network');
    $this->load->view('footer');
  }

  function basic_information($userdata){
    $data['pageTitle'] = 'Basic Information';
    $data['registredUser'] = $userdata;
    $this->load->view('header', $data);
    $this->load->view('basic_information', $data);
    $this->load->view('footer');
  }

 function validation()
 {
  $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
  $this->form_validation->set_rules('user_password', 'Password', 'required');
  $redirect_url = $this->input->post('page');
  if($this->form_validation->run())
  {
   $result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
   if($result == '')
   {
    if($this->session->userdata('searchterm') === null){            
      redirect($redirect_url);      
    } else {
      $searchterm = $this->session->userdata('searchterm');
      $this->session->unset_userdata('searchterm');
      redirect('search?s='.$searchterm);
    }
   }
   else
   {
    $this->session->set_flashdata('message',$result);
    redirect('login');
   }
  }
  else
  {
   $this->index();
  }
 }

 function registration(){
    $this->load->model('register_model');
    $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
    $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[athletesmarketplace_register.email]');
    $this->form_validation->set_rules('user_password', 'Password', 'trim|required|matches[re_type_user_password]');
    $this->form_validation->set_rules('re_type_user_password', 'Password', 'required');
    if($this->input->post('athlete_user') == '' && $this->input->post('business_user') == ''){
      $this->form_validation->set_rules('athlete_user', 'User Type', 'required');
      $usertype = 0;
    } else if($this->input->post('athlete_user') == 1 && $this->input->post('business_user') == ''){
      $usertype = 1;
    } else if($this->input->post('athlete_user') == '' && $this->input->post('business_user') == 2){
      $usertype = 2;
    } else if($this->input->post('athlete_user') == 1 && $this->input->post('business_user') == 2){
      $usertype = 3;
    }
    if($this->form_validation->run()) {
     $verification_key = md5(rand());
     $encrypted_password = $this->encrypt->encode($this->input->post('user_password'));
     $data = array(
      'name'  => $this->input->post('user_name'),
      'email'  => $this->input->post('user_email'),
      'password' => $encrypted_password,
      'verification_key' => $verification_key,
      'is_email_verified' => 'yes',
      'user_type' => $usertype
     );
     $id = $this->register_model->insert($data); 
     if($id){
      $userdata = array('id' => $id, 'name' => $this->input->post('user_name'));
      $this->basic_information($userdata);
     } else {
      $data['activeSection'] = array('loginActive' => false, 'registerActive' => true);
      $this->index($data);
     }
    } else {
      if($this->input->post('page') == "login"){
        $data['activeSection'] = array('loginActive' => false, 'registerActive' => true);
        $this->index($data);
      } else {          
        $this->join_our_network();
      }
      
    }
 }

 function addBasicInfo(){
      $this->form_validation->set_rules('about_dob', 'Date of Birth', 'required|trim');
      $this->form_validation->set_rules('about_prs', 'PRS', 'required|trim');
      $this->form_validation->set_rules('about_street', 'Street', 'required');
      $this->form_validation->set_rules('about_city', 'City', 'required');
      $this->form_validation->set_rules('about_state', 'State', 'required');
      $this->form_validation->set_rules('about_zipcode', 'Zipcode', 'required');


    if($this->form_validation->run()) {
        $this->load->model('user_model');
        $valid = 1;
        $about_dob_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_dob', $this->input->post('about_dob'));
        if($about_dob_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_prs_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_prs', $this->input->post('about_prs'));
        if($about_prs_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_street_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_street', $this->input->post('about_street'));
        if($about_street_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_city_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_city', $this->input->post('about_city'));
        if($about_city_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_state_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_state', $this->input->post('about_state'));
        if($about_state_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_zipcode_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_zipcode', $this->input->post('about_zipcode'));
        if($about_zipcode_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_state_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_state', $this->input->post('about_state'));
        if($about_state_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }

        $about_zipcode_rest = $this->user_model->updateUserAboutData($this->input->post('registeredId'), 'about', 'about_zipcode', $this->input->post('about_zipcode'));
        if($about_zipcode_rest){
          $valid = 1;
        } else {
          $valid = 0;
        }
        $this->session->set_userdata('id', $this->input->post('registeredId'));
        redirect(base_url());
         
    } else {
          $userdata = array('id' => $this->input->post('registeredId'), 'name' => $this->input->post('registeredName'));
          $this->basic_information($userdata);
    }
  }
 
}

?>