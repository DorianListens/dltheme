<?php
/**
 * The template for displaying Archive pages
 *
 *
 * @package WordPress
 * @subpackage dltheme
 * @since version 1.0
 */
get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content">
			<div class="port-grid">
		<?php while ( have_posts() ) : the_post(); ?>
					<div class="portfolio-item">
			<div class="port-image">
				<?php the_post_thumbnail(); ?>
				<div class="port-cat">
				<h5><?php the_category(); ?></h5>
				</div>
			</div>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
			<?php endwhile;?>
		</div>
	</div>
	</section>
		

<?php get_footer(); ?>