<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AOT - Document</title>
<?php
    header('Access-Control-Allow-Origin: http://localhost/Aot-Document/');
    ?>
  <!-- Favicon -->

  <!-- Fonts -->
  <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>./assets/img/logo/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <!-- Icons -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/js/plugins/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css">
  <!-- Argon CSS -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.css?v=1.0.1">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.min.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon-dashboard.css?v=1.0.0">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/Flex/flexslider.css">

  
  <!-- Custom styles for this template -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/simple-sidebar.css">

  <!-- Syntax Highlighter -->
  <!-- Demo CSS -->

  <script src="<?php echo base_url('/assets/js/modernizr.js'); ?>"></script>
  <style>
        body,h1,h2,h3,h4,h5,.tooltip,h6,a {
        font-family: 'Athiti', sans-serif !important;
    }
        .swal-footer {
        background-color: rgb(245, 248, 250);
        margin-top: 32px;
        border-top: 1px solid #E9EEF1;
        overflow: hidden;
        
    }
      .cards-list {
      z-index: 0;
      width: 100%;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .card {
      margin: 20px auto;
      width: 350px;
      height: 550px;
      box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
      transition: 0.4s;
    }

    .card .card_image {
      width: inherit;
      height: inherit;
      border-radius: 40px;
    }

    .card .card_image img {
      width: inherit;
      height: inherit;
      border-radius: 40px;
      object-fit: cover;
    }

    .card .card_title {
      text-align: center;
      border-radius: 0px 0px 40px 40px;
      font-family: sans-serif;
      font-weight: bold;
      font-size: 30px;
      margin-top: -80px;
      height: 40px;
    }
    .title-white {
      color: white;
    }

    .title-black {
      color: black;
    }





    @media all and (max-width: 500px) {
      .card-list {
        /* On small screens, we are no longer using row direction but column */
        flex-direction: column;
      }
    }

                                           /* //////////////////////////new//////////////////////////////// */
                                           @keyframes swing {
              0% {
                transform: rotate(0deg);
              }
              10% {
                transform: rotate(10deg);
              }
              30% {
                transform: rotate(0deg);
              }
              40% {
                transform: rotate(-10deg);
              }
              50% {
                transform: rotate(0deg);
              }
              60% {
                transform: rotate(5deg);
              }
              70% {
                transform: rotate(0deg);
              }
              80% {
                transform: rotate(-5deg);
              }
              100% {
                transform: rotate(0deg);
              }
            }

            @keyframes sonar {
              0% {
                transform: scale(0.9);
                opacity: 1;
              }
              100% {
                transform: scale(2);
                opacity: 0;
              }
            }
            body {
              font-size: 0.9rem;
            }
            .page-wrapper .sidebar-wrapper,
            .sidebar-wrapper .sidebar-brand > a,
            .sidebar-wrapper .sidebar-dropdown > a:after,
            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
            .sidebar-wrapper ul li a i,
            .page-wrapper .page-content,
            .sidebar-wrapper .sidebar-search input.search-menu,
            .sidebar-wrapper .sidebar-search .input-group-text,
            .sidebar-wrapper .sidebar-menu ul li a,
            #show-sidebar,
            #close-sidebar {
              -webkit-transition: all 0.3s ease;
              -moz-transition: all 0.3s ease;
              -ms-transition: all 0.3s ease;
              -o-transition: all 0.3s ease;
              transition: all 0.3s ease;
            }

            /*----------------page-wrapper----------------*/

            .page-wrapper {
              height: 100vh;
            }

            .page-wrapper .theme {
              width: 40px;
              height: 40px;
              display: inline-block;
              border-radius: 4px;
              margin: 2px;
            }

            .page-wrapper .theme.chiller-theme {
              background: #1e2229;
            }

            /*----------------toggeled sidebar----------------*/

            .page-wrapper.toggled .sidebar-wrapper {
              left: 0px;
            }

            @media screen and (min-width: 768px) {
              .page-wrapper.toggled .page-content {
                padding-left: 300px;
              }
            }
            /*----------------show sidebar button----------------*/
            #show-sidebar {
              position: fixed;
              left: 0;
              top: 100px;
              border-radius: 0 4px 4px 0px;
              width: 35px;
              transition-delay: 0.3s;
            }
            .page-wrapper.toggled #show-sidebar {
              left: -40px;
            }
            /*----------------sidebar-wrapper----------------*/

            .sidebar-wrapper {
              width: 260px;
              height: 100%;
              max-height: 100%;
              position: fixed;
              top: 0;
              left: -300px;
              z-index: 999;
            }

            .sidebar-wrapper ul {
              list-style-type: none;
              padding: 0;
              margin: 0;
            }

            .sidebar-wrapper a {
              text-decoration: none;
            }

            /*----------------sidebar-content----------------*/

            .sidebar-content {
              max-height: calc(100% - 30px);
              height: calc(100% - 30px);
              overflow-y: auto;
              position: relative;
            }

            .sidebar-content.desktop {
              overflow-y: hidden;
            }

            /*--------------------sidebar-brand----------------------*/

            .sidebar-wrapper .sidebar-brand {
              padding: 10px 20px;
              display: flex;
              align-items: center;
            }

            .sidebar-wrapper .sidebar-brand > a {
              text-transform: uppercase;
              font-weight: bold;
              flex-grow: 1;
            }

            .sidebar-wrapper .sidebar-brand #close-sidebar {
              cursor: pointer;
              font-size: 20px;
            }
            /*--------------------sidebar-header----------------------*/

            .sidebar-wrapper .sidebar-header {
              padding: 20px;
              overflow: hidden;
            }

            .sidebar-wrapper .sidebar-header .user-pic {
              float: left;
              width: 60px;
              padding: 2px;
              border-radius: 12px;
              margin-right: 15px;
              overflow: hidden;
            }

            .sidebar-wrapper .sidebar-header .user-pic img {
              object-fit: cover;
              height: 100%;
              width: 100%;
            }

            .sidebar-wrapper .sidebar-header .user-info {
              float: left;
            }

            .sidebar-wrapper .sidebar-header .user-info > span {
              display: block;
            }

            .sidebar-wrapper .sidebar-header .user-info .user-role {
              font-size: 12px;
            }

            .sidebar-wrapper .sidebar-header .user-info .user-status {
              font-size: 11px;
              margin-top: 4px;
            }

            .sidebar-wrapper .sidebar-header .user-info .user-status i {
              font-size: 8px;
              margin-right: 4px;
              color: #5cb85c;
            }

            /*-----------------------sidebar-search------------------------*/

            .sidebar-wrapper .sidebar-search > div {
              padding: 10px 20px;
            }

            /*----------------------sidebar-menu-------------------------*/

            .sidebar-wrapper .sidebar-menu {
              padding-bottom: 10px;
            }

            .sidebar-wrapper .sidebar-menu .header-menu span {
              font-weight: bold;
              font-size: 14px;
              padding: 15px 20px 5px 20px;
              display: inline-block;
            }

            .sidebar-wrapper .sidebar-menu ul li a {
              display: inline-block;
              width: 100%;
              text-decoration: none;
              position: relative;
              padding: 8px 30px 8px 20px;
            }

            .sidebar-wrapper .sidebar-menu ul li a i {
              margin-right: 10px;
              font-size: 12px;
              width: 30px;
              height: 30px;
              line-height: 30px;
              text-align: center;
              border-radius: 4px;
            }

            .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
              display: inline-block;
              animation: swing ease-in-out 0.5s 1 alternate;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
              font-family: "Font Awesome 5 Free";
              font-weight: 900;
              content: "\f105";
              font-style: normal;
              display: inline-block;
              font-style: normal;
              font-variant: normal;
              text-rendering: auto;
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
              text-align: center;
              background: 0 0;
              position: absolute;
              right: 15px;
              top: 14px;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
              padding: 5px 0;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
              padding-left: 25px;
              font-size: 13px;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
              content: "\f111";
              font-family: "Font Awesome 5 Free";
              font-weight: 400;
              font-style: normal;
              display: inline-block;
              text-align: center;
              text-decoration: none;
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
              margin-right: 10px;
              font-size: 8px;
            }

            .sidebar-wrapper .sidebar-menu ul li a span.label,
            .sidebar-wrapper .sidebar-menu ul li a span.badge {
              float: right;
              margin-top: 8px;
              margin-left: 5px;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
            .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
              float: right;
              margin-top: 0px;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-submenu {
              display: none;
            }

            .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
              transform: rotate(90deg);
              right: 17px;
            }

            /*--------------------------side-footer------------------------------*/

            .sidebar-footer {
              position: absolute;
              width: 100%;
              bottom: 0;
              display: flex;
            }

            .sidebar-footer > a {
              flex-grow: 1;
              text-align: center;
              height: 30px;
              line-height: 30px;
              position: relative;
            }

            .sidebar-footer > a .notification {
              position: absolute;
              top: 0;
            }

            .badge-sonar {
              display: inline-block;
              background: #980303;
              border-radius: 50%;
              height: 8px;
              width: 8px;
              position: absolute;
              top: 0;
            }

            .badge-sonar:after {
              content: "";
              position: absolute;
              top: 0;
              left: 0;
              border: 2px solid #980303;
              opacity: 0;
              border-radius: 50%;
              width: 100%;
              height: 100%;
              animation: sonar 1.5s infinite;
            }

            /*--------------------------page-content-----------------------------*/

            .page-wrapper .page-content {
              display: inline-block;
              width: 100%;
              padding-left: 0px;
              padding-top: 20px;
            }

            .page-wrapper .page-content > div {
              padding: 20px 40px;
            }

            .page-wrapper .page-content {
              overflow-x: hidden;
            }

            /*------scroll bar---------------------*/

            ::-webkit-scrollbar {
              width: 5px;
              height: 7px;
            }
            ::-webkit-scrollbar-button {
              width: 0px;
              height: 0px;
            }
            ::-webkit-scrollbar-thumb {
              background: #525965;
              border: 0px none #ffffff;
              border-radius: 0px;
            }
            ::-webkit-scrollbar-thumb:hover {
              background: #525965;
            }
            ::-webkit-scrollbar-thumb:active {
              background: #525965;
            }
            ::-webkit-scrollbar-track {
              background: transparent;
              border: 0px none #ffffff;
              border-radius: 50px;
            }
            ::-webkit-scrollbar-track:hover {
              background: transparent;
            }
            ::-webkit-scrollbar-track:active {
              background: transparent;
            }
            ::-webkit-scrollbar-corner {
              background: transparent;
            }


            /*-----------------------------chiller-theme-------------------------------------------------*/

            .chiller-theme .sidebar-wrapper {
                background: #31353D;
            }

            .chiller-theme .sidebar-wrapper .sidebar-header,
            .chiller-theme .sidebar-wrapper .sidebar-search,
            .chiller-theme .sidebar-wrapper .sidebar-menu {
                border-top: 1px solid #3a3f48;
            }

            .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
            .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
                border-color: transparent;
                box-shadow: none;
            }

            .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
            .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
            .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
            .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
            .chiller-theme .sidebar-wrapper .sidebar-brand>a,
            .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
            .chiller-theme .sidebar-footer>a {
                color: #818896;
            }

            .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
            .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
            .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
            .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
            .chiller-theme .sidebar-footer>a:hover i {
                color: #b8bfce;
            }

            .page-wrapper.chiller-theme.toggled #close-sidebar {
                color: #bdbdbd;
            }

            .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
                color: #ffffff;
            }

            .chiller-theme .sidebar-wrapper ul li:hover a i,
            .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
            .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
            .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
                color: #16c7ff;
                text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
            }

            .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
            .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
            .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
            .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
                background: #3a3f48;
            }

            .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
                color: #6c7b88;
            }

            .chiller-theme .sidebar-footer {
                background: #3a3f48;
                box-shadow: 0px -1px 5px #282c33;
                border-top: 1px solid #464a52;
            }

            .chiller-theme .sidebar-footer>a:first-child {
                border-left: none;
            }

            .chiller-theme .sidebar-footer>a:last-child {
                border-right: none;
            }
            .col-sm {
                min-width: 250px;
                border-radius: .25rem;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }


