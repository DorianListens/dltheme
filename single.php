<?php get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content" <?php post_class('home-post'); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
						<!-- <div class="parallax" gumby-parallax="0.5" gumby-offset="500" style="height: 400px; background-size: 75%; background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);"></div> --> 
						<?php the_post_thumbnail() ?>
					</div>
					<div class ="row">
					
						<h2 class="post-title"><?php the_title(); ?></h2>
						<div class="entry-meta"><i class="icon-folder"></i><?php the_category(); ?>
						 <?php if ( has_tag() ) : {echo '<i class="icon-tag"></i>'; the_tags( '', ', ', '');} endif; ?>
						 	</div>
						<?php the_content(); ?>
					
					
				</div>
				<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>