<div class="container mt-5" id="containerhello" style="">

                        
                    <!-- <h1 class="mb-0" style="margin-left: auto; margin-right: auto;">เอกสารทั้งหมด</h1><div class="col"> -->
                    <div class="card shadow">
                        <div class="card-header border-0">
                        <h3 class="mb-0">ตารางเอกสารทั้งหมด</h3>
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
                        <!-- <div class="col-md-12" style="text-align:center;"></div> -->
                        <?php                 
                        if(isset($member_list) && is_array($member_list) && count($member_list)): $i=0;
                        foreach ($member_list as $key => $data) { ?>
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
                        <!-- <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                            
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
                            </div> -->
                    <?php } endif; ?>
                    </tbody>
                     </table>
                     </div>
                    </div>
                    </div>
                            

    </div>
<!--     <div class="" style="" align="right">
        <php echo $pagination; ?>
    </div> -->
</div>