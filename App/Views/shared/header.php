<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:v :) :'(</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- bootstrapdashboard -->
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/bootstrap-datepicker3.css');?>">
    <!-- <link rel="stylesheet" href="<?=  base_url('assets/css/bootstrapdashboardcustom.css');?>"> -->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/bootstrap-select.min.css');?>">
    <!-- <link rel="stylesheet" href="<?=  base_url('assets/bootstrap/css/bootstrap.css');?>"> -->
    <!-- <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/bootstrap-datepicker3.css');?>"> -->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/animate.css');?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/font-awesome/css/font-awesome.min.css');?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/fontastic.css');?>">
    <!-- Google fonts - Roboto -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> -->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/googlefonts.css');?>">

    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/dataTables.bootstrap4.css');?>">
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/bootstrap/css/responsive.bootstrap4.min.css');?>">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/grasp_mobile_progress_circle-1.0.0.min.css');?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css');?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/style.default.premium.css');?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/custom.css');?>">
    <!-- <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/file/component.css');?>">
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/file/demo.css');?>">
    <link rel="stylesheet" href="<?=  base_url('assets/bootstrapdashboard/css/file/normalize.css');?>"> -->
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=  base_url('assets/bootstrapdashboard/img/favicon.ico');?>">

    <!-- JS -->
    <script src="<?= base_url('assets/bootstrapdashboard/vendor/jquery/jquery.min.js');?>"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body> 
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?=  base_url('assets/bootstrapdashboard/img/avatar-5.jpg');?>" alt="person" class="img-fluid rounded-circle">
         
          </div>
          
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?=  base_url('office');?>"> <i class="icon-home"></i>Home</a></li>
            <li><a href="#exampledropdownDropdownGeneral" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i><?= lang("Form.setting") ?></a>
              <ul id="exampledropdownDropdownGeneral" class="collapse list-unstyled ">
                <li><a href="<?=  base_url('mchartofaccount');?>"><?= lang("Form.chartofaccount")?></a></li>
                <li><a href="<?=  base_url('mbeginningbalance');?>"><?= lang("Form.beginningbalance")?></a></li>
                <li><a href="<?=  base_url('mainsetup');?>"><?= lang("Form.linkaccount")?></a></li>
                <li><a href="<?=  base_url('mcompany');?>"><?= lang("Form.company")?></a></li>
              </ul>
            </li>
            <li><a href="#exampledropdownDropdownTransaction" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i><?= lang("Form.transaction")?></a>
              <ul id="exampledropdownDropdownTransaction" class="collapse list-unstyled ">
                <li><a href="<?=  base_url('tjournal');?>"><?= lang("Form.transaction")?></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading"><?= "report"?></h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <!-- <li><a href="<?=  base_url('report');?>"><i class="icon-interface-windows"></i><?= "report"?></a></li> -->
            <li><a href="#exampledropdownDropdownReport" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i><?= lang("Form.report")?></a>
              <ul id="exampledropdownDropdownReport" class="collapse list-unstyled ">
              
              </ul>
            </li>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">User</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li><a href="<?=  base_url('mgroupuser');?>"><i class="icon-user"></i><?= lang("Form.groupuser")?></a></li>
            <li><a href="<?=  base_url('muser');?>"><i class="icon-user"></i><?= lang("Form.user")?></a></li>
          </ul>
        </div>
      
          
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="<?=  base_url();?>" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span> </span><strong class="text-primary">TEST</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                <!-- <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li> -->
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown">
                  <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                    
                    <img src="" alt="">
                    <span class="d-none d-sm-inline-block"></span>
                  </a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" class="dropdown-item" href ="<?=  base_url('language/change_language');?>?language=indonesia"> 
                      <img src="<?=  base_url('assets/bootstrapdashboard/img/flags/16/ID.png')?>" alt="Indonesia" class="mr-2">
                      <span>Indonesia</span></a>
                    </li>
                    <li><a rel="nofollow" class="dropdown-item"  href ="<?=  base_url('language/change_language');?>?language=english"> 
                      <img src="<?=  base_url('assets/bootstrapdashboard/img/flags/16/US.png');?>" alt="English" class="mr-2">
                      <span>English</span></a>
                    </li>
                  </ul>
                </li>
                <!-- profile dropdown    -->
                <li class="nav-item dropdown">
                  <a id="profile" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                    hi, <?= $this->session->get(get_variable().'userdata')['Username']?>
                    <span class="d-none d-sm-inline-block"></span>
                  </a>
                  <ul aria-labelledby="profile" class="dropdown-menu">
                    <li><a rel="nofollow" class="dropdown-item" href ="<?=  base_url('changePassword');?>"> 
                      <i class="fa fa-edit"></i>
                      <span><?= lang("Form.changepassword")?></span></a>
                    </li>
                    <li><a rel="nofollow" class="dropdown-item" href ="<?=  base_url('login/dologout');?>"> 
                      <i class="fa fa-sign-out"></i>
                      <span><?= lang("Form.logout")?></span></a>
                    </li>
                    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      
    
    