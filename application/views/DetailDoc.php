
<div class="container">
           
  <div class="row">
    <div class="col mt-5 mr-5" style="width: 500px; height: 500px; background-color: #fff;"><span></span>
        <div id="slider" class="flexslider">
                <ul class="slides" style="margin-top: 50px;">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
                </div>
                <div id="carousel" class="flexslider">
                <ul class="slides">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/powerpoint.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
        </div>
    </div>

                <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
    <div class="col mt-5" style="background-color: #fff; padding: 36px;">
        <h1>ชื่อไฟล์ : <?php echo $data['file'];?> </h1>  
        <p>ประเภท : <?php echo $data['type'];?></p>
        <p>เพิ่มโดย : <?php echo $data['name'];?></p>
        <p>เมื่อวันที่ : <?php echo $data['date'];?></p>
        <p>หมดอายุวันที่ : </p>
        <button type="button" class="btn btn-success" style="margin-top: 10px; margin-bottom: 15px;">ดาวน์โหลดไฟล์</button>
    </div>
    <?php } endif; ?>
    <div class="w-100"></div>
    <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>ความคิดเห็น</a>
        </li>
    </ul>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.</p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
