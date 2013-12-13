<?php get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content" <?php post_class('home-post'); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
						<?php the_post_thumbnail() ?>
					</div>
					<div class ="row">
					<div class="nine columns">
						<h2 class="post-title"><?php the_title(); ?></h2>
						<?php the_category(); ?>
						<?php the_content(); ?>
					</div>
					
				</div>
				<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>