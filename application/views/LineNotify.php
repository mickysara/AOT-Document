<body>
<div class="container" style="margin-top: 60px;">
<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="notify" id="notify_form" action="<?php echo site_url('LinenotifyController/InsertLineNotify');?>" method="post">
                <h1 class="display-2">แจ้งปัญหา</h1>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>แจ้งปัญหา</div>
                        <textarea class="form-control form-control-alternative" rows="3" id="probem" name="probem" placeholder="Write a large text here ..." required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ - นามสกุล</div>
                    <input type="text" class="form-control form-control-alternative" id="Name" name="Name"  value="<?=$this->session->userdata('accountName')?>" required id="name" readonly>
                    </div>
                    <div class="form-group">
                    <div>E-mail</div>
                    <input type="email" class="form-control form-control-alternative" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div>เบอร์ติดต่อ</div>
                    <input type="text" class="form-control form-control-alternative" id="tel" name="tel" placeholder="tel" required>
                    </div>
                  </div>
                </div>
                <button onclick="javascript:sweetalertclick()" type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>
            </div>
            </div>


            <script type="text/javascript">
                  function sweetalertclick(){
                var probem = $("#probem").val();
                var Name = $("#Name").val();
                var email = $("#email").val();
                var tel = $("#tel").val();
               
                  
                  if(probem ==""|| Name ==""|| email ==""||tel ==""){
                      alert("กรุณากรอกข้อมูลให้ครบ");
                  }else{
                    swal({
                          title: "แจ้งปัญหาเรียบร้อย",
                          text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                          icon: "success", 
                        }); 
                 }
                  }
                  </script> 
 
</div>
</div>
