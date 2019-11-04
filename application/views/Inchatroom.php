
<div class="container" style="margin-top: 60px;">
    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <h3 style="text-align: center; color:#2d3436;">ส่งคำถาม</h3>
                <form name="sendchat" id="sendchat_form" method="post">
                    <textarea class="form-control form-control-alternative" name="text" id="text" rows="3" required placeholder="เขียนคำถามที่คุณต้องการคำถามลงไปที่นี่"></textarea>
                    <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" >ยืนยันส่งคำถาม</button>
                </form>

    </div>
<div class="nav-wrapper" >
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>Recent</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa fa-star mr-2" aria-hidden="true"></i>Popular</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa fa-list-ul mr-2" aria-hidden="true"></i>Properties</a>
        </li>
    </ul>
</div>
<div class="card shadow mb-5" style="">
    <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" >
                <div class="Container-Message" id="Message_Chatroom" style="height: 500px;  overflow-y: auto;" >

                    <hr>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="Container-Message" id="Message_Popular" style="height: 500px;  overflow-y: auto;" >

                    



                    <hr>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
            <p class="topic" style="text-align: center;">หัวข้อ : <?php echo $chat_data['Topic'] ?> </p>
                <p class="idchat" style="text-align: center;">รหัสห้องแชท : <?php echo $chat_data['Code_Chatroom'] ?> </p>
                <p class="createby" style="text-align: center;">สร้างโดยคุณ : <?php echo $chat_data['Createby'] ?> </p>
                <p class="createby" style="text-align: center;">หมดอายุวันที่ : <?php echo date('d/m/Y', strtotime($chat_data['Dateend'])); ?> </p>
                <div style="text-align:center;">
                    <a href="<?php echo site_url();?>repositoryController/showdata/<?php echo $chat_data['Id_Repository']?>"  class="btn btn" style="background-color: #2d3436; color: #fff;">ดู Event นี้</a>
                </div>
                <input type="hidden" id="idchat" name="idchat" value="<?php echo $chat_data['Id_Chatroom'] ?>">
                <p class="idchat" style="text-align: center;">Qr Code</p>
                <img id="imgqr" style="width:250px; height:250px; margin-left: auto; margin-right: auto;   display: block;"  src="<?php echo base_url('/assets/img/qrcode/chatroom/'.$chat_data['Code_Chatroom'].".png");?>"/>
            </div>
        </div>
    </div>
</div>
</div>
