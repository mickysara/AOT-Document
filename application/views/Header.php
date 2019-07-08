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
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon-dashboard.css?v=1.0.0">

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
                  <div class="col-6 collapse-brand">
                    <a href="index.html">
                      <img src="assets/img/brand/blue.png">
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                  
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto" style=" margin-left: 800px; text-align: right; width: 300px;">
              <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo site_url('/FileController');?>"  >
                        ไฟล์
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo site_url('/LineNotifyController');?>"  >
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
