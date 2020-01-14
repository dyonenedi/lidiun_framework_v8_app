<?php
	use Lidiun_Framework_v7\Request;
	use Lidiun_Framework_v7\Conf;

	Class Auth
	{
		private static $logged;
		private static $id;

		private static function load(){
			if (!empty($_SESSION['myId'])) {
				self::$id = Encrypt::decode($_SESSION['myId']);
				self::$logged = true;
			} else {
				if (!empty($_COOKIE["cookMyId"])) {
					$code = $_COOKIE["cookMyId"];
					$code = strrev(base64_decode($code));
					$_SESSION['myId'] = $code;
					self::$id = Encrypt::decode($_SESSION['myId']);
					self::$logged = true;
				} else {
					self::$logged = false;
				}
			}
		}

		public static function requireLogin() {
			if (!self::getLogged()) {
				Request::redirectTo("user/login");
			}
		}

		public static function requireLogout() {
			if (self::getLogged()) {
				Request::redirectTo(Conf::$_conf['preset']['controller_default']);
			}
		}
		
		public static function login($id, $remindme=false){
			self::$id = $id;
			self::$logged = true;
			
			$_SESSION['myId'] = Encrypt::encode($id);
			if ($remindme) {
				$code = $_SESSION['myId'];
				$code = base64_encode(strrev($code));
				setcookie("cookMyId", $code, time()+(60*60*24*120), '/');
			}
			Request::redirectTo(Conf::$_conf['preset']['controller_default']);
		}

		public static function logout(){
			unset($_SESSION['myId']);
			if (!empty($_COOKIE["cookMyId"])) {
				unset($_COOKIE['cookMyId']);
			    setcookie('cookMyId', null, -1, '/');
			}

			Request::redirectTo('user/login');
		}

		///////////////////////////////////// GETS //////////////////////////////////////////

		public static function getId() {
			return self::$id;
		}

		public static function getLogged() {
			if (empty(self::$logged)) {
				self::load();
			}

			return self::$logged;
		}
	}