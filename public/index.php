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
	try {
		define('PUBLIC_DIRECTORY', __DIR__);
		define('SEPARATOR', DIRECTORY_SEPARATOR);

		$adapter = PUBLIC_DIRECTORY . SEPARATOR . '..' . SEPARATOR  . '..' . SEPARATOR . 'lidiun_framework_v7' . SEPARATOR  .'adapter.php';
		if (!file_exists($adapter)) {
			exit("I can't find adapter.php file in: ".__FILE__.' on line: '.__LINE__);
		} else {
			include_once($adapter);
		}
	} catch (\ExceptionException $e) {
		echo $e->getMessage();
		echo '<pre>';
		echo $e->getTraceAsString();
		echo '</pre>';
	}
