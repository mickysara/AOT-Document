<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

  <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
        <form name="login" id="login_form" method="post">
                <h1 class="display-2" style="color:#2d3436;">ระบบแสดงการแจ้งปัญหา</h1>
                <hr>
                
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                        <h3 class="mb-0">ตารางข้อมูลทั้งหมด</h3>
                        </div>
                      </div>

                    <td class="">
                            <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>หัวข้อแจ้งปัญหา</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">แจ้งโดย</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">View</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Delete</h4></th>
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
                                                <img src="<?php echo base_url('/assets/img/Logo/linenotify.png')?>" alt="">
                                                </a>
                                                <div class="media-body">
                                                  <span class="mb-0 text-sm"> <?php echo $data['Detail'];?></span>
                                                </div>
                                              </div>
                                            </th>
                                            <td>
                                            <?php echo $data['AccName']; ?>
                                            </td>
                                            <td>
                                              <span class="badge badge-dot mr-4">
                                              <?php if($data['Status'] == "ยังไม่ได้รับการแก้ไข")
                                              {?>
                                                  <i class="bg-danger"></i> <?php echo $data['Status'];?></i>
                                              <?php }else { ?>
                                                <i class="bg-success"></i> <?php echo $data['Status'];?></i>
                                              <?php } ?>
                                              </span>
                                          </td>   
                                          
                                          <td class="">
                        <div>
                            <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal"  data-target="#<?php echo $data['Detail'];?>">View</button>                           
                            <div class="modal fade" id="<?php echo $data['Detail'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Detail'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436; height: 608px;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">ชื่อหัวข้อแจ้งปัญหา : <?php echo $data['Detail'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p>โดย : <?php echo $data['AccName'];?></p>
                                        <p>อีเมล :  <?php echo $data['Email'];?></p>
                                        <p>เบอร์ต่อติด : <?php echo $data['Tel'];?></p>
                                        <p>แจ้งเมื่อวันที่ : <?php echo date('d/m/Y', strtotime($data['Date']));?></p>
                                        <h4>สถานะ : <?php echo $data['Status'];?></h4>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="<?php echo site_url(); ?>EditLineNotifyController/edit/<?php echo $data['Id_Problem'];?>"class="btn btn-success">เปลี่ยนสถานะการแก้ปัญหา</a>
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                
                        </div>
                       
                    </td>
                    <td>
                    <a href="<?php echo site_url(); ?>/ViewLineNotifyController/del/<?php echo $data['Id_Problem'];?>" onclick="return confirm('คุณต้องการลบการแจ้งเตือนนี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                    </td>   
                  </tr>
                  <?php } endif; ?> 
                </tbody>
                                            
                                        </table>
                                        </div>
                                </div>
                            </div>
            </form>
            </div>
  </div>
               <script type="text/javascript">
                  function sweetalertclick(){
                       swal({
                        title: "คุณต้องการลบไฟล์ใช่หรือไม่",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                          swal("ลบไฟล์สำเร็จ", {
                            icon: "success",
                          });
                          
                        }else{
                        }
                      });
                  }
                  </script>
                              <script>
                              function archiveFunction() {
                              event.preventDefault(); // prevent form submit
                              var form = event.target.form; // storing the form
                                      swal({
                                title: "Are you sure?",
                                text: "But you will still be able to retrieve this file.",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, archive it!",
                                cancelButtonText: "No, cancel please!",
                                closeOnConfirm: false,
                                closeOnCancel: false
                              },
                              function(isConfirm){
                                if (isConfirm) {
                                  form.submit();          // submitting the form when user press yes
                                } else {
                                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
                              });
                              }
                              </script>
</div>
   
</div>
