<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title>
		<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name') ?>
	</title>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/DL-icon5.ico">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/gumby.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php // wp_head(); ?>

</head>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="container">
		<div class ="row">