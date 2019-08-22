<!DOCTYPE html>
<html lang="en">
 <head>
 
  </head>
  <body>
    
    <div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('TypeController/typeupload');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">อัพโหลดประเภทไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อประเภทไฟล์</div>
                      <input type="Text" class="form-control form-control-alternative" name="nametype" value="" required id="nametype">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <td>รูปภาพโลโก้ของไฟล์</td>
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg">
                      <label class="custom-file-label">กรุณาเลือกรูปภาพโลโก้</label>
                    </div>
                    </div>
                    </div>

            
                <button onclick="javascript:sweetalertclick()" type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>


              <script type="text/javascript">
                  function sweetalertclick(){
                var name = $("#name").val();
                var topic = $("#topic").val();
                var file = $("#image_file").val();
                var date = $("#date").val();
                var dateend = $("#date_end").val();
                var detail = $("#detail").val();
                var privacy = $("#privacy").val();
                  
                  if(topic ==""|| file ==""|| detail ==""||privacy ==""){
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
