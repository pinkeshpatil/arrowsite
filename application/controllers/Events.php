<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	/**
     * This is default constructor of the class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('events_model');
        $this->load->helper('url');
        
        date_default_timezone_set('US/Eastern');
        if($this->session->userdata('id') === null){
        	redirect(base_url());
        }
    }

	function index(){
        $eventsData = $this->events_model->get_events();
		$data['pageTitle'] = 'Events';
        $data['eventsData'] = $eventsData;
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/events');
        $this->load->view('dashboard/footer');
	}
    
    
    function edit_event(){
        if($this->uri->segment(3) !== null){
            $event_id = $this->uri->segment(3);
            $data['pageTitle'] = 'Edit Event';
            $eventData = $this->events_model->get_event($event_id);
            $eventMedia = $this->events_model->get_event_media($event_id);
            $data['event'] = $eventData;
            $data['media'] = $eventMedia;
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/edit_event', $data);
            $this->load->view('dashboard/footer');
        } else {
            redirect('events');
        }
    }

    
    function updateEventInfo(){        
        if($this->input->post('event_title') !== null){
            if($this->input->post('event_all_day') == 1){
                $event_all_day = 'yes';
            } else {
                $event_all_day = 'no';
            }
            
            $eventData = array(
              'event_title'  => $this->input->post('event_title'),
              'event_email'  => $this->input->post('event_email'),
              'event_phone'  => $this->input->post('event_phone'),
              'event_website'  => $this->input->post('event_website'),
              'event_from_date'  => $this->input->post('event_from_date'),
              'event_to_date'  => $this->input->post('event_to_date'),        
              'event_from_time'  => $this->input->post('event_from_time'),
              'event_to_time'  => $this->input->post('event_to_time'),
              'event_all_day'  => $event_all_day,
              'event_street'  => $this->input->post('event_street_address'),
              'event_city'  => $this->input->post('event_city'),
              'event_state'  => $this->input->post('event_state'),
              'event_zipcode'  => $this->input->post('event_zipcode'),
              'event_description'  => $this->input->post('event_description')
            );
            
            $event_id = $this->events_model->update_event($eventData, $this->input->post('event_id'));
            
            if($event_id != ''){
                echo 'success';
            } else {
                echo 'error';
            } 
        } else {
            echo 'error';
        }
    }

    function refreshEventInfo(){
        $event_id = $this->input->post('event_id');
        $event = $this->events_model->get_event($event_id);
        $html = '<div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <h2>'.$event->event_title.'</h2>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        Email: <label>'.$event->event_email.'</label>
                                        <br/>
                                        Phone #: <label>'.$event->event_phone.'</label>
                                        <br/>Website: <label><a href="'.$event->event_website.'" target="_blank">'.$event->event_website.'</a></label>
                                        
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        Date: <label>'; 
                                        if($event->event_from_date != $event->event_to_date){ 
                                            $html .= $event->event_from_date .' - '. $event->event_to_date;  
                                        } else { 
                                            $html .=  $event->event_from_date; 
                                        } 
                                        $html .= '</label><br/>
                                        Time: <label>';
                                        if($event->event_all_day == 'no'){ 
                                            $html .= $event->event_from_time .' - '. $event->event_to_time;  
                                        } else { 
                                            $html .= 'All Day'; 
                                        } 

                                        $html .= '</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <h4>Event Location</h4>
                                        <label>'.$event->event_street .','.'<br/>'. $event->event_city .','. $event->event_state .'-'. $event->event_zipcode.'</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                      </div>
                                    </div>
                                  </div>                                  
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Description</h4>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>'.$event->event_description.'</label>
                                      </div>
                                    </div>
                                  </div>                                  
                               </div>';
            echo $html;

    }

    function updateEventMedia(){   
        if($this->input->post('media_id') !== null){
            $path = 'assets/uploads/events-images/';           
            $img = $_FILES['update_event_media']['name'];
            $img_id = $this->input->post('media_id');
            $event_id = $this->input->post('event_id');
            $imgData = $this->events_model->get_event_media_img($img_id);
            $img_prefix = explode('_', $imgData->image_name);
            $img_name = $img_prefix[0].'_'.$img;
            if($img != ''){ 
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $img_name ;
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('update_event_media')) {
                   $uploadResp = $this->upload->display_errors();
                   $media_img = '';
                } else  {
                    $uploadResp = $this->upload->data();  
                    $media_img = $uploadResp['file_name'];
                    $file_path = $uploadResp['file_path'];
                    $imageData = array('event_id' => $event_id, 'image_name' => $media_img);
                    $response = $this->events_model->event_image_update($imageData, $img_id); 
                    if($media_img != ''){
                        if(file_exists($path.$imgData->image_name)){
                            unlink($path.$imgData->image_name);
                        }
                        echo $media_img;
                    } else {
                        echo 'error';
                    }
                } 
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    function refreshEventMediaInfo(){
        $event_id = $this->input->post('event_id');
        $media = $this->events_model->get_event_media($event_id);
        $no = 1;
        $html = '<div class="row">';
        foreach($media as $event){
            if($event->image_name != ""){
                $html .= '<div class="col-md-3">         
                                <div class="form-group">
                                    <img src="'.base_url().'assets/uploads/events-images/'.$event->image_name.'" class="img-responsive" id="img_'. $event->img_id.'" style="width:100px;height: 100px;">
                                </div>
                           </div>';
            }
            if($no % 4 == 0){
                $html .= '</div><div class="row">';
            }
            $no++;
        }
        echo $html;
    }

    function updateEventPricing(){        
        if($this->input->post('event_fees') !== null){
            
            $eventData = array(
              'event_fees'  => $this->input->post('event_fees')
            );
            
            $event_id = $this->events_model->update_event($eventData, $this->input->post('event_id'));
            
            if($event_id != ''){
                echo 'success';
            } else {
                echo 'error';
            } 
        } else {
            echo 'error';
        }
    }

    function refreshEventPricing(){
        $event_id = $this->input->post('event_id');
        $event = $this->events_model->get_event($event_id);
        $html = '<div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Fees</h4>
                                <label>$'.$event->event_fees.'</label>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $html;
    }
    
    
}