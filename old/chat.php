<?php include "inc/head.php"; include "inc/nav.php";
  $error = '';
 if ( ! headers_sent() ) {
    header_remove();
}
?>
<style type="text/css">
    .chat{
      margin-top: auto;
      margin-bottom: auto;
    }
    .card{
      height: 500px;
      border-radius: 15px !important;
      background-color: rgba(0,0,0,0.4) !important;
    }
    .contacts_body{
      padding:  0.75rem 0 !important;
      overflow-y: auto;
      white-space: nowrap;
    }
    .msg_card_body{
      overflow-y: auto;
    }
    .card-header{
      border-radius: 15px 15px 0 0 !important;
      border-bottom: 0 !important;
    }
   .card-footer{
    border-radius: 0 0 15px 15px !important;
      border-top: 0 !important;
  }
    .container{
      align-content: center;
    }
    .search{
      border-radius: 15px 0 0 15px !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
    }
    .search:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .type_msg{
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
      height: 60px !important;
      overflow-y: auto;
    }
      .type_msg:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .attach_btn{
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .send_btn{
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .search_btn{
      border-radius: 0 15px 15px 0 !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .contacts{
      list-style: none;
      padding: 0;
    }
    .contacts li{
      width: 100% !important;
      padding: 5px 10px;
      margin-bottom: 15px !important;
    }
  .active{
      background-color: rgba(0,0,0,0.3);
  }
    .user_img{
      height: 70px;
      width: 70px;
      border:1.5px solid #f5f6fa;
    
    }
    .user_img_msg{
      height: 40px;
      width: 40px;
      border:1.5px solid #f5f6fa;
    
    }
  .img_cont{
      position: relative;
      height: 70px;
      width: 70px;
  }
  .img_cont_msg{
      height: 40px;
      width: 40px;
  }
  .online_icon{
    position: absolute;
    height: 15px;
    width:15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 0.2em;
    right: 0.4em;
    border:1.5px solid white;
  }
  .offline{
    background-color: #c23616 !important;
  }
  .user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
  }
  .user_info span{
    font-size: 20px;
    color: white;
  }
  .user_info p{
  font-size: 10px;
  color: rgba(255,255,255,0.6);
  }
  .video_cam{
    margin-left: 50px;
    margin-top: 5px;
  }
  .video_cam span{
    color: white;
    font-size: 20px;
    cursor: pointer;
    margin-right: 20px;
  }
  .msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
  }
  .msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
  }
  .msg_time{
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_head{
    position: relative;
  }
  #action_menu_btn{
    position: absolute;
    right: 10px;
    top: 10px;
    color: white;
    cursor: pointer;
    font-size: 20px;
  }
  .action_menu{
    z-index: 1;
    position: absolute;
    padding: 15px 0;
    background-color: rgba(0,0,0,0.5);
    color: white;
    border-radius: 15px;
    top: 30px;
    right: 15px;
    display: none;
  }
  .action_menu ul{
    list-style: none;
    padding: 0;
  margin: 0;
  }
  .action_menu ul li{
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 5px;
  }
  .action_menu ul li i{
    padding-right: 10px;
  
  }
  .action_menu ul li:hover{
    cursor: pointer;
    background-color: rgba(0,0,0,0.2);
  }
  @media(max-width: 576px){
  .contacts_card{
    margin-bottom: 15px !important;
  }
  }
  .tox{
    width: 88% !important;
  }
