<div class="container" style="">
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
<div class="card shadow">
    <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                
                <div class="Container-Message" id="Message_Chatroom" style="height: 500px;  overflow-y: auto;" >
                

                    
                </div>
                
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">

                        

                <p class="topic" style="text-align: center;">หัวข้อ : <?php echo $chat_data['topic'] ?> </p>
                <p class="idchat" style="text-align: center;">รหัสห้องแชท : <?php echo $chat_data['code_chatroom'] ?> </p>
                <p class="createby" style="text-align: center;">สร้างโดยคุณ : <?php echo $chat_data['createby'] ?> </p>
                <input type="hidden" id="idchat" name="idchat" value="<?php echo $chat_data['code_chatroom'] ?>">
                <p class="idchat" style="text-align: center;">Qr Code</p>
                <img id="imgqr" style="width:250px; height:250px; margin-left: auto; margin-right: auto;   display: block;"  src="<?php echo base_url('/assets/img/qrcode/AotfMerqhTYjsalKyCcH.png');?>"/>
                <div style="text-align:center;">
                    <button class="btn btn-success btn-lg mt-5" onclick="openFullscreen();"> Open Fullscreen</button>
                    <br>
                    <button class="btn btn-success btn-lg mt-3" onclick="closeFullscreen();">Close Fullscreen</button>
                    <br>
                    <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;"> คำถามที่ตอบแล้ว </button>
                </div>
                
            </div>
        </div>

    </div>
</div>
    <div class="Message_lastest mt-4 mb-5" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1 class="ml-4 mt-2" style="text-align: center;" >Latest question</h1>
        <div id="recent_message">
        </div>
        </div>
    </div>
</div>


<script>
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>

