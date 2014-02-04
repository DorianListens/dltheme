<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
	   <meta name="robots" content="noindex, nofollow" /> 
	<title>
		<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name') ?>
	</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/gumby.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php // wp_head(); ?>

</head>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="container">
		<div class ="row">