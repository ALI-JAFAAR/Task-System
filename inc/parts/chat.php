<?php
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
                    
<?php }}}?>