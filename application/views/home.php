
  <!--slider-->
  <div class="slider-container">
    <div id="slider" class="flexslider">
      <ul class="slides">
        <li>
          <img src="<?php echo base_url('assets/images/slider/slider1.jpg'); ?>">
          <div class="slider-search-form-bg"></div>
        </li>
        <li>
          <img src="<?php echo base_url('assets/images/slider/slider2.jpg'); ?>">
          <div class="slider-search-form-bg"></div>
        </li>
        <li>
          <img src="<?php echo base_url('assets/images/slider/slider3.jpg'); ?>">
          <div class="slider-search-form-bg"></div>
        </li>
      </ul>    
    </div>
    <div class="slider-search-form">        
        <div class="form-caption">          
          <h2><span>Find Trusted Local Professionals </span></h2>
          <h2><span>For Your Athletic Goals</span></h2>
          <div class="row" style="margin-top: 20px;">
            <form action="<?php echo base_url();?>search" name="srarchForm" id="srarchForm" method="get">
            <div class=" col-xs-5 col-md-4">
              <div class="form-group">
                <input type="text" class="form-control search-field" name="search-service" id="search-service" placeholder="What can we help you find?" data-rule="minlen:4" data-msg="Please enter at least 4 chars of Services" />
              </div>
            </div>
            <div class=" col-xs-5 col-md-4">
              <div class="form-group">
                <input type="text" class="form-control search-field" name="search-city" id="search-city" placeholder="City/Zip (Optional)" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars of City/Zip" />
              </div>
            </div>
            <div class=" col-xs-1 col-md-1" align="center" valign="middle">
              <div class="form-group">
                <a href="javascript:void();" id="ss" onclick="document.getElementById('srarchForm').submit();"><i class="fa fa-search slider-search" aria-hidden="true"></i></a>
              </div>
            </div>          
            </form>
        </div>
      </div>    
    </div>
  </div>

  <div class="spacer50"></div>

  <!--services-->
  <div id="services">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="coaching-title">
          <span class="fa fa-user services-icon"></span>
          <h3>Coaching</h3>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="rehab-and-recovery-title">
          <span class="fa fa-user-plus services-icon"></span>
          <h3>Rehab & Recovery</h3>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="strength-training-title">
          <span class="fa fa-laptop services-icon"></span>
          <h3>Strength Training</h3>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="nutrition-title">
          <span class="fa fa-apple services-icon"></span>
          <h3>Nutrition</h3>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="races-and-events-title">
          <span class="fa fa-random services-icon"></span>
          <h3>Races & Events</h3>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 services-title" id="run-clubs-title">
          <span class="fa fa-users services-icon"></span>
          <h3>Run Clubs</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="coaching-description">
          <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div><div class="col-xs-6 col-sm-10 col-md-10"></div>
              <div class="content">
                <h1>Coaching</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find Coaches In Your Area" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Coaches" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>         
                                
              </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="rehab-and-recovery-description">
          <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2"></div><div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div><div class="col-xs-6 col-sm-8 col-md-8"></div>
              <div class="content">
                <h1>Rehab & Recovery</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>                
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find About Reheb/Recovery" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Reheb/Recovery" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>

              </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="strength-training-description">
          <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4"></div><div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div><div class="col-xs-6 col-sm-6 col-md-6"></div>
              <div class="content">
                <h1>Strength Training</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find About Strength Training" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Strength Training" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                
              </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="nutrition-description">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6"></div><div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div><div class="col-xs-6 col-sm-4 col-md-4"></div>
              <div class="content">
                <h1>Nutrition</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find About Nutrition" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Nutrition" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>

              </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="races-and-events-description">
          <div class="row">
            <div class="col-xs-6 col-sm-8 col-md-8"></div><div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div><div class="col-xs-6 col-sm-2 col-md-2"></div>
              <div class="content">
                <h1>Races & Events</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find About Races & Events" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Races & Events" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>

              </div>
          </div>          
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 services-content" id="run-clubs-description">
          <div class="row">
            <div class="col-xs-6 col-sm-10 col-md-10"></div><div class="col-xs-6 col-sm-2 col-md-2 services-selected"></div>
              <div class="content">
                <h1>Run Clubs</h1>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa beef ribs strip steak chuck bacon meatloaf beef pork belly alcatra ball tip frankfurter buffalo prosciutto. Leberkas ribeye pork loin spare ribs, bacon bresaola pastrami beef frankfurter shankle jowl short ribs tail. Cupim jerky jowl bacon pastrami andouille venison tail tenderloin chuck ball tip sausage spare ribs.</p>
                <p>Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tender loin short ribs bresaola pork chop cow kielbasa.</p>
                  <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <a href="<?php echo base_url('reheb_recovery'); ?>">Read More</a>
                    </div>
                    <div class="col-xs-4 col-md-4" style="float: left;">
                      <div class="row">
                        <div class="col-xs-8 col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control" name="search-coaches" id="search-city" placeholder="Find About Run Clubs" data-rule="minlen:4"
                              data-msg="Please enter at least 4 chars of Run Clubs" />
                          </div>
                        </div>
                        <div class="col-xs-4 col-md-4" align="left" valign="middle">
                          <div class="form-group">
                            <a href="javascript:void();" id="ss"><i class="fa fa-search slider-search" aria-hidden="true" style="font-size: 26px;"></i></a>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>

              </div>
          </div>          
        </div>
      </div>
    </div>
  </div>  

  

  <!--about-->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
          <hr class="divider-hr-left"/>  <span class="fa fa-bolt about-icon"></span> <hr class="divider-hr-right"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="about-title">WHAT IS <br/> TRAININGBLOCK?</h1>
            <img src="<?php echo base_url('assets/images/about-image.jpg'); ?>" alt="">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h1 class="about-sub-title" style="font-family: Bahnschrift;">A Supportive Running Environment</h1>
          <div class="about-content" style="font-family: Arial; font-size: 22px;font-weight: bold;">Bacon ipsum dolor amet ground round brisket ribeye kevin turducken boudin short loin jowl biltong ham shoulder. Bacon capicola ball tip ham hock, salami short loin tenderloin short ribs bresaola pork chop cow kielbasa. Spare ribs kielbasa</div>
        </div>
      </div>
    </div>
  </div>  
    
    <!--about wrapper left-->
    <!--
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
            <h1 class="about-title">Upcoming Events</h1>
            <div class="spacer50"></div>
        </div>
      </div>
    </div>
    
        <div class="carousel"> <!-/- BEGIN CAROUSEL -/->
    
          <div class="slides"> <!-/- BEGIN SLIDES -/->
          
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-1.jpg'); ?>" />
                      <div class="description">
                        <h1>Slide 1</h1>
                        <p>July 1st</p>
                      </div>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-2.jpg'); ?>" />
                      <h1>Slide 2</h1>
                      <p>July 2nd</p>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-3.jpg'); ?>" />
                      <h1>Slide 3</h1>
                      <p>July 3rd</p>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-4.jpg'); ?>" />
                      <h1>Slide 4</h1>
                      <p>July 4th</p>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-5.jpg'); ?>" />
                      <h1>Slide 5</h1>
                      <p>July 5th</p>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-6.jpg'); ?>" />
                      <h1>Slide 6</h1>
                      <p>July 6th</p>
                  </a>            
              </div>
              
              <div> <!-/- SLIDE ITEM -/->
                  <a href="#"> 
                      <img src="<?php //echo base_url('assets/images/gallery/slide-image-7.jpg'); ?>" />
                      <h1>Slide 7</h1>
                      <p>July 7th</p>
                  </a>            
              </div>
                             
          </div> <!-/- END SLIDES -/->
             
      </div> <!-/- END CAROUSEL -->
 
  
  