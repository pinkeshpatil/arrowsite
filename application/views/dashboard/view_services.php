<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">User Services</h1>          
          </div>
        </div>
      </div>
  </div>
</div>
<div class="container" style="padding: 30px 0;">
    <div class="row">    
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="info-title">Services</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12">
                      <table class="table table-hover">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">Thumbnail</th>
                            <th width="25%">Title</th>
                            <th width="35%">Short Description</th>
                        </tr>
                        <?php
                          $srno = 1;  
                          foreach($user_services as $service) {
                              $url = $service['service_title'];
                              $url = str_replace(' ', '-', $url);
                              $url = preg_replace('/[^A-Za-z0-9\-]/', '', $url); 
                              $url = strtolower($url); // Convert to lowercase
                              echo '<tr>
                                      <td>'.$srno.'</td>
                                      <td>';
                              if(!file_exists(base_url().'assets/uploads/services-images/'.$service['service_image']) && $service['service_image'] != ''){        
                                echo    '<img src="'.base_url().'assets/uploads/services-images/'.$service['service_image'].'" height="50" width="50">';
                              }
                              echo    '</td>
                                      <td><a href="'.base_url().'user-services/service/'.$url.'/'.md5('service_'.$service['id']).'">'.$service['service_title'].'</a>
                                      <td>'.$service['service_description'].'</td>
                                    </tr>';
                                    $srno++;
                          }
                        ?>
                      </table>
                   </div>
              </div>
            </div>
        </div>
    </div>   
</div>
