<?php 
/**
 * Template Name: Skill Page Display Template
 *
 * Description: The template for displying the skill pages
 *
 *
 */
get_header(); ?>

	<section class="eight columns push_one">	
		<div id="content">
				<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				<?php $theName = $post->post_name;
				endwhile; ?>
				<h3>Recently:</h3>
  				<?php // New Query
				$args = array( 'post_type' => 'dl_portfolio', 'posts_per_page' => 3, 'portfolio_cats' => $theName );
  				$loop = new WP_Query( $args );
  				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="row">
				<div class="blog-item clearfix">
					<div class="four columns">
						<div class="port-image">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
					</div>
				</div>
				<div class="eight columns blog-info">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div> <!-- entry-excerpt -->
					<div class="entry-tags">
					<?php if ( has_tag() ) : {echo '<i class="icon-tag"></i>'; the_tags( '', ', ', '');} endif; ?>
					</div>
					<div class ="keep-reading">
				<a href="<?php the_permalink(); ?>" rel="bookmark">Keep Reading...</a>
			</div>
				</div>
				</div> <!-- Blog Item -->
			</div> <!-- Row -->
			<?php endwhile;?>


		</div>
	</section>

<?php get_footer(); ?>