</style>

      <!-- End Navbar -->
      <?php 
      if (isset($_GET["user"])){ 
        $employ = $emp->Get_employee_by_id($_GET["user"])->fetch_assoc();
      }
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat" style="margin-top: 0% !important;">
              <div class="card mb-sm-3 mb-md-0 contacts_card">
          <div class="card-header">
          </div>
          <div class="card-body contacts_body">
            <ui class="contacts">
              <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="img/5.png" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <a href="chat.php">Public Chat</a>
                </div>
              </div>
              </li>
              </li>
                <?php $res =$usr->get_admin_by_id();
                        if($res)
                            $ad = $res->fetch_assoc();
                ?>
                <li>
                  <div class="d-flex bd-highlight">
                    <div class="img_cont">
                      <img src="img/5.png" class="rounded-circle user_img">
                      <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                      <a href="?ad=<?php echo $ad['user_id']; ?>"><?php echo $ad["username"]; ?></a>
                    </div>
                  </div>
                </li>
            <?php
              $users = $emp->Get_company_employees();
              if($users){
                  while ($employee = $users->fetch_assoc()) {
            ?>
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="img/<?php 
                    if($employee['avatar'] ==''){
                      if($employee['gender'] =='male'){
                        echo'logo/male.png';
                      }else{ echo 'logo/female.png';}
                    }else{
                      echo $employee['avatar'];
                    }
                    ?>" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <a href="?user=<?php echo $employee['emp_id']; ?>"><?php echo $employee["username"] ?></a>
                </div>
              </div>
            </li>
          <?php }}?>
            </ui>
          </div>
          <div class="card-footer"></div>
        </div></div>
            <div class="col-md-8 col-xl-8 chat">
              <div class="card">
                <div class="card-header msg_head">
                  <div class="d-flex bd-highlight">
                    <div class="img_cont">
                      <?php
                          if(isset($_GET['ad'])){
                            $res = $usr->get_admin_by_id();
                            if($res)
                              $res = $res->fetch_assoc();
                      ?>

                        <img src="img/5.png" class="rounded-circle user_img">
                        <span class="online_icon"></span>
                        <div class="user_info">
                          <span><?php echo $res["username"]; ?></span>
                        </div>

                      <?php }?>
                      
                      <?php if(isset($_GET['ad'])){ 
                         $res = $usr->get_avatar_by_id($_GET['user']);
                         if($res)
                          $res = $res->fetch_assoc();
                        ?>
                      <img src="img/<?php if($res['avatar'] !='' )echo $res['avatar'];else if($res['gender'] =='male' && $res['avatar'] =='')echo 'logo/male.png';else if($res['gender'] =='female' && $res['avatar'] =='')echo 'logo/female.png';?>" class="rounded-circle user_img">
                        <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                      <span><?php echo $res["username"]; ?></span>
                    </div>
                        <?php } else{?>
                        <img src="img/5.png" class="rounded-circle user_img">
                      <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                      <span>Public Chat</span>
                    </div>
                      <?php }?>
                  </div>
                </div>
                <div class="card-body msg_card_body file-upload-wrapper" id="data" style="display: flex; flex-direction: column-reverse;">
                  <?php
                  if(isset($_GET["user"])){
                      $user = $_GET["user"];
                    $us=0;
                    if(Session::get("emp_id") != "")
                      $us = Session::get("emp_id");
                    else
                      $us = Session::get("User_id");
                    $msg = $usr->get_chat_by_id($user,$us);
                    if($msg){
                      while ($r = $msg->fetch_assoc()) {
                          
                          
                        if($r["file"] =="" && $us != $r["from_id"]){
                          
                            $res = $usr->get_avatar_by_id($r['from_id']);
                          
                            $res = $res->fetch_assoc();
                  
                  ?>
                  
                  
                  
                  <div class="d-flex justify-content-start mb-4">
                  
                    <div class="img_cont_msg">
                  
                      <img src="img/<?php if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>" class="rounded-circle user_img_msg">
                  
                    </div>
                    
                    <div class="msg_cotainer" style="color:white;background-color: #8b7e56 !important;">
                        
                      <?php echo $res["username"]."   <br>  ".$r["msg"]; ?> <br><br>     <?php echo $r["date"]; ?>
                      
                      
                    </div>
                  
                  </div>
                  
                  
                  
                  <?php }else if($r["file"] !="" && $us != $r["from_id"]){?>



                    <div class="d-flex justify-content-start mb-4">

                        <div class="img_cont_msg">
                   
                          <img src="img/<?php if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png'; ?>" class="rounded-circle user_img_msg">
                   
                        </div>

                        <div class="msg_cotainer" style="color:white;background-color: #8b7e56 !important;">
               
                          <a href="upload/<?php echo $r['file']; ?>" target="_blank" style="color: #101320;margin-left: 0%;font-size: 14pt;font-weight: bold;">Download attachment</a><br><br> 
               
                          <?php echo $res["username"]."     ".$r["msg"]; ?> <br><br> <?php echo $r["date"]; ?>    
               
               
                        </div>
               
                  </div>



                  <?php }else if($r["file"] =="" && $us == $r["from_id"]){ 
                      
                    $res = $usr->get_avatar_by_id($us);
                    
                      if($res)
                      
                        $res = $res->fetch_assoc();
                        
                    ?>
                    
                    
                  <div class="d-flex justify-content-end mb-4">
                    
                      <div class="msg_cotainer_send" style="color:white;background-color: #ee8506 !important;">
                          
                        <?php echo $res["username"]."   <br>  ".$r["msg"]; ?>   <br><br>  <?php echo $r["date"]; ?> 
                        
                      
                      </div>
                      
                      <div class="img_cont_msg">
                      
                        <img class="rounded-circle user_img_msg" src="img/<?php if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>">
                      
                      </div>
                    
                    </div>
                    
                    
                    
                  <?php }else if($r["file"] !="" && $us == $r["from_id"]){?>
                  
                  
                  
                    <div class="d-flex justify-content-end mb-4">
                        
                      <div class="msg_cotainer_send" style="color:white;background-color: #ee8506 !important;">
                          
                        <a href="upload/<?php echo $r['file']; ?>" target="_blank" style="color: #101320;margin-left: 0%;font-size: 14pt;font-weight: bold;">Download attachment</a><br><br> 
                        
                        <?php echo $res["username"]."   <br>  ".$r["msg"]; ?>    <br><br>  <?php echo $r["date"]; ?>
                        
                      </div>
                      
                      <div class="img_cont_msg">
                        
                        <img class="rounded-circle user_img_msg" src="img/<?php if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>">
                      
                      </div>
                    
                    </div>
                    
                    
                    
                    <?php }}} } else{
                        
                      $us=0;
                      
                    if(Session::get("emp_id") != "")
                    
                      $us = Session::get("emp_id");
                      
                    else
                    
                      $us = Session::get("User_id");
                      
                     $msg = $usr->get_public_chat();

                    if($msg){
                        
                      while ($r = $msg->fetch_assoc()) {
                          
                        if($r["file"] =="" && $us != $r["from_id"]){
                            
                        $res = $usr->get_avatar_by_id($r['from_id']);
                        
                        if($res)$res = $res->fetch_assoc();
                        
                  ?>
                  
                  
                  
                  <div class="d-flex justify-content-start mb-4">
                      
                    <div class="img_cont_msg">
                    
                      <img src="img/<?php  if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>" class="rounded-circle user_img_msg">
                    
                    </div>
                    
                    <div class="msg_cotainer" style="color:white;background-color: #8b7e56 !important;">
                    
                      <?php echo $res["username"]."   <br>  ".$r["msg"]; ?> <br><br>     <?php echo $r["date"]; ?>
                    
                      <span class="msg_time" style="width:130px;color:white;"></span>
                    
                    </div>
                  
                  </div>
                  
                  
                  
                  <?php }else if($r["file"] !="" && $us != $r["from_id"]){?>

                    <div class="d-flex justify-content-start mb-4">
                        
                        <div class="img_cont_msg">
                          
                          <img src="img/<?php if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>" class="rounded-circle user_img_msg">
                        
                        </div>
                        
                        <div class="msg_cotainer" style="color:white;background-color: #8b7e56 !important;">
                            
                            <a href="upload/<?php echo $r['file']; ?>" target="_blank" style="color: #101320;margin-left: 0%;font-size: 14pt;font-weight: bold;">Download attachment</a><br><br> 
                      
                            <?php if($res["name"]){echo $res["username"]."     ".$r["msg"];}else{echo Session::get("ceo")."     ".$r["msg"];} ?> <br><br>     <?php echo $r["date"]; ?>
                            
                            <span class="msg_time" style="width:130px;color:white;"></span>
                        
                        </div>
                  
                  </div>




                    <?php }else if($r["file"] =="" && $us == $r["from_id"]){ 
                   
                        $res = $usr->get_avatar_by_id($us);
                   
                        if($res)
                   
                          $res = $res->fetch_assoc();
                    ?>
                    
                    <div class="d-flex justify-content-end mb-4">
                    
                        <div class="msg_cotainer_send" style="color:white;background-color: #ee8506 !important;">
                          
                            <?php echo $res["username"]."   <br>  ".$r["msg"]; ?>    
                      
                        </div>
                        
                        <div class="img_cont_msg">
                        
                            <img class="rounded-circle user_img_msg" src="img/<?php  if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png'; ?>">
                        
                        </div>
                    
                    </div>
                    
                    
                  <?php }else if($r["file"] !="" && $us == $r["from_id"]){?>
                  
                  
                  
                    <div class="d-flex justify-content-end mb-4">
                        
                        <div class="msg_cotainer_send" style="color:white;background-color: #ee8506 !important;">
                      
                            <a href="upload/<?php echo $r['file']; ?>" target="_blank" style="color: #101320;margin-left: 0%;font-size: 14pt;font-weight: bold;">Download attachment</a><br><br> 
                      
                            <?php echo $res["username"]."   <br>  ".$r["msg"]; ?>    <br><br><?php echo $r["date"]; ?>
                      
                        </div>
                      
                        <div class="img_cont_msg">
                    
                            <img class="rounded-circle user_img_msg" src="img/<?php  if($res['avatar'] !="")echo $res['avatar']; else if (Session::get('gender') =='female' && $res['avatar'] =="")echo'logo/female.png'; else if(Session::get('gender') =='male' && $res['avatar'] =="") echo 'logo/male.png';?>">
                    
                        </div>
                    
                    </div>
                    
                    
                  <?php }}}}?>

                  </div>
                </div>
                <div class="card-footer" style="background-color: #101320 !important;">

                  <form method="post" id="image_form" enctype="multipart/form-data" style="width: -webkit-fill-available;">
                    <div class="input-group">

                      <?php if(isset($_GET["user"])){?>
                        <input type="hidden" id="to_id" name="to_id" value="<?php echo $_GET["user"];?>">
                      <?php }?>
                      
                      <input  type="hidden" id="user_id" name="user_id" value="<?php echo Session::get("User_id");?>">
                      
                      <input type="hidden" id="emp_id" name="emp_id" value="<?php if(Session::get("emp_id")!="")echo Session::get("emp_id");?>">
                      
                      <input type="hidden" name="one_id" id="one_id" value="<?php $r = $usr->get_avatar_by_id($_GET["user"]);if($r){  $r = $r->fetch_assoc(); echo $r['one_ID']; }else{ echo ""; $error =' هذا المستخدم لم يقم بتفعيل الاشعارات';}?>">
                      
                      <label class="upload-file" style="width: 4%;text-align: center;">

                        <i style="text-align: center;" class="material-icons">attach_file</i>           

                        <input type="file" name="file" id="file" accept=".png,.jpg,.jpeg,.pdf,.docx" style="display: none;"> 

                      </label>

                      <textarea name="msg" id="editor" class="form-control type_msg" placeholder="Type your message..."></textarea>

                      <div class="input-group-append">

                        <button id="send" name="send" style="background-color: black; border:none; ">
                      
                          <span class="input-group-text send_btn" id="submit"><i class="material-icons">near_me</i></span>
                      
                        </button>
                    
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
<?php include "inc/footer.php";?>
<script type="text/javascript">

