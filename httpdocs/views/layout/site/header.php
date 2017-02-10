 <?php
 use Noneslad\Tools\WebTools;
use Noneslad\Entity\PageWeb;
use Noneslad\Entity\optionsite;
$optionsite = new optionsite(1);
  ?>
 <!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php $lien = WebTools::fromRequest('site'); echo pageweb::givPage($lien)->title; ?></title>
	<meta name="description" content="<?php $lien = WebTools::fromRequest('site'); echo pageweb::givPage($lien)->descripion; ?>"/>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets//css/normalize.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/owl.theme.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/prettyPhoto.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/transitions.css">
	<link rel="stylesheet" href="assets/css/color.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/scripts/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
		