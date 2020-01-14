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
	
	$config = [];


	################################### PRESET CONFIG ###################################
	# The preset config way to define somes application characteristics.
	##################################################################################### 

	$config['preset'] = [	
		// Html SEO
		'description'  => '',
		'key_word'     => '',
		'author'       => '',
		'author_email' => '',
		
		// Translator
		'language_default' => 'en',
		
		// Default timezone config
		'timezone' => 'Africa/Abidjan',

		// Security code to be used in application
		'security_code' => 'L4R5ed2e',
		
		// Turn the application status on or off
		'application_status' => 'on',

		// Use with caution
		'force_debug' => false,
	];

	############################ COMMON INCLUDE FILES CONFIG ############################
	# Here you define somes commons js and css files. Its Optional
	# The framework wil include automatically this files for each page of the application.
	# If you need remove some common js or css from one page, you can use a method 
	# (Layout::removeJs('myFile.js') or Layout::removeCss('myFile.css')) in controller.
	# Just follow the exemplos below.
	#####################################################################################
	
	$config['common_css'] = [
		'vendor/fontawesome-free/css/all.min.css',
		'sb-admin-2.min.css',
		'bootstrap-reboot.min.css',
		'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
		'all.min.css',
		'sb-admin-2.min.css',
		'helper.css',
		'style.css',
	];

	$config['common_js'] = [
		'vendor/jquery/jquery.min.js',
		'vendor/bootstrap/js/bootstrap.bundle.min.js',
		'vendor/jquery-easing/jquery.easing.min.js',
		'sb-admin-2.min.js',
	];

	#################################### PATH CONFIG ####################################
	# Here you define somes public paths. Its Optional
	# The index of array is like a nickname that you will use in html between tags.
	# The value from array is the path.
	# In congig array bellow, write path from public_path.
	# It's nice because if you need change a path, just change de value here, and all 
	# paths in application will change. But for this don't forget use Tags.
	# IMPORTANT: TAGS is always UPPERCASE.
	# IMPORTANT: No need put slash after a TAG.
	# IMPORTANT: Dont forget use "_PATH" after tagname to framework understant PATH TAG
	#####################################################################################

	$config['public_path'] = [	
		'css'   => 'css',
		'js'    => 'js',
		'image' => 'image',
		'icon'  => 'image' . SEPARATOR . 'icon' . SEPARATOR,
		'other' => 'image' . SEPARATOR . 'other' . SEPARATOR,
		'user'  => 'image' . SEPARATOR . 'user' . SEPARATOR,
	];
