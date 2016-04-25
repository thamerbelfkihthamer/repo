<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="">
      <title>MEDIANET-ERP</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.5 -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/datatables/dataTables.bootstrap.css">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/iCheck/all.css">

      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/iCheck/flat/blue.css">
      <!-- SweetAlert -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/sweetalert/dist/sweetalert.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/daterangepicker/daterangepicker-bs3.css">

      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/animate/animate.css">

      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <script src="<?php echo base_url(); ?>application/assets/vendor/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="<?php echo base_url();?>application/assets/js/angular.min.js"></script>
      <!-- Font Awesome -->
      <!-- Ionicons -->
      <!-- daterange picker -->
      <!-- iCheck for checkboxes and radio inputs -->
      <!-- Bootstrap Color Picker -->
      <!-- Bootstrap time Picker -->
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/vendor/select2/select2.min.css">

      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/dist/css/skins/_all-skins.min.css">


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  </head>
  <body class="hold-transition skin-blue sidebar-mini" ng-app="medianetapp">
  <div class="wrapper">

      <header class="main-header">
          <!-- Logo -->
          <a href="<?php echo site_url('dashboard')?>" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>MEDIANET-ERP</b></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                      <!-- Messages: style can be found in dropdown.less-->
                      <li class="dropdown messages-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-envelope-o"></i>
                              <span class="label label-success">4</span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="header">You have 4 messages</li>
                              <li>
                                  <!-- inner menu: contains the actual data -->
                                  <ul class="menu">
                                      <li><!-- start message -->
                                          <a href="#">
                                              <div class="pull-left">
                                                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  Support Team
                                                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                              </h4>
                                              <p>Why not buy a new awesome theme?</p>
                                          </a>
                                      </li><!-- end message -->
                                      <li>
                                          <a href="#">
                                              <div class="pull-left">
                                                  <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  AdminLTE Design Team
                                                  <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                              </h4>
                                              <p>Why not buy a new awesome theme?</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <div class="pull-left">
                                                  <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  Developers
                                                  <small><i class="fa fa-clock-o"></i> Today</small>
                                              </h4>
                                              <p>Why not buy a new awesome theme?</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <div class="pull-left">
                                                  <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  Sales Department
                                                  <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                              </h4>
                                              <p>Why not buy a new awesome theme?</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <div class="pull-left">
                                                  <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  Reviewers
                                                  <small><i class="fa fa-clock-o"></i> 2 days</small>
                                              </h4>
                                              <p>Why not buy a new awesome theme?</p>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="footer"><a href="#">See All Messages</a></li>
                          </ul>
                      </li>
                      <!-- Notifications: style can be found in dropdown.less -->
                      <li class="dropdown notifications-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning">10</span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="header">You have 10 notifications</li>
                              <li>
                                  <!-- inner menu: contains the actual data -->
                                  <ul class="menu">
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-users text-red"></i> 5 new members joined
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-user text-red"></i> You changed your username
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="footer"><a href="#">View all</a></li>
                          </ul>
                      </li>
                      <!-- Tasks: style can be found in dropdown.less -->

                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-gears"></i>
                              <span class="hidden-xs"><?php echo  $this->session->userdata('username');?> <?php echo $this->session->userdata('lastname'); ?></span>
                          </a>
                          <ul class="dropdown-menu">
                              <!-- User image -->
                              <li class="user-header">
                                  <p>
                                      <?php echo  $this->session->userdata('last_name');?> <?php echo  $this->session->userdata('first_name');?>
                                      <br>
                                      <?php echo $this->session->userdata('role');?>
                                  </p>
                              </li>
                              <!-- Menu Footer-->
                              <li class="user-footer">
                                  <div class="pull-right" id="logout">
                                      <a href="<?php echo site_url('auth/logout')?>" class="btn btn-default btn-flat">Déconnexion</a>
                                  </div>
                              </li>
                          </ul>
                      </li>

                      <!-- Control Sidebar Toggle Button -->

                  </ul>
              </div>
          </nav>
      </header>