<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');
class User{

	private $db;
	private $fm;
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 
	}
	public function user_login($usr_name,$pass){
		$usr_name = $this->fm->validation($usr_name);
		$pass     = $this->fm->validation($pass);
		$usr_name = mysqli_real_escape_string($this->db->link,$usr_name);
		$pass     = mysqli_real_escape_string($this->db->link,md5($pass));
		$query   = "SELECT * FROM `user` WHERE username='$usr_name' AND pass='$pass'";
		$result  = $this->db->select($query);
		if ($result != false) {
			$value = $result->fetch_assoc();
			Session::init();
			Session::set("login",true);
			Session::set("User_id",$value['user_id']);
			Session::set("username",$value['username']);
			Session::set("pass",$value['pass']);
			header("Location:index.php");
		}
	}

	public function emp_login($usr_name,$pass){
		$usr_name = $this->fm->validation($usr_name);
		$pass     = $this->fm->validation($pass);
		$usr_name = mysqli_real_escape_string($this->db->link,$usr_name);
		$pass     = mysqli_real_escape_string($this->db->link,md5($pass));
		$query   = "SELECT * FROM `employee` WHERE email='$usr_name' AND pass='$pass'";
		$result  = $this->db->select($query);
		if ($result != false) {
			$value = $result->fetch_assoc();
			Session::init();
			Session::set("login",true);
			Session::set("User_id",$value['User_id']);
			Session::set("emp_id",$value['emp_id']);
			Session::set("username",$value['username']);
			Session::set("dept_id",$value['dept_id']);
			Session::set("email",$value['email']);
			Session::set("type",$value['type']);
			Session::set("gender",$value['gender']);
			header("Location:index.php");
		}
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
		$query     = "UPDATE `user` SET `username`='$usr_name' ,`pass`='$pass' type='$type' WHERE user_id='$id'";
		$result    = $this->db->update($query);
		return $result;
	}
	public function Get_department(){
		$query   = "SELECT * FROM `department`";
		$result  = $this->db->select($query);
		return $result;
	}
	
	public function get_avatar_by_id($id){
		$Q = "SELECT * FROM employee WHERE emp_id='$id'";
		$r = $this->db->select($Q);
		if($r){
			return $r;
		}
	}

	public function get_task_dates($id){
		$id     = $this->fm->validation($id);
		$id     = mysqli_real_escape_string($this->db->link,$id);
		$query   = "SELECT * FROM `task_dates` WHERE `task_id`='$id' ";
		$result  = $this->db->select($query);
		return $result;
	}
	public function get_dept_by_id($id){
		$id     = $this->fm->validation($id);
		$id     = mysqli_real_escape_string($this->db->link,$id);
		$query   = "SELECT * FROM `department` WHERE `dept_id`='$id' ";
		$result  = $this->db->select($query);
		return $result;
	}

	public function add_dept($post){
		$name     = $this->fm->validation($post["department"]);
		$name     = mysqli_real_escape_string($this->db->link,$name);
		$date     = date('yy-m-d');
		$query     = "INSERT INTO `department` (`name`,`date_created`) VALUES('{$name}','{$date}')";
		$result    = $this->db->insert($query);
		if($result){
		return $result;
		}

	}
	public function delete_dept($id){
		$query   = "DELETE  FROM `department` WHERE dept_id='$id'";
		$result  = $this->db->delete($query);
		return $result;
	}
	private function update_logo($logo,$id){
		$query = "UPDATE `employee` SET `avatar` ='$logo' WHERE `user_id`='$id' ";
		$result    = $this->db->update($query);
			return $result;
	}
	public function update_profile($date){
		$id        = Session::get('User_id');
		$name      = $this->fm->validation($date["name"]);
		$pass      = $this->fm->validation($date["pass"]);
		$name      = mysqli_real_escape_string($this->db->link,$name);
		if($pass !=""){
			$pass      = mysqli_real_escape_string($this->db->link,md5($pass));

			$query     = "UPDATE `user` SET `username`='$name',`pass`='$pass' WHERE  `user_id`='$id'";
		}else{
			$query     = "UPDATE `user` SET `username`='$name' WHERE  `user_id`='$id'";
		}
			$result    = $this->db->update($query);
			if($result){
				return $result;
			}
	}
	public function get_task_notes($id){
		$query = " SELECT * FROM `task_dates` WHERE `task_id`='$id' ORDER BY `date_id` DESC LIMIT 1";
		$res   = $this->db->select($query);
		return $res; 
	}
	public function task_zero($id){
		$query = "UPDATE `task` SET `status`=0 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`notes`) VALUES ('{$id}','task re opened')";
			$res   = $this->db->insert($query);
		}
	}
	public function task_one($id){
		$query = "UPDATE `task` SET `status`=1 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`status`) VALUES ('{$id}','Prepare for submition')";
			$res   = $this->db->insert($query);
		}
	}
	public function task_two($id){
		$query = "UPDATE `task` SET `status`=2 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`status`) VALUES ('{$id}','InReview')";
			$res   = $this->db->insert($query);
		}
	}
	public function task_three($id){
		$query = "UPDATE `task` SET `status`=3 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`status`) VALUES ('{$id}','$note','Done')";
			$res   = $this->db->insert($query);
		}
	}

	public function back_one($id,$note){
		$query = "UPDATE `task` SET `status`=0 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`notes`,`status`) VALUES ('{$id}','$note','waiting')";
			$res   = $this->db->insert($query);
		}
	}
	public function back_two($id,$note){
		$query = "UPDATE `task` SET `status`=1 WHERE `task_id`='$id' ";
		$res = $this->db->update($query);
		if($res){
			$query = "INSERT INTO `task_dates` (`task_id`,`notes`,`status`) VALUES ('{$id}','$note','preparing for submition')";
			$res   = $this->db->insert($query);
		}
	}





	public function save_one_id($id,$emp){
	    
	   // $emp   = Session::get('emp_id');
	    
	    $query = " UPDATE `employee` SET `one_ID`='$id' WHERE `emp_id`='$emp' ";
	    
	    $res   = $this->db->update($query);
	    
	    if($res)
	        return true;
	    else
	        return false; 

	}
		public function public_chat($msg,$file,$from_id,$user_id){
		$msg     = htmlspecialchars($msg);
		$msg     = mysqli_real_escape_string($this->db->link,$msg);
		$query     = "INSERT INTO `public_chat` (`msg`,`file`,`from_id`,`user_id`) VALUES('{$msg}','{$file}','{$from_id}','{$user_id}')";
		$result    = $this->db->insert($query);
		if($result){
			return $result; 
		}else
			return false;
	}
	public function add_msg($msg,$user,$emp,$to,$img1){
		$msg     = htmlspecialchars($msg);
		$msg     = mysqli_real_escape_string($this->db->link,$msg);
		$query     = "INSERT INTO `chat` (`msg`,`file`,`from_id`,`to_id`,`user_id`) VALUES('{$msg}','{$img1}','{$emp}','{$to}','{$user}')";
		$result    = $this->db->insert($query);

		if($result){
			// header("location:chat.php");
			return $result;
		}
	}

	public function get_public_chat(){
		$id = Session::get("User_id");
		$query   = "SELECT * FROM `public_chat` WHERE `user_id`='$id' ORDER BY `pu_id` DESC LIMIT 40";
		$result  = $this->db->select($query);
		return $result;
	}

	public function get_chat_by_id($ids,$id){
		if($id != "")
			$query   = "SELECT * FROM `chat` WHERE `to_id`='$ids' AND `from_id`='$id' OR `to_id`='$id' AND `from_id`='$ids' ORDER BY chat DESC LIMIT 40";

		$result  = $this->db->select($query);
		return $result;
	}

	public function get_admin_by_id(){
		$id = Session::get("User_id");
		$query = "SELECT * FROM `user` WHERE user_id='$id'";
		$result  = $this->db->select($query);
		return $result;
	}
}
?>