</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#2d3436; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center; position: sticky; position: sticky; z-index: 1071; top: 0; height: 100px;">
          <div class="container">
          <a class="navbar-brand" href="<?php echo site_url("/IndexController");?>" style="font-size: 20px;">AOT-Document</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">

                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>     
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto" style="">
              <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo site_url('/SearchController');?>"  >
                        ค้นหา
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo site_url('/LineNotifyController');?>"  >
                        แจ้งปัญหา
                    </a>
                </li> 
                <?php if($this->session->userdata('_success') == '')
                { ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("/LoginController");?>"  >เข้าสู่ระบบ</a>
                </li>
                <?php } ?>
                
                <?php if($this->session->userdata('_success') == 1 )
                {?>
                    <!---------------------- Notification----------------------------------------- -->
                    <li class="nav-item dropdown " id="Hi" style=>
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width 50px;">
                        <i class="ni ni-planet"></i>
                        <span class="badge badge-danger" id="Noti" style="font-size: 14px; color: #fff; border-color: #f5365c; background-color: #f5365c;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="DetailNoti" aria-labelledby="navbar-default_dropdown_1" style="max-height: 500px; overflow-x: hidden; width: 350px;">
                           
                        
                        </div>
                    </li> 
                    <!--------------------------------------------------------------- -->


                    <!---------------------- Property ----------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <?=$this->session->userdata('accountName')?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="<?php echo site_url('ChatroomController');?>">Chatroom</a>
                            <a class="dropdown-item" href="<?php echo site_url('FileController');?>">File</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('/LoginController/Logout');?>">ออกจากระบบ</a>
                        </div>
                    </li> 
                    <!--------------------------------------------------------------- -->
                <?php } ?>
 
            </ul>
            </div>
          </div>
          </div>
        </nav>
        <div class="container" style="max-width: 860px;">
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#" style="font-size: 14px;">
    <i class="fas fa-bars" ></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a align = "center" style="margin-left: -80px;" href="<?php echo site_url('IndexController');?>"><i class="fa fa-home" aria-hidden="true"></i>   Homepage</a>
      </div>
      <br>
      <br>
      <br>
      <!-- sidebar-search  -->
      <div class="sidebar-menu" style= "margin-left: 10px;">
      <a id="close-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
             </a>
        <ul>
          <li class="header-menu">
            <span style="font-size: 20px;">ระบบคลังเอกสาร</span>
          </li>
          <li class="sidebar" style= "margin-top: 20px;">
            <a href="<?php echo site_url('UploadController');?>">
              <i class="fa fa-upload"></i>
              <span>อัปโหลดเอกสาร</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="<?php echo site_url('TypeController');?>">
              <i class="fa fa-file"></i>
              <span>อัปโหลดประเภทเอกสาร</span>
           </a>
          </li>
          <li class="sidebar">
            <a href="<?php echo site_url('RepoController');?>">
              <i class="fa fa-address-card"></i>
              <span>เพิ่ม Repository</span>
            </a>
          
          </li>
          <li class="header-menu">
            <span style="font-size: 20px;">ตรวจสอบข้อมูล</span>
          </li>
          <li style= "margin-top: 20px;">
            <a href="<?php echo site_url('ViewController');?>">
              <i class="fa fa-book"></i>
              <span>ดูข้อมูลเอกสารทั้งหมด</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('TypeViewController');?>">
              <i class="fa fa-calendar"></i>
              <span>ดูข้อมูลประเภทไฟล์ทั้งหมด</span>
            </a>
          </li>
          <li>
          <a href="<?php echo site_url('ViewFileDeleteController');?>">
              <i class="fa fa-undo"></i>
              <span>ดูข้อมูลไฟล์ที่ถูกลบไปแล้ว</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('repositoryController/showdata/1');?>">
              <i class="fa fa-file"></i>
              <span>Repository</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('ViewLineNotifyController');?>">
              <i class="fa fa-bullhorn"></i>
              <span>ดูข้อมูลการแจ้งปัญหา</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    <div class="sidebar-footer" >
      <p align = "center"><font size = "4"><font color="white"><?php echo("Today ").date("Y-m-d h:i:sa");?></font></p>
    </div>
  </nav>
        <script>
    jQuery(function ($) {

          $(".sidebar-dropdown > a").click(function() {
          $(".sidebar-submenu").slideUp(200);
          if (
          $(this)
            .parent()
            .hasClass("active")
          ) {
          $(".sidebar-dropdown").removeClass("active");
          $(this)
            .parent()
            .removeClass("active");
          } else {
          $(".sidebar-dropdown").removeClass("active");
          $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
          $(this)
            .parent()
            .addClass("active");
          }
          });

          $("#close-sidebar").click(function() {
          $(".page-wrapper").removeClass("toggled");
          });
          $("#show-sidebar").click(function() {
          $(".page-wrapper").addClass("toggled");
          });




          });
  </script>
