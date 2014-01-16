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


	<link rel="shortcut icon" href="/favicon.ico">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/gumby.css">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>

</head>

<body>
	<div id="container" style="margin-top: 60px;">
		<div class ="row">
			<section class="three columns">
				<div id="navbox" gumby-fixed="top" style="text align: center;">
				 	
		
					<h1 class="bigname"><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name') ?></h1></a>
					<nav class="vertical-nav-container" id="navbox">
					 <a class="toggle" gumby-trigger="#navbox > ul" href="#">
						<i class="icon-menu"></i>
					</a> 			
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'vertical-nav','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>
			
					</nav>
				</div>
			</section> <!-- End Header -->