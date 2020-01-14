<?php
	use Lidiun_Framework_v7\App;
	use Lidiun_Framework_v7\Request;

	Class home_controller
	{
		public function index() {
			$view = [];

			App::setView($view);
		}
	}