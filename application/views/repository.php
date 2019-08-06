
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
                    <img src="<?php echo base_url('/assets/img/card/repository.png');?>" />
                    </li>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
                </div>
                <div id="carousel" class="flexslider">
                <ul class="slides">
                    <li>
                    <img src="<?php echo base_url('/assets/img/card/repository.png');?>" />
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
        
        <button class="btn btn-1 btn-success"> <i class="fa fa-user-plus" aria-hidden="true" ></i> เพิ่มบุคคลที่เกี่ยวข้อง</button>
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
                <p class="description" style=><p style="font-weight: 500;">บุคคลที่เกี่ยวข้อง : </p></p>
                <p class="description"><?php echo $data['detail'];?></p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อไฟล์</h4></th>
                    <th style="text-align:center;" scope="col"><h4>สร้างโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เมื่อวันที่</h4></th>
                    <th style="text-align:center;" scope="col"><h4>View</h4></th>
                    <th style="text-align:center;" scope="col"><h4>Delete</h4></th>
                        
                    
                  </tr>
                </thead>
                <tbody>
          
                <?php 
                    $this->db->where('id_repository',  $data['id']);
                    $data = $this->db->get('upload');
                    foreach($data->result_array() as $r)
                    {?>

                        
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        <img src="<?php echo base_url().'assets/img/logofile/'. $r['type']?>.png" alt="">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo  $r['file'];?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                    <?php echo  $r['name'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> <?php echo  $r['date'];?>
                      </span>
                    </td>   

                    <td class="">
                        <div>
                        <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $r['id_upload'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                        </div>
                       
                    </td>
                    <td>
                    <a href="<?php echo site_url(); ?>/ViewController/del/<?php echo  $r['id_upload'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                    </td>   
                  </tr>
                </tbody>
             
                    <?php }?>
                    </table>
                </div>
                <button type="button" class="btn btn" style="background-color: #2d3436; color: #fff; margin-top: 20px;">เพิ่มเอกสารลงใน Repository นี้</button>
            </div>
        </div>
    </div>
</div>
  </div>
  <?php } endif; ?>
</div>

</div>
