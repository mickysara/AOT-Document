<div class="heroblock" style="
        background-position: top;
        background-attachment: fixed;
        background-image: url(https://steamcdn-a.akamaihd.net/steam/apps/356190/page_bg_generated_v6b.jpg?t=1538497118);
        position: relative;
        width: auto;
        margin-bottom: 0px;
        padding-top: 120px;
        padding-bottom: 0px;
        text-align: center;
        background-repeat: no-repeat;
        background-position: center center;
        -webkit-background-size: cover;
        background-size: cover;
        height: 570px;"
        >
                   
                  

            <h2 style="color: #fff;margin-top: 90px;">ระบบเอกสารออนไลน์</h2>
            <h1 class="display-1" style="color: #fff;">บริษัท ท่าอากาศยานไทย จำกัด</h1>
</div>
<a href=""></a>
           

        <div class="container" style="margin-top: 60px;">
              <h1 style="font-size: 45px; color: #2d3436;">เอกสารที่แนะนำ</h1>



            <div class="card shadow">
                        <div class="card-header border-0">
                        </div>
                            <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อหัวข้อ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สร้างโดย</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ความเป็นส่วนตัว</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            

            <?php
             if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
             foreach ($view_data as $key => $data) { 
            ?>
              <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <img src="<?php echo base_url().'assets/img/logofile/'. $data['Type']?>.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['Topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <?php echo $data['Uploadby'];?>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo date('d/m/Y', strtotime($data['Date']));?>
                                                </span>
                                                </td>   
                                                <td>
                                                <?php echo $data['Privacy'];?>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $data['Id_Upload'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php }endif;  ?> 
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
            
                 
            <!--  <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                 
                <div class="card" style="width: 18rem; height: 385.828px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                      <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$data['Type'].'.png');?>" alt="Card image cap">
                     
                      <div class="card-head" style="position: relative; text-align: center; color: white;">
                        <img class="card-img-top" style="height: 133px;" src="<?php echo base_url('/assets/img/card/bg.png');?>" alt="Card image cap">
                        <div class="centered" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                          <h1 style="color: #fff;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;"><?php echo $data['Topic'];?></h1>
                        </div>
                      </div>

                      <div class="card-body">
                      
                          <h3 class="card-title" style="color: #2d3436;">ประเภท : <img src="<?php echo base_url('/assets/img/logofile/'.$data['Type'].'.png');?>" style="width: 25px; height: 25px;"> </h3>
                          <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;">ชื่อไฟล์ : <?php echo $data['File'];?></p>
                          <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด :<?php echo date('d/m/Y ', strtotime($data['Date']));?></p>
                          <p class="card-text" style="font-weight: 500;">ความเป็นส่วนตัว :<?php echo $data['Privacy'];?></p>
                          <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $data['Id_Upload'];?>" class="btn btn" style="background-color:#2d3436; color: #fff;">ดูรายละเอียดเพิ่มเติม</a>
                         
                      </div>
                  </div> -->

                  
              </div> 
              
         
          <!-- }?> -->
  </div>
  
          <a href="<?php echo site_url('ViewAllController/Viewdata/'); ?>" class="btn btn-primary btn-lg btn-block mb-5 mt-5"  style="width: max; font-size: 20px; background-color: #2d3436;">ดูเอกสารทั้งหมด</a>
          <div class="container page-styling row-wrap-container row-wrap-nottl front-icons" style="max; margin-bottom: 40px;">
                <div class="row">
                <div class="cf-lg-4 col-sm-4">
                  <div class="iconbox-item iconbox-i">
                    <div class="iconbox-i-top">
                      <p class="iconbox-i-img withimg">
                      </p>
                    <h1 style="font-size: 45px; text-align: center; color:#2d3436;">ค้นหา!</h1>
                    </div>
                    <p style="font-size: 18px;">ค้นหาเอกสาร หรือ ไฟล์ที่ต้องการจะดาวน์โหลดในคลังเอกสารอย่างง่ายดาย ด้วยการพิมชื่อเอกสาร หรือ ชื่อของผู้อัปโหลดเอกสารที่ท่านต้องการจะค้นหาเอกสารจะแสดงขึ้นมาตามชื่อที่ท่านใส่ลงไป</p>
                  </div>
                </div>
                <div class="cf-lg-4 col-sm-4">
                  <div class="iconbox-item iconbox-i">
                    <div class="iconbox-i-top">
                        <p class="iconbox-i-img withimg">
                        </p>
                        <h1 style="font-size: 45px; text-align: center; color:#2d3436;">สแกน!</h1>
                      </div>
                      <p style="font-size: 18px; ">Qr Code ที่มีโลโก้บริษัทจะมีอยู่ประจำไฟล์ทุกไฟล์ต่อ Qr Code หนึ่งอัน ท่านสามารถแสกนได้ตามสิทธิ์ของท่านโดยจะมี 3 สิทธิ์ คือ Public Private และ Authen โดยผู้ที่มีสิทธิ์ไม่ตรงกันเมื่อแสกนก็จะไม่แสดงผล</p>
                  </div>
                </div>
                <div class="cf-lg-4 col-sm-4">
                  <div class="iconbox-item iconbox-i">
                    <div class="iconbox-i-top">
                      <p class="iconbox-i-img withimg">
                      </p>
                      <h1 style="font-size: 45px;  text-align: center; color:#2d3436;">ดาวน์โหลด!</h1>
                    </div>
                    <p style="font-size: 18px;">เมื่อท่านแสกน Qr Code ที่มีโลโก้บริษัทเสร็จแล้วจะเด้งเข้าสู่หน้า Link ที่ในข้างในนั้นจะมีไฟล์เอกสารอยู่และท่านสามารถดาวน์โหลดได้เลยจาก Link นั้นในทันทีโดยไม่ต้องรอให้เสียเวลา</p>
                  </div>
                </div>

                <div class="ct-example tab-content tab-example-result" style=" margin-left: auto; margin-right: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">
                <div class="row mb55" style="padding: 50px; ">
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center;">
                       <div class="iconbox-item iconbox-i-2" style="color: #686f8a;
                                                                    font-size: 16px;
                                                                    line-height: 200%;
                                                                    margin-bottom: 40px;
                                                                    position: relative;
                                                                    background: #fff;
                                                                    box-shadow: 0 13px 59px 0 rgba(132,141,178,.22);
                                                                    text-align: center;
                                                                    padding: 49px 10px 10px;
                                                                    width: 200px;">
                          <div class="iconbox-i-top">
                            <p class="iconbox-i-img" style="color: #fff;
                                                            width: 78px;
                                                            height: 78px;
                                                            border-radius: 78px;
                                                            line-height: 78px;
                                                            text-align: center;
                                                            display: block;
                                                            font-size: 30px;
                                                            background: #2d3436;
                                                            margin: 0 auto 46px;
                                                            box-shadow: 0 10px 40px 0 #2d3436;">
                              <i class="fa fa-qrcode"></i>
                            </p>
                            <h3 style="margin-bottom: 25px; color: #2d3436;">เข้าถึงได้ด้วย QR Code</h3>
                          </div>
                        </div>
                    </div>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center;">
                       <div class="iconbox-item iconbox-i-2" style="color: #686f8a;
                                                                    font-size: 16px;
                                                                    line-height: 200%;
                                                                    margin-bottom: 40px;
                                                                    position: relative;
                                                                    background: #fff;
                                                                    box-shadow: 0 13px 59px 0 rgba(132,141,178,.22);
                                                                    text-align: center;
                                                                    padding: 49px 10px 10px;
                                                                    width: 200px;">
                          <div class="iconbox-i-top">
                            <p class="iconbox-i-img" style="color: #fff;
                                                            width: 78px;
                                                            height: 78px;
                                                            border-radius: 78px;
                                                            line-height: 78px;
                                                            text-align: center;
                                                            display: block;
                                                            font-size: 30px;
                                                            background: #2d3436;
                                                            margin: 0 auto 46px;
                                                            box-shadow: 0 10px 40px 0 #2d3436;">
                              <i class="fa fa-search"></i>
                            </p>
                            <h3 style="margin-bottom: 25px; color: #2d3436;">ค้นหาเอกสารง่าย</h3>
                          </div>
                        </div>
                    </div>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center;">
                       <div class="iconbox-item iconbox-i-2" style="color: #686f8a;
                                                                    font-size: 16px;
                                                                    line-height: 200%;
                                                                    margin-bottom: 40px;
                                                                    position: relative;
                                                                    background: #fff;
                                                                    box-shadow: 0 13px 59px 0 rgba(132,141,178,.22);
                                                                    text-align: center;
                                                                    padding: 49px 10px 10px;
                                                                    width: 200px;">
                          <div class="iconbox-i-top">
                            <p class="iconbox-i-img" style="color: #fff;
                                                            width: 78px;
                                                            height: 78px;
                                                            border-radius: 78px;
                                                            line-height: 78px;
                                                            text-align: center;
                                                            display: block;
                                                            font-size: 30px;
                                                            background: #2d3436;
                                                            margin: 0 auto 46px;
                                                            box-shadow: 0 10px 40px 0 #2d3436;">
                              <i class="fa fa-file-text"></i>
                            </p>
                            <h3 style="margin-bottom: 25px; color: #2d3436;">เก็บไฟล์ได้หลายนามสกุล</h3>
                          </div>
                        </div>
                    </div>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center;">
                       <div class="iconbox-item iconbox-i-2" style="color: #686f8a;
                                                                    font-size: 16px;
                                                                    line-height: 200%;
                                                                    margin-bottom: 40px;
                                                                    position: relative;
                                                                    background: #fff;
                                                                    box-shadow: 0 13px 59px 0 rgba(132,141,178,.22);
                                                                    text-align: center;
                                                                    padding: 49px 10px 10px;
                                                                    width: 200px;">
                          <div class="iconbox-i-top">
                            <p class="iconbox-i-img" style="color: #fff;
                                                            width: 78px;
                                                            height: 78px;
                                                            border-radius: 78px;
                                                            line-height: 78px;
                                                            text-align: center;
                                                            display: block;
                                                            font-size: 30px;
                                                            background: #2d3436;
                                                            margin: 0 auto 46px;
                                                            box-shadow: 0 10px 40px 0 #2d3436;">
                              <i class="fa fa-floppy-o"></i>
                            </p>
                            <h3 style="margin-bottom: 25px; color: #2d3436; ">ดาวน์โหลดลงเครื่องได้</h3>
                          </div>
                        </div>
                    </div>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center; margin-top: 60px; margin-bottom: 50px;">
                        <div class="counter-i">
                          <p data-value="3393" class="counter-i-val" style="    color: #283346;
                                                                                font-size: 57px;
                                                                                font-family: montserrat,sans-serif;
                                                                                font-weight: 900;
                                                                                position: relative;">
                                                                                <?php $countuser = $this->db->get('Users');
                                                                                  echo $countuser->num_rows();
                                                                                ?>
                                                                                </p>
                          <hr>
                          <p class="counter-i-ttl" style="font-weight: 700;
                                                          line-height: 140%;
                                                          font-size: 16px;
                                                          text-transform: uppercase;
                                                          color: #686f8a;
                                                          margin: 0 0 20px;
                                                          padding: 0;
                                                          color: #2d3436;">สมาชิกทั้งหมด</p>
                      </div> 
                    </div>
                    <?php
                     $d = $this->db->get('Upload');
                      ?>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center; margin-top: 60px; margin-bottom: 50px;">
                        <div class="counter-i">
                          <p data-value="3393" class="counter-i-val" style="    color: #283346;
                                                                                font-size: 57px;
                                                                                font-family: montserrat,sans-serif;
                                                                                font-weight: 900;
                                                                                position: relative;"> <?=$d->num_rows(); ?>  </p>
                          <hr>
                          <p class="counter-i-ttl" style="font-weight: 700;
                                                          line-height: 140%;
                                                          font-size: 16px;
                                                          text-transform: uppercase;
                                                          color: #686f8a;
                                                          margin: 0 0 20px;
                                                          padding: 0; 
                                                          color: #2d3436;">ไฟล์เอกสารทั้งหมด</p>
                      </div> 
                    </div>
     
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center; margin-top: 60px; margin-bottom: 50px;">
                        <div class="counter-i">
                          <p data-value="3393" class="counter-i-val" style="    color: #283346;
                                                                                font-size: 57px;
                                                                                font-family: montserrat,sans-serif;
                                                                                font-weight: 900;
                                                                                position: relative;">
                                                                                 <?php $countload = $this->db->query('SELECT sum(Download)
                                                                                                  as sum
                                                                                                    FROM Upload');
                                                                                        $c =  $countload->row_array();
                                                                                        echo $c['sum'];
                                                                                  ?>
                                                                                      
                                                                                 </p>
                          <hr>
                          <p class="counter-i-ttl" style="font-weight: 700;
                                                          line-height: 140%;
                                                          font-size: 16px;
                                                          text-transform: uppercase;
                                                          color: #686f8a;
                                                          margin: 0 0 20px;
                                                          padding: 0; 
                                                          color: #2d3436;">จำนวนคนโหลดไฟล์ทั้งหมด</p>
                      </div> 
                    </div>
                    <div class="cf-sm-6 cf-lg-3 col-sm-6 col-md-3" style="text-align: center; margin-top: 60px; margin-bottom: 50px;">
                        <div class="counter-i">
                          <p data-value="3393" class="counter-i-val" style="    color: #283346;
                                                                                font-size: 57px;
                                                                                font-family: montserrat,sans-serif;
                                                                                font-weight: 900;
                                                                                position: relative;">
                                                                                 <?php $countchat = $this->db->query('SELECT count(Id_Chatroom)
                                                                                                    as count
                                                                                                    FROM Chatroom');
                                                                                        $c =  $countchat->row_array();
                                                                                        echo $c['count'];
                                                                                  ?> </p>
                          <hr>
                          <p class="counter-i-ttl" style="font-weight: 700;
                                                          line-height: 140%;
                                                          font-size: 16px;
                                                          text-transform: uppercase;
                                                          color: #686f8a;
                                                          margin: 0 0 20px;
                                                          padding: 0; 
                                                          color: #2d3436;">จำนวนห้องแชทที่สร้างในการประชุม</p>
                      </div> 
                    </div>
             

            </div>
            </div>
              
</div>