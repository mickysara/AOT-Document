<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AOT - Document</title>
  <!-- Favicon -->
  <link rel = "icon" type = "image/png"  href = "<?php echo base_url(); ?>./assets/img/brand/favicon.png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Argon CSS -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.css?v=1.0.1">
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
    
</style>
</head>
<body style="background: #ffffff;">
<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark " style=" background-color:#2d3436; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center; position: sticky; position: sticky; z-index: 1071; top: 0;">
    <div class="container" style="margin-left: 47px;">
        <a class="navbar-brand" href="<?php echo site_url("/IndexController");?>" style="font-size: 20px;">AOT-Document</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="../../index.html">
                            <img src="../../assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="">
                    <div class="form-group">
                      <div class="input-group mb-4"style="margin-top: 25px; 
                                                          width: 283px;
                                                          margin-right: 4;
                                                          margin-right: 19px;">
                        <div class="input-group-prepend" >
                          <span class="input-group-text" style="background-color: #f1f1fb;"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text" style="background-color: #f1f1fb; font-size: 20px;">
                      </div>
                    </div>
                    </div>
            <ul class="navbar-nav ml-lg-auto" style="border-left: 1px solid rgba(255, 255, 255,1.0); margin-left: 0px; ">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#" style="margin-left: 12px;">
                        <i class="ni ni-favourite-28" ></i>
                        <span class="nav-link-inner--text d-lg-none" >Discover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <i class="ni ni-notification-70" ></i>
                        <span class="nav-link-inner--text d-lg-none">Profile</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-settings-gear-65"></i>
                        <span class="nav-link-inner--text d-lg-none">Settings</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-lg-auto" style=" margin-left: 800px; text-align: right; width: 300px;">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#"  >
                        แจ้งปัญหาการใช้งาน
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
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <?=$this->session->userdata('firstName')?>
                        <?=$this->session->userdata('lastName')?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('/LoginController/Logout');?>">ออกจากระบบ</a>
                        </div>
                    </li> 
                <?php } ?>
 
            </ul>
            
        </div>
    </div>
</nav>
