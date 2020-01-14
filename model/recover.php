<?php
	namespace lidiun_framework_v7_app\Model;

	use Lidiun_Framework_v7\Database;
	use Lidiun_Framework_v7\Conf;
	use Lidiun_Framework_v7\Url;
	use Lidiun_Framework_v7\Autoload;

	Autoload::includePath('plugin');

	Class Recover
	{
		private static $token;
		private static $email;

		public static function generateToken(){
			if (!empty(self::$email)) {
				// Remove all tokens
				$sql = "
					SELECT id FROM token_recover 
					WHERE email = '".self::$email."'
				";
				if (Database::query($sql, 'num_rows')) {
					self::removeToken();
				}

				// Genrate token and insert
				self::$token = uniqid(rand(), true);
				self::$token = substr(self::$token, 0, 23);
				$sql = "
					INSERT INTO token_recover (token, email, active, date) 
					VALUES('".self::$token."', '".self::$email."', 1, '".date('Y-m-d H:i:s')."')
				";
				if (Database::query($sql, 'boolean')) {
					return true;
				} else {
					return false;
				}
			}
		}

		public static function validateToken(){
			if (!empty(self::$email) && !empty(self::$token)) {
				// Validate Email with Token and date generator less than 24:00h
				$sql = "
					SELECT id FROM token_recover 
					WHERE token = '".self::$token."' AND email = '".self::$email."' AND active = 1 
					AND DATEDIFF(date, '".date('Y-m-d H:i:s')."') = 0
				";
				if (Database::query($sql, 'num_rows')) {
					return true;
				} else {
					return false;
				}
			}
		}

		public static function removeToken(){
			if (!empty(self::$email)) {
				// Validate Email with Token and date generator less than 24:00h
				$sql = "
					UPDATE token_recover SET active = 0
					WHERE email = '".self::$email."'
				";
				if (Database::query($sql, 'boolean')) {
					return true;
				} else {
					return false;
				}
			}
		}

		public static function sendEmail($name=false){
			$to       = self::$email;
			$toName   = ($name) ? $name : '';
			$from     = 'account@'.Conf::$_conf['preset']['domain']; 
			$subject  = 'Reset password.'; 
			$fromName = Conf::$_conf['preset']['app_name']; 
			$message  = ($name) ? "Hi ".$toName.".\n" : ''; 
			$message .= "Below is the link so you can reset your password. If you have not requested to reset your password, please ignore this Email. \n\n"; 
			$message .= "Link: ".Url::$_url['base']."recover/recovering/".self::$token."/".self::$email; 

			if (\Mail::sendMail($from, $to, $subject, $message, $fromName, $toName)) {
				return true;
			} else {
				return false;
			}
		}

		//////////////////////////////////// GETs AND SETs ////////////////////////////////////

		public static function getToken(){
			return self::$token;
		}		

		public static function getEmail(){
			return self::$email;
		}

		public static function setToken($token){
			self::$token = $token;
		}	

		public static function setEmail($email){
			self::$email = $email;
		}
	}