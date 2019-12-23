<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $pageTitle; ?> | TrainingBlock</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="<?php echo base_url('assets/images/favicon/favicon.ico'); ?>" rel="icon"> 
  <link href="https://fonts.googleapis.com/css?family=Bahnschrift|Arial|Avenir|Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" >
  <link rel="stylesheet" href="<?php echo base_url('assets/css/flexslider.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/carousel.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

  <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
      .error{
        color:red;
        font-weight: normal;
      }
      .navbar{
        margin-bottom: 0px;
      }
      .navbar .container{
        z-index: 5;
      }
      #main-nav.affix{
        padding-top: 5px;
        padding-bottom: 5px;
      }
      #main-nav.affix .navbar{
        margin-bottom: 0px;
      }
      .hidden-fields{
        display: none;
      }
      .meta-field{
        font-size: 11px;
      }
      .box-primary h3{
        padding-bottom: 20px;
      }
      #agreementBox{
        padding: 10px;
        margin-bottom: 20px;
        height: 100px;
        overflow-y: scroll;
      }
    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";  
    </script>        
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body id="top" data-spy="scroll">
  <!--top header-->

  <header id="home">
    <!--main-nav-->

    <div id="main-nav">

      <nav class="navbar">
        <div class="container">

          <div class="navbar-header">
            <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url('assets/images/logo.png'); ?>" height="110" /></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
              <span class="sr-only">Toggle</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse" id="ftheme">
            <ul class="nav navbar-nav navbar-right">
              <!-- <li><a href="<?php //echo base_url(); ?>">Home</a></li> -->
              <?php if($this->session->userdata('id')) { ?>
              <li><a href="<?php echo base_url('user'); ?>">Athlete Info</a></li>
              <?php if($this->session->userdata('user_type') == 3) { ?>
              <li class="dropdown">
                <a href="<?php echo base_url('dashboard'); ?>" class="dropdown-toggle" data-toggle="dropdown">My Business <span class="caret"></span></button></a>                
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('dashboard'); ?>">Pro Dashboard</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('inbox'); ?>">Inbox</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('bookings'); ?>">Bookings</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('services'); ?>">Services</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('clients'); ?>">Clients</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('analytics'); ?>">Analytics</a></li>
                </ul>
              </li>
              <?php } ?>
              <li><a href="<?php echo base_url('calendar'); ?>">Calendar</a></li>
              <li><a href="<?php echo base_url('messages'); ?>">Messages</a></li>
              <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
              <?php } else { ?>                
              <li><a href="<?php echo base_url('host_an_event'); ?>">Host An Event</a></li>
              <li><a href="<?php echo base_url('join_our_network'); ?>">Join Our Network</a></li>
              <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
              <?php } ?>              
              <li class="hidden-sm hidden-xs">
                <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
              </li>
            </ul>

          </div>

          <div class="search-form">
            <form action="<?php echo base_url();?>search" method="get">
              <input type="text" id="s" name="s" value="<?php if($this->input->get('s') !== null){ echo $this->input->get('s'); } ?>" placeholder="Search..." />
            </form>
          </div>

        </div>
      </nav>
    </div>

  </header>
