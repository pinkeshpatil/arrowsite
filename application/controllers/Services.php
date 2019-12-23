<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('services_model');

        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){		
		$data['pageTitle'] = 'My Services'; 
        $data['services'] = $this->services_model->getUserServices($this->session->userdata('id'));      
        $data['reviews'] = $this->services_model->getServiceReviews($this->session->userdata('id'));      
        $data['packages'] = $this->services_model->getPackagesData($this->session->userdata('id'));      
        $data['categories'] = $this->services_model->getCategoriesData($this->session->userdata('id'));
        $data['business_address'] = $this->services_model->getBusinessAddressData($this->session->userdata('id'), 'business_address');
        $this->load->helper('url');
        $this->load->model('calendar_model');
        $prefs = $this->calendar_model->get_business_calendar_prefs();
        //$prefs = $this->calendar_model->get_calendar_prefs();
        $this->load->library('calendar', $prefs);
        //$eventsData = $this->calendar_model->get_calendar_events();
        $bookingData = $this->calendar_model->get_services_booking($this->session->userdata('id'));
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
        $this->load->library('calendar');
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/services', $data);
        $this->load->view('dashboard/footer');
	}

    

    function updateServiceInfo(){
        $service_id = 0;
        if($this->input->post('service-title') !== null){
            $serviceData = array(
                'service_title' => $this->input->post('service-title'),
                'service_description' => $this->input->post('service-description'),
                'service_pricing' => $this->input->post('service-pricing'),
                'service_category' => implode(",", $this->input->post('service-category'))
            );
            if($this->input->post('service_id') !== null){
                $service_id = $this->services_model->updateServiceData($serviceData, $this->session->userdata('id'), $this->input->post('service_id'));                
            } else {
                $service_id = $this->services_model->updateServiceData($serviceData, $this->session->userdata('id'), 0);
            }   

            if($_FILES['service_picture']['name'] !== null){
                $path = 'assets/uploads/services-images/';           
                $img = $_FILES['service_picture']['name'];
                $final_image = rand(1000,1000000).$service_id.$img;
                if($img != ''){ 
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $final_image ;
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('service_picture')) {
                       $uploadResp = $this->upload->display_errors();
                       $service_picture = '';
                    } else  {
                        $uploadResp = $this->upload->data();  
                        $service_picture = $uploadResp['file_name'];
                        $file_path = $uploadResp['file_path'];
                    } 
                } else {
                    $service_picture = '';
                }

                if($service_picture != ''){
                    $serviceImgData = array(               
                        'service_image' => $service_picture
                    );
                    $this->services_model->updateServiceData($serviceImgData, $this->session->userdata('id'), $service_id);  
                }
            }

            $this->load->library('upload');
            $files = $_FILES;
            $dataInfo = array();
            $service_media = count($_FILES['service_media']['name']);
            $imgno = 1;
            for($i=0; $i<$service_media; $i++) {           
                $_FILES['service_media']['name']= $service_id.$imgno.'_'.$files['service_media']['name'][$i];
                $_FILES['service_media']['type']= $files['service_media']['type'][$i];
                $_FILES['service_media']['tmp_name']= $files['service_media']['tmp_name'][$i];
                $_FILES['service_media']['error']= $files['service_media']['error'][$i];
                $_FILES['service_media']['size']= $files['service_media']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                if($this->upload->do_upload('service_media')){
                    $dataInfo = $this->upload->data();  
                    $service_img = $dataInfo['file_name'];
                    $imgData = array('service_id' => $service_id, 'service_image_name' => $service_img);
                    $this->services_model->sevice_images_insert($imgData); 
                    $imgno++;
                }   
            }

            
            if($service_id != ''){
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    /*function getservice(){
        if($this->input->post('serviceid') != ''){
            $serviceid = $this->input->post('serviceid');
            $service = $this->services_model->getServiceData($serviceid);
            if($service['service_image'] != ''){ 
                $imgData = '<img src="'.base_url().'assets/uploads/services-images/'.$service['service_image'].'" width="180" class="img-responsive profile-pic"/>';
            } else {
                $imgData = '';
            }
            $html = '<div class="row">
                        <div class="col-md-6">    
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="service-title">Title</label>
                                        <input type="text" class="form-control required" value="'.$service['service_title'].'" id="service-title" name="service-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-description">Description</label>
                                        <textarea class="form-control" name="service-description" id="service-description">'.$service['service_description'].'</textarea>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="text-align:center;">
                                        '.$imgData.'
                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById(\'update_service_picture\').click();">Update Picture</a></p>
                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_picture" id="service_picture"></p>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" id="updateserviceinfobtn" name="updateserviceinfobtn" value="Save" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                    <div class="hidden-fields">
                                        <input type="hidden" name="service_id" id="service_id" value="'.$service['id'].'">
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-8"><br/>
                                    <div id="updateserviceinfomsg" class="alert"></div>
                                  </div>
                              </div>';

            echo $html;
        }
    }*/

    function getservice(){
        if($this->input->post('serviceid') != ''){
            $serviceid = $this->input->post('serviceid');
            $service = $this->services_model->getServiceData($serviceid);
            $packages = $this->services_model->getPackagesData($this->session->userdata('id'));      
            $categories = $this->services_model->getCategoriesData($this->session->userdata('id'));
            $service_categories = explode(",", $service['service_category']);
            $mediaImagesData = '';
            $mediaImagesData .= '<div class="row">';
            $mediaImages = $this->services_model->getServiceMediaData($serviceid);
            if(sizeof($mediaImages) > 0){
                $no = 1;
                foreach($mediaImages as $image){
                    if($image['service_img_id'] != ''){
                       $mediaImagesData .= '<div class="col-md-4"><img src="'.base_url().'assets/uploads/services-images/'.$image['service_image_name'].'" width="180" class="img-responsive service-media"/></div>';
                        if($no % 3 == 0){
                            $mediaImagesData .= '</div><div class="row">';
                        }
                        $no++;    
                    }
                }
            }
            $mediaImagesData .= '</div>';

            if($service['service_image'] != ''){ 
                $imgData = '<img src="'.base_url().'assets/uploads/services-images/'.$service['service_image'].'" width="180" class="img-responsive profile-pic"/>';
            } else {
                $imgData = '';
            }
            $html = '<form action="" method="POST" name="saveEditServiceForm" id="saveEditServiceForm">   
                            <div class="row">
                                <div class="col-md-12">        
                                    <div class="form-group">
                                        <label for="service-title">Title</label>
                                        <input type="text" class="form-control required" value="'.$service['service_title'].'" id="service-title" name="service-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-description">Description</label>
                                        <textarea class="form-control" name="service-description" id="service-description">'.$service['service_description'].'</textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="text-align:center;">
                                        <label for="service-thumbnail-picture">Update Thumbnail Picture</label><br/>
                                        '.$imgData.'
                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById(\'update_service_picture\').click();">Update Picture</a></p>
                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_picture" id="service_picture"></p>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="text-align:center;">
                                        <label for="service-thumbnail-picture">Update Media Pictures</label><br/>
                                        '.$mediaImagesData.'
                                        <p style="text-align: center;padding-top: 5px;"><a href="javascript:void(0)" onclick="javascript:document.getElementById(\'service_media\').click();">Update Pictures</a></p>
                                        <p style="text-align: center;padding-top: 5px;display: none;"><input type="file" name="service_media[]" id="service_media" multiple="multiple"></p>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-pricing">Pricing</label>
                                        <input type="text" class="form-control required" value="'.$service['service_pricing'].'" id="service-pricing" name="service-pricing">                       
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service-category">Categories</label>
                                        <select class="form-control" name="service-category[]" id="service-category" multiple="multiple">
                                            <option value="Athletic Training"';
                                            if(in_array("Athletic Training", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Athletic Training</option>
                                            <option value="Chiropractic Services"';
                                            if(in_array("Chiropractic Services", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Chiropractic Services</option>
                                            <option value="Coaching"';
                                            if(in_array("Coaching", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Coaching</option>
                                            <option value="Gym"';
                                            if(in_array("Gym", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Gym</option>
                                            <option value="Nutrition"';
                                            if(in_array("Nutrition", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Nutrition</option>
                                            <option value="Personal Training"';
                                            if(in_array("Personal Training", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Personal Training</option>
                                            <option value="Physical Therapy"';
                                            if(in_array("Physical Therapy", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Physical Therapy</option>
                                            <option value="Other"';
                                            if(in_array("Other", $service_categories)){
                                                $html .= 'selected';
                                            }
                                        $html .= '>Other</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" id="updateserviceinfobtn" name="updateserviceinfobtn" value="Update" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                    <div class="hidden-fields">
                                        <input type="hidden" name="service_id" id="service_id" value="'.$service['id'].'">
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-8"><br/>
                                    <div id="updateserviceinfomsg" class="alert"></div>
                                  </div>
                              </div>
                            </form>';

                echo $html;


        }
    }

    function getservices(){
        $services = $this->services_model->getUserServices($this->session->userdata('id'));
        $html = '<div class="box-body">
                            <div class="row">
                                <div class="col-md-4">         
                                    <div class="form-group">
                                        <label for="service-title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="service-description">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>';   
                           
                    if(isset($services)){ 
                        foreach($services as $service){
                            if($service['id'] != ''){
                                $html .= '<div class="row" id="service_'.$service['id'].'">
                                <div class="col-md-4">         
                                    <div class="form-group service_title_div">
                                        <label for="service-title">'.$service['service_title'].'</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group service_description_div">
                                        <label for="service-description">'. $service['service_description'].'</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="'.$service['id'].'" class="editService" title="Edit Service"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteServiceModal" data-serviceid="'.$service['id'].'" title="Delete Service"></span></a>
                                </div>
                            </div>'; 
                          
                            }
                        }
                    } 
                                        
                    $html .= '</div><!-- /.box-body -->';
            echo $html;
    }

    function deleteservice(){
        $service_id = $this->input->post('serviceid');
        $del_rest = $this->services_model->deleteService($service_id);
        if($del_rest){
            echo "success";
        } else {
            echo "error";
        }
    }

    function updatePackageInfo(){        
        if($this->input->post('package-title') !== null){
            $packageData = array(
                'package_title' => $this->input->post('package-title'),
                'package_cost' => $this->input->post('package-cost')
            );

            if($this->input->post('package_id') !== null){
                $package_id = $this->services_model->updatePackageData($packageData, $this->session->userdata('id'), $this->input->post('package_id'));                
            } else {
                $package_id = $this->services_model->updatePackageData($packageData, $this->session->userdata('id'), 0);
            }
            if($package_id != ''){
                echo 'success';
            } else {
                echo 'error';
            } 
        } else {
            echo 'error';
        }
    }

    function getpackage(){
        if($this->input->post('packageid') != ''){
            $packageid = $this->input->post('packageid');
            $packageData = $this->services_model->getPackageData($packageid);
            $html = '<div class="box-body">
                        <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="packages-title">Title</label>
                                        <input type="text" class="form-control required" value="'.$packageData['package_title'].'" id="package-title" name="package-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="package-cost">Cost</label>
                                        <input type="text" class="form-control" name="package-cost" id="package-cost" value="'.$packageData['package_cost'].'">
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="box-footer">
                              <div class="row">
                                  <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" id="updatepackageinfobtn" name="updatepackageinfobtn" value="Save" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                    <div class="hidden-fields">
                                        <input type="hidden" name="package_id" id="package_id" value="'.$packageData['id'].'">
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12"><br/>
                                    <div id="updatepackageinfomsg" class="alert"></div>
                                  </div>
                              </div>
                            </div>';
                echo $html;
        }
    }

    function getpackages(){
        $packages = $this->services_model->getPackagesData($this->session->userdata('id'));
        $html = '<div class="box-body">
                            <div class="row">
                                <div class="col-md-4">         
                                    <div class="form-group">
                                        <label for="packages-title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="packages-description">Cost</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>';   
                         
                if(isset($packages)){ 
                    foreach($packages as $package){
                        if($package['id'] != ''){
                             
                            $html .= '<div class="row" id="package_'.$package['id'].'">
                                <div class="col-md-4">         
                                    <div class="form-group package_title_div">
                                        <label for="packages-title">'.$package['package_title'].'</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group package_cost_div">
                                        <label for="packages-cost">'.$package['package_cost'].'</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="'.$package['id'].'" class="editPackage" title="Edit Package"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deletePackageModal" data-packageid="'.$package['id'].'" title="Delete Package"></span></a>
                                </div>
                            </div>'; 
                          
                        }
                    }
                } 
                $html .= '</div><!-- /.box-body -->';
                echo $html;
    }

    function deletepackage(){
        $package_id = $this->input->post('packageid');
        $del_rest = $this->services_model->deletePackage($package_id);
        if($del_rest){
            echo "success";
        } else {
            echo "error";
        }
    }

    function updateCategoryInfo(){     
        if($this->input->post('category-title') !== null){
            $categoryData = array(
                'category_title' => $this->input->post('category-title'),
                'category_description' => $this->input->post('category-description'),
                'active' => $this->input->post('category-active')
            );

            if($this->input->post('category_id')!== null){
                $category_id = $this->services_model->updateCategoryData($categoryData, $this->session->userdata('id'), $this->input->post('category_id'));                
            } else {
                $category_id = $this->services_model->updateCategoryData($categoryData, $this->session->userdata('id'), 0);
            }
            if($category_id != ''){
                echo 'success';
            } else {
                echo 'error';
            } 
        } else {
            echo 'error';
        }
    }

    function getcategory(){
        if($this->input->post('categoryid') != ''){
            $categoryid = $this->input->post('categoryid');
            $categoryData = $this->services_model->getCategoryData($categoryid);
            if($categoryData['active'] == 1){
                $checked = 'checked="checked"';
            } else {
                $checked = '';
            }
            $html = '<div class="box-body">   
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="categories-title">Title</label>
                                        <input type="text" class="form-control required" value="'.$categoryData['category_title'].'" id="category-title" name="category-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category-description">Description</label>
                                        <textarea name="category-description" id="category-description" class="form-control">'.$categoryData['category_description'].'</textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category-active">Active</label>
                                        <input type="checkbox" name="category-active" id="category-active" value="1" style="float: right;" '.$checked.'>
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="updatecategoryinfobtn" name="updatecategoryinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                                <div class="hidden-fields">
                                        <input type="hidden" name="category_id" id="category_id" value="'.$categoryData['id'].'">
                                    </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12"><br/>
                                <div id="updatecategoryinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>';
            echo $html;
        }
    }

     function getcategories(){
        $categories = $this->services_model->getCategoriesData($this->session->userdata('id'));
        $html = '<div class="box-body">';
                if(isset($categories)){ 
                    foreach($categories as $category){
                        if($category['id'] != ''){
                            $html .= '<div class="row" id="category_'.$category['id'].'">
                                <div class="col-md-4">         
                                    <div class="form-group category_title_div">
                                        <label for="category-title">'.$category['category_title'].'</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group category_checkbox_div">';
                                    if($category['active'] == 1){
                                        $checked = "checked='checked'";
                                    } else {
                                        $checked = "";
                                    }
                                    $html .= '<input type="checkbox" name="category-active" id="category-active" style="float: right;" '.$checked.'>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="'.$category['id'].'" class="editCategory" title="Edit Category"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteCategoryModal" data-categoryid="'.$category['id'].'" title="Delete Category"></span></a>
                                </div>
                            </div>'; 
                          
                        }
                    }
                } 
                $html .= '</div><!-- /.box-body -->';
                echo $html;
    }

    function deletecategory(){
        $category_id = $this->input->post('categoryid');
        $del_rest = $this->services_model->deleteCategory($category_id);
        if($del_rest){
            echo "success";
        } else {
            echo "error";
        }
    }

    private function set_upload_options(){     
        //upload an image options
        $config = array();
        $config['upload_path'] = 'assets/uploads/services-images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|webm|flv|avi';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }

    function updateBusinessAddressInfo(){     
        $valid = 1;
        if($this->input->post('street_address') !== null){
            $business_information_address_street = $this->services_model->updateBusinessAddressData($this->session->userdata('id'), 'business_address', 'street_address', $this->input->post('street_address'));
            if(!$business_information_address_street){
                $valid = 0;
            } 
        }

        if($this->input->post('city') !== null){
            $business_information_city = $this->services_model->updateBusinessAddressData($this->session->userdata('id'), 'business_address', 'city', $this->input->post('city'));
            if(!$business_information_city){
                $valid = 0;
            } 
        }

        if($this->input->post('state') !== null){
            $business_information_state = $this->services_model->updateBusinessAddressData($this->session->userdata('id'), 'business_address', 'state', $this->input->post('state'));
            if(!$business_information_state){
                $valid = 0;
            } 
        }

        if($this->input->post('zipcode') !== null){
            $business_information_zipcode = $this->services_model->updateBusinessAddressData($this->session->userdata('id'), 'business_address', 'zipcode', $this->input->post('zipcode'));
            if(!$business_information_zipcode){
                $valid = 0;
            } 
        }
        
        if($valid == 1){
            echo 'success';
        } else {
            echo 'error';
        }
    }

    function refreshBusinessAddressInfo(){
        $business_address = $this->services_model->getBusinessAddressData($this->session->userdata('id'), 'business_address');
        if($business_address){
                $html = '<label for="business-address">
                                '.$business_address['street_address'].'</label>
                        <label for="business-address">'.$business_address['city']." ".$business_address['state']." ".$business_address['zipcode'].'</label>';

        } else {
            $html = '<label for="business-address">Address not saved.</label>';
        }
        echo $html;
    }
}