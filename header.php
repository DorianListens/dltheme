<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
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
	<!-- <div class="row">
		<div style="height: 60px;">
		</div>
	</div> -->

	<div id="container" style="margin-top: 60px;">
		<div class ="row">
			<section class="three columns">
				<div id="navbox" gumby-fixed="top" style="text-align: center !important;">
				 	
						<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img_silence_demo.jpg"/ style="max-width: 320px;"> -->
					<h1 class="bigname"><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name') ?></h1></a>
					<nav class="vertical-nav-container" id="navbox">
					 <a class="toggle" gumby-trigger="#navbox > ul" href="#">
						<i class="icon-menu"></i>
					</a> 			
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'vertical-nav','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>
			<!--	</div> -->
					</nav>
				</div>
			</section>