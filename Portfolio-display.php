<?php
/**
 * Template Name: Portfolio Display Template
 *
 * Description: The template for displying the portfolio page properly
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
					<hr />
					<div class="port-grid">
<?php endwhile; 
			$args = array( 'post_type' => 'dl_portfolio', 'posts_per_page' => 12 );  //
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="portfolio-item">
			<div class="port-image">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
				<div class="port-cat">
				<h5><?php the_category() ?></h5>
				</div>
			</div>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			<!--<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>-->
		</div>
			<?php endwhile;?>
		</div>
	</div>
	</section>

<?php get_footer(); ?>