<?php
	/**********************************************************
	* Lidiun PHP Framework 7.0 - (http://www.lidiun.com)
	*
	* @Created in 26/08/2013
	* @Updated in 01/10/2019
	* @Author  Dyon Enedi <dyonenedi@hotmail.com>
	* @By Dyon Enedi <dyonenedi@hotmail.com>
	* @Contributor Gabriela A. Ayres Garcia <gabriela.ayres.garcia@gmail.com>
	* @License: free
	*
	**********************************************************/


	$config['preset']['controller_default'] = 'home';
	$config['preset']['app_name']           = 'My App';
	$config['preset']['domain']             = 'mydomain.com';

	$config['environment']['production'] = '*.mydomain.com';
	$config['environment']['developer']  = 'localhost';

	$config['database']['production'] = [
		'host_name'  => 'localhost',
		'db_name'    => 'myapp',
		'user_name'  => '',
		'password'   => '',
	];

	$config['database']['developer'] = [
		'host_name'  => 'localhost',
		'db_name'    => 'myapp',
		'user_name'  => 'root',
		'password'   => '',
	];
