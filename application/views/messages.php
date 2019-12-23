<div id="login-bg">
  <div class="light-bg">
      <div class="container">
        <div class="row">
          <div class="login-bg-heading">
            <h1 class="page-title">Messages</h1>          
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
                <h2 class="info-title">Messages</h2>                 
              </div><!-- /.box-header -->    

              <div class="row">
                   <div class="col-md-12">
                      <table class="table table-hover">
                        <tr>
                            <th width="5%">Sr. No</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
                            <th>Message</th>
                        </tr>
                        <?php
                          if(isset($messages)){
                            $srno = 1;
                            foreach($messages as $message){
                              echo '<tr>
                                      <td>'.$srno.'</td>
                                      <td>'.$message->name.'</td>
                                      <td>'.$message->email.'</td>
                                      <td>'.$message->message.'</td>
                                    </tr>';
                                $srno++;
                            }
                          }
                        ?>
                      </table>
                   </div>
              </div>
            </div>
        </div>
    </div>   
</div>
