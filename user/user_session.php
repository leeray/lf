<?php
//创建一个Web类
class User{
	private $userid
	private $username;
	private $userpassword;
	private $usertype;
	private $userdepartment;
	public function __construct($userid,$username,$userpassword,$usertype,$userdepartment){
		if (!$userid){
			throw new Exception('用户NULL');
		}
		if (!$username){
			throw new Exception('用户名null');
		}
		if (!$userpassword){
			throw new Exception('用户密码null');
		}
		if (!$usertype){
			throw new Exception('用户类型null');
		}
		if (!$userdepartment){
			throw new Exception('用户部门null');
		}
		$this->username = $username;
		$this->userpassword = $userpassword;
		$this->usertype = $usertype;
		$this->userid = $userid;
		$this->userdepartment = $userdepartment;
	}
	public function getUserid(){
		return $this->userid;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getUserpassword(){
		return $this->userpassword;
	}
	public function getUsertype(){
		return $this->usertype;
	}
	public function getUserdepartment(){
		return $this->userdepartment;
	}
}
?>