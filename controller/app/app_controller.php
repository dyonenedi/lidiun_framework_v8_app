<?php
	use Lidiun_Framework_v7\App;
	use Lidiun_Framework_v7\Request;

	Class App_controller
	{
		public function app1() {
			// ALLOW LOGGED ONLY
			Auth::requireLogin();

			// SETTING DATA VIEW
			$view = [];

			//APPLICATION CODE
			$view['message'] = "Welcome to my application 1. It's in development."; 

			// SENDIND DATA TO VIEW
			App::setView($view);
		}

		public function app2() {
			// ALLOW LOGGED ONLY
			Auth::requireLogin();

			// SETTING DATA VIEW
			$view = [];

			//APPLICATION CODE
			$view['message'] = "Welcome to my application 2. It's in development."; 

			// SENDIND DATA TO VIEW
			App::setView($view);
		}
	}