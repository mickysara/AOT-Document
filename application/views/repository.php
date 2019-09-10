<div class="container mb-5">
        
<div class="container">
<?php          
                    if(isset($repository_data) && is_array($repository_data) && count($repository_data)): $i=1;
                    foreach ($repository_data as $key => $repo) {   
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
        <h1>ชื่อ Repository : <?php echo $repo['topic'];?> </h1>  
        <p style="font-weight: 500;">สร้างโดย : <?php echo $repo['createby'];?></p>
        <p style="font-weight: 500;">เมื่อวันที่ : <?php echo date('d/m/Y', strtotime($repo['date']));?></p>
        <p style="font-weight: 500;">ความเป็นส่วนตัว : <?php echo $repo['privacy'];?> </p>
          <?php 
            $this->db->where('id_repository', $repo['id']);
            $this->db->where('accname', $this->session->userdata('accountName'));
            $querystatus = $this->db->get('repository_member', 1);
            $resultstatus = $querystatus->row_array();
            if($resultstatus == "")
            {
              $this->db->where('id', $repo['id']);
              $this->db->where('createby',$this->session->userdata('accountName'));
              $querystatus = $this->db->get('repository', 1);
              if($querystatus->num_rows() != "")
              {
                $resultstatus['level'] = "Creater";
              }
            }
          ?>
        
        <?php 
              if($resultstatus['level'] == "Editor" || $resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
              {
                $url = current_url();
                // $repostr = site_url('/UploadFileRepoController/uploadfilerepo/1');
                $arraystate2 = (explode("/",$url));
                $idRepo = ($arraystate2[6]);?>
                <a href="<?php echo site_url();?>UploadFileRepoController/uploadfilerepo/<?php echo $idRepo?>"  class="btn btn" style="background-color: #2d3436; color: #fff; margin-top: 20px;">เพิ่มเอกสารลงใน Repository นี้</a>
              <?php } ?>


                
    </div>
  
    <div class="w-100"></div>
    <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>รายละเอียด</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>ไฟล์ที่อยู่ใน Repository นี้</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" style="" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-users mr-2" aria-hidden="true"></i>สมาชิกใน Repository นี้</a>
        </li>
    </ul>
</div>
<div class="card shadow w-100">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" style="width: max;">
                <p class="description"><?php echo $repo['detail'];?></p>
                <p class="description" style=></p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อไฟล์</h4></th>
                    <th style="text-align:center;" scope="col"><h4>สร้างโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เมื่อวันที่</h4></th>
                    <th style="text-align:center;" scope="col"><h4>View</h4></th>
                    <?php 
                        if($resultstatus['level'] == "Editor" || $resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
                        {?>
                          <th style="text-align:center;" scope="col"><h4>Edit</h4></th>
                          <th style="text-align:center;" scope="col"><h4>Delete</h4></th>
                  <?php } ?>
                    
                  </tr>
                </thead>
                <tbody>
          
                <?php 
                    $this->db->where('id_repository',  $repo['id']);
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
                    <?php echo  $r['uploadby'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> <?php echo date('d/m/Y', strtotime($r['date']));?>
                      </span>
                    </td>   
                    <td class="">
                        <div>
                        <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $r['id_upload'];?>"  class="btn btn-primary mb-3">View</a>                 
                        </div>
                       
                    </td>
                    <?php 
                        if($resultstatus['level'] == "Editor" || $resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
                        {?>
                        <td class="">
                          
                          <div>
                            <a href="<?php echo site_url(); ?>EditController/editrepo/<?php echo  $r['id_upload'];?>"  class="btn btn-success mb-3" >Edit</a>                
                            </div>
                          
                        </td>
                        <td>
                        <a href="<?php echo site_url(); ?>/ViewController/del/<?php echo  $r['id_upload'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                        </td>   
                    <?php } ?>
                  </tr>
                  <?php }?>
                </tbody>
                </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="member">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อ</h4></th>
                    <th style="text-align:center;" scope="col"><h4>ระดับ</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เพิ่มโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4>เมื่อวันที่</h4></th>
                    <?php 
                        if($resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
                        {?>
                        <th style="text-align:center;" scope="col"><h4>Edit</h4></th>
                        <th style="text-align:center;" scope="col"><h4>Delete</h4></th>
                    <?php
                    } ?>
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                        if($resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
                        {?>
                    
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#Addmember">
                      เพิ่มบุคคลที่เกี่ยวข้อง
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="Addmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">เพิ่มบุคคลที่เกี่ยวข้อง</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                              <form name="login" id="addmember_form" method="post">
                              กรุณากรอกรหัสพนักงาน :
                              <input type="text" class="form-control mt-3 mb-3 ml-2" id="id_emp" name="id_emp" placeholder="682423">
                              กรุณาเลือกระดับในการเกี่ยวข้องกับ Repository นี้ :
                              <select name="Level" id="Level" >
                                <option value="" disabled selected>กรุณาเลือกระดับ</option>
                                <option value="Viewer">Viewer</option>
                                <option value="Editor">Edittor</option>
                                <option value="Manager">Manager</option>
                              </select>
                              <input type="hidden" id="repository_id" name="repository_id" value="<?php echo $repo['id']?>">
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php 
                        } ?>
                <?php 
                    $query=$this->db->query("SELECT repository_member.*,repository.topic,repository.createby 
                    FROM repository_member,repository 
                    WHERE repository_member.id_repository = repository.id 
                    AND repository_member.id_repository =".$repo['id']);
                    foreach($query->result_array() as $mem)
                    {?>

                        
                  <tr>
                    <th scope="row">
                    <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        </a>
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo  $mem['accname'];?></span>
                        </div>
                      </div>
                    </th>
                    <td >
                    <?php echo  $mem['level'];?>
                    </td>
                    <td>
                    <?php echo  $mem['addBy'];?>
                    </td>
                    <td>
                      <div class="ml-4">
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i> <?php echo  $mem['Date'];?>
                        </span>
                      </div>
 
                    </td>   
                    <?php 
                        if($resultstatus['level'] == "Manager" || $resultstatus['level'] == "Creater")
                        {?>
                      <?php 
                      $t = explode(".", $mem['accname']);
                       ?>
                    <td class="">
                        <div class="ml-4">
                        <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal"  data-target="#<?php echo $t[0] ?>">Edit</button>                           
                            <div class="modal fade" id="<?php echo $t[0] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $t[0] ?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">แก้ไขสิทธิ์ : <?php echo $mem['accname'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                    <p style="font-size: 15px;"> กรุณาเลือกระดับในการเกี่ยวข้อง : </p>
                                    <form name="login" id="editmember_form" method="post" action="<?php echo site_url("Membercontroller/editmember/".$mem['ID']."/".$repo['id'])?>">
                                    <select name="Level" id="Level" style="width: 100%; font-size: 15px;" required>
                                      
                                      <option value="" disabled selected>กรุณาเลือกระดับ</option>
                                      <option value="Viewer">Viewer</option>
                                      <option value="Editor">Edittor</option>
                                      <option value="Manager">Manager</option>
                                    </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                        <button type="submit" class="btn btn-success" value="<?php echo $mem['ID']; ?>">ยืนยัน</button>
                                    </div>
                                </div>
                              </form>
                        </div>
                       
                    </td>
                    <td>
                    <a href="<?php echo site_url(); ?>/MemberController/Deletemember/<?php echo  $mem['ID'];?>/<?php echo $repo['id'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                    </td>  
                    <?php 
                        }
                        ?> 
                  </tr>
                  <?php }?>
                  <?php } endif; ?>
                </tbody>
             
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  
</div>
</div>

