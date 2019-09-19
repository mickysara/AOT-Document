<div class="container mt-5" id="containerhello" style="">
    <div class="row">
                        
                        <h1 class="mb-0" style="margin-left: auto; margin-right: auto;">เอกสารทั้งหมด</h1>
                        <div class="col-md-12" style="text-align:center;"></div>
                        <?php                 
                        if(isset($member_list) && is_array($member_list) && count($member_list)): $i=0;
                        foreach ($member_list as $key => $data) { ?>
                        <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                            
                            <div class="card" style="width: 18rem; height: 385.828px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                                    <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$data['Type'].'.png');?>" alt="Card image cap">
                                    <div class="card-body">
                                    
                                        <h3 class="card-title" style="color: #2d3436;">หัวข้อ : <?php echo $data['Topic'];?> </h3>
                                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;">ชื่อไฟล์ : <?php echo $data['File'];?></p>
                                        <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด : <?php echo $data['Date'];?></p>
                                        <p class="card-text" style="font-weight: 500;margin-bottom: 10px;">ความเป็นส่วนตัว : <?php echo $data['Privacy'];?></p>
                                        <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $data['Id_Upload'];?>" class="btn btn" style="background-color:#2d3436; color: #fff;">ดูรายละเอียดเพิ่มเติม</a>
                                        
                                    </div>
                                </div>
                            </div>
                    <?php } endif; ?>

    </div>
    <div class="" style="" align="right">
        <?php echo $pagination; ?>
    </div>
</div>