
     <!DOCTYPE html>
<html lang="en">
<style>
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
<head>
  
</head>

<body>
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
            <a href="<?php echo site_url('ViewRepositoryController');?>">
              <i class="fa fa-file"></i>
              <span>ข้อมูลทีม</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('ViewLineNotifyController');?>">
              <i class="fa fa-bullhorn"></i>
              <span>ดูข้อมูลการแจ้งปัญหา</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('ViewStatusController');?>">
              <i class="fa fa-file"></i>
              <span>ปรับเปลี่ยนสถานะแอดมิน</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
                                       <?php $d=strtotime("+5 hours");?>
    <div class="sidebar-footer" >
      <p align = "center"><font size = "4"><font color="white"><?php echo("Today ").date("Y-m-d h:i:sa",$d);?></font></p>
    </div>
  </nav>
 

     <!-- --------------------------------------------ส่วนที่1------------------------------------------------------------------------- -->
  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="Header-Content mt-5">
            <div class="row">
                <div class="col-sm mr-4" style="background-color: #fff;">
                    <div class="content mt-2 mb-2" style="display: -webkit-flex;">
                    <?php
                    $d = $this->db->get('Upload');
                    ?>
                        <div>
                        <div class="h15 mb-0 font-weight-bold text-primary text-uppercase mb-1">จำนวนไฟล์เอกสารทั้งหมด</div>
                        <div class="h15 mb-0 font-weight-bold text-gray-800" style="-webkit-flex: 1; -ms-flex: 1;"><?=$d->num_rows(); ?></div>
                        </div>
                        <i class="fas fa-file fa-2x text-gray-300 ml-5"></i>
                    </div>
                </div>

                <?php $countload = $this->db->query('SELECT sum(Download)
                          as sum
                            FROM Upload');
                $c =  $countload->row_array();
                 ?>

                <div class="col-sm mr-4" style="background-color: #fff;">
                    <div class="content mt-2 mb-2" style="display: -webkit-flex;">
                    
                        <div>
                        <div class="h15 mb-0 font-weight-bold text-success text-uppercase mb-1">จำนวนคนโหลดไฟล์ทั้งหมด</div>
                        <div class="h15 mb-0 font-weight-bold text-gray-800" style="-webkit-flex: 1; -ms-flex: 1;"><?php echo $c['sum'];?></div>
                        </div>
                        <i class="fa fa-download fa-2x text-gray-300 ml-5"></i>
                    </div>
                </div>

                <?php $countchat = $this->db->query('SELECT count(Id_Chatroom)
                                    as count
                                    FROM Chatroom');
                        $c =  $countchat->row_array();
                  ?> </p>

                <div class="col-sm mr-4" style="background-color: #fff;">
                    <div class="content mt-2 mb-2" style="display: -webkit-flex;">
                        <div>
                        <div class="h15 mb-0 font-weight-bold text-warning text-uppercase mb-1">จำนวนห้องแชทที่สร้างในการประชุม</div>
                        <div class="h15 mb-0 font-weight-bold text-gray-800" style="-webkit-flex: 1; -ms-flex: 1;"><?php echo $c['count'];?></div>
                        </div>
                        <i class="fas fa-comments fa-2x text-gray-300 ml-5"></i>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6" style="padding-left: 0px;">          
                <?php
                        if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
                        foreach ($view_data as $key => $data) { 
                        ?>
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7"style= "margin-left: 0px;padding-left: 0px;">
                <div class="card  mb-4" style= "margin-top: 0px;">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style = "background-color:#2d3436;">
                    <h2 class="m-0 font-weight-bold text-white">การแจ้งเตือนล่าสุด</h2>
                    <div class="dropdown no-arrow">
                    </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?php echo base_url('/assets/img/Logo/linenotify.png')?>" alt="">
                        <p>โดย : <?php echo $data['AccName'];?></p>
                        <p>อีเมล :  <?php echo $data['Email'];?></p>
                        <p>เบอร์ต่อติด : <?php echo $data['Tel'];?></p>
                        <p>แจ้งเมื่อวันที่ : <?php echo $data['Date'];?></p>
                        <h3>สถานะ : <?php echo $data['Status'];?></h3>
                    </div>
                    </div>
                </div>
                </div>
                <?php } endif; ?> 
            </div>
                <div class="col-6">
                                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7"style= "margin-left: 0px;padding-left: 0px;">
                <div class="card  mb-4" style= "margin-top: 0px;">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style = "background-color:#2d3436;">
                    <h2 class="m-0 font-weight-bold text-white">จำนวนไฟล์แต่ละประเภท</h2>
                    <div class="dropdown no-arrow">
                    </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                            // pdf file
                            $this->db->where('Type', 'PDF File');
                            $pdf = $this->db->get('Upload');
                            $pdfshow = $pdf->num_rows();
                            $pdfcal = $pdfshow * 100;
                            $pdfcal2 = $pdfcal / $d->num_rows();
                            $pdfcal3 = $pdfcal2.'%';
                            // powerpoint
                            $this->db->where('Type', 'Microsoftpowerpoint');
                            $point = $this->db->get('Upload');
                            $pointshow = $point->num_rows();
                            $pointcal = $pointshow * 100;
                            $pointcal2 = $pointcal / $d->num_rows();
                            $pointcal3 = $pointcal2.'%';
                            // excel
                            $this->db->where('Type', 'Microsoftexcel');
                            $excel = $this->db->get('Upload');
                            $excelshow = $excel->num_rows();
                            $excelcal = $excelshow * 100;
                            $excelcal2 = $excelcal / $d->num_rows();
                            $excelcal3 = $excelcal2.'%';
                            // word
                            $this->db->where('Type', 'Microsoftword');
                            $word = $this->db->get('Upload');
                            $wordshow = $word->num_rows();
                            $wordcal = $wordshow * 100;
                            $wordcal2 = $wordcal / $d->num_rows();
                            $wordcal3 = $wordcal2.'%';

                            //ไฟล์อื่นๆนอกเหนือจากนี้ คิดคำนวณ
                            // $anotherfile = $pdfshow + $pointshow + $excelshow + $wordshow;
                            // $calanotherfile = $d->num_rows() - $anotherfile;
                        ?>
            <h4 class="small font-weight-bold">PDF File <?php echo $pdfshow?><span class="float-right"><?php echo number_format($pdfcal2,1).'%'?></span> <img class="" style="width: 50px; height: 50px;" src="<?php echo base_url('/assets/img/logofile/PDF File.png')?>" alt=""></h4>
              <div class="progress mb-4" style="height: 10px">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $pdfcal3?>" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Microsolfpowerpoint <?php echo $pointshow?> <span class="float-right"><?php echo number_format($pointcal2,1).'%'?></span><img class="" style="width: 50px; height: 50px;" src="<?php echo base_url('/assets/img/logofile/Microsoftpowerpoint.png')?>" alt=""></h4>
              <div class="progress mb-4"style="height: 10px">
                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $pointcal3?>" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Microsolfexcel <?php echo $excelshow?><span class="float-right"><?php echo number_format($excelcal2,1).'%'?></span><img class="" style="width: 50px; height: 50px;" src="<?php echo base_url('/assets/img/logofile/Microsoftexcel.png')?>" alt=""></h4>
              <div class="progress mb-4"style="height: 10px">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $excelcal3?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Microsolfword <?php echo $wordshow?> <span class="float-right"><?php echo number_format($wordcal2,1).'%'?></span><img class="" style="width: 50px; height: 50px;" src="<?php echo base_url('/assets/img/logofile/Microsoftword.png')?>" alt=""></h4>
              <div class="progress mb-4"style="height: 10px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $wordcal3?>" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
                    </div>
                </div>
                </div>
                 <!-- hi            -->
                </div>
            </div>
        </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
<!--------------------------------------------------- picture set 2----------------------------------------------------------->

  </main>
  <!-- page-content" -->
</div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
 

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#show-sidebar").toggleClass("toggled");
    });
  </script>

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
  <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>

</html>

<!--------------------------------------------------- picture set 2----------------------------------------------------------->

  </main>
  <!-- page-content" -->
</div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
 

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#show-sidebar").toggleClass("toggled");
    });
  </script>

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
  <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>

</html>
