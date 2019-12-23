<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="heading">
        <h1 class="page-title">Your Services </h1>          
      </div>
    </div>
    <div class="col-md-6">
      <!--
      <?php $this->load->helper("form"); ?>
      <form role="form" id="updatePackageInfo" name="updatePackageInfo" action="" method="post" style="margin-top: 15px;">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <select class="form-control" name="customer-header" id="customer-header">
                <option value="Choose From Teamate">Choose From Teamate</option>
                <option value="Upload">Upload</option>
                <option value="Search Web">Search Web</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="submit" name="submit-header" id="submit-header" class="btn btn-default" value="Submit">
            </div>
          </div>
        </div>
      </form>
    -->
    </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-12">
              <div class="row">
                  <div class="col-md-4" style="width: 32%;margin-left: 6px;margin-right: 6px;">
                     <?php $this->load->view('dashboard/service_info'); ?>
                     <?php $this->load->view('dashboard/service_how_to_book'); ?>
                     <?php $this->load->view('dashboard/service_reviews'); ?>
                     <div class="row">
                       <div class="col-md-12">
                          <br/>
                          <input type="button" class="btn btn-primary" id="addnewservicebtn" name="addnewservicebtn" value="Add New Service" style="width: 180px;" onclick="makeEditable('servicinfoEditBtn', 'serviceinfo-view', 'serviceinfo-edit');">
                       </div>
                     </div>
                  </div>
                  <div class="col-md-4" style="width: 32%;margin-left: 6px;margin-right: 6px;">
                      <?php $this->load->view('dashboard/service_media'); ?>
                      <?php $this->load->view('dashboard/service_business_address'); ?>
                      <?php //$this->load->view('dashboard/service_packages'); ?>
                  </div>
                  <div class="col-md-4" style="width: 32%;margin-left: 6px;margin-right: 6px;">
                      <?php $this->load->view('dashboard/service_availability'); ?>
                      <?php //$this->load->view('dashboard/service_categories'); ?>
                  </div>
              </div>              
        </div>
    </div>   
</div>

          <div id="serviceEditBox" class="EditBox">
            <div class="container">
              <div id="serviceEdit" class="Edit">
                  <form action="" method="POST" name="saveEditServiceForm" id="saveEditServiceForm">
                  </form>
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

          <div id="packageEditBox" class="EditBox">
            <div class="container">
              <div id="packageEdit" class="Edit">
                <div class="container">
                  <div class="row marginBottom50">
                    <div class="col-md-10">
                      <h1>Edit Service</h1>
                    </div>      
                    <div class="col-md-2"><a href="javascript:void(0)" class="btn btn-danger closeEditBox" onclick="closeBox('packageEditBox', 'saveEditPackageForm')">Close</a></div>
                  </div>
                  <form action="" method="POST" name="saveEditPackageForm" id="saveEditPackageForm">
                  </form>
                </div>
              </div>      
            </div>    
          </div>


          <!-- Package Delete Modal -->
          <div class="modal fade" id="deletePackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <button type="button" class="btn btn-primary" id="deletePackageBtn">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <div class="hiddenFields">
                    <input type="hidden" name="deletePackageID" id="deletePackageID" value="">
                  </div>          
                </div>
              </div>
            </div>
          </div>


          <div id="categoryEditBox" class="EditBox">
            <div class="container">
              <div id="categoryEdit" class="Edit">
                <div class="container">
                  <div class="row marginBottom50">
                    <div class="col-md-10">
                      <h1>Edit Category</h1>
                    </div>      
                    <div class="col-md-2"><a href="javascript:void(0)" class="btn btn-danger closeEditBox" onclick="closeBox('categoryEditBox', 'saveEditCategoryForm')">Close</a></div>
                  </div>
                  <form action="" method="POST" name="saveEditCategoryForm" id="saveEditCategoryForm">
                  </form>
                </div>
              </div>      
            </div>    
          </div>


          <!-- Package Delete Modal -->
          <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <button type="button" class="btn btn-primary" id="deleteCategoryBtn">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <div class="hiddenFields">
                    <input type="hidden" name="deleteCategoryID" id="deleteCategoryID" value="">
                  </div>          
                </div>
              </div>
            </div>
          </div>  
