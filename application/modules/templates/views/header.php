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
      <header class="main-header" >
          <!-- Logo -->
          <a href="<?php echo site_url('dashboard')?>" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>MEDIANET-ERP</b></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation" ng-controller="notificationcontrolller">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                      <!-- Notifications: style can be found in dropdown.less -->
                      <li class="dropdown notifications-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning"><?php echo count($notifications)?></span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="header">Vous avez <?php echo count($notifications)?> notifications</li>
                              <li>
                                  <!-- inner menu: contains the actual data -->
                                  <ul class="menu">
                                     <?php foreach($notifications as $notif){?>
                                      <li>
                                          <a href="#" data-toggle="modal" data-target="#myModal" ng-click="getNotificationById(<?php echo $notif->id?>)">
                                              <i class="fa fa-warning text-yellow"></i> <?php echo $notif->titre?>
                                          </a>
                                      </li>
                                     <?php }?>
                                  </ul>
                              </li>
                              <li class="footer"><a href="<?php echo site_url('notifications') ?>">ouvrir tous les notifications</a></li>
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
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title text-center">Notification {{id}}</h4>
                  </div>
                  <div class="modal-body">
                      <p ng-bind="description"></p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
