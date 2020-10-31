<?php

	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');

	include_once ($filepath.'/../lib/Session.php');

	include_once ($filepath.'/../helpers/Format.php');

class Employee{

	private $db;
	private $fm;
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 
	}
	public function add_emp($date){
		$User_id  = $this->fm->validation($date["User_id"]);
		$name     = $this->fm->validation($date["name"]);
		$email    = $this->fm->validation($date["email"]);
		$pass     = $this->fm->validation($date["pass"]);
		$dept_id  = $this->fm->validation($date["dept_id"]);
		$type     = $this->fm->validation($date["type"]);
		$gender   = $this->fm->validation($date["gender"]);
		$User_id  = mysqli_real_escape_string($this->db->link,$User_id);
		$name     = mysqli_real_escape_string($this->db->link,$name);
		$email    = mysqli_real_escape_string($this->db->link,$email);
		$pass     = mysqli_real_escape_string($this->db->link,md5($pass));
		$dept_id  = mysqli_real_escape_string($this->db->link,$dept_id);
		$type     = mysqli_real_escape_string($this->db->link,$type);
		$gender   = mysqli_real_escape_string($this->db->link,$gender);
		

		$query    = "INSERT INTO `employee` (`User_id`,`username`,`email`,`pass`,`dept_id`,`gender`,`type`) VALUES('$User_id','$name','$email','$pass','$dept_id','$gender','$type')";
		$result    = $this->db->insert($query);
		if($result){
		return $result;
		}
	}

	private function get_dept_employee($dept_id){
		$query = "SELECT * FROM `employee` WHERE `dept_id`= '$dept_id' ";
		$res   = $this->db->select($query);
		$one   = array();
		$i=0;
		if($res){
			while ($row = $res->fetch_assoc()){ 
				$one[$i] = $row;
				$i++;
			}
			 return $one;
		} 
	}

	private function send_dept_notification($dept_id){
		
		$one = $this->get_dept_employee($dept_id);
		print_r($one);
		$ids =array();

		foreach ($one as $key => $ids)
			$ids[$key] = $one['one_ID'];
		echo $ids;

		$content = array("en" => 'you have new message');
        
        $fields = array('app_id' => "895bcab4-82c6-49a3-b447-18b7c22134d0",'include_player_ids' => array($one),
            'data' => array("foo" => "bar"),
            'contents' => $content
        );
        
        $fields = json_encode($fields);
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
        
        if($response != '') 
        	return $response;
        else
        	return false;
	}

	public function add_task($date){
		$title  = $this->fm->validation($date["title"]);
		$details  = $this->fm->validation($date["details"]);
		$dept_id  = $this->fm->validation($date["dept_id"]);
		$dead  = $this->fm->validation($date["dead"]);
		$title    = mysqli_real_escape_string($this->db->link,$title);
		$details    = mysqli_real_escape_string($this->db->link,$details);
		$dept_id     = mysqli_real_escape_string($this->db->link,$dept_id);
		$dead     = mysqli_real_escape_string($this->db->link,$dead);
		$query     = "INSERT INTO `task` (`title`,`details`,`dept_id`,`deadline`) VALUES('{$title}','{$details}','{$dept_id}','{$dead}')";
		$result    = $this->db->insert($query);
		if($result){
			$this->send_dept_notification($dept_id);	
			return $result;
		
		}
	}

	public function Get_All_Users(){
		$query   = "SELECT * FROM `employee`";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_company_employees(){
		$query   = "SELECT * FROM `employee`";
		$result  = $this->db->select($query);
		return $result;
	}


	public function Get_Employee(){
		if(Session::get('emp_id') ==""){
			$id =Session::get('User_id');
			$query   = "SELECT * FROM `user` WHERE `user_id`='$id'";
			$result  = $this->db->select($query);
			return $result;
		}else{
			$id =Session::get('emp_id');
			$query   = "SELECT * FROM `employee` WHERE `emp_id`='$id'";
			$result  = $this->db->select($query);
			return $result;
		}
	}
	public function get_task(){
		$query   = "SELECT * FROM `task` ";
		$result  = $this->db->select($query);
		return $result;
	}
	public function Get_All_Task(){
		$query   = "SELECT * FROM `task` WHERE `status`=0 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_1(){
		$query   = "SELECT * FROM `task` WHERE `status`=1 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_2(){
		$query   = "SELECT * FROM `task` WHERE `status`=2 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_3(){
		$query   = "SELECT * FROM `task` WHERE `status`=3 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_by_dept_0($id){
		$query   = "SELECT * FROM `task` WHERE `dept_id`= '$id' AND `status`=0 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}
	public function Get_All_Task_by_dept_1($id){
		$query   = "SELECT * FROM `task` WHERE `dept_id`= '$id' AND `status`=1 ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_by_dept_2($id){
		$query   = "SELECT * FROM `task` WHERE `dept_id`= '$id' AND `status`=2  ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Get_All_Task_by_dept_3($id){
		$query   = "SELECT * FROM `task` WHERE `dept_id`= '$id' AND `status`=3  ORDER BY `task_id` DESC";
		$result  = $this->db->select($query);
		return $result;
	}


	public function Get_All_Task_by_title($q){
		$query   = "SELECT * FROM `task` WHERE `task_id`='$q'";
		$result  = $this->db->select($query);
		return $result;
	}

	public function Update_users($date){
		$id        = $this->fm->validation($date["id"]);
		$usr_name  = $this->fm->validation($date["usr_name"]);
		$pass      = $this->fm->validation($date["pass"]);
		$type      = $this->fm->validation($date["type"]);
		$id        = mysqli_real_escape_string($this->db->link,$id);
		$usr_name  = mysqli_real_escape_string($this->db->link,$usr_name);
		$pass      = mysqli_real_escape_string($this->db->link,md5($pass));
		$type      = mysqli_real_escape_string($this->db->link,$type);
		$query     = "UPDATE `user` SET `username`='$usr_name' ,`password`='$pass' user_type='$type'";
		$result    = $this->db->update($query);
		return $result;
	}

	public function change_task_dept($dept_id,$pre_task){

		$query = "UPDATE `task` SET `dept_id`='$dept_id' WHERE `task_id`=$pre_task";
		$result    = $this->db->update($query);
		if($result){
			$query = "INSERT INTO `task_dates` (`task_id`) VALUES ('{$pre_task}')";
			$res   = $this->db->insert($query);
		}
		return $result;


	}
	public function delete_user($id){
		$id     = $this->fm->validation($id);
		$id     = mysqli_real_escape_string($this->db->link,$id);
		$query   = "DELETE FROM `user` WHERE user_id='$id'";
		$result  = $this->db->delete($query);
		return $result;
	}

	public function Get_employee_by_id($id){
		$query   = "SELECT * FROM `employee` WHERE emp_id='$id'";
		$result  = $this->db->select($query);
		if($result)
			return $result;
	}

	public function Get_task_by_id($id){
		$query   = "SELECT * FROM `task`  WHERE `task_id`='$id'";
		$result  = $this->db->select($query);
		return $result;
	}

	public function delete_task($id){
		$query   = "DELETE  FROM `task` WHERE task_id='$id'";
		$result  = $this->db->delete($query);
		return $result;
	}

	public function delete_employee($id){
		$query   = "DELETE  FROM `employee` WHERE emp_id='$id'";
		$result  = $this->db->delete($query);
		return $result;
	}

	public function update_profile($date){

		$id     = Session::get("emp_id");
 
		$name  = $this->fm->validation($date["name"]);
		$email      = $this->fm->validation($date["email"]);
		$pass      = $this->fm->validation($date["pass"]);
		$birth      = $this->fm->validation($date["birth"]);

		$avatar  = $_FILES['avatar']['name'];
		$target1 = "img/".basename($_FILES['avatar']['name']);

		$name        = mysqli_real_escape_string($this->db->link,$name);
		$email  = mysqli_real_escape_string($this->db->link,$email);
		$birth  = mysqli_real_escape_string($this->db->link,$birth);

		if($pass !=""){
			$pass        = mysqli_real_escape_string($this->db->link,md5($pass));
			$query = "UPDATE `employee` SET `username`='$name' , `email`='$email' , `pass`='$pass' , `birth`='$birth' , `avatar`='$avatar'  WHERE  `emp_id`='$id'";
		}else{
			$query = "UPDATE `employee` SET `username`='$name' , `email`='$email' , `birth`='$birth' , `avatar`='$avatar'  WHERE  `emp_id`='$id'";
		}

		$result  = $this->db->update($query);
		if($result){
			move_uploaded_file($_FILES['avatar']['tmp_name'],$target1);
			return $result;
		}

	}
	public function report($id,$from,$to){
		$query ="SELECT * FROM task WHERE date_created BETWEEN  '$from' AND '$to' AND dept_id='$id'";
		$res = $this->db->select($query);
		 return $res;
	}
}


?>