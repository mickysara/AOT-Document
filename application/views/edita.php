<div class="container">
<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ระบบให้สิทธิ์</h2>
                    <hr>
                    <div class="table-responsive">   
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>หมายเลขไอดี</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สถานะ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> View </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Delete</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(isset($status_view) && is_array($status_view) && count($status_view)): $i=0;
                                            foreach ($status_view as $key => $data) { 
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"> <?php echo $data['Id_Emp'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <?php echo $data['Status'];?>
                                                </td>
                                                <td>
                                                    <div>
                                                    <a href="<?php echo site_url(); ?>EditStatusController/edit/<?php echo $data['Id_Users'];?>"class="btn btn-primary">Edit</a>                  
                                                    </div>
                                                </td>   
                                                <td>
                                                    <a href="<?php echo site_url(); ?>/ViewStatusController/del/<?php echo $data['Id_Users'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3"style="">Delete</a>
                                                </td>  
                                            </tr>
                                            <?php } endif; ?> 
                                            </tbody>
                                        </table>
                                        </div>
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
