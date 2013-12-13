<?php
/**
 * Template Name: Blog Display Template
 *
 * Description: The template for displying the blog page properly
 *
 *
 */
get_header(); ?>

<section class="eight columns push_one">	
	<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="blog-item">
					<div class="four columns">
						<div class="port-image">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
						<div class="port-cat">
							<h5><?php the_category() ?></h5>
						</div>
					</div>
				</div>
				<div class="eight columns">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div> <!-- entry-excerpt -->
					<div class ="keep-reading">
				<a href="<?php the_permalink(); ?>" rel="bookmark">Keep Reading...</a>
			</div>
				</div> <hr />
				</div> <!-- Blog Item -->
			</div> <!-- Row -->
			<?php endwhile;?>
	</div>
	</section>

<?php get_footer(); ?>