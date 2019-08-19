<!DOCTYPE html>
<html lang=en>

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
  border-radius: 40px;
box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
  cursor: pointer;
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

.card:hover {
  transform: scale(0.9, 0.9);
  box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), 
    -5px -5px 30px 15px rgba(0,0,0,0.22);
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



</style>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <h1 style="font-size: 45px; color: #2d3436;">ระบบหลังบ้าน</h1>
            </div>
        </div>
    </div>

<div class="container">
  <div class="card-group">
  <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">อัปโหลดเอกสาร</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Public</h5>
        <p class="card-text">คุณสามารถอัปโหลดเอกสารได้ทีละ 1 ไฟล์ ประเภทไฟล์มีดังนี้ PDG DOCX PPTX XLSX</p>
        <a href="<?php echo site_url('UploadController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">ดูข้อมูลเอกสาร</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Admistrator</h5>
        <p class="card-text">ตรวจสอบการมีอยู่ของไฟล์ทั้งหมดในฐานข้อมูล และสามารถดูข้อมูลข้างในได้ และสามารถแก้ไขข้อมูลที่ดูได้</p>
        <a href="<?php echo site_url('ViewController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">เพิ่มข้อมูลสิทธ์การเข้าถึง</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Admistrator</h5>
        <p class="card-text">เพิ่ม Repository</p>
        <a href="<?php echo site_url('RepoController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
  </div>
</div>
     <!--------------------------------------------------- picture set 1----------------------------------------------------------->
     <div class="container">
  <div class="card-group">
  <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">ดูข้อมูลการแจ้งเตือน</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Admistrator</h5>
        <p class="card-text">ตรวจสอบการมีอยู่ของข้อมูลการแจ้งเตือนทั้งหมดที่มีอยู่ในฐานข้อมูล และสามารถแก้ไขข้อมูลนั้นได้</p>
        <a href="<?php echo site_url('ViewLineNotifyController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">เพิ่มประเภทของเอกสาร</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Admistrator</h5>
        <p class="card-text">เพิ่มประเภทเอกสาร พร้อมรูป Logo </p>
        <a href="<?php echo site_url('TypeController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="http://localhost/AOT-Document/assets/img/Logo/wallpaper.jpg" alt="Oslo">
      <div class="card-body">
        <h2 class="card-title">ดูข้อมูลประเภทเอกสาร</h2>
        <h5 class="card-subtitle mb-2">สถานะการเข้าถึง : Admistrator</h5>
        <p class="card-text">ตรวจสอบการมีอยู่ของประเภทเอกสารที่มีอยู่ในระบบ และสามารถแก้ไขข้อมูลได้</p>
        <a href="<?php echo site_url('TypeViewController');?>" class="card-link text-primary">Go to Link</a>
      </div>
      <div class="card-footer">
        <!-- <small class="text-muted">Last updated yesterday</small> -->
      </div>
    </div>
  </div>
</div>
<br>
<br>
<!--------------------------------------------------- picture set 2----------------------------------------------------------->

</body>
 

</html>
