<?php
	namespace lidiun_framework_v7_app\Model;

	use Lidiun_Framework_v7\Database;

	Class User
	{
		public function getByEmailSenha($email,$senha){
			$sql = "
				SELECT *
				FROM user
				WHERE email = '".$email."' AND password = '".$senha."' AND actived = 1
			";
			$data = Database::query($sql,'array');
			if (!empty($data[0])) {
				return $data[0]['id'];
			} else {
				return false;
			}
		}

		public function getByEmail($email){
			$sql = "
				SELECT *
				FROM user
				WHERE email = '".$email."' AND actived = 1
			";
			$data = Database::query($sql,'array');
			if (!empty($data[0])) {
				return $data[0]['id'];
			} else {
				return false;
			}
		}

		public function getNameById($id){
			$sql = "
				SELECT name
				FROM user
				WHERE id = ".$id." AND actived = 1
			";
			$data = Database::query($sql,'array');
			if (!empty($data[0])) {
				return $data[0]['name'];
			} else {
				return false;
			}
		}

		public function getEmailById($id){
			$sql = "
				SELECT email
				FROM user
				WHERE id = ".$id." AND actived = 1
			";
			$data = Database::query($sql,'array');
			if (!empty($data[0])) {
				return $data[0]['email'];
			} else {
				return false;
			}
		}

		public function emailValidation($email){
			$sql = "
				SELECT id
				FROM user
				WHERE email = '".$email."'
			";
			$data = Database::query($sql,'array');
			if (!empty($data[0])) {
				return false;
			} else {
				return true;
			}
		}
		
		public function register($name, $email, $password){
			$date = date('Y-m-d H:i:s');
			$sql = "
				INSERT INTO user (name, email, password, date)
				VALUES ('".$name."', '".$email."', '".$password."', '".$date."')
			";
			return Database::query($sql,'boolean'); 
		}

		public function resetPassword($email, $password){
			$sql = "
				UPDATE user SET password = '".$password."'
				WHERE email = '".$email."'
			";
			return Database::query($sql,'boolean'); 
		}
	}