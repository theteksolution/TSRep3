<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
	<!--<link href="localhost/Proj1/app/templates/default/css/style.css" rel="stylesheet">-->
	<script src="<?php echo \helpers\url::get_template_path();?>js/jquery.js"></script>
	<link href="<?php echo \helpers\url::get_template_path();?>bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet"> 
	<link href="<?php echo \helpers\url::get_template_path();?>bootstrap-3.2.0-dist/css/bootstrap-theme.css" rel="stylesheet"> 
	<link href="<?php echo \helpers\url::get_template_path();?>bootstrap-3.2.0-dist/css/bootstrap.css.map" rel="stylesheet"> 
	<script src="<?php echo \helpers\url::get_template_path();?>bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	  
</head>
<body>

<div class="wrapper">