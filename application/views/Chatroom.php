<div class="container">
  <div class="row mt-5" align="center">
    <div class="col">
        <div>
            <h1>ChatRoom</h1>
        </div>

        <form name="chatroom" id="chatroom_form" method="post">
        <div class="input-group mt-4 mb-4" style="" align="center">
            <input class="form-control" style="width: max;" id="Chatroom" name="Chatroom" placeholder="กรุณากรอกเลขChatRoom" type="text">           
        </div>
        <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" >ยืนยัน</button>
        <button type="button" class="btn btn-primary btn-lg" style="width: 192px; height: 52px;" onclick="location.href='<?php echo base_url();?>CreatechatroomController'">Create ChatRoom</button>
        </form>
        
                
    </div>

  </div>
  <div class="row mt-5" id="Showsearch" align="center">

  </div>
</div>