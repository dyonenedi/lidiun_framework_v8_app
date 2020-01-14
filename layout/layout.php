<?php use Lidiun_Framework_v7\App;?>

<!DOCTYPE html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="apple-touch-icon" sizes="32x32" href="/image/favicon/favicon-32x32.png"> 
	  <link rel="apple-touch-icon" sizes="57x57" href="/image/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/image/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/image/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/image/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/image/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/image/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/image/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/image/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="//image/faviconapple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/image/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/image/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/favicon-16x16.png">
		<link rel="manifest" href="/image/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/image/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	  <!-- APPLE -->
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-title" content="<?=App::$preset['app_name']?>">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	  <!-- ANDROID -->
	  <meta name="mobile-web-app-capable" content="yes">
	  <meta name="mobile-web-app-title" content="<?=App::$preset['app_name']?>">
	  <meta name="application-name" content="<?=App::$preset['app_name']?>">
	  <!-- Microsoft -->
	  <meta name="application-name" content="<?=App::$preset['app_name']?>"/>
	  <link rel="shortcut icon" type="image/x-icon" href="/image/favicon/favicon.ico"/>

	  <meta name="author" content="<?=App::$preset['author']?>"/>
	  <meta name="description" content="<?=App::$preset['description']?>"/>

	  <meta name="keywords" content="<?=App::$preset['key_word']?>"/>
	  <meta property="og:site_name" content="<?=App::$preset['app_name']?>"/>
	  <meta property="og:title" content="<?=App::$preset['app_name']?>"/>

	  <title><?=ucwords(App::$controller)?></title>

	  <!-- Custom fonts for this template-->
	  <script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
	  
	  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!--Common CSS-->
	  <?php 
	    foreach (App::$common_css as $key => $css) {
	      if (strpos($css, 'http://') === false && strpos($css, 'https://') === false) {
	        echo '<link href="'.App::$link['css'].$css.'" rel="stylesheet">';
	      } else {
	        echo '<link href="'.$css.'" rel="stylesheet">';
	      }
	    }
	  ?>

	  <!--Addition CSS-->
	  <?php 
	    foreach (App::$additional_css as $key => $css) {
	      if (strpos($css, 'http://') === false && strpos($css, 'https://') === false) {
	        echo '<link href="'.App::$link['css'].$css.'" rel="stylesheet">';
	      } else {
	        echo '<link href="'.$css.'" rel="stylesheet">';
	      }
	    }
	  ?>

	</head>

	<body id="page-top">
	  <!-- Page Wrapper -->
	  <div id="wrapper">
	    <!-- Sidebar -->
	    <?php 
	  		include_once(App::$path['layout'].'sidebar.php');
	  	?>
	    <!-- End of Sidebar -->

	    <!-- Content Wrapper -->
	    <div id="content-wrapper" class="d-flex flex-column">
	      <!-- Main Content -->
	      <div id="content">

	      	<!-- Topbar -->
	      	<?php 
	      		include_once(App::$path['layout'].'topbar.php');
	      	?>
	        <!-- End of Topbar -->

	        <!-- Begin Page Content -->
	        <div class="container-fluid">
	          <!-- Page Heading -->
	          <?php  
				      include_once(App::$path['view'].App::$controller.SEPARATOR.App::$action.'_view.php');
			      ?>
	        </div>
	        <!-- /.container-fluid -->
	      </div>
	      <!-- End of Main Content -->

	      <!-- Footer -->
	      <?php  
	      	include_once(App::$path['layout'].'footer.php');
	      ?>
	      <!-- End of Footer -->
	    </div>
	    <!-- End of Content Wrapper -->
	  </div>
	  <!-- End of Page Wrapper -->

	  <!-- Scroll to Top Button-->
	  <a class="scroll-to-top rounded" href="#page-top">
	    <i class="fas fa-angle-up"></i>
	  </a>
	  
	    <!--Common JS-->
	  <?php 
	    foreach (App::$common_js as $key => $js) {
	      if (strpos($js, 'http://') === false && strpos($js, 'https://') === false) {
	        echo '<script src="'.App::$link['js'].$js.'"></script>';
	      } else {
	        echo '<script src="'.$js.'"></script>';
	      }
	    }
	  ?>
	  <!--Addition JS-->
	  <?php 
	    foreach (App::$additional_js as $key => $js) {
	      if (strpos($js, 'http://') === false && strpos($js, 'https://') === false) {
	        echo '<script src="'.App::$link['js'].$js.'"></script>';
	      } else {
	        echo '<script src="'.$js.'"></script>';
	      }
	    }
	  ?>
	</body>
</html>













