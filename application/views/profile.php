<div id="profile-page">
	<div class="light-bg">
	    <div class="container">
	      <div class="row">
	        <div class="reheb-recovery-bg-heading">
	          
	        </div>
	      </div>
	    </div>
	</div>
</div>
<div id="profile-content" class="page-content">
	<div class="container">
      <div class="row">
      	<div class="col-xs-5 col-sm-5 col-md-5 profile-left">
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      			   <?php if($user['profile_img_name'] != ''){ ?>
                        	<img src="<?php echo base_url().'assets/uploads/profile-images/'.$user['profile_img_name']; ?>" alt="" class="profle-circle-image" />
                           <?php } else { ?>
                              <img src="<?php echo base_url('assets/images/profile/john-doe.jpg'); ?>" alt="" class="profle-circle-image" />
                           <?php } ?>
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<div class="profile-name"><?php echo $user['name']; ?></div>
      			</div>
      		</div>
      		<div class="spacer15"></div>
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<div class="profile-position"><?php echo $user['gym_type']; ?></div>
      			</div>
      		</div>
      		<div class="spacer30"></div>
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<div class="profile-info"><?php echo $user['short_bio']; ?></div>
      			</div>
      		</div>
      		<div class="spacer50"></div>
      		<div class="row">      			
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<i class="fa fa-edit" aria-hidden="true"></i>  <b>Message</b>
      			</div>
      		</div>
      		<div class="spacer15"></div>
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<i class="fa fa-calendar" aria-hidden="true"></i>  <b>Book Appointment</b>
      			</div>
      		</div>
                  <div class="spacer15"></div>
                  <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                              <i class="fa fa-check-square-o" aria-hidden="true"></i>  <b>Verified By: Elite Gym</b>
                        </div>
                  </div>
      	</div>
      	<div class="col-xs-7 col-sm-7 col-md-7 profile-right">
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<div class="profile-services">
      				  <h1>Services</h1>	
                                    <div class="row">
					        <div class="col-xs-4 col-sm-4 col-md-4 centerAlign">
					        	<img src="<?php echo base_url('assets/images/reheb-recovery/circle-image-1.jpg'); ?>" alt="" class="circle-image" />
					        </div>
					        <div class="col-xs-8 col-sm-8 col-md-8">
					          <h2>Injury Recovery</h2>
					          <div class="content">Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa</div>
					        </div>
					       </div>
					       <div class="spacer30"></div>
					       <div class="row">
					        <div class="col-xs-4 col-sm-4 col-md-4 centerAlign">
					        	<img src="<?php echo base_url('assets/images/reheb-recovery/circle-image-2.jpg'); ?>" alt="" class="circle-image" />
					        </div>
					        <div class="col-xs-8 col-sm-8 col-md-8">
					          <h2>Muscle Rehabilitation</h2>
					          <div class="content">Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa</div>
					        </div>
					       </div>
      				</div>
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12">
      				<div class="profile-media">
      					<div class="row">
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-1.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-2.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-3.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      					</div>
      					<div class="row">
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-4.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-5.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      						<div class="col-xs-4 col-sm-4 col-md-4">
      							<img src="<?php echo base_url('assets/images/profile/profile-media-image-6.jpg'); ?>" alt="" class="profile-media-image" />
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
      <div class="row">
      	<div class="col-xs-12 col-sm-12 col-md-12">
      		<div class="profile-desc">
      			<div class="row">
      				<div class="col-xs-12 col-sm-12 col-md-12">
      					<h1>About</h1>
      					<div class="spacer30"></div>
      					<p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa. Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa</p>
      					<div class="spacer50"></div>
      					<p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa. Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa.</p>
      					<div class="spacer50"></div>
      					<p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa. Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa</p>
      				</div>
      			</div>
      			<div class="spacer50"></div>
      			<div class="row">
      				<div class="col-xs-12 col-sm-12 col-md-12">
      					<h1>Education and Certifications</h1>
      					<div class="spacer15"></div>
      					<p>University of Exercise</p>
      					<div class="spacer15"></div>
      					<p>Bacon ipsum dolor amet pastrami meatloaf salami jerky. Rump ham short ribs bresaola tenderloin. Beef ribs landjaeger pancetta,</p>
      					<div class="spacer15"></div>
      					<p>Bachelors Degree in Sports Therapy</p>
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
</div>
