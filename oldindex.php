
<?php get_header(); ?>

	<section class="eight columns push_one">
		<div class="row">
		<div class="six columns">	
		<div id="content">
				<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
		</div>
	</div>
	<div class="five columns push_one image circle">
		<img src="<?php echo get_template_directory_uri(); ?>/img/ottawa-live.jpg" />
	</div>
	</section>

<?php get_footer(); ?>