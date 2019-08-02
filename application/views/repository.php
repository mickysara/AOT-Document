
<div class="container">
        
<div class="container">
<?php          
                    if(isset($repository_data) && is_array($repository_data) && count($repository_data)): $i=1;
                    foreach ($repository_data as $key => $data) {   
                ?>
  <div class="row">
    <div class="col mt-5 mr-5" style="width: 500px; height: 500px; background-color: #fff;"><span></span>
        <div id="slider" class="flexslider">
                <ul class="slides" style="margin-top: 50px;">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/beforeqrcode.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
                </div>
                <div id="carousel" class="flexslider">
                <ul class="slides">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/beforeqrcode.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
        </div>
    </div>


    <div class="col mt-5" style="background-color: #fff; padding: 36px;">
        <h1>ชื่อ Repository : <?php echo $data['topic'];?> </h1>  
        <p style="font-weight: 500;">สร้างโดย : <?php echo $data['createby'];?></p>
        <p style="font-weight: 500;">เมื่อวันที่ : <?php echo $data['date'];?></p>
        <p style="font-weight: 500;">ความเป็นส่วนตัว : <?php echo $data['privacy'];?> </p>
    </div>
  
    <div class="w-100"></div>
    <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>ไฟล์ที่อยู่ใน Repository นี้</a>
        </li>
    </ul>
</div>
<div class="card shadow w-100">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" style="width: max;">
                <p class="description"><?php echo $data['detail'];?></p>
                <p class="description" style=></p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">

          
                <div class="row">
                <?php 
                    $this->db->where('id_repository',  $data['id']);
                    $data = $this->db->get('upload');
                    foreach($data->result_array() as $r)
                    {?>
                        <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                 
                            <div class="card" style="width: 18rem; height: 385.828px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                                    <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$r['type'].'.png');?>" alt="Card image cap">
                                    <div class="card-body">
                                    
                                        <h3 class="card-title" style="color: #2d3436;">หัวข้อ : <?php echo $r['topic'];?> </h3>
                                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;">ชื่อไฟล์ : <?php echo $r['file'];?></p>
                                        <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด : <?php echo $r['date'];?></p>
                                        <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $r['id_upload'];?>" class="btn btn" style="margin-top: 30px; background-color:#2d3436; color: #fff;">ดูรายละเอียดเพิ่มเติม</a>
                                        
                                    </div>
                                </div>
                            </div>
                    <?php }?>
                </div>
            
                <h2 class="description">แสดงความคิดเห็นกับเอกสารนี้</h2>
                <form>
                    <textarea class="form-control form-control-alternative" rows="3" placeholder="เขียนอะไรสักอย่างเพื่อแสดงความคิดเห็นแก่ผู้โพสต์ไฟล์ ..."></textarea>
                </form>
                <button type="button" class="btn btn" style="background-color: #2d3436; color: #fff; margin-top: 20px;">ยืนยันแสดงความคิดเห็น</button>
            </div>
        </div>
    </div>
</div>
  </div>
  <?php } endif; ?>
</div>

</div>
