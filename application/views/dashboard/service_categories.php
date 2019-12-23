<!-- Section 1/1 -->
          <div class="row">                
            <div class="box box-primary" class="col-md-12">
              <div class="box-header">
                  <h2 class="info-title">Category</h2> <a href="javascript:void(0)" id="categoriesinfoEditBtn" onclick="makeEditable('categoriesinfoEditBtn', 'categoriesinfo-view', 'categoriesinfo-edit');" style="float: right;">Edit</a>
              </div><!-- /.box-header -->
            </div>
            <div class="col-md-12">
              <div id="categoriesinfo-view" style="display: block;">
                        <div class="box-body">
                          <?php 
                            if(isset($categories)){ 
                              foreach($categories as $category){
                                if($category['id'] != ''){
                          ?>   
                            <div class="row" id="category_<?php echo $category['id']; ?>">
                                <div class="col-md-4">         
                                    <div class="form-group category_title_div">
                                        <label for="category-title"><?php echo $category['category_title']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group category_checkbox_div">
                                        <?php
                                            if($category['active'] == 1){
                                              $checked = "checked='checked'";
                                            } else {
                                              $checked = "";
                                            }
                                        ?>
                                        <input type="checkbox" name="category-active" id="category-active" style="float: right;" <?php echo $checked; ?>>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <a href="javascript:void(0)" id="<?php echo $category['id']; ?>" class="editCategory" title="Edit Category"><span class="fa fa-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)"><span class="fa fa-trash" data-toggle="modal" data-target="#deleteCategoryModal" data-categoryid="<?php echo $category['id']; ?>" title="Delete Category"></span></a>
                                </div>
                            </div> 
                          <?php
                                }
                              }
                            } 
                          ?>              
                        </div><!-- /.box-body -->
                </div>
                <div id="categoriesinfo-edit" style="display: none;">
                  <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateCategoryInfo" name="updateCategoryInfo" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">                            
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="categories-title">Add New Category</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                               
                                    <div class="form-group">
                                        <label for="categories-title">Title</label>
                                        <input type="text" class="form-control required" value="" id="category-title" name="category-title">
                                    </div>                                    
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category-description">Description</label>
                                        <textarea name="category-description" id="category-description" class="form-control"></textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category-active">Active</label>
                                        <input type="checkbox" name="category-active" id="category-active" value="1" style="float: right;">
                                    </div>
                                </div>
                              </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <div class="row">
                              <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="savecategoryinfobtn" name="savecategoryinfobtn" value="Save" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12"><br/>
                                <div id="categoryinfomsg" class="alert"></div>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
                
                <div id="categoryInfo_ajaxLoader" class="loader"><img src="<?php echo base_url(); ?>assets/images/loading.gif" class="loader-img"></div>
            </div>
          </div>
          

          