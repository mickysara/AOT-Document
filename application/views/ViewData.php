<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">



  <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
        <form name="view" id="view_form" method="post">
                <h1 class="display-2" style="color:#2d3436;">ระบบจัดการเอกสาร</h1>
                <hr>
                
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">ตารางเอกสารทั้งหมด</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อไฟล์</h4></th>
                    <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สร้างโดย</h4></th>
                    <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                    <th style="text-align:center;" scope="col"><h4 style="text-align: left;">View</h4></th>
                    <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Delete</h4></th>
                        
                    
                  </tr>
                </thead>
                <tbody>

                <?php
                    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=0;
                    foreach ($view_data as $key => $data) { 

                      $str = $data['File'];
                      $arraystate = (explode(".",$str));
                       //echo ($arraystate[1]);
                        //$aa = "../assets/img/logofile/xlsx.png";
                        $typefile = $arraystate[1];
                        $localfile = base_url()."/assets/img/logofile/";
                        $dotpng = ".png";
                        $show = $localfile.$typefile.$dotpng;
                    ?>

                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        <img src="<?php echo base_url().'assets/img/logofile/'. $data['Type']?>.png" alt="">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $data['File'];?></span>
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

                    <td class="">
                        <div>
                            <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal"  data-target="#<?php echo $data['Url'];?>">View</button>                           
                            <div class="modal fade" id="<?php echo $data['Url'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['Url'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">ชื่อเอกสาร : <?php echo $data['File'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <?php if(date('d/m/Y', strtotime($data['Dateend']))=='01/01/1970'){
                                      $publicdate = 'เอกสารไม่มีวันหมดอายุ';
                                      }else{
                                      $publicdate = date('d/m/Y', strtotime($data['Dateend']));
                                      }
                                      ?>
                                    <div class="modal-body" >
                                        <p>รายละเอียด : <?php echo $data['Detail'];?> </p>
                                        <p>โดย : <?php echo $data['Uploadby'];?></p>
                                        <p>เมื่อวันที่ : <?php echo date('d/m/Y', strtotime($data['Date']));?></p>
                                        <p>หมดอายุ : <?php echo $publicdate;?></p>
                                        <p>ระดับการเข้าถึง : <?php echo $data['Privacy'];?></p>
                                        <p>สถานะ :  <?php echo $data['Status'];?></p>
                                        <p>จำนวนครั้งที่ดาวโหลดไฟล์ :  <?php echo $data['Download'];?></p>
                                        <p>Qr code :  <img style="width:250px; height:250px; margin-left: auto; margin-right: auto;" src="<?php echo base_url('/assets/img/qrcode/'.$data['Qr_Codename'].'.png');?>"/></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url(); ?>EditController/edit/<?php echo $data['Id_Upload'];?>"class="btn btn-success">Edit</a>
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                
                        </div>
                       
                    </td>
                    <td>
                    <a href="<?php echo site_url(); ?>/ViewController/del/<?php echo $data['Id_Upload'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
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
