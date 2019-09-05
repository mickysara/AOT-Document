<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

  <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
        <form name="login" id="login_form" method="post">
                <h1 class="display-2" style="color:#2d3436;">ระบบจัดการประเภทของเอกสาร</h1>
                <hr>
                
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">ตารางประเภทเอกสารทั้งหมด</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อรูปภาพ</h4></th>
                    <th style="text-align:center;" scope="col"><h4>ชื่อประเภทเอกสาร</h4></th>
                    <th style="text-align:center;" scope="col"><h4>View</h4></th>
                    <th style="text-align:center;" scope="col"><h4>Delete</h4></th>
                        
                    
                  </tr>
                </thead>
                <tbody>

                <?php
                    if(isset($view_type) && is_array($view_type) && count($view_type)): $i=0;
                    foreach ($view_type as $key => $data) { 
                    ?>

                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        <img src="<?php echo base_url().'assets/img/logofile/'. $data['image']?>" alt="">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $data['image'];?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                    <?php echo $data['typename'];?>
                    </td>

                    <td class="">
                        <div>
                            <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal"  data-target="#<?php echo $data['typename'];?>">ViewType</button>                           
                            <div class="modal fade" id="<?php echo $data['typename'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['typename'];?>" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436; height: 608px;">
                               
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">ชื่อเอกสาร : <?php echo $data['image'];?></h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p>ชื่อประเภทไฟล์ : <?php echo $data['typename'];?> </p>
                                        <p>ชื่อรูปภาพ : <?php echo $data['image'];?></p>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="<?php echo site_url(); ?>EditTypeController/edit/<?php echo $data['id_type'];?>"class="btn btn-success">Edit</a>
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                
                        </div>
                       
                    </td>
                    <td>
                    <a href="<?php echo site_url(); ?>/TypeViewController/del/<?php echo $data['id_type'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>
                    </td>   
                  </tr>
                </tbody>



                <?php } endif; ?> 
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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
