<?php
	use Lidiun_Framework_v7\Layout;
	use lidiun_framework_v7_app\Model\User;
	
	class Global_controller
	{
		public function __construct() {	
			if (Auth::getLogged()) {
				$id = (int)Auth::getId();
				$User = New User();
				$name = $User->getNameById($id);
				
				define("USER_ID", $id);
				define("USER_NAME", $name);
				define("USER_LOGGED", true);
			} else {
				define("USER_ID", 0);
				define("USER_NAME", 'User');
				define("USER_LOGGED", false);
			}
		}
	}