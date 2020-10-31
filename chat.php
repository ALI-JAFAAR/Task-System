<?php include "inc/head.php"; include "inc/nav.php";
  $error = '';
 if ( ! headers_sent() ) {
    header_remove();
}
?>
<?php include 'css/chat.php';?>
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
                      <?php if(isset($_GET['user'])){ 
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
                      include 'inc/parts/user_chat.php';
                    }else{
                      include 'inc/parts/chat.php';
                    }
                  ?>
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
<script src="js/chat.js"></script>
<?php ?>