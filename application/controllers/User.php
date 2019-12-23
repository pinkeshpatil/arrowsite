<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper("html");
        $this->load->helper("form");
        $this->load->helper('url');


        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){		
		$data['pageTitle'] = 'My Info';
		$this->load->model('payment_model');
		$data['user_bio'] = $this->user_model->getUserBio($this->session->userdata('id'));
		$data['ccpaymentinfo'] = $this->payment_model->getpaymentData($this->session->userdata('id'), 0, 'creditcard', md5('userid_'.$this->session->userdata('id')));
		$data['paypalpaymentinfo'] = $this->payment_model->getpaymentData($this->session->userdata('id'), 0, 'paypal', md5('userid_'.$this->session->userdata('id')));
		$data['aboutinfo'] = $this->user_model->getAboutData($this->session->userdata('id'), 'about');
		$data['insuranceinfo'] = $this->user_model->getAboutData($this->session->userdata('id'), 'insurance');
		$data['services_booked'] = $this->user_model->getServicesBookedData($this->session->userdata('id'));
		$this->load->view('header', $data);
		$this->load->view('user_info', $data);
		$this->load->view('footer');
	}

	/*function services(){
		$data['pageTitle'] = 'My Services';		
		$this->load->view('header', $data);
		$this->load->view('services');
		$this->load->view('footer');
	}*/

	function calendar(){
		$data['pageTitle'] = 'Calendar';		
		$this->load->view('header', $data);
		$this->load->view('calendar');
		$this->load->view('footer');
	}

	function messages(){
		$data['pageTitle'] = 'Messages';
		$this->load->model('web_model');		
		$data['messages'] = $this->web_model->get_contactforms();
		$this->load->view('header', $data);
		$this->load->view('messages');
		$this->load->view('footer');
	}

	function updateUserBio(){
		if($this->input->post('uploaded_profile_img') !== null){
			$image = $this->input->post('uploaded_profile_img');
			$imageAry = explode("/", $image);
			$profile_img = end($imageAry);
		} else {
			$profile_img = '';
		}

			$userData = array(
					'name' => $this->input->post('name'),
				);
			if($profile_img == ''){
				$bioData = array(				
						'gym_type' => $this->input->post('gym_type'),				
						'short_bio' => $this->input->post('short_bio')
					);
			} else {
				$file_path = 'assets/uploads/profile-images/';
				$dataUser_bio = $this->user_model->getUserBio($this->session->userdata('id'));
				if(file_exists($file_path.$dataUser_bio['profile_img_name'])){
					unlink($file_path.$dataUser_bio['profile_img_name']);
				}
				copy('assets/uploads/profile-images/temp-images/'.$this->session->userdata('id').'/'.$profile_img , $file_path.$profile_img);
				$bioData = array(				
						'gym_type' => $this->input->post('gym_type'),				
						'mobile_number' => $this->input->post('mobile_number'),
						'short_bio' => $this->input->post('short_bio'),
						'profile_img_name' => $profile_img
					);	
			}	
			$this->user_model->updateUserData($userData, $this->session->userdata('id'));
			$this->user_model->updateBioData($bioData, $this->session->userdata('id'));
			if($profile_img == ''){
				echo 'success';
			} else {
				echo $profile_img;
			}
		
	}

	function updateCCInfo(){
		$this->load->model('payment_model');
		$valid = 0;
		if($this->input->post('cc_number') !== null){
			$cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'creditcard', 'cc_number', str_replace(' ', '', $this->input->post('cc_number')), md5('userid_'.$this->session->userdata('id')));
			if($cc_number_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('cc_exp_month') !== null && $this->input->post('cc_exp_year') !== null){
			$cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'creditcard', 'cc_exp', $this->input->post('cc_exp_month').'/'.$this->input->post('cc_exp_year'), md5('userid_'.$this->session->userdata('id')));
			if($cc_number_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('cc_cvv') !== null){
			$cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'creditcard', 'cc_cvv', str_replace(' ', '', $this->input->post('cc_cvv')), md5('userid_'.$this->session->userdata('id')));
			if($cc_number_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('cc_name') !== null){
			$cc_number_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'creditcard', 'cc_name', $this->input->post('cc_name'), md5('userid_'.$this->session->userdata('id')));
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

	function updatePaypalInfo(){
		$this->load->model('payment_model');
		$valid = 0;
		if($this->input->post('paypal_name') !== null){
			$paypal_name_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'paypal', 'paypal_name', $this->input->post('paypal_name'), md5('userid_'.$this->session->userdata('id')));
			if($paypal_name_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}
		
		
		if($this->input->post('paypal_email') !== null){
			$paypal_email_rest = $this->payment_model->updatepaymentData($this->session->userdata('id'), 0, 'paypal', 'paypal_email', $this->input->post('paypal_email'), md5('userid_'.$this->session->userdata('id')));
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

	function refreshCCPaymentInfo(){
		$this->load->model('payment_model');
		$ccpaymentinfo = $this->payment_model->getpaymentData($this->session->userdata('id'), 0, 'creditcard', md5('userid_'.$this->session->userdata('id')));
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

	function refreshPaypalPaymentInfo(){
		$this->load->model('payment_model');
		$paypalpaymentinfo = $this->payment_model->getpaymentData($this->session->userdata('id'), 0, 'paypal', md5('userid_'.$this->session->userdata('id')));
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

	function refreshBioInfo(){
		$user_bio = $this->user_model->getUserBio($this->session->userdata('id'));
		$html = '';
		$html .= '<div class="row">  
                          <div class="col-md-2">
                              
                          </div>
                          <div class="col-md-6" style="text-align: center;">
                            <div class="profile-section">';
                              if($user_bio['profile_img_name'] != ''){ 
                                $html .= '<img src="'.base_url().'assets/uploads/profile-images/'.$user_bio['profile_img_name'].'" width="180" class="img-responsive profile-pic"/>';
                              } 
                            $html .= '</div>
                          </div>
                          <div class="col-md-2">
                              
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label><br/>';
                                        $html .= $user_bio['name']; 
                                    $html .= '</div>
                                    
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Primary Sports</label><br/>';
                                        $html .= $user_bio['gym_type']; 
                                    $html .= '</div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="shotdesc">Short Bio</label><br/>';
                                        $html .= $user_bio['short_bio']; 
                                    $html .= '</div>
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->';
        echo $html; 

	}

	function updateAboutInfo(){
		$valid = 0;
		
			if($this->input->post('about_information_shareable') == 'yes'){
				$about_information_shareable = 'yes';
			} else {
				$about_information_shareable = 'no';
			}
			$about_information_shareable_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_information_shareable', $about_information_shareable);
			if($about_information_shareable_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		

		if($this->input->post('mobile_number') !== null){
			$BioData = array('mobile_number' => $this->input->post('mobile_number'));
			$about_phone_rest = $this->user_model->updateBioData($BioData, $this->session->userdata('id'));
			if($about_phone_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}


		if($this->input->post('about_dob') !== null){
			$about_dob_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_dob', $this->input->post('about_dob'));
			if($about_dob_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('about_prs') !== null){
			$about_prs_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_prs', $this->input->post('about_prs'));
			if($about_prs_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('about_street') !== null){
			$about_street_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_street', $this->input->post('about_street'));
			if($about_street_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('about_city') !== null){
			$about_city_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_city', $this->input->post('about_city'));
			if($about_city_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('about_state') !== null){
			$about_state_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_state', $this->input->post('about_state'));
			if($about_state_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('about_zipcode') !== null){
			$about_zipcode_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'about', 'about_zipcode', $this->input->post('about_zipcode'));
			if($about_zipcode_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}


		if($valid){
			echo 'success';
		} else {
			echo 'error';
		}
	}

	function updateInsuranceInfo(){
		$valid = 0;
		if($this->input->post('insurance_name') !== null){
			$insurance_name_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'insurance', 'insurance_name', $this->input->post('insurance_name'));
			if($insurance_name_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('insurance_id') !== null){
			$insurance_id_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'insurance', 'insurance_id', $this->input->post('insurance_id'));
			if($insurance_id_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($this->input->post('insurance_expiry_date') !== null){
			$insurance_expiry_date_rest = $this->user_model->updateUserAboutData($this->session->userdata('id'), 'insurance', 'insurance_expiry_date', $this->input->post('insurance_expiry_date'));
			if($insurance_expiry_date_rest){
				$valid = 1;
			} else {
				$valid = 0;
			}
		}

		if($valid){
			echo 'success';
		} else {
			echo 'error';
		}
	}

	function refreshAboutInfo(){
		$aboutinfo = $this->user_model->getAboutData($this->session->userdata('id'), 'about');
		$html = '';
		$html .= '<div class="box-body">
							  <div class="row">
							  	  <div class="col-md-12">
							  	  	  <div class="form-group">
                                        <label for="about_information_shareable">Information Shareable: </label>&nbsp;';
                                        if($aboutinfo['about_information_shareable'] == 'yes'){
                                        	$html .= 'Yes';
                                        } else {
                                        	$html .= 'No';
                                        }
                                    $html .= '</div>
							  	  </div>
							  </div>
							  <div class="row">
							  	  <div class="col-md-6">
							  	  	  <div class="form-group">
                                        <label for="email">Email address</label><br/>';
                                        $html .= $aboutinfo['about_email'];
                                    $html .= '</div>
							  	  </div>
							  	  <div class="col-md-6">
							  	  	<div class="form-group">
                                        <label for="mobile">Mobile Number</label><br/>';
                                        $html .= $aboutinfo['about_phone'];
                                    $html .= '</div>
							  	  </div>
							  </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="dob">Date of Birth</label><br/>';
                                          if($aboutinfo['about_dob'] != ''){ 
                                              $html .=  $aboutinfo['about_dob'];
                                           } 
                                    $html .= '</div>
                                  </div>
                                  <div class="col-md-6">
                                                                         
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <label for="address">Address</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="street">Street</label><br/>';
                                          if($aboutinfo['about_street'] != ''){ 
                                              $html .=  $aboutinfo['about_street'];
                                           }
                                      $html .= '</div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="city">City</label><br/>';
                                          if($aboutinfo['about_city'] != ''){ 
                                              $html .=  $aboutinfo['about_city'];
                                           }
                                      $html .= '</div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="state">State</label><br/>';
                                          if($aboutinfo['about_state'] != ''){ 
                                              $html .=  $aboutinfo['about_state'];
                                           } 
                                      $html .= '</div>                                    
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="zipcode">Zipcode</label><br/>';
                                          if($aboutinfo['about_zipcode'] != ''){ 
                                              $html .=  $aboutinfo['about_zipcode'];
                                           }
                                      $html .= '</div>                                    
                                  </div>
                              </div>                               
                          </div><!-- /.box-body -->';
        echo $html;                
	}

	function refreshInsuranceInfo(){
		$insuranceinfo = $this->user_model->getAboutData($this->session->userdata('id'), 'insurance');
		$html = '';
		$html .= '<div class="box-body">
                              <div class="row">
                                  <div class="col-md-12">        
                                      <div class="form-group">
                                          <label for="fname">Insurance Name</label><br/>';
                                          if($insuranceinfo['insurance_name'] != ''){ 
                                              $html .=  $insuranceinfo['insurance_name'];
                                           } 
                                      $html .= '</div>
                                      
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Insurance ID</label><br/>';
                                          if($insuranceinfo['insurance_id'] != ''){ 
                                              $html .=  $insuranceinfo['insurance_id'];
                                           }
                                      $html .= '</div>
                                  </div>                                
                              </div>                          
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Insurance Expiry Date</label><br/>';
                                          if($insuranceinfo['insurance_expiry_date'] != ''){ 
                                              $html .=  $insuranceinfo['insurance_expiry_date'];
                                           }
                                      $html .= '</div>
                                  </div>                                
                              </div>                          
                           </div><!-- /.box-body --> ';
        echo $html;
	}

	function getImagepath(){
		if(is_array($_FILES)) {
			$user_dir = 'assets/uploads/profile-images/temp-images/'.$this->session->userdata('id');
			$img = $_FILES['profile_img']['name'];
			//$ext = explode(".", $img);
			//$final_image = rand(1000,1000000).$this->session->userdata('id').'.'.$ext[1];
			$final_image = rand(1000,1000000).$this->session->userdata('id').$img;
			
			if($img != ''){ 
					if (!file_exists($user_dir)) {
					    mkdir($user_dir, 0777, true);
					}
					$files = glob($user_dir.'/*'); // get all file names
					foreach($files as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					
				$config['upload_path'] = $user_dir.'/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $final_image ;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('profile_img')) {
				   $uploadResp = $this->upload->display_errors();
				   $profile_img = '';
				} else 	{
				    $uploadResp = $this->upload->data();  
					$userImage = base_url().$user_dir.'/'.$uploadResp['file_name'];
					$file_path = $uploadResp['file_path'];
				} 
			} else {
				$userImage = '';
			}
			echo $userImage;
		}
	}

}
