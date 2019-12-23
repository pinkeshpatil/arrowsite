<div class="container">
  <div class="row">
    <div class="heading">
      <h1 class="page-title">Pro Dashboard</h1>          
    </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-12">
              <div class="row">
                  <div class="col-md-6">                      
                      <?php $this->load->view('dashboard/dashboard_services'); ?>
                  </div>
                  <div class="col-md-6">
                      <?php $this->load->view('dashboard/dashboard_calendar'); ?>
                      <?php $this->load->view('dashboard/dashboard_payment_data'); ?>
                      <?php //$this->load->view('dashboard/dashboard_month_glance'); ?>
                      <?php //$this->load->view('dashboard/dashboard_year_glance'); ?>
                  </div>
              </div>              
        </div>
    </div>   
</div>


<div id="serviceEditBox" class="EditBox">
            <div class="container">
              <div id="serviceEdit" class="Edit">
                <div class="container">
                  <div class="row marginBottom50">
                    <div class="col-md-10">
                      <h1>Edit Service</h1>
                    </div>      
                    <div class="col-md-2"><a href="javascript:void(0)" class="btn btn-danger closeEditBox" onclick="closeBox('serviceEditBox', 'saveEditServiceForm')">Close</a></div>
                  </div>
                  <form action="" method="POST" name="saveEditServiceForm" id="saveEditServiceForm">
                  </form>
                </div>
              </div>      
            </div>    
          </div>


          <!-- Service Delete Modal -->
          <div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="width: 90%;display: inline;"><b>Delete Confirmation:</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="deleteServiceBtn">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <div class="hiddenFields">
                    <input type="hidden" name="deleteServiceID" id="deleteServiceID" value="">
                  </div>          
                </div>
              </div>
            </div>
          </div>  