$(document).ready(function(){


    $('#action_menu_btn').click(function(){

      $('.action_menu').toggle();

    });
    function getCaret(el) {

        if (el.selectionStart) {

            return el.selectionStart;

        } else if (document.selection) {

            el.focus();

            var r = document.selection.createRange();

            if (r == null) {

                return 0;

            }

            var re = el.createTextRange(),

            rc = re.duplicate();
            
            re.moveToBookmark(r.getBookmark());
            
            rc.setEndPoint('EndToStart', re);
            
            return rc.text.length;
        
        }  
        
        return 0;
    
    }
    
    $("#message").keyup(function(e){
    
        if ((e.keyCode == 13 || e.keyCode == 10) && e.ctrlKey) {
    
            var content = $(this).val();
    
            var caret = getCaret(this);
    
            $(this).val(content.substring(0,caret)+"\n"+content.substring(caret,content.length));
    
            e.stopPropagation();
    
        } else if (e.keyCode == 13 || e.keyCode == 10){
    
          $("#send").click();
    
        }
    });
    $('#image_form').submit(function (event) {
        event.preventDefault();
        console.log($("#one_id").val());
          $.ajax({
              url: "action.php",
              method: "POST",
              data: new FormData(this),
              contentType: false,
              processData: false,
              success: function (data) {
                alert(data);
                $("#msg").val("");
                console.log(data);
                //location.reload();

              }
          });
        //}
    });

});
</script>
<?php ?>