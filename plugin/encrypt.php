<?php
	use Lidiun_Framework_v7\Conf;

	Class Encrypt
	{
		public static function encodePassword($string, $password=false){
			$password = ($password) ? $password: Conf::$_conf['preset']['security_code'];
			$password = sha1($password);
			$string = sha1($string);
			$count = (strlen($password) <= 16) ? strlen($password) : 16;
			$password = strrev(substr($password, 0, $count-1));

			for ($i=$count; $i > 0; $i--) { 
				$j = $i-1;
				$ex[] = substr($password, $j, $i);
			}

			$i = 1;

			foreach($ex as $value){
				if ($i) {
					$string = $string . $value;
					$i = 0;
				} else {
					$string = $value . $string;
					$i = 1;
				}	
			}

			$string = sha1(trim($string));

			return $string;
		}

		public static function encode($password, $string='AskTyporl') {
			$password = strrev($password);
			$string = strrev($string);

			$passwordPart1 = substr($password, 0, (strlen($password) / 2));
			$passwordPart2 = substr($password, (strlen($password) / 2));

			$stringPart1 = substr($string, 0, (strlen($string) / 2));
			$stringPart2 = substr($string, (strlen($string) / 2));

			$newPassword = $stringPart2.$passwordPart1.$stringPart1.$passwordPart2;

			return $newPassword;
		}

		public static function decode($newPassword, $string='AskTyporl') {
			$string = strrev($string);
			$stringPart1 = substr($string, 0, (strlen($string) / 2));
			$stringPart2 = substr($string, (strlen($string) / 2));

			if (strpos($newPassword, $stringPart2) !== false) {
				$password = str_replace($stringPart2, '', $newPassword);
				$password = str_replace($stringPart1, '', $password);
				$password = strrev($password);
			} else {
				$password = false;
			}
			
			return $password;
		}	
	}