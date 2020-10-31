
<?php
include "classes/User.php";
$usr = new User;
  $img1    = $_FILES['file']['name'];
  if($img1 != "")
   $img1  = "ALI-JAAFAR".str_replace("", "", basename($_FILES["file"]["name"]));
  
  $target1 = "upload/".$img1;
  
  $msg     = $_POST["msg"];

  $user    = $_POST["user_id"];

  $emp     = $_POST["emp_id"];
  $one     = $_POST['one_id'];
  if($emp =="")
    $emp = $user;
  if(isset($_POST["to_id"])){
      
    $to      = $_POST["to_id"];
    $res     = $usr->add_msg($msg,$user,$emp,$to,$img1);

    function sendMessage($one){
        $content = array(
            "en" => 'English Message'
            );
        
        $fields = array(
            'app_id' => "895bcab4-82c6-49a3-b447-18b7c22134d0",
            'include_player_ids' => array($one),
            'data' => array("foo" => "bar"),
            'contents' => $content
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic YTQwYjRiOWItMjI2OC00ZDI3LTg2ODItZThiNjMwYWYyYTg5'
    ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    $response = sendMessage($one);
    
  }else{
    $res     = $usr->public_chat($msg,$img1,$emp,$user);
    
    function sendMessage_1() {
    $content      = array(
        "en" => 'YOU HAVE NEW MESSAGE '
    );
    $fields = array(
        'app_id' => "895bcab4-82c6-49a3-b447-18b7c22134d0",
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic YTQwYjRiOWItMjI2OC00ZDI3LTg2ODItZThiNjMwYWYyYTg5'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}
$response = sendMessage_1();
$return["allresponses"] = $response;
$return = json_encode($return);

$data = json_decode($response, true);
$id = $data['id'];



  }
  if($res){
    echo "done";
    move_uploaded_file($_FILES['file']['tmp_name'],$target1);

  }else{
    echo "error";
  }
	
?>