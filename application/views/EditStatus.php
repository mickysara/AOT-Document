<!DOCTYPE html>
<html lang="en">
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  </head>
  <body>
  <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
    <div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('EditStatusController/editdata');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">แก้ไขประเภทไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ไอดี</div>
                      <input type="Text" class="form-control form-control-alternative" name="id_status" value="<?php echo $data['Id_Emp']?>" required id="id_status">
                    </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                    <div>แก้ไขสถานะ</div>
                    <select name="status" id="status" required>
                      <option value="" disabled selected >กรุณาเลือกสถานะ</option>
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                    </select>
                    </div>
                    </div>

                    <input type="hidden" name="id_admin" value= <?php echo $data['Id_Users'];?>>
                <button  type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
                <a href="<?php echo site_url("/TypeViewController");?>" class="btn btn-primary btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;">ย้อนกลับ</a>
            </form>
            <?php } endif; ?>

              <script type="text/javascript">
                  function sweetalertclick(){
                var name = $("#nametype").val();
                var file = $("#image_file").val();
                  
                  if(name ==""|| file ==""){
                      alert("กรุณากรอกข้อมูลให้ครบ");
                  }else{
                    swal({
                          title: "Upload Success",
                          text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                          icon: "success", 
                        }); 
                 }
                  }

                  </script> 
            
                                <script> 
                            var uploadField = document.getElementById("image_file");

                            uploadField.onchange = function() {
                                if(this.files[0].size > 10000000){  //ขนาดไฟล์ไม่เกิน 10 mb คิดตามจำนวน byte 10ล้าน เท่ากับ 10 mb
                                  swal({
                                      title: "Upload Fail",
                                      text: "ไฟล์ของคุณมีขนาดใหญ่กว่า 10 MB",
                                      icon: "error", 
                                    }); 
                                  this.value = "";
                                  
                                };
                               };
                                </script> 
                        <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                          var fileName = $(this).val().split("\\").pop();
                          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                        </script>
      </body>
            </div>
</div